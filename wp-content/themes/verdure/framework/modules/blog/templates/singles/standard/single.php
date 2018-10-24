<?php

verdure_mikado_get_single_post_format_html($blog_single_type);

do_action('verdure_mikado_after_article_content');

verdure_mikado_get_module_template_part('templates/parts/single/author-info', 'blog');

verdure_mikado_get_module_template_part('templates/parts/single/single-navigation', 'blog');

verdure_mikado_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

verdure_mikado_get_module_template_part('templates/parts/single/comments', 'blog');