<?php
$post_classes[] = 'mkdf-item-space';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes);?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-text" <?php verdure_mikado_inline_style($post_background_image)?>>
            <div class="mkdf-post-text-inner">
                <div class="mkdf-post-text-main">
                    <div class="mkdf-post-icon">
                        <svg class="mkdf-post-quote-image" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                          width="103.402px" height="73.674px" viewBox="0 0 103.402 73.674" enable-background="new 0 0 103.402 73.674"
                          xml:space="preserve">
                        <g>
                         <path fill="currentColor" d="M1.637,55.512l10.84-30.467h6.934l-6.152,30.467v16.994H1.637V55.512z M25.758,55.512l10.84-30.467h6.934
                          l-6.152,30.467v16.994H25.758V55.512z"/>
                        </g>
                        <g>
                         <path fill="currentColor" d="M77.023,19.059l-10.84,29.979H59.25l6.152-29.686V1.576h11.621V19.059z M101.635,19.059L90.793,49.037
                          h-6.934l6.152-29.686V1.576h11.623V19.059z"/>
                        </g>
                        </svg>
                    </div>
                    <?php verdure_mikado_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
</article>