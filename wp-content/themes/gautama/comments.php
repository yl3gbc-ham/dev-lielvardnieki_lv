<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Gautama
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}


$comment_count = get_comments_number();
$retina_mult = gautama_get_retina_multiplier();

?>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
			printf(
				/* translators: 1: comment count number, 2: title. */
				_nx( '%1$s Comment', '%1$s Comments', $comment_count, 'comments title', 'gautama' ),
				 number_format_i18n( $comment_count ),
				'<span>' . get_the_title() . '</span>'
			);
			?>
		</h3>
		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'walker'      => new Gautama_Walker_Comment(),
					'avatar_size' => 100 * $retina_mult,
					'style'       => 'ol',
					'short_ping'  => true,
				)
			);
			?>
		</ol>
		<?php
		the_comments_navigation();

	endif;

	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( !comments_open() ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'gautama' ); ?></p>
		<?php
	endif;

	$required      = get_option( 'require_name_email' );
	$aria_required = ( $required ? " aria-required='true'" : '' );
	$commenter     = wp_get_current_commenter();
	$consent       = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
	$comments_args = array(
		'comment_notes_after' => '',
		'submit_button'	=>	'<button name="%1$s" type="submit" id="%2$s" class="%3$s sigma_btn-custom"><i class="far fa-comments"></i> %4$s</button>',
		'fields'	=> apply_filters(
			'gautama_comment_form_fields',
			array(
				'author'  => '<div class="sigma-comment-form-input-wrapper"><p class="comment-form-author">' .
						'<input id="author" placeholder="' . esc_attr__( 'Name', 'gautama' ) . '*" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_required . ' />' .
						'<span class="icon"><i class="fas fa-user"></i></span>'.
						'</p>',
				'email'   => '<p class="comment-form-email">' .
						'<input id="email" placeholder="' . esc_attr__( 'Email', 'gautama' ) . '*" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_required . ' />' .
						'<span class="icon"><i class="fas fa-envelope"></i></span>',
						'</p>',
				'url'     => '<p class="comment-form-url">' .
						'<input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'gautama' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" />' .
						'<span class="icon"><i class="fas fa-globe"></i></span>'.
						'</p></div>',
				'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
						'<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'gautama' ) . '</label></p>',
			)
		),
		'comment_field'       => '<p class="comment-form-comment">' .
			'<textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Enter your comment here...', 'gautama' ) . '" cols="45" rows="8" aria-required="true"></textarea>' .
			'<span class="icon"><i class="fas fa-pen"></i></span>'.
			'</p>',
	);
	comment_form( $comments_args );
	?>
</div>
