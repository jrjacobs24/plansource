<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

					<header class="article-header cf">
						<div class="page-title"><div class="title-image">Industry Insider</div></div>
					</header>

					<div class="insider-nav  cf">
						<ul>
							<li class="all-posts"><a href="<?php echo get_permalink( 8 ); ?>">All</a></li>
							<?php wp_list_categories( 'title_li=' ); ?>
							<!-- <li><a href="http://madpowprojects.com/plansource/DEV/industry-insider/video-library/">Video Library</a></li> -->
						</ul>
					</div> <!-- /insider-nav -->

					<div id="main" class="m-all t-2of3 d-5of7 cf" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<div class="post-title-block">
							<h3 class="h2 entry-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
							<p class="byline vcard"><time datetime="<?php the_time('M j, Y'); ?>" pubdate><?php the_time('M j, Y'); ?></time> | <?php the_category(', '); ?></p>
						</div>
						<div class="post-content-block">
							<?php the_content(); ?>
						</div>

						<?php endwhile; ?>

						<?php else : ?>

							<article id="post-not-found" class="hentry cf">
									<header class="article-header">
										<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
									</header>
									<section class="entry-content">
										<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
									</section>
									<footer class="article-footer">
											<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>

					</div>

					<?php get_sidebar(); ?>

				</div>

			</div>

<?php get_footer(); ?>
