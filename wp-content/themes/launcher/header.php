<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>> 
	<head profile="http://gmpg.org/xfn/11">
		<link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo('charset'); ?>" />
		<title><?php wp_title(); ?></title>	
		<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css" type="text/css" media="screen"/>
		<?php if (get_option('lnc_favicon') != '') { ?>
	<link rel="icon" href="<?php echo get_option('lnc_favicon'); ?>" type="image/x-icon" />
	<?php } else { ?>
	<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" type="image/x-icon" />
	<?php } ?>
		<script type="text/javascript" language="JavaScript">
			TargetDate = "<?php echo get_option('lnc_date'); ?>";
			FinishMessage = "<span class='finish-mss'><?php echo get_option('lnc_finish_mssg'); ?></span>";
		</script>
		<script type="text/javascript" language="JavaScript">		
			$(document).ready(function() {
				$(".floating-rocket").mouseover(function () {
				$(this).effect("shake", { times:10, distance:2 }, 100);
				});
			});
		</script>
		<?php wp_head(); ?>
<style type="text/css">
body {
<?php if (get_option('lnc_bg_pattern') != '') { ?>
background-image: url(<?php echo get_template_directory_uri(); ?>/images/<?php echo get_option('lnc_bg_pattern'); ?>.png);
<?php } else { ?>
<?php } ?>
}
<?php if (get_option('lnc_count') == 'false') { ?>
.comeback  {
display:none;
}
<?php } ?>
<?php if (get_option('lnc_form') == 'false') { ?>
.comeback {
    margin-top: -5em;
}
<?php } ?>
<?php echo get_option('lnc_custom_css'); ?>
</style>
	</head>
	<?php flush(); ?>
<body>