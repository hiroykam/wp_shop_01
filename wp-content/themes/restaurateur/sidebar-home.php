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
 <ul><li>Facebook、インスタグラム、Twitterでも情報発信しております。詳細は<a href="/2017/12/17/sns/">こちら</a>です！</li><li>フォローしていただければ幸いです</li></ul>
				</aside>

                                <!-- aside id="archives" class="widget">
                                        <div class="widget-title">こだわりの日本酒</div>
                                        <ul>
                                           <li>やきとん、モツ煮にあう日本酒各種を取り寄せております。</li>
                                           <li>メニューは<a href="/menu/sake/">こちら</a>です。メニューに記載がない日本酒もあいますので、ご来店いただき、ぜひご確認ください！</li>
                                        </ul>
                                </aside -->

 <aside id="recent-posts" class="widget">
                                        <div class="widget-title">仲屋のメニュー</div>
                                        <ul>
<li>メニューは<a href="/menu/">こちら</a>です。</li>
<li>やきとん、焼鳥（やきとり）、野菜串いろいろそれ得ております。</li>
<li>ドリンク、アルコール、特に日本酒は有名なものからなかなか入手できないものまでありますので、ご確認いただければ幸いです。</li>
                    </ul>
                                </aside>


                <aside id="jobs" class="widget">
                 <div class="widget-title">仲屋メンバー募集中</div>
                 <ul><li>仲屋では一緒に働けるメンバを募集しております。</li><li>アルバイトまたは社員をご希望される方は<a href="/jobs/">こちら</a>を御覧ください。</li><li>日中の仕込みをお手伝いしていただける方も募集しております！</li></ul>
               </aside>
                
			</div>
			<?php endif; // end sidebar widget area ?>
		</div><!-- #sidebar .widget-area -->
     </div>
