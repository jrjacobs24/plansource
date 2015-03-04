<?php get_header(); ?>

<div id="content">

	<div id="inner-content" class="wrap cf">

		<header class="article-header cf">
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
								<a href="<?php the_sub_field('read_more_external') ?>" >Read More <i class="fa fa-chevron-circle-right"></i></a>
							<?php else : ?>
								<a href="<?php the_sub_field('read_more_internal') ?>">Read More <i class="fa fa-chevron-circle-right"></i></a>
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
				<!-- <li><a href="http://madpowprojects.com/plansource/DEV/industry-insider/video-library/">Video Library</a></li> -->
			</ul>
		</div> <!-- /insider-nav -->

		<div class="insider-posts  cf">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<section <?php post_class('post-preview  cf'); ?>>
						
					<span class="date"><?php the_time('M j, Y'); ?></span>
					<h4 class="single-title" itemprop="headline"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>

					<?php echo bones_excerpt(120); ?>

					<!-- <div class="post-meta"><?php // the_category(', '); ?></div>  --><!-- /post-meta -->
				
				</section> <!-- /post-preview -->

			<?php endwhile; ?>

					<?php bones_page_navi(); ?>

			<?php else : ?>

					<article id="post-not-found" class="hentry cf">
						<header class="article-header">
							<h3><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h3>
						</header>
						<section class="entry-content">
							<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
						</section>
						<footer class="article-footer">
								<p><?php _e( 'This is the error message in the archive.php template.', 'bonestheme' ); ?></p>
						</footer>
					</article>

			<?php endif; ?>

		</div>

	</div>

</div>

<?php get_footer(); ?>
