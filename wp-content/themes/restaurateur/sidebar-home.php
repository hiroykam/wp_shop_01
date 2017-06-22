<?php
/**
 * The Sidebar containing the main widget areas.
 */
?>
	<div id="sidebar-home-wrap">
		<div id="sidebar-home" class="widget-area" role="complementary">
			<div id="sidefix" class="clearfix">
			<?php if ( ! dynamic_sidebar( 'sidebar-alt-home' ) ) : ?>

				<aside id="recent-posts" class="widget">
					<div class="widget-title">仲屋からのお知らせ</div>
					<ul>
						<?php
							$args = array( 'numberposts' => '5', 'category' => '9', 'post_status' => 'publish' );
							$recent_posts = wp_get_recent_posts( $args );
							
							foreach( $recent_posts as $recent ){
								if ($recent["post_title"] == '') {
									 $recent["post_title"] = __('View Post', 'restaurateur');
								}
								echo '<li><a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' . $recent["post_title"] .'</a> </li> ';
							}
						?>
                    </ul>
				</aside>

                                <aside id="archives" class="widget">
					<div class="widget-title">店舗情報</div>
					<ul>
                                           <li><a href="/jobs/">京王線千歳烏山駅徒歩2分程度歩いたところにあります</a></li>
					</ul>
				</aside>

                                <aside id="archives" class="widget">
                                        <div class="widget-title">こだわりの日本酒</div>
                                        <ul>
                                           <li><a href="/menu/sake/">やきとん、モツ煮にあう日本酒各種を取り寄せております！</a></li>
                                        </ul>
                                </aside>


                <aside id="jobs" class="widget">
                 <div class="widget-title">仲屋メンバー募集中</div>
                 <ul><li><a href="/jobs/">仲谷では一緒に働けるメンバを募集しております</a></li></ul>
               </aside>
                
			</div>
			<?php endif; // end sidebar widget area ?>
		</div><!-- #sidebar .widget-area -->
     </div>
