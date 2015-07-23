<?php
/*
	Template Name: Our Services
*/
?>

<?php $ava_services_loop = new WP_Query(array('post_type' => 'page', 'meta_value' => 'template-services.php' ));
while ( $ava_services_loop->have_posts() ) : $ava_services_loop->the_post();  ?> 

	<!-- Services -->
	<section class="services" id="<?php $ava_ref_title = get_the_title(); echo sanitize_title($ava_ref_title); ?>">
	
		<div class="container">
		
			<div class="sixteen columns">	
			
				<h1 class="section-title"><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
				
			</div>

							<?php						
							if ( function_exists( 'ot_get_option' ) ) {
							  
							  $ava_services = ot_get_option( 'ava_services', array() );
							  
							  if ( ! empty( $ava_services ) ) {
								foreach( $ava_services as $ava_service ) {
								  echo '
									<div class="one-third column">
										<figure class="service-item">
											<i class="icon fa '. $ava_service['ava_service_icon'] .'"></i>
											<figcaption class="service-item-title">
												<span>+</span>
												<a href="'. $ava_service['ava_service_link'] .'">'. $ava_service['title'] .'</a>
											</figcaption>
										</figure>
									</div>';
								}
							  } 
							}
							?>			
			
			<div class="clear"></div>

		</div><!-- end container -->
		
		<!-- Testimonials -->
		<div id="testimonials">
		
			<div class="container">
			
				<div class="sixteen columns">

					<span id="prev" class="prev"><i class="icon fa fa-angle-left"></i></span>
					
					<!-- Quote Slider -->
					<ul id="quote-slider" class="cycle-slideshow" 
					data-cycle-fx="fade" data-cycle-timeout="2500" data-cycle-slides="> li" data-cycle-prev="#prev" data-cycle-next="#next">
					
							<?php						
							if ( function_exists( 'ot_get_option' ) ) {
							  
							  $ava_quotes = ot_get_option( 'ava_testimonials', array() );
							  
							  if ( ! empty( $ava_quotes ) ) {
								foreach( $ava_quotes as $ava_quote ) {
								  echo '
									<li class="quote">
										<img src="'. $ava_quote['ava_testimonial_thumb'] .'" class="avatar" alt="'. $ava_quote['ava_testimonial_desc'] .'" />
										<blockquote>'. $ava_quote['ava_testimonial_desc'] .'</blockquote>					
									</li>';
								}
							  } 
							}
							?>					
							
					</ul>
					
					<span id="next" class="next"><i class="icon fa fa-angle-right"></i></span>	
					
				</div>
			
			</div><!-- end container -->
			
		</div><!-- end testimonials -->
	
	</section><!-- end services -->

<?php endwhile;?>