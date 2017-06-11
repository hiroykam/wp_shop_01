
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<header class="entry-header">
    	<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta clearfix">
			<?php restaurateur_posted_on(); ?>
            <?php if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) : ?>
            <div class="comment-top"><span class="meta-com"><?php _e('Comments:', 'restaurateur'); ?></span> <?php comments_popup_link( __( 'Leave <span class="txtreg">a comment</span>', 'restaurateur' ), __( '1 <span class="txtreg">Comment</span>', 'restaurateur' ), __( '% <span class="txtreg">Comments</span>', 'restaurateur' ) ); ?></div>
        <?php endif; ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
        
		<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'restaurateur' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->

    	<?php if ( has_post_thumbnail()) : ?>
        <div class="imgthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail( array(600, 300) ); ?></a></div> 
        <?php else : ?>
        <div class="noimgthumb"></div>
    	<?php endif; ?>


	<div class="entry-content post-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'restaurateur' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'restaurateur' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->


	<footer class="entry-meta">

		<?php edit_post_link( __( 'Edit', 'restaurateur' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- #entry-meta -->
</article><!-- #post-<?php the_ID(); ?> -->
