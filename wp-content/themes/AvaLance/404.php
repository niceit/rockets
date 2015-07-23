<?php
header("HTTP/1.1 404 Not Found");
header("Status: 404 Not Found");
?>

<?php get_header(); ?>

	<section id="fourohfour">
	
		<div class="container">
		
			<div class="sixteen columns">	
			
				<h1 class="section-title"><?php _e('404','avalance'); ?></h1>
				
				<p class="lead"><?php echo ot_get_option('ava_fourohfour_text'); ?></p>
				
				<div class="divider"></div>	
				
			</div>

			<div class="sixteen columns">
				<a href="<?php echo home_url(); ?>"class="btn"><?php _e('Home Page','avalance'); ?></a>
			</div>
		
		</div>
	
	</section>

<?php get_footer(); ?>