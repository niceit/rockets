<?php get_header(); ?>

	<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>

		<!-- Project Details -->
		<section id="project-details">
		
			<div class="container">
			
				<div class="sixteen columns">	
				
					<h1 class="section-title"><?php the_title(); ?></h1>
					
				</div>
				

				<div class="sixteen columns">
				
					<!-- Project Switcher -->
					<div class="switch-project">
						<span class="prev-project"><i class="icon fa fa-long-arrow-left"></i> <?php previous_post_link('%link', 'Prev Project'); ?></span>
						<span class="next-project"><?php next_post_link('%link', 'Next Project'); ?> <i class="icon fa fa-long-arrow-right"></i></span>
					</div>
						
					<?php the_content(); ?>
					
				</div>
					
					<?php $tags = wp_get_post_tags($post->ID);
					if ($tags) {
					$first_tag = $tags[0]->term_id;
					$args=array(
					'tag__in' => array($first_tag),
					'post__not_in' => array($post->ID),
					'posts_per_page'=>3,
					'ignore_sticky_posts'=>1,
					'post_type'=>'portfolio'
					);
					$ava_related_query = new WP_Query($args);?>
					<div class="sixteen columns">
						<div class="text-divider"></div>
						<h2 class="h2"><?php _e('Related Projects','avalance'); ?></h2>
					</div>
					<?php
					if( $ava_related_query->have_posts() ) {
					while ($ava_related_query->have_posts()) : $ava_related_query->the_post(); ?>


						<a href="<?php the_permalink(); ?>" rel="bookmark" <?php post_class(); ?>>				
							<figure class="one-third column portfolio-item">
								<div class="picture"><?php the_post_thumbnail(); ?></div>
								<figcaption class="portfolio-item-title"><span>+</span><?php the_title(); ?></figcaption>	
							</figure>
						</a>

					<?php
					endwhile;
					}
					wp_reset_query();
					}
					?>					


				
			</div><!-- end container -->
			
		</section><!-- end project details -->	
		
		<?php endwhile; else: ?>
			<p><?php _e('No posts were found. Sorry!','avalance'); ?></p>
		<?php endif; ?>		
	
<?php get_footer(); ?>