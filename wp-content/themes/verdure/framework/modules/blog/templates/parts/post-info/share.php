<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if(verdure_mikado_options()->getOptionValue('enable_social_share') === 'yes' && verdure_mikado_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="mkdf-blog-share">
        <?php echo verdure_mikado_get_social_share_html(array('type' => $share_type)); ?>
    </div>
<?php } ?>