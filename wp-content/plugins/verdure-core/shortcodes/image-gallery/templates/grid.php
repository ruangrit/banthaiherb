<?php
$i    = 0;
$rand = rand(0,1000);
?>
<div class="mkdf-image-gallery <?php echo esc_attr($holder_classes); ?>">
	<div class="mkdf-ig-inner mkdf-outer-space <?php echo esc_attr($inner_classes); ?>">
		<?php foreach ($images as $image) { ?>
			<div class="mkdf-ig-image mkdf-item-space">
				<div class="mkdf-ig-image-inner">
					<?php if ($image_behavior === 'lightbox') { ?>
						<a itemprop="image" class="mkdf-ig-lightbox" href="<?php echo esc_url($image['url']); ?>" data-rel="prettyPhoto[image_gallery_pretty_photo-<?php echo esc_attr($rand); ?>]" title="<?php echo esc_attr($image['title']); ?>">
							<span class="mkdf-ig-lightbox-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     width="45px" height="45px" viewBox="0 0 45 45" enable-background="new 0 0 45 45" xml:space="preserve">
                                    <g>
                                        <rect x="21.758" width="1.15" height="45"/>
                                    </g>
                                    <g>
                                        <rect y="21.759" width="45" height="1.15"/>
                                    </g>
                                </svg>
                            </span>
					<?php } else if ($image_behavior === 'custom-link' && !empty($custom_links)) { ?>
						<a itemprop="url" class="mkdf-ig-custom-link" href="<?php echo esc_url($custom_links[$i++]); ?>" target="<?php echo esc_attr($custom_link_target); ?>" title="<?php echo esc_attr($image['title']); ?>">
					<?php } ?>
						<?php if(is_array($image_size) && count($image_size)) :
							echo verdure_mikado_generate_thumbnail($image['image_id'], null, $image_size[0], $image_size[1]);
						else:
							echo wp_get_attachment_image($image['image_id'], $image_size);
						endif; ?>
					<?php if ($image_behavior === 'lightbox' || $image_behavior === 'custom-link') { ?>
						</a>
					<?php } ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>