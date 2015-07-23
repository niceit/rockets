<?php get_header(); ?>

	<!-- Blog -->
	<section id="blog">
	
		<div class="container">
					
			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>			
		
			<div class="sixteen columns">	
				<h1 class="section-title"><?php the_title(); ?></h1>	
			</div>
			
			<div class="twelve columns">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				
					<?php if ( has_post_thumbnail() ) { ?>
					<div class="single-post-image"><?php the_post_thumbnail(); ?></div> <?php }?>				

				<div class="single-post-content">
					<div class="post-meta">
						<i class="fa fa-user"><span> <?php the_author_posts_link(); ?></span></i>
						<?php if( has_tag() ) { ?><i class="fa fa-tags"><span> <?php the_tags('', ', ', '<br />'); ?></span></i><?php } ?>
						<i class="fa fa-clock-o"><span> <?php the_time(' F d, Y'); ?></span></i>						
					</div>				
				<?php the_content(); ?></div>
				<?php comments_template(); ?>
			    <?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>				
				</article>
			</div>
			
			<?php endwhile; endif; ?>
			

			
			<div class="four columns">
				<?php get_sidebar(); ?>		
			</div>
		
			
		</div><!-- end container -->
	
	</section><!-- end blog -->

<?php get_footer(); ?>