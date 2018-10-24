<?php if(verdure_mikado_core_plugin_installed()) { ?>
    <div class="mkdf-blog-like">
        <?php if( function_exists('verdure_mikado_get_like') ) verdure_mikado_get_like(); ?>
    </div>
<?php } ?>