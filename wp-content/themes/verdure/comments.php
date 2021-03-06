<?php
if ( post_password_required() ) {
	return;
}

if ( comments_open() || get_comments_number() ) { ?>
	<div class="mkdf-comment-holder clearfix" id="comments">
		<?php if ( have_comments() ) { ?>
			<div class="mkdf-comment-holder-inner">
				<div class="mkdf-comments-title">
					<h4><?php esc_html_e( 'Comments', 'verdure' ); ?></h4>
				</div>
				<div class="mkdf-comments">
					<ul class="mkdf-comment-list">
						<?php wp_list_comments( array_unique( array_merge( array( 'callback' => 'verdure_mikado_comment' ), apply_filters( 'verdure_mikado_comments_callback', array() ) ) ) ); ?>
					</ul>
				</div>
			</div>
		<?php } ?>
		<?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
			<p><?php esc_html_e( 'Sorry, the comment form is closed at this time.', 'verdure' ); ?></p>
		<?php } ?>
	</div>
	<?php
		$mkdf_commenter = wp_get_current_commenter();
		$mkdf_req       = get_option( 'require_name_email' );
		$mkdf_aria_req  = ( $mkdf_req ? " aria-required='true'" : '' );
		
		$mkdf_args = array(
			'id_form'              => 'commentform',
			'id_submit'            => 'submit_comment',
			'title_reply'          => esc_html__( 'Post a Comment', 'verdure' ),
			'title_reply_before'   => '<h4 id="reply-title" class="comment-reply-title">',
			'title_reply_after'    => '</h4>',
			'title_reply_to'       => esc_html__( 'Post a Reply to %s', 'verdure' ),
			'cancel_reply_link'    => esc_html__( 'cancel reply', 'verdure' ),
			'label_submit'         => esc_html__( 'Submit', 'verdure' ),
			'comment_field'        => apply_filters( 'verdure_mikado_comment_form_textarea_field', '<textarea id="comment" placeholder="' . esc_attr__( 'Your comment', 'verdure' ) . '" name="comment" cols="45" rows="6" aria-required="true"></textarea>' ),
			'comment_notes_before' => '',
			'comment_notes_after'  => '',
			'fields'               => apply_filters( 'verdure_mikado_comment_form_default_fields', array(
				'author' => '<input id="author" name="author" placeholder="' . esc_attr__( 'Your Name', 'verdure' ) . '" type="text" value="' . esc_attr( $mkdf_commenter['comment_author'] ) . '"' . $mkdf_aria_req . ' />',
				'email'  => '<input id="email" name="email" placeholder="' . esc_attr__( 'Your Email', 'verdure' ) . '" type="text" value="' . esc_attr( $mkdf_commenter['comment_author_email'] ) . '"' . $mkdf_aria_req . ' />',
				'url'    => '<input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'verdure' ) . '" type="text" value="' . esc_attr( $mkdf_commenter['comment_author_url'] ) . '" size="30" maxlength="200" />'
			) )
		);

	$mkdf_args = apply_filters( 'verdure_mikado_comment_form_final_fields', $mkdf_args );
		
	if ( get_comment_pages_count() > 1 ) { ?>
		<div class="mkdf-comment-pager">
			<p><?php paginate_comments_links(); ?></p>
		</div>
	<?php } ?>

    <?php
    $mkdf_show_comment_form = apply_filters('verdure_mikado_show_comment_form_filter', true);
    if($mkdf_show_comment_form) {
    ?>
        <div class="mkdf-comment-form">
            <div class="mkdf-comment-form-inner">
                <?php comment_form( $mkdf_args ); ?>
            </div>
        </div>
    <?php } ?>
<?php } ?>	