<?php $Page404 = new Page404($options)?>
<div id="<?php echo $Page404->id ?>" class="<?php echo $Page404->type ?>">
	<div class="entry-content">
		<span class="error"><?php _e('404', 'the-theme')?> <span><?php _e('hiba', 'the-theme')?></span></span>
		<p><?php _e('A kért oldal nem található. A tartalmat valószínűleg eltávolították, vagy másik url-re költözött.', 'the-theme')?></p>
		<p><?php _e('Próbálkozzon kereséssel', 'the-theme')?></p>
	</div>
	<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	    <label>
	        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
	        <input type="search" class="search-field"
	            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
	            value="<?php echo get_search_query() ?>" name="s"
	            title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	    </label>
	    <input type="submit" class="search-submit"
	        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
	</form>	
</div>