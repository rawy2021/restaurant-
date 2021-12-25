<?php
/**
 * The template displaying search forms in prestro
 *
 * @package Prestro
 */
?>

<form method="get" class="form-search" action="<?php echo esc_url(home_url('/')); ?>">
    <div class="form-group">
        <div class="input-group">
            <span class="screen-reader-text"><?php esc_attr('Search for:', 'prestro'); ?></span>
            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder','prestro' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
            <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button','prestro' ); ?>">
        </div>
    </div>
</form>