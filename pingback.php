<?php
	include($_SERVER["DOCUMENT_ROOT"] . "/wp-config.php");
	if(isset($_POST) && !empty($_POST)){
		$result = $wpdb->insert ($wpdb->base_prefix . 'information_regis_plugin', array ('url_regis_plugin' => $_POST['url_regis_plugin'], 'email_website' => $_POST['email_website'], 'date' => current_time ('mysql')));
	}
?>