<?php
/**
 * @package Prestro
 */ 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header page-header">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php if(the_title( '', '', false ) !='') the_title(); else esc_html_e('Untitled','prestro');?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>

        <?php if ('post' == get_post_type()) : ?>
            <div class="entry-meta">
                <a href="<?php echo esc_url( get_permalink() );?>"><i class="fa fa-calendar-alt"></i><?php echo esc_html( get_the_date()); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
                <a href="<?php echo esc_url( get_permalink() );?>"><i class="fa fa-user"></i><?php the_author(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
                <a href="<?php echo esc_url( get_permalink() );?>"><i class="fa fa-comments"></i><?php comments_number( __('0 Comments','prestro'), __('0 Comments','prestro'), __('% Comments','prestro') ); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>

                <?php edit_post_link(esc_html__('Edit', 'prestro'), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>'); ?>
            </div>
        <?php endif; ?>
    </header>
    <?php if (is_search()) : // Only display Excerpts for Search ?>
        <div class="entry-summary">
            <?php the_excerpt(); ?>
            <p><a class="btn btn-default read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Continue reading', 'prestro'); ?> <i class="fa fa-chevron-right"></i><span class="screen-reader-text"><?php esc_html_e( 'Continue reading','prestro' );?></span></a></p>
        </div>
    <?php else : ?>
        <div class="entry-content">
            <?php if ( has_post_thumbnail()) : ?>
            <div class="prestro_blog_image col-md-6 col-lg-6 col-xs-12">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" ><?php the_post_thumbnail( 'prestro-featured', array( 'class' => 'thumbnail' )); ?><span class="screen-reader-text"><?php the_title(); ?></span></a>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-12">
                <?php the_excerpt(); ?>
            </div>
            <?php else : ?>
                <?php the_excerpt(); ?>
            <?php endif; ?>
            <p><a class="btn btn-default read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Continue reading', 'prestro'); ?> <i class="fa fa-chevron-right"></i><span class="screen-reader-text"><?php esc_html_e( 'Continue reading','prestro' );?></span></a></p>
            <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><span class="screen-reader-text"><?php the_title(); ?></span></a>
            <?php
            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'prestro'),
                'after' => '</div>',
                'link_before' => '<span>',
                'link_after' => '</span>',
                'pagelink' => '%',
                'echo' => 1
            ));
            ?>
        </div>
    <?php endif; ?>
    <hr class="section-divider">    
</article>