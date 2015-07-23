<?php
/*
	Template Name: Our Process
*/
?>

<?php $ava_process_loop = new WP_Query(array('post_type' => 'page', 'meta_value' => 'template-process.php' ));
while ( $ava_process_loop->have_posts() ) : $ava_process_loop->the_post();  ?> 

	<!-- Work Process -->
	<section class="process" id="<?php $ava_ref_title = get_the_title(); echo sanitize_title($ava_ref_title); ?>" 
	style="background: url('<?php echo ot_get_option('ava_processes_bg'); ?>') no-repeat;">
	
		<div class="container">
		
			<div class="sixteen columns">	
			
				<h1 class="section-title"><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
				
			</div>

				<?php						
				if ( function_exists( 'ot_get_option' ) ) {
				  
				  $ava_processes = ot_get_option( 'ava_processes', array() );
				  
				  if ( ! empty( $ava_processes ) ) {
					foreach( $ava_processes as $ava_process ) {
					  echo '
						<div class="four columns">
							<div class="process-part">
								<a href="#" data-toggle="#firstProcess">	
									<div class="process-icon first" style="background-image: url('. $ava_process['ava_process_thumb'] .');"></div>
									<h2 class="process-title">'. $ava_process['title'] .'</h2>
									<div class="bullet"></div>
								</a>
							</div>
						</div>
						
						<div class="processInfo">	
							<div class="close"></div>			
							<div class="process-detail">
								<img src="'. $ava_process['ava_process_large_image'] .'" alt="'. $ava_process['title'] .'" />
								<div class="process-detail-text">
									<h2 class="process-detail-title">'. $ava_process['title'] .'</h2>
									<p>'. $ava_process['ava_process_desc'] .'</p>
								</div>
							</div>					
						</div>';
					}
				  } 
				}
				?>
		
		</div><!-- end container -->
	
	</section><!-- end work process -->

<?php endwhile;?>