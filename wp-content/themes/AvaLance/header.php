<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
    ================================================== -->
	<meta charset="utf-8">
	<title><?php wp_title('&raquo;','true','right'); ?><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<!-- Mobile Specific Metas
    ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Color
	================================================== -->
	<link rel="stylesheet" href="<?php echo TEMPPATH; ?>/css/skins/<?php echo ot_get_option('ava_color_scheme'); ?>.css">

	
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<!--[if IE 9]>
		<style type="text/css">
			#portfolio-wrapper, .header-title, .service-item, #related-projects .portfolio-item {opacity: 1 !important;}
		</style>
	<![endif]-->	

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="<?php echo ot_get_option('ava_site_favicon'); ?>">
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<!-- Primary Page Layout
================================================== -->

<!-- Wrapper -->
<div id="main-wrapper">

	<!-- Back to Top -->
	<i id="back-top" class="fa fa-angle-up downscaled"></i>

	
<?php
if ( is_page_template('template-home.php') || is_home() || is_404() ) { ?>


	<?php $ava_slider_display = ot_get_option('ava_slider_display'); if($ava_slider_display != '') {?>
	<!-- Header -->
	<header id="header">
	<!-- Background Slider -->
		<div id="background-slider" class="cycle-slideshow" data-cycle-fx="fade" data-cycle-timeout="10000" data-cycle-slides="> div">
			<?php						
			if ( function_exists( 'ot_get_option' ) ) {
			$ava_slides = ot_get_option( 'ava_slides', array() );
			if ( ! empty( $ava_slides ) ) {
			foreach( $ava_slides as $ava_slide ) { echo '<div class="bg-slides" style="background-image: url('. $ava_slide['ava_slider_image'] .');"></div>';}}}
			?>
		</div>	
	
		<!-- Background Pattern Overlay -->
		<div id="pattern-overlay" class="<?php echo ot_get_option('ava_pattern_overlay'); ?>">
		
			<div class="container">
			
				<div class="sixteen columns">
				
					<!-- Header Content -->
					<div class="header-content">
					
						<!-- Header Logo -->
						<?php $ava_header_logo = ot_get_option('ava_header_logo'); if( $ava_header_logo != "" ){?>
						<img src="<?php echo $ava_header_logo ?>" alt="<?php bloginfo('name'); ?>" /> <?php }?>
						
						<!-- Header Title -->
						<?php if(ot_get_option('ava_header_animated_title_first') != ""){ ?>
						<h1 class="header-title">
							<span class="texts">
								<span><?php echo ot_get_option('ava_header_animated_title_first'); ?></span>
								<?php $ava_secondtitle = ot_get_option('ava_header_animated_title_second'); 
								if($ava_secondtitle != "") echo '<span>'. $ava_secondtitle .'</span>'; ?>
							</span>
							<script type="text/javascript">
								(function($) {
								  "use strict";
									$(document).ready(function(){
										$('.header-title').textillate({selector: '.texts', minDisplayTime: 1000, initialDelay: 0, autoStart: true,
											<?php 
											$ava_ineffect = ot_get_option('ava_header_animated_title_effect_in');
											$ava_outeffect = ot_get_option('ava_header_animated_title_effect_out');
											$ava_titleloop = ot_get_option('ava_header_animated_title_loop');
											?>
										  loop: <?php echo $ava_titleloop; ?>,
										  inEffects: [ '<?php echo $ava_ineffect; ?>'],
										  outEffects: [ '<?php echo $ava_outeffect; ?>' ],
										  in: {effect: '<?php echo $ava_ineffect; ?>', delayScale: 1.0, delay: 50, sync: false, shuffle: true,},
										  out: {effect: '<?php echo $ava_outeffect; ?>', delayScale: 1.0, delay: 20, sync: true, shuffle: false,}
										
										});								
									});
								})(jQuery);							
							</script>
						</h1>
						<?php } ?>
						
						<p class="lead"><?php echo ot_get_option('ava_header_intro_text'); ?></p>
					
					</div>
					
				</div>

			</div><!-- end container -->
			
		</div><!-- end background-pattern -->
	
	</header><!-- end header -->
	<?php } ?>
	
<?php } ?>
		
	
	


	<!-- Navigation -->	
	<div id="navigation">
	
		<div class="container">
		
			<div class="four columns">
			
				<!-- Logo -->
				<?php $ava_nav_logo = ot_get_option('ava_site_logo'); if( $ava_nav_logo != "" ){ ?>
				<a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo ot_get_option('ava_site_logo'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
				<?php } ?>
				
				<!-- Mobile Menu -->
				<div class="mobile-menu">
					<span class="icon fa fa-list"></span>
				</div>
					
			</div>
			
			<div class="twelve columns">

				<?php wp_nav_menu(array(
					'container' => 'nav',
					'container_id' => 'menu',
                    'theme_location' => 'top-menu',
					'items_wrap' => '<ul>%3$s</ul>',
                    'fallback_cb' => 'show_top_menu',
                    'echo' => true,
                    'walker' => new description_walker(),
                    'depth' => 1 ) ); 
				?>			


			</div>

		</div><!-- end container -->
	
	</div><!-- end navigation -->