<?php
/*/
Plugin Name: Restaurateur Menu Item CPT
Plugin URI: http://wpthemes.co.nz/restaurateur/
Description: Creates "Menu Item" custom post type for the Restaurateur theme.
Version: 1.0
Author: WPThemes NZ
Author URI: http://wpthemes.co.nz/
License: GNU General Public License v2.0
License URI: http://www.gnu.org/licenses/gpl-2.0.html
/*/

/******************************************************************
 * Register the "Menu Item" custom post type for Restaurateur
 ******************************************************************/

function restaurateur_cpt_menu_item() {
	
	$labels = array(
		'name'               => _x( 'Menu Items', 'post type general name', 'restaurateur' ),
		'singular_name'      => _x( 'Menu Item', 'post type singular name', 'restaurateur' ),
		'add_new'            => _x( 'Add New', 'book', 'restaurateur' ),
		'add_new_item'       => __( 'Add New Menu Item', 'restaurateur' ),
		'edit_item'          => __( 'Edit Menu Item', 'restaurateur' ),
		'new_item'           => __( 'New Menu Item', 'restaurateur' ),
		'all_items'          => __( 'All Menu Items', 'restaurateur' ),
		'view_item'          => __( 'View Menu Item', 'restaurateur' ),
		'search_items'       => __( 'Search Menu Items', 'restaurateur' ),
		'not_found'          => __( 'No menu items found', 'restaurateur' ),
		'not_found_in_trash' => __( 'No menu items found in the Trash', 'restaurateur' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Menu Items'
	);
	
	$args = array(
		'labels'        => $labels,
		'description'   => __('Holds our menu items and menu item specific data', 'restaurateur'),
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
		'rewrite' 		=> array( 'slug' => 'menu-item-archive','with_front' => false ),
	);
	register_post_type( 'menu_item', $args );	
}
add_action( 'init', 'restaurateur_cpt_menu_item' );



/* Flush your rewrite rules */
function restaurateur_flush_rewrite_rules() {
	global $pagenow;
	if ( 'themes.php' == $pagenow && isset( $_GET['activated'] ) )
		flush_rewrite_rules();
}
/* Flush rewrite rules for custom post types. */
add_action( 'load-themes.php', 'restaurateur_flush_rewrite_rules' );



/* Custom Taxonomies for Menu Item */
function restaurateur_taxonomies_menu_item() {
	$labels = array(
		'name'              => _x( 'Menu Item Categories', 'taxonomy general name', 'restaurateur' ),
		'singular_name'     => _x( 'Menu Item Category', 'taxonomy singular name', 'restaurateur' ),
		'search_items'      => __( 'Search Menu Item Categories', 'restaurateur' ),
		'all_items'         => __( 'All Menu Item Categories', 'restaurateur' ),
		'parent_item'       => __( 'Parent Menu Item Category', 'restaurateur' ),
		'parent_item_colon' => __( 'Parent Menu Item Category:', 'restaurateur' ),
		'edit_item'         => __( 'Edit Menu Item Category', 'restaurateur' ), 
		'update_item'       => __( 'Update Menu Item Category', 'restaurateur' ),
		'add_new_item'      => __( 'Add New Menu Item Category', 'restaurateur' ),
		'new_item_name'     => __( 'New Menu Item Category', 'restaurateur' ),
		'menu_name'         => __( 'Menu Item Categories', 'restaurateur' ),
	);
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		
	);
	register_taxonomy( 'menu_item_category', 'menu_item', $args );
}
add_action( 'init', 'restaurateur_taxonomies_menu_item', 0 );

/* Price Meta Box for the Menu Item */

function restaurateur_menu_item_price_box() {
    add_meta_box( 
        'menu_item_price_box',
        __( 'Menu Item Price', 'restaurateur' ),
        'restaurateur_menu_item_price_box_content',
        'menu_item',
        'side',
        'high'
    );
}
add_action( 'add_meta_boxes', 'restaurateur_menu_item_price_box' );

function restaurateur_menu_item_price_box_content( $menu_item_price ) {

	$price = get_post_meta( $menu_item_price->ID, 'menu_price', true );
	echo '<input type="hidden" name="restaurateur_noncename" id="restaurateur_noncename" value="' . wp_create_nonce( 'restaurateur-nonce' ) . '" />';
	echo '<label for="menu_item_price">' . __('Enter the price for this menu item ', 'restaurateur') . '</label>';
	echo '<input id="menu_item_price" name="menu_item_price" size="6" type="text" value="'.$price.'" />';
}


function restaurateur_menu_item_price_box_save( $menu_item_price ) {

	// If it is our form has not been submitted, so we dont want to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
        return;
    }
	
	// verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (isset($_POST['restaurateur_noncename'])){
        if ( !wp_verify_nonce( $_POST['restaurateur_noncename'], 'restaurateur-nonce' ) )
            return;
    }else{return;}
	
	// Check permissions
    if ( 'menu_item' == $menu_item_price->post_type ) { if ( !current_user_can( 'edit_page', $menu_item_price )) { return $menu_item_price; }}
    elseif ( !current_user_can( 'edit_post', $menu_item_price )) { return $menu_item_price;}

	update_post_meta( $menu_item_price, 'menu_price', $_POST['menu_item_price'] );
}
add_action( 'save_post', 'restaurateur_menu_item_price_box_save' );


function restaurateur_menu_item_feature_box_save( $menu_item_feature ) {

	// If it is our form has not been submitted, so we dont want to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
        return;
    }
	
	// verify this came from the our screen and with proper authorization,
    // because save_post can be triggered at other times
    if (isset($_POST['restaurateur_noncename'])){
        if ( !wp_verify_nonce( $_POST['restaurateur_noncename'], 'restaurateur-nonce' ) )
            return;
    }else{return;}
	
	// Check permissions
    if ( 'menu_item' == $menu_item_feature->post_type ) { if ( !current_user_can( 'edit_page', $menu_item_feature )) { return $menu_item_feature; }}
    elseif ( !current_user_can( 'edit_post', $menu_item_feature )) { return $menu_item_feature;}

	update_post_meta( $menu_item_feature, 'menu_feature', $_POST['menu_item_feature'] );
}
add_action( 'save_post', 'restaurateur_menu_item_feature_box_save' );

?>