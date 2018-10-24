<?php if(comments_open()) { ?>
	<div class="mkdf-post-info-comments-holder">
		<a itemprop="url" class="mkdf-post-info-comments" href="<?php comments_link(); ?>" target="_self">
			<?php comments_number('0 ' . esc_html__('Comments','verdure'), '1 '.esc_html__('Comment','verdure'), '% '.esc_html__('Comments','verdure') ); ?>
		</a>
	</div>
<?php } ?>