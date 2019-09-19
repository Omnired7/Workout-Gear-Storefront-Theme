<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Phoenix_Gear
 */
get_header();  ?>
<div id="page" class="site">
	<?php get_header('page'); ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'whisper-room' ); ?></a>
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<div class='first-feat' style='display:block;'>
				<?php
					if(have_posts()): the_post(); $current_blog_id = get_the_ID(); ?>
						<div class='post featured-post'>
                            <div>
                                <div class='left'>
                                    <h1><?php the_title(); ?></h1>
                                    <h2>By: <?php echo get_the_author_meta('nickname'); ?></h2>
                                    <h3><?php the_date(); ?></h3>
                                </div>
                                <div class='clear'>
                                </div>
                            </div>
                        </div>
				</div>
				<style>
					body{
						background: #000;
					}
					.featured-post{
						background: url(<?php echo get_the_post_thumbnail_url(null,'full'); ?>);
						background-repeat: no-repeat;
						background-size: cover;
						background-attachment: fixed;
    					background-size: 100% auto;
					}
					#main .first-feat .post .clear{
						width: 100vw;
					}
					#main .first-feat .post h1{
						margin-top: 2em;
					}
					#main{
						color: #FFF;
					}
					#main .main-content{
						background: #FFF;
						color: #000;
						padding: 1em;
						margin: auto;
						max-width: 55em;
					}
					#main .main-content h1,
					#main .main-content h2,
					#main .main-content h3,
					#main .main-content h4, 
					#main .main-content h5{
						font-family: proxima-nova, sans-serif;
						font-weight: 700;
						font-style: normal;
					}
					#main .main-content p{
						font-family: montserrat, sans-serif;
						font-weight: 400;
						font-style: normal;
					}
				</style>
				<div class='main-content'>
					<?php the_content(); ?>
				</div>
				<h4 style='text-align:center;'>Don’t forget to share this post!</h4>
				<div style='display: flex;flex-flow: row;justify-content: space-around;'>
					<div class="sharethis-inline-share-buttons"></div>
				</div>
				<br>
				<br>
				<hr>
				<br>
				<h4 style='text-align:center;'> You’ll Like These Too.</h4>
				<div class='page-posts'>
					<?php 
						$recent_posts_args = array(
							'post_type' => 'post',
							'post__not_in' => array($current_blog_id),
							'posts_per_page' => 3, //4 posts per page
							'orderby' => 'date',
							'order' => 'DESC'
						);
						$recent_posts_query = new WP_Query($recent_posts_args);
						if($recent_posts_query->have_posts()):
							for($i = 0; $i < 3; $i++): 
								$recent_posts_query->the_post(); ?>
								<a href='<?php the_permalink(); ?>'>
									<div class='post' style="background: url(<?php echo get_the_post_thumbnail_url(null, 'medium') ?>); background-size: contain; background-repeat: no-repeat;">
										<div>
											<h3><?php the_title(); ?></h3>
											<h4>By: <?php echo get_the_author_meta('nickname'); ?></h4>
											<h5><?php echo get_the_date(); ?></h5>
										</div>
									</div>
								</a>
								<?php
							endfor;
						endif;
					?>
					<style>
						.page-posts .post>div{
							background: rgba(0,0,0, .45);
						}
					</style>
				</div>
				<?php endif;
				wp_reset_postdata();
				?>
	</main><!-- #main -->
		</div><!-- #primary -->
<?php get_footer(); ?>
