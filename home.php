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
                    if($featuredQry->have_posts()): $featuredQry->the_post(); $featured_id = get_the_ID();?>
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
                        <script type="application/ld+json">
                            {
                                "@context":"http://schema.org",
                                "@type": "BlogPosting",
                                "image": "http://example.com/images/image.jpg",
                                "url": "http://example.com/blog/post",
                                "headline": "<?php the_title(); ?>",
                                "dateCreated": "<?php  echo get_the_date('c'); ?>",
                                "datePublished": "<?php echo get_the_date('c'); ?>",
                                "dateModified": "<?php echo the_modified_date('c'); ?>",
                                "inLanguage": "en-US",
                                "isFamilyFriendly": "true",
                                "copyrightYear": "2019",
                                "copyrightHolder": "Phoenix Gear",
                                "contentLocation": {
                                    "@type": "Place",
                                    "name": " Knoxville, TN"
                                },
                                "accountablePerson": {
                                    "@type": "Person",
                                    "name": "<?php echo get_the_author_meta('nickname'); ?>",
                                    "url": "<?php echo get_the_author_meta('user_url'); ?>"
                                },
                                "author": {
                                    "@type": "Person",
                                    "name": "<?php echo get_the_author_meta('nickname'); ?>",
                                    "url": "<?php echo get_the_author_meta('user_url'); ?>"
                                },
                                "creator": {
                                    "@type": "Person",
                                    "name": "<?php echo get_the_author_meta('nickname'); ?>",
                                    "url": "<?php echo get_the_author_meta('user_url'); ?>"
                                },
                                "publisher": {
                                    "@type": "Organization",
                                    "name": "Phoenix Gear",
                                    "url": "https://www.phoenixgear1776.com/",
                                    "logo": {
                                        "@type": "ImageObject",
                                        "url": "<?php 
                                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                                            $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                            echo $image[0];
                                        ?>"
                                    }
                                },
                                "mainEntityOfPage": "True",
                                "keywords": [
                                    <?php 
                                        $post_tags = get_the_tags();
                                        $i = 0;
                                        if($post_tags) {
                                            foreach ($post_tags as $tag): 
                                                $inital = $i == 0 ? null : ",";
                                                echo $inital; ?>
                                                "<?php echo $tag->name; ?>"<?php
                                                $i++;
                                            endforeach;
                                        }
                                    ?>
                                ],
                                "genre":["SEO","JSON-LD"],
                                "articleSection": "<?php $categories = get_the_category(); echo esc_html($categories[0]->name);?>",
                                "articleBody": "<?php echo esc_html(get_the_excerpt()); ?>"
                            }
                        </script>
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
                    'post__not_in' => array($featured_id),
                    'paged' => $paged,
                    'order'   => 'DESC'
                );
                $blogQry = new WP_Query($args);
                //Main Loop
                if ( $blogQry->have_posts() ) :?>
                    <div class='page-posts'>
                        <?php
                            for ($loop_i = 0; $loop_i < 6; $loop_i++ ):
                                $blogQry->the_post(); 
                                if(get_the_title() == ""):
                                    break;
                                endif;
                                ?>
                                <a href='<?php the_permalink(); ?>'>
                                    <div class='post' style='background: url(<?php echo get_the_post_thumbnail_url(null,'full'); ?>);background-repeat: no-repeat;background-size: cover;'>
                                        <div>
                                            <h3><?php the_title(); ?></h3>
                                            <h4>By: <?php echo get_the_author_meta('nickname'); ?></h4>
                                            <h5><?php echo get_the_date(); ?></h5>
                                        </div>
                                    </div>
                                    <script type="application/ld+json">
                                        {
                                            "@context":"http://schema.org",
                                            "@type": "BlogPosting",
                                            "image": "<?php echo get_the_post_thumbnail_url(); ?>",
                                            "url": "http://example.com/blog/post",
                                            "headline": "<?php the_title(); ?>",
                                            "dateCreated": "<?php  echo get_the_date('c'); ?>",
                                            "datePublished": "<?php echo get_the_date('c'); ?>",
                                            "dateModified": "<?php echo the_modified_date('c'); ?>",
                                            "inLanguage": "en-US",
                                            "isFamilyFriendly": "true",
                                            "copyrightYear": "2019",
                                            "copyrightHolder": "Phoenix Gear",
                                            "contentLocation": {
                                                "@type": "Place",
                                                "name": " Knoxville, TN"
                                            },
                                            "accountablePerson": {
                                                "@type": "Person",
                                                "name": "<?php echo get_the_author_meta('nickname'); ?>",
                                                "url": "<?php echo get_the_author_meta('user_url'); ?>"
                                            },
                                            "author": {
                                                "@type": "Person",
                                                "name": "<?php echo get_the_author_meta('nickname'); ?>",
                                                "url": "<?php echo get_the_author_meta('user_url'); ?>"
                                            },
                                            "creator": {
                                                "@type": "Person",
                                                "name": "<?php echo get_the_author_meta('nickname'); ?>",
                                                "url": "<?php echo get_the_author_meta('user_url'); ?>"
                                            },
                                            "publisher": {
                                                "@type": "Organization",
                                                "name": "Phoenix Gear",
                                                "url": "https://www.phoenixgear1776.com/",
                                                "logo": {
                                                    "@type": "ImageObject",
                                                    "url": "<?php 
                                                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                                                        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                                                        echo $image[0];
                                                    ?>"
                                                }
                                            },
                                            "mainEntityOfPage": "False",
                                            "keywords": [
                                                <?php 
                                                    $post_tags = get_the_tags();
                                                    $i = 0;
                                                    if($post_tags) {
                                                        foreach ($post_tags as $tag): 
                                                            $inital = $i == 0 ? null : ",";
                                                            echo $inital; ?>
                                                            "<?php echo $tag->name; ?>"<?php
                                                            $i++;
                                                        endforeach;
                                                    }
                                                ?>
                                            ],
                                            "genre":["SEO","JSON-LD"],
                                            "articleSection": "<?php $categories = get_the_category(); echo esc_html($categories[0]->name);?>",
                                            "articleBody": "<?php echo esc_html(get_the_excerpt()); ?>"
                                        }
                                    </script>
                                </a>
                                <?php
                            endfor;
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
