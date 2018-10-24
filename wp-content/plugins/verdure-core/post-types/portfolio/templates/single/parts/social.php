<?php if(verdure_mikado_options()->getOptionValue('enable_social_share') == 'yes' && verdure_mikado_options()->getOptionValue('enable_social_share_on_portfolio-item') == 'yes') : ?>
    <div class="mkdf-ps-info-item mkdf-ps-social-share">
        <?php echo verdure_mikado_get_social_share_html() ?>
    </div>
<?php endif; ?>