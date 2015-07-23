<?php
/*
	Template Name: Our Team
*/
?>

<?php $ava_team_loop = new WP_Query(array('post_type' => 'page', 'meta_value' => 'template-team.php' ));
while ( $ava_team_loop->have_posts() ) : $ava_team_loop->the_post();  ?> 

	<!-- About Us -->
	<section class="about" id="<?php $ava_ref_title = get_the_title(); echo sanitize_title($ava_ref_title); ?>">
	
		<div class="container">
		
			<div class="sixteen columns">
			
				<h1 class="section-title"><?php the_title(); ?></h1>
				
					<?php the_content(); ?>
				
			</div>	
			
				<?php						
				if ( function_exists( 'ot_get_option' ) ) {
				  
				  $ava_teams = ot_get_option( 'ava_team_members', array() );
				  
				  if ( ! empty( $ava_teams ) ) {
					foreach( $ava_teams as $ava_team ) {
					  echo '
						<div class="four columns">
							<div class="team-member">
								<a href="#" data-toggle="#firstMember">
									<img src="'. $ava_team['ava_team_member_thumb'].'" alt="'. $ava_team['ava_team_member_name'] .'" />
									<div class="bullet"></div>
								</a>
							</div>
						</div>
						
						<div class="memberProfile">
							<div class="member-info">
								<h2 class="member-name">'. $ava_team['ava_team_member_name'] .'<span>'. $ava_team['ava_team_member_job'] .'</span></h2>
								<div class="member-details">
									<h3>Information</h3>
									<p>'. $ava_team['ava_team_member_info'] .'</p>
								</div>
								<div class="member-skills">
									<h3>Experiences</h3>
									<p>'. $ava_team['ava_team_member_exp'] .'</p>
								</div>
							</div>
							<div class="member-photo">
								<img src="'. $ava_team['ava_team_member_image'] .'" alt="'. $ava_team['ava_team_member_name'] .'" />
									<ul class="social-networks">
										<li><a href="'. $ava_team['ava_team_member_twitter'] .'"><i class="icon fa fa-twitter"></i></a></li>
										<li><a href="'. $ava_team['ava_team_member_facebook'] .'"><i class="icon fa fa-facebook"></i></a></li>					
									</ul>
								<div class="close"></div>						
							</div>
						</div>';
					}
				  } 
				}
				?>

			<div class="clear"></div>
				
		</div><!-- end container -->
		
	</section><!-- end about us -->

<?php endwhile;?>
