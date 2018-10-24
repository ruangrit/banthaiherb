<?php if(verdure_mikado_options()->getOptionValue('portfolio_single_hide_pagination') !== 'yes') : ?>
    <?php
    $back_to_link = get_post_meta(get_the_ID(), 'portfolio_single_back_to_link', true);
    $nav_same_category = verdure_mikado_options()->getOptionValue('portfolio_single_nav_same_category') == 'yes';

    $prev_arrow = '
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="16.242px" height="30.59px" viewBox="0 0 16.242 30.59" enable-background="new 0 0 16.242 30.59" xml:space="preserve">
<polygon stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" points="15.166,0.398 15.307,0.257 15.973,0.92 1.589,15.293 
	15.973,29.668 15.307,30.33 0.259,15.293 "/>
</svg>
    ';
    $next_arrow = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="16.242px" height="30.59px" viewBox="0 0 16.242 30.59" enable-background="new 0 0 16.242 30.59" xml:space="preserve">
<polygon stroke="#000000" stroke-width="0.25" stroke-miterlimit="10" points="1.066,0.398 0.925,0.257 0.259,0.92 14.643,15.293 
	0.259,29.668 0.925,30.33 15.973,15.293 "/>
</svg>';
    ?>
    <div class="mkdf-ps-navigation">
        <?php if(get_previous_post() !== '') : ?>
            <div class="mkdf-ps-prev">
                <?php if($nav_same_category) {
	                previous_post_link('%link','<span class="mkdf-ps-nav-mark">'. $prev_arrow .'</span>', true, '', 'portfolio-category');
                } else {
	                previous_post_link('%link','<span class="mkdf-ps-nav-mark">'. $prev_arrow .'</span>');
                } ?>
            </div>
        <?php endif; ?>

        <?php if($back_to_link !== '') : ?>
            <div class="mkdf-ps-back-btn">
                <a itemprop="url" href="<?php echo esc_url(get_permalink($back_to_link)); ?>">
                    <span class="social_flickr"></span>
                </a>
            </div>
        <?php endif; ?>

        <?php if(get_next_post() !== '') : ?>
            <div class="mkdf-ps-next">
                <?php if($nav_same_category) {
                    next_post_link('%link', '<span class="mkdf-ps-nav-mark">'. $next_arrow .'</span>', true, '', 'portfolio-category');
                } else {
                    next_post_link('%link', '<span class="mkdf-ps-nav-mark">'. $next_arrow .'</span>');
                } ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>