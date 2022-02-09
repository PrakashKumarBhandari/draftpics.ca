<?php
//Exit if accessed directly
if(!defined('ABSPATH')){
	return;
}
?>
<?php settings_errors(); ?>
<div class="xoo-qv-main-settings">
<form method="POST" action="options.php" class="xoo-qv-form">
	<?php settings_fields('xoo-qv-group'); ?>
	<?php do_settings_sections('xoo_quickview'); ?>
	<?php submit_button(); ?>
</form>
<div class="rate-plugin">If you like the plugin , please show your support by rating <a href="https://wordpress.org/support/view/plugin-reviews/quick-view-woocommerce" target="_blank">here.</a></div>
	<div class="plugin-support">
		Report Bugs/Issues <a href="https://wordpress.org/support/plugin/quick-view-woocommerce" target="_blank">here.</a>,so that we can fix it :)
	</div>
</div>

