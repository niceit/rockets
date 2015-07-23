<?php get_header(); ?>

	<section id="page">
	
		<div class="container">
		
			<?php while ( have_posts() ) : the_post(); ?>
			
				<div class="sixteen columns">	
					<h1 class="section-title"><?php the_title(); ?></h1>
				</div>		
		
				<?php the_content(); ?>
			
			<?php endwhile; ?>
		
		</div>
	
	</section>
<?php get_footer(); ?>