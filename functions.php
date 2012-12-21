<?php

add_action('admin_notices', 'contact_form_7_modules_gf');

function contact_form_7_modules_gf() {
	global $pagenow;
	
	if(!current_user_can('install_plugins')) { return; }
	
	if(isset($_REQUEST['hide']) && $_REQUEST['hide'] == 'cf7_modules_gf_message') {
		add_option('cf7_modules_hide_gf_message', 1);
		return;
	} 
	
	if($pagenow == 'admin.php' && isset($_REQUEST['page']) && $_REQUEST['page'] == 'wpcf7' && !get_option('cf7_modules_hide_gf_message')) {
	?>
	<div class="updated">
		<p><a href="http://katz.si/?con=banner" title="Gravity Forms Contact Form Plugin for WordPress"><img src="http://gravityforms.s3.amazonaws.com/banners/728x90.gif" alt="Gravity Forms Plugin for WordPress" width="728" height="90" style="border:none;" /></a></p>
		<h3>If you like Contact Form 7, you'll love <a href="http://katz.si/gf?con=headline" target="_blank">Gravity Forms</a>.</h3>
		<p>Gravity Forms is a revolutionary contact form plugin that does everything Contact Form 7 does...and tons of amazing stuff Contact Form 7 can not. Gravity Forms has awesome support and out-of-the-box functionality. <a href="http://katz.si/gf" target="_blank" style="white-space:nowrap; font-weight:bold;">Check out Gravity Forms today!</a></p>
		<hr style="outline:none; border:none; border-bottom:1px solid #ccc;"/>
		<p class="description"><a href="<?php echo add_query_arg('hide', 'cf7_modules_gf_message'); ?>" class="button" style="font-style:normal;">Hide this message</a> This message helps support the development of the Contact Form 7 Modules plugin. Also, Gravity Forms rocks and you should try it.</p></div>
	<?php
	}
}

add_filter( 'wpcf7_cf7com_links', 'contact_form_7_modules_links' );

function contact_form_7_modules_links($links) {
	return str_replace('</div>', ' - <a href="http://katz.si/gf?con=link" target="_blank" title="Gravity Forms is the best WordPress contact form plugin.">Try Gravity Forms</a></div>', $links);
}

?>