<?php get_header();  ?>
<div id="page" class="site">
	<?php get_header('page'); ?>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'whisper-room' ); ?></a>
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
            <div class='first-feat'>
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 1,
                        'tag' => 'featured',
                        'orderby' => 'date',
                        'order'   => 'DESC'
                    );
                    $featuredQry = new WP_Query( $args );
                    if($featuredQry->have_posts()): $featuredQry->the_post();?>
                        <div class='post featured-post'>
                            <div>
                                <div class='left'>
                                    <h1><?php the_title(); ?></h1>
                                    <h2>By: <?php echo get_the_author_meta('nickname'); ?></h2>
                                    <h3><?php the_date(); ?></h3>
                                </div>
                                <div class='clear'>
                                    <?php the_excerpt(); ?>
                                    <a href="<?php the_permalink(); ?>"><span>Read More>></span></a>
                                    <?php echo get_the_post_thumbnail(null, 'thumbnail', array('style' => 'display:none;')); ?>
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
                            }
                        </style>
                        <?php
                    endif;
                    wp_reset_postdata();
                ?>
            </div>
            <?php
                //Blog Posts Query
                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'paged' => $paged,
                    'order'   => 'DESC'
                );
                $blogQry = new WP_Query($args);
                //Main Loop
                if ( $blogQry->have_posts() ) :?>
                    <div class='page-posts'>
                        <?php
                            while ( $blogQry->have_posts() ):
                                $blogQry->the_post(); ?>
                                <a href='<?php the_permalink(); ?>'>
                                    <div class='post' style='background: url(<?php echo get_the_post_thumbnail_url(null,'full'); ?>);background-repeat: no-repeat;background-size: cover;'>
                                        <div>
                                            <h3><?php the_title(); ?></h3>
                                            <h4>By: <?php echo get_the_author_meta('nickname'); ?></h4>
                                            <h5><?php echo get_the_date(); ?></h5>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            endwhile;
                            the_posts_pagination( array( 'mid_size'  => 4 ) );
                            wp_reset_postdata();
                        ?>
                    </div>
                <?php
                    else:
                        ?><h5>Sorry currently no available Blog Posts.</h5><?php
                    endif;
				?>
            </main><!-- #main -->
		</div><!-- #primary -->
<?php get_footer(); ?>