<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes);?> <?php verdure_mikado_inline_style($post_background_image)?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-text" <?php verdure_mikado_inline_style($post_background_image)?>>
            <div class="mkdf-post-text-inner">
                <div class="mkdf-post-info">
                    <span class="mkdf-post-icon">
                         <svg class="mkdf-post-link-image" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="99.297px" height="32.714px" viewBox="0 0 99.297 32.714" enable-background="new 0 0 99.297 32.714" xml:space="preserve">
                        <g>
                         <path fill="currentColor" d="M89.235,3.134h-29.01c-4.448,0-8.067,3.619-8.067,8.067v1.104h5.119v-1.104
                          c0-1.626,1.322-2.949,2.948-2.949h29.01c1.626,0,2.948,1.323,2.948,2.949v10.741c0,1.626-1.322,2.949-2.948,2.949h-29.01
                          c-1.626,0-2.948-1.323-2.948-2.949v-1.104h-5.119v1.104c0,4.448,3.619,8.067,8.067,8.067h29.01c4.448,0,8.068-3.619,8.068-8.067
                          V11.201C97.303,6.753,93.683,3.134,89.235,3.134z"/>
                         <path fill="currentColor" d="M42.182,20.839v1.104c0,1.626-1.323,2.949-2.949,2.949h-29.01c-1.626,0-2.948-1.323-2.948-2.949V11.201
                          c0-1.626,1.322-2.949,2.948-2.949h29.01c1.626,0,2.949,1.323,2.949,2.949v1.104h5.119v-1.104c0-4.448-3.62-8.067-8.068-8.067
                          h-29.01c-4.448,0-8.067,3.619-8.067,8.067v10.741c0,4.448,3.619,8.067,8.067,8.067h29.01c4.448,0,8.068-3.619,8.068-8.067v-1.104
                          H42.182z"/>
                         <path fill="currentColor" d="M64.446,19.131H35.012c-1.413,0-2.559-1.145-2.559-2.559s1.146-2.56,2.559-2.56h29.434
                          c1.414,0,2.56,1.146,2.56,2.56S65.86,19.131,64.446,19.131z"/>
                        </g>
                        </svg>
                    </span>
                </div>
				<?php verdure_mikado_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
            </div>
        </div>
    </div>
</article>