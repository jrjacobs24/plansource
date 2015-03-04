<?php
/*
Template Name: Insider Videos
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
					<?php if( have_rows('featured_posts', 8) ): ?>
						<?php while( have_rows('featured_posts', 8) ): the_row(); ?>
					
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

				<div class="insider-nav  cf">
					<ul>
						<li class="all-posts"><a href="<?php echo get_permalink( 8 ); ?>">All</a></li>
						<?php wp_list_categories( 'title_li=' ); ?>
						<!-- <li class="video-library"><a href="http://madpowprojects.com/plansource/DEV/industry-insider/video-library/">Video Library</a></li> -->
					</ul>
				</div> <!-- /insider-nav -->


				<div class="insider-posts  cf">						
						
					<?php if( have_rows('video_library_entries') ): ?>
						<?php while( have_rows('video_library_entries') ): the_row(); ?>
					
						<section <?php post_class('post-preview  cf'); ?>>
							<div>
								<h4 class="single-title" itemprop="headline"><?php the_sub_field('video_title'); ?></h4>
								<a class="modal-video" href="<?php the_sub_field('video_url'); ?>"><img src="<?php the_sub_field('video_preview_image'); ?>" alt="" /></a>
							</div>

						</section> <!-- /post-preview -->
						
						<?php endwhile; ?>
					<?php endif; ?> 

				</div> <!-- /insider-posts -->

			</article>

		</div>

		<?php // get_sidebar(); ?>

	</div>

</div>

<?php get_footer(); ?>
