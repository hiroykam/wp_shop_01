<?php
/**
 * The Sidebar containing the main widget areas.
 */
?>
		<div id="sidebar" class="widget-area col300" role="complementary">
			<?php if ( ! dynamic_sidebar( 'sidebar-alt-home' ) ) : ?>
                                <aside id="archives" class="widget">
                                        <div class="widget-title">店舗情報</div>
                                        <ul>
                                           <li>京王線千歳烏山駅徒歩2分程度歩いたところにあります</li>
                                           <li><a href="/info/">こちら</a>ご参照ください。</li>
                                        </ul>
                                </aside>

                                <aside id="archives" class="widget">
                                        <div class="widget-title">メニュー</div>
                                        <ul>
                                           <li><a href="/menu/">こちら</a>をご参照ください。</li>
                                        </ul>
                                </aside>

				<aside id="recent-posts" class="widget">
					<div class="widget-title">仲屋からのお知らせ</div>
					<ul>
						<?php
							$args = array( 'numberposts' => '15', 'category' => '9', 'post_status' => 'publish' );
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


                <aside id="jobs" class="widget">
                 <div class="widget-title">仲屋メンバー募集中</div>
                 <ul><li>仲屋では一緒に働けるメンバを募集しております。</li>
                 <li>詳細は<a href="/jobs/">こちら</a>です。</li></ul>
               </aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #sidebar .widget-area -->
