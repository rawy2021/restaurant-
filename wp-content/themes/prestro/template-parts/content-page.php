<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Prestro
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h1 class="entry-title"><?php if(the_title( '', '', false ) !='') the_title(); else esc_html_e('Untitled','prestro');?></h1>
	</header>
	<div class="entry-content">
		<?php the_post_thumbnail(); ?>
		<hr>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'prestro' ),
				'after'  => '</div>',
			) );
		?>
	</div>
	<?php edit_post_link(esc_html__( 'Edit', 'prestro' ), '<footer class="entry-meta"><i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span></footer>' ); ?>
</article>