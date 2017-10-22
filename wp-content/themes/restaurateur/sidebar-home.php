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
                                           <li>京王線千歳烏山駅徒歩2分程度歩いたところにあります</li>
                                           <li>アクセス方法は<a href="/info/">こちら</a>です</li>
					</ul>
 <ul><li>Facebookのサイトは<a href="https://www.facebook.com/%E3%82%84%E3%81%8D%E3%81%A8%E3%82%8A%E4%BB%B2%E5%B1%8B-304502246272760/">こちら</a>です！</li><li>フォローしていただければ幸いです</li></ul>
				</aside>

                                <!-- aside id="archives" class="widget">
                                        <div class="widget-title">こだわりの日本酒</div>
                                        <ul>
                                           <li>やきとん、モツ煮にあう日本酒各種を取り寄せております。</li>
                                           <li>メニューは<a href="/menu/sake/">こちら</a>です。メニューに記載がない日本酒もあいますので、ご来店いただき、ぜひご確認ください！</li>
                                        </ul>
                                </aside -->

 <aside id="recent-posts" class="widget">
                                        <div class="widget-title">仲屋家の食卓</div>
                                        <ul>
<li>スタッフさんと休憩時間に一緒に食べた「まかない」を公開しちゃいます！</li>
                                                <?php
                                                        $args = array( 'numberposts' => '5', 'category' => '1', 'post_status' => 'publish' );
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
                 <ul><li>仲谷では一緒に働けるメンバを募集しております。</li><li>アルバイトまたは社員をご希望される方は<a href="/jobs/">こちら</a>を御覧ください。</li><li>日中の仕込みをお手伝いしていただける方も募集しております！</li></ul>
               </aside>
                
			</div>
			<?php endif; // end sidebar widget area ?>
		</div><!-- #sidebar .widget-area -->
     </div>
