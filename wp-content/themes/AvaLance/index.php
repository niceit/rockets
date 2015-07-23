<?php get_header(); ?>

	<!-- Blog -->
	<section id="blog">
	
		<div class="container">
		
			<div class="sixteen columns">	
				<h1 class="section-title"><?php _e('Blog','avalance'); ?></h1>	
			</div>
			
			<!-- Blog Item 1-->
			<?php query_posts('post_type=post'); ?>
			<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
			<div class="one-third column">
				<article <?php post_class(); ?>>
					<header>
					<h2 class="blog-item-title">
						<span class="line-1"><?php ava_trim_title(); ?></span>
						<span class="line-2"><?php the_time(' F d, Y'); ?></span>
					</h2>
					</header>
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail('full'); }
							else { echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/img/thumbnail-default.jpg" />'; }?>
					<div class="blog-article-intro">
						<h3 class="blog-article-title"><?php ava_trim_title(); ?></h3>
						<div class="post-meta">
							<i class="fa fa-user"><span> <?php the_author_posts_link(); ?></span></i>
							<?php if( has_tag() ) { ?><i class="fa fa-tags"><span> 
									<?php
									$posttags = get_the_tags();
									$count=0;
									if ($posttags) {
										$output = '';
										foreach($posttags as $tag) {
											$count++;
											$output .= $tag->name . ',';
											if( $count >1 ) break;
										}
									}
									echo $output;
									?>							
							</span></i><?php } ?>
						</div>						
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>">View Post...</a>
					</div>					
				</article>
			</div>
			<?php endwhile; endif; ?>
			
				<nav class="pagination">
					<?php next_posts_link(__('&larr; Older posts', 'avalance')); ?>
					<?php previous_posts_link(__('Newer posts &rarr;', 'avalance')); ?>
				</nav>				
			
		</div><!-- end container -->
	
	</section><!-- end blog -->

<?php get_footer(); ?>