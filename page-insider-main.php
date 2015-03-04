<?php
/*
Template Name: Insider Main Page
*/
?>

<?php get_header(); ?>

<div id="content" class="insider-page">
	<div id="inner-content" class="wrap cf">
		<div id="main" class="m-all t-all d-all cf" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="pinned article-header cf">
					<div class="page-title"><div class="title-image">Industry Insider</div></div>
				</header>

				<div class="insider-featured cf">
					<h5>Featured</h5>
					<?php if( have_rows('featured_posts') ): ?>
						<?php while( have_rows('featured_posts') ): the_row(); ?>
					
							<div class="m-all t-1of3 d-1of3 cf">
								<div class="module">
									<span class="date"><?php the_sub_field('date'); ?></span>
									<p><?php the_sub_field('title'); ?></p>
									<p><?php the_sub_field('sub_title_text'); ?></p>
									<?php if (get_sub_field('external-link')) : ?>
										<a href="<?php the_sub_field('read_more_external') ?>" >View <i class="fa fa-chevron-circle-right"></i></a>
									<?php else : ?>
										<a href="<?php the_sub_field('read_more_internal') ?>">View <i class="fa fa-chevron-circle-right"></i></a>
									<?php endif; ?>
								</div>
							</div>
						
						<?php endwhile; ?>
					<?php endif; ?> 
				</div>

				<div class="insider-nav cf">
					<ul>
						<!-- <li class="all-posts"><a href="<?php echo get_permalink( 8 ); ?>">All</a></li> -->
						<?php wp_list_categories( 'title_li=' ); ?>
						<!-- <li><a href="http://madpowprojects.com/plansource/DEV/industry-insider/video-library/">Video Library</a></li> -->
					</ul>
				</div> <!-- /insider-nav -->


				<div class="insider-posts  cf">

					<?php
						$temp = $wp_query;
						$wp_query = null;
						$wp_query = new WP_Query( 
							array( 
									'posts_per_page' => 12, 
									// 'paged' => $paged
								) 
							);
					?>

					<?php if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
						
						<section <?php post_class('post-preview  cf'); ?>>
								
							<span class="date"><?php the_time('M j, Y'); ?></span>
							<h4 class="single-title" itemprop="headline"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>

							<?php echo bones_excerpt(120); ?>

							<div class="post-meta"><?php the_category(', '); ?></div> <!-- /post-meta -->
					
						</section> <!-- /post-preview -->

					<?php endwhile; endif; ?>

					<?php $wp_query = null; $wp_query = $temp; ?>
					<?php wp_reset_postdata(); ?>

				</div> <!-- /insider-posts -->

			</article>

		</div>

		<?php // get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>
