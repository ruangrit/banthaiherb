<div class="mkdf-banner-holder <?php echo esc_attr($holder_classes); ?>">
    <div class="mkdf-banner-image">
        <?php echo wp_get_attachment_image($image, 'full'); ?>
    </div>

    <?php if(!empty($title)) { ?>
        <<?php echo esc_attr($title_tag); ?> class="mkdf-banner-title" <?php echo verdure_mikado_get_inline_style($title_styles); ?>>
            <?php echo wp_kses($title, array('span' => array('class' => true))); ?>
        </<?php echo esc_attr($title_tag); ?>>
    <?php } ?>

    <div class="mkdf-banner-overlay" <?php echo verdure_mikado_get_inline_style($overlay_styles); ?>></div>           

    <?php if (!empty($link)) { ?>
        <a itemprop="url" class="mkdf-banner-link" href="<?php echo esc_url($link); ?>" target="<?php echo esc_attr($target); ?>"></a>
    <?php } ?>
</div>