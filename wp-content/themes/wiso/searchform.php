<form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url( '/' )); ?>" >
    <div>
    	<label class="screen-reader-text" for="s">Search for: </label>
	    <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="<?php esc_attr_e('enter keyword', 'wiso'); ?>" />
	    <input type="submit" id="searchsubmit" value="search" />
    </div>
</form>	