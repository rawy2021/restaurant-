<?php
/**
 * The template for displaying image attachments.
 *
 * @package Prestro
 */
get_header(); ?>

<div id="content" class="site-content container">
    <div id="primary" class="content-area image-attachment col-md-12 col-lg-8">
        <div id="maincontent" class="site-main" role="main">

            <?php while (have_posts()) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>

                        <div class="entry-meta">
                            <a href="<?php echo esc_url( get_permalink() );?>"><i class="fa fa-calendar-alt"></i><?php echo esc_html( get_the_date()); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
                            <a href="<?php echo esc_url( get_permalink() );?>"><i class="fa fa-user"></i><?php the_author(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
                            <a href="<?php echo esc_url( get_permalink() );?>"><i class="fa fa-comments"></i><?php comments_number( __('0 Comments','prestro'), __('0 Comments','prestro'), __('% Comments','prestro') ); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>

                            <?php edit_post_link(esc_html__('Edit', 'prestro'), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>'); ?>
                            <?php edit_post_link(esc_html__('Edit', 'prestro'), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>'); ?>
                        </div>

                        <nav role="navigation" id="image-navigation" class="navigation-image nav-links">
                            <div class="nav-previous"><?php previous_image_link(false, esc_html__('<i class="fa fa-chevron-left"></i> Previous', 'prestro')); ?></div>
                            <div class="nav-next"><?php next_image_link(false, esc_html__('Next <i class="fa fa-chevron-right"></i>', 'prestro')); ?></div>
                        </nav>
                    </header>

                    <div class="entry-content">
                        <div class="entry-attachment">
                            <div class="attachment">
                                <?php
                                $attachments = array_values(get_children(array(
                                    'post_parent' => $post->post_parent,
                                    'post_status' => 'inherit',
                                    'post_type' => 'attachment',
                                    'post_mime_type' => 'image',
                                    'order' => 'ASC',
                                    'orderby' => 'menu_order ID'
                                        )));
                                foreach ($attachments as $k => $attachment) {
                                    if ($attachment->ID == $post->ID)
                                        break;
                                }
                                $k++;
                                
                                // If there is more than 1 attachment in a gallery
                                if (count($attachments) > 1) {
                                    if (isset($attachments[$k]))
                                    // get the URL of the next image attachment
                                        $next_attachment_url = get_attachment_link($attachments[$k]->ID);
                                    else
                                    // or get the URL of the first image attachment
                                        $next_attachment_url = get_attachment_link($attachments[0]->ID);
                                } else {
                                    // or, if there's only 1 image, get the URL of the image
                                    $next_attachment_url = wp_get_attachment_url();
                                }
                                ?>

                                <a href="<?php echo esc_html($next_attachment_url); ?>" title="<?php the_title_attribute(); ?>" rel="attachment"><?php
                                    $attachment_size = apply_filters('prestro_attachment_size', array(1200, 1200)); // Filterable image size.
                                    echo wp_get_attachment_image($post->ID, $attachment_size);?>
                                <span class="screen-reader-text"><?php the_title(); ?></span></a>
                            </div>

                            <?php if (!empty($post->post_excerpt)) : ?>
                                <div class="entry-caption">
                                    <?php the_excerpt(); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php the_content(); ?>
                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'prestro'),
                            'after' => '</div>',
                        ));
                        ?>

                    </div>

                </article>

                <?php
                // If comments are open or we have at least one comment, load up the comment template
                if (comments_open() || '0' != get_comments_number())
                    comments_template();
                ?>

            <?php endwhile; // end of the loop.  ?>
        </div>
    </div>
    <?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>