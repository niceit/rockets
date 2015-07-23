<?php 
/*
	Template Name: Contact
*/
?>

<?php $ava_contact_loop = new WP_Query(array('post_type' => 'page', 'meta_value' => 'template-contact.php' ));
while ( $ava_contact_loop->have_posts() ) : $ava_contact_loop->the_post();  ?> 

	<!-- Contact -->
	<section class="contact" id="<?php $ava_ref_title = get_the_title(); echo sanitize_title($ava_ref_title); ?>">
	
		<div class="container">
		
			<div class="sixteen columns">		
			
				<h1 class="section-title"><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
				
			</div>
			
				<?php						
				if ( function_exists( 'ot_get_option' ) ) {
				  
				  $ava_cdetails = ot_get_option( 'ava_contact_details', array() );
				  
				  if ( ! empty( $ava_cdetails ) ) {
					foreach( $ava_cdetails as $ava_cdetail ) {
					  echo '
						<div class="one-third column">
							<div class="contact-info">
								<h2 class="contact-title">'. $ava_cdetail['title'] .'</h2>
								<p><a href="#" class="link">'. $ava_cdetail['ava_contact_detail_email'] .'</a></p>
								<p><i class="icon fa fa-phone-square"></i>'. $ava_cdetail['ava_contact_detail_phone'] .'</p>
							</div>
						</div>';
					}
				  } 
				}
				?>

		</div><!-- end container -->
	
	</section><!-- end contact -->
	
	<?php $ava_offices = ot_get_option('ava_office_one_image'); if( $ava_offices !="" ) { ?>
	<!-- Offices -->
	<section id="offices">
	
		<!-- Container -->
		<div class="container">

			<div class="sixteen columns">
				<div class="divider"></div>
				<h3 class="map-title"><?php the_title(); ?></h3>
			</div>
			
			<!-- Office 1 -->
			<div class="eight columns">
				<div class="office-map">
					<div id="map1"><img src="<?php echo ot_get_option('ava_office_one_image'); ?>" alt="<?php echo ot_get_option('ava_office_one_address'); ?>" /></div>
					<h4 class="map-subtitle"><?php echo ot_get_option('ava_office_one_title'); ?></h4>
					<p class="office-info"><?php echo ot_get_option('ava_office_one_address'); ?></p>
					<p class="office-info right"><?php echo ot_get_option('ava_office_one_phone'); ?><br />
					<a href="#"><?php echo ot_get_option('ava_office_one_email'); ?></a></p>					
				</div>
			</div>
			
			<?php $ava_office_two = ot_get_option('ava_office_two_image'); if( $ava_office_two != "" ){ ?>
			<!-- Office 2 -->
			<div class="eight columns">
				<div class="office-map">
					<div id="map2"><img src="<?php echo ot_get_option('ava_office_two_image'); ?>" alt="<?php echo ot_get_option('ava_office_two_address'); ?>" /></div>
					<h4 class="map-subtitle"><?php echo ot_get_option('ava_office_two_title'); ?></h4>
					<p class="office-info"><?php echo ot_get_option('ava_office_two_address'); ?></p>
					<p class="office-info right"><?php echo ot_get_option('ava_office_two_phone'); ?><br />
					<a href="#"><?php echo ot_get_option('ava_office_two_email'); ?></a></p>					
				</div>
			</div>
			<?php } ?>
			
		</div><!-- end container -->
		
	</section><!-- end offices -->
	<?php } ?>	

<?php endwhile;?>