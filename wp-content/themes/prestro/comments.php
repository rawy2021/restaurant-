<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Prestro
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				$comments_number = get_comments_number();
				if ( 1 === $comments_number ) {
					/* translators: %s: post title */
					printf( esc_html__( 'One thought on &ldquo;%s&rdquo;','prestro' ), esc_html (get_the_title() ));
				} 	else {
					printf(
					   	esc_html(
					      	/* translators: 1: number of comments, 2: post title */
					     	_nx( 
					          	'%1$s thought on &ldquo;%2$s&rdquo;',
					          	'%1$s thoughts on &ldquo;%2$s&rdquo;',
					          	$comments_number,
					          	'comments title',
					          	'prestro'
					       	)
					   	),
					   	esc_html (number_format_i18n( $comments_number ) ),
					   	esc_html (get_the_title())
					);
				}
			?>
		</h3>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'prestro'); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'prestro' )); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'prestro' )); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ol class="comment-list">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use prestro_comment() to format the comments.
				 * If you want to override this in a child theme, then you can
				 * define prestro_comment() and that will be used instead.
				 * See prestro_comment() in inc/template-tags.php for more.
				 */
				wp_list_comments( array(
					'avatar_size' => 65,
					'style'       => 'ol',
					'short_ping'  => true,
					)
				);
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'prestro' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'prestro' )); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'prestro' )); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php // If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'prestro' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div>