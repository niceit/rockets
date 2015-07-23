<?php
/*
	Template Name: Portfolio
*/
?>

<?php $ava_portfolio_loop = new WP_Query(array('post_type' => 'page', 'meta_value' => 'template-portfolio.php' ));
while ( $ava_portfolio_loop->have_posts() ) : $ava_portfolio_loop->the_post();  ?> 

	<!-- Portfolio -->	
	<section class="portfolio-sec" id="<?php $ava_ref_title = get_the_title(); echo sanitize_title($ava_ref_title); ?>">
	
		<div class="container">
			
			<div class="sixteen columns">
			
				<h1 class="section-title"><?php the_title(); ?></h1>
				
				<?php the_content(); ?>
				
			</div>

			<div class="sixteen columns">

				<!-- Filtering-->
				
					<?php if(!is_tax()) {
			
					$terms = get_terms("filters");
					$count = count($terms);
					if ( $count > 0 ){ ?>
					<div id="filters">
						<ul class="option-set" data-option-key="filter">
							<li><a href="#filter" class="selected" data-option-value="*"><i class="icon fa fa-th"></i><span class="filter-title">All</span></a></li>
							<?php
							foreach ( $terms as $term ) {
								echo '<li><a href="#filter" data-option-value=".'.$term->slug.'"><i class="icon fa '.$term->description.'"></i><span class="filter-title">'. $term->name .'</span></a></li>';

							} ?>
						</ul>
					</div>
					<?php } 
					} ?>					
					
					<div class="clear"></div>
				
				
			</div>
			
		</div><!-- end container -->
		
		<div class="container">
			
			<!-- Portfolio Content -->
			<div id="portfolio-wrapper">
			
				<?php query_posts('post_type=portfolio'); ?>
				<?php while (have_posts()) : the_post(); ?>
					<!-- Portfolio Item -->
					<a href="<?php the_permalink(); ?>" <?php post_class(); ?>>				
						<figure class="one-third column portfolio-item">
							<div class="picture"><?php the_post_thumbnail(); ?></div>
							<figcaption class="portfolio-item-title"><span>+</span><?php the_title(); ?></figcaption>	
						</figure>
					</a>
				<?php endwhile;?>
				<?php rewind_posts(); ?>				
				
			</div><!-- end portfolio content -->

		</div><!-- end container -->
	
	</section><!-- end portfolio -->
	
<?php endwhile; ?>