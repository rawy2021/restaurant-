<?php
/*
Template Name: Home Page
*/
get_header(); ?>
<main id="maincontent">
    <?php if(get_theme_mod('prestro_welcome_setting') != '') { ?>
    <div class="welcome">
        <div class="container">
            <?php $page_query = new WP_Query('page_id='.esc_attr(get_theme_mod('prestro_welcome_setting'))); ?>
            <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <h3 class="iwt-title res-title"><?php the_title(); ?></h2></h3>
                <div class="line-center res-line"></div>
                <div class="col-lg-6 col-md-6 wow fadeInUp" data-wow-offset="5" data-wow-duration="1.5s" data-wow-delay="1s">
                    <img class="icon-image" src="<?php echo esc_url(get_template_directory_uri().'/images/icon.png'); ?>" alt="<?php the_title(); ?> post thumbnail image" />
                    <h3 class="iwt-title desk-title"><?php the_title(); ?></h3>
                    <div class="line-center desk-line"></div>
                    <p><?php echo esc_html(wp_trim_words(get_the_content(),'75') );?></p>
                    <div class="welcome-btn">
                        <a href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','prestro'); ?><span class="screen-reader-text"><?php esc_html_e( 'Read More','prestro' );?></span></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 wow fadeInLeft" data-wow-offset="5" data-wow-duration="2.5s" data-wow-delay="1s">
                    <?php the_post_thumbnail(); ?>
                </div>
            <?php endwhile;?>
        </div>
    </div>
    <?php } ?>

    <?php if(get_theme_mod("prestro_service_setting")) { ?>
    <div class="services">
        <div class="container">
            <?php if(get_theme_mod("prestro_service_sec_title")) { ?>
                <img class="icon-image" src="<?php echo esc_url(get_template_directory_uri().'/images/icon.png'); ?>" alt="<?php the_title(); ?> post thumbnail image" />
                <h3 class="iwt-title"><?php echo esc_html(get_theme_mod('prestro_service_sec_title',''));?></h3>
                <div class="line-center"></div>
            <?php }
            // Get category ID from Theme Customizer
             $catID = get_theme_mod('prestro_service_setting');
            // Only get Posts that are assigned to the given category ID
            $service_query = new WP_Query(array(
                'post_type' => 'post',
                'cat' => $catID,
                'posts_per_page' => 4, 
            ));
            while( $service_query->have_posts() ) : $service_query->the_post(); ?>
            <div class="col-lg-3 col-md-6 service_block">
                <?php the_post_thumbnail(); ?>
                <h4><?php the_title();?></h4>
                <p class="home-content"><?php echo esc_html( wp_trim_words(get_the_content(),'12') );?></p>
                <p class="service-more"><a class="view-more" href="<?php echo esc_url(get_permalink()); ?>"><?php esc_html_e( 'Learn more', 'prestro' ); ?> <i class="fa fa-angle-right"></i><span class="screen-reader-text"><?php esc_html_e( 'Learn more','prestro' );?></span></a></p>
            </div>
            <?php endwhile;?>
        </div>
    </div>
    <?php } ?>

    <?php if(get_theme_mod("prestro_chef_setting")) { ?>
    <div class="gallery-slide">
        <div class="container">
            <?php if(get_theme_mod("prestro_chef_sec_title")) { ?>
                <img class="icon-image" src="<?php echo esc_url(get_template_directory_uri().'/images/icon.png'); ?>" alt="<?php the_title(); ?> post thumbnail image" />
                <h4 class="iwt-title">
                    <?php echo esc_html(get_theme_mod('prestro_chef_sec_title',''));?>
                </h4>
                <div class="line-center"></div>
            <?php }
            // Get category ID from Theme Customizer

            $catID = get_theme_mod('prestro_chef_setting');
            // Only get Posts that are assigned to the given category ID
            $chef_query = new WP_Query(array(
                'post_type' => 'post',
                'cat' => $catID,
                'posts_per_page' => 4,    
            ));
            while( $chef_query->have_posts() ) : $chef_query->the_post(); ?>
                <div class="col-lg-3 col-md-6 wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="2s">
                    <div class="sv_wrap">
                        <?php the_post_thumbnail(); ?>
                        <div class="svbox">
                            <svg height="100%" width="100%" xmlns="http://www.w3.org/2000/svg">
                                <line y2="0" x2="900" y1="0" x1="0" class="top"/>
                                <line y2="-920" x2="0" y1="100%" x1="0" class="left"/>
                                <line y2="100%" x2="-600" y1="100%" x1="100%" class="bottom"/>
                                <line y2="1800" x2="100%" y1="0" x1="100%" class="right"/>
                            </svg>
                        </div>
                    </div>
                </div>
            <?php endwhile;?>
            <?php  $category_link = get_category_link( $catID );?>  
                <p class="gallery-more"><a class="view-more" href="<?php echo esc_url( $category_link ); ?>"><?php esc_html_e( 'Learn more', 'prestro' ); ?> <i class="fa fa-angle-right"></i><span class="screen-reader-text"><?php esc_html_e( 'Learn more','prestro' );?></span></a></p>
            <?php } ?>
        </div>
    </div>

    <?php
    $args = new WP_Query(array('post_type' => 'post', 'posts_per_page' => 3, 'order_by' => 'date', 'order' => 'DESC'));
    $loop = new WP_Query($args);
    if($loop->have_posts()){ ?>
    <div class="blog_sec">
        <div class="container">
            <img class="icon-image" src="<?php echo esc_url(get_template_directory_uri().'/images/icon.png'); ?>" alt="<?php the_title(); ?> post thumbnail image" />
            <h4 class="iwt-title"><?php esc_html_e( 'From Our Blog', 'prestro' ); ?></h4>
            <div class="line-center"></div>
            <div class="blog_wrap">
                <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                    <div class="col-lg-4 col-md-6 wow fadeInLeft" data-wow-delay="1.5s" data-wow-duration="2s">
                        <div class="post_content_col">
                            <div class="over_img">
                                <?php the_post_thumbnail(); ?>
                                <div class="img-overlay">
                                    <ul class="list-inline">
                                        <?php
                                        $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                                        if (!$url) {
                                            $url = get_template_directory_uri() . '/images/slider-3.png';
                                        }
                                        ?>
                                        <li><a href="<?php echo esc_url($url); ?>"  class="fancybox" rel="blog_post"><i class="fa fa-search"></i><span class="screen-reader-text"><?php the_title(); ?></span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="post_content">
                                <a class="post_title" href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
                                <p><?php the_excerpt(); ?></p>
                            </div>
                            <div class="continue">
                                <a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Continue Reading', 'prestro' ); ?><i class="fa fa-angle-right"></i><span class="screen-reader-text"><?php esc_html_e( 'Continue Reading','prestro' );?></span></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <?php } ?>
</main>

<?php get_footer(); ?>