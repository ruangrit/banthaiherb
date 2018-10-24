<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
	<div class="mkdf-post-content">
		<div class="mkdf-post-text">
			<div class="mkdf-post-text-inner">
                <div class="mkdf-post-heading">
                    <?php verdure_mikado_get_module_template_part('templates/parts/media', 'blog', $post_format, $part_params); ?>
                </div>
                <?php verdure_mikado_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                <div class="mkdf-post-info">
                    <?php verdure_mikado_get_module_template_part('templates/parts/post-info/date', 'blog', '', $part_params); ?>
                </div>
                <div class="mkdf-post-text-main">
                    <?php verdure_mikado_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
					<?php do_action('verdure_mikado_single_link_pages'); ?>
                </div>
                <div class="mkdf-post-info-bottom">
                    <div class="mkdf-info-bottom-item">
                        <?php verdure_mikado_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
                    </div>
                </div>
			</div>
		</div>
	</div>
</article>