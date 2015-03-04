<?php
/*
Template Name: Products Overview Page - No Logos
*/
?>

<?php get_header(); ?>
<div id="content" class="products-page">
	<div id="inner-content" class="wrap cf">
		<div id="main" class="m-all t-all d-all cf" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="pinned article-header cf">
					<div class="page-title">
					<?php if( get_field('pl_page_title_image') ): ?>
					<div class="title-image"><img src="<?php the_field('page_title_image'); ?>"></div>
					<?php endif; ?>

					 <?php the_field('page_title_text'); ?></div>
					<ul class="header-ctas">
						
					<?php if( get_field('pinned_nav_cta_1_text') ): ?>
						<li class="cta-1"><a class="modal-video" href="<?php the_field('pinned_nav_cta_1_link'); ?>"><span class="text"><?php the_field('pinned_nav_cta_1_text'); ?></span> <span class="icon"><?php the_field('pinned_nav_cta_1_icon'); ?></span></a></li>
					<?php endif; ?>						
					<?php if( get_field('pinned_nav_cta_2_text') ): ?>
						<li class="cta-2"><a href="<?php the_field('pinned_nav_cta_2_link'); ?>" target="_blank"><span class="text"><?php the_field('pinned_nav_cta_2_text'); ?></span> <span class="icon"><?php the_field('pinned_nav_cta_2_icon'); ?></span></a></li>
					<?php endif; ?>

					</ul>
				</header>

				<div class="lower-page-banner gradient cf" style="background-image: url(<?php the_field('products_overview_banner_image'); ?>); background-position:center center; backgound-repeat:no-repeat; background-size:cover;"><!-- Banner area -->
					<div class="headline-text"><?php the_field('products_banner_text'); ?></div>
					<div class="headline-link">
						<a href="<?php the_field('products_banner_cta_link'); ?>" class="themebutton"><?php the_field('products_banner_cta_text'); ?> <i class="fa fa-chevron-circle-right"></i></a>
					</div>
				</div>

				<?php $dividerIDs = Array(); ?><!-- When adding the link text and the link location for the subnavigation, create the navigation -->


				<?php if(have_rows('content_builder')): ?>

					<ul class="section-navigation">	
						<?php while(have_rows('content_builder')) : the_row();
						$section_text = get_sub_field('section_text');
						$link_location = get_sub_field('link_location');
						$enhancements_active = get_sub_field('enhancements_header'); 
						array_push($dividerIDs, $link);
						?>	

						<?php if( get_sub_field('section_text') ): ?>
							<li><a href="#<?php the_sub_field('link_location'); ?>"><?php the_sub_field('section_text'); ?></a></li>
						<?php endif; ?>

					<?php endwhile; ?>
						
						<?php if ($enhancements_active) { ?>
							<li><a href="#enhancements">Enhancements</a></li>
						<?php } ?>
						
				</ul>

			<?php endif; ?>


<!-- 
	<p><?php print_r($dividerIDs[2]); ?></p> -->


	<div class="products-overview cf"><!-- Starts Products Overview Area -->

		<h2><?php the_field('products_overview_headline'); ?></h2>

		<div class="m-all t-all d-all cf">

			<div class="m-all t-1of2 d-1of2 cf">
				<?php if( get_field('overview_left_icon') ): ?>
				<div class="overview-icon"><img src="<?php the_field('overview_left_icon'); ?>" alt="" /></div>
				<?php endif; ?>
				<h2 class="left"><?php the_field('overview_left_headline'); ?></h2>
				<p class="overview-left-content"><?php the_field('overview_left_content'); ?></p>
			</div>

			<div class="m-all t-1of2 d-1of2 cf">
				<div class="images-area <?php echo $add_screenshot_class; ?>">
					<img src="<?php the_field('overview_right_image'); ?>" alt="" width="100%" />
				</div>
			</div>

		</div>

		<?php if( have_rows('overview_features') ): ?>

			<?php while( have_rows('overview_features') ): the_row(); // vars
				$overview_col_count++;
				endwhile;
				if ( $overview_col_count == 1 ) { $overview_col_count = 2; };
			?>

			<div class="m-all t-all d-all cf">
				<ul class="products-features">	
					<?php while( have_rows('overview_features') ): the_row(); 
// vars
					$overviewIcon = get_sub_field('overview_features_icon');
					$overviewIconAlt = get_sub_field('overview_features_icon_alt');
					$overviewHeader = get_sub_field('overview_features_headline');
					$overviewLink = get_sub_field('overview_features_link');		 						
					$overviewText = get_sub_field('overview_features_content');
					?>

					<li class="m-all t-1of2 d-1of<?php echo $overview_col_count; ?> cf">
						<div class="featured-icon">
							<img src="<?php echo $overviewIcon; ?>" alt="<?php echo $overviewIconAlt; ?>" />
						</div>
						<p class="feature-header">
						
						<?php if( get_sub_field('overview_features_link') ): ?>
						<a href="<?php echo $overviewLink; ?>">
						<?php endif; ?>

						<?php echo $overviewHeader; ?> 
						
						<?php if( get_sub_field('overview_features_link') ): ?>
						<span class="smaller"><i class="fa fa-chevron-right"></i></span></a>
						<?php endif; ?>
						
						</p>
						<p class="feature-content"><?php echo $overviewText; ?></p>
					</li>
				<?php endwhile; ?>
			</ul>
		</div>
	<?php endif; ?>

</div><!-- Ends Products Overview Area -->



<div class="products-content">
<!-- LET'S START THE FLEX CONTENT NOW ***************** -->
<?php
 	$section_num = 0;
	// check if the flexible content field has rows of data
	if( have_rows('content_builder') ): 

		// loop through the rows of data
		while ( have_rows('content_builder') ) : the_row();

			// vars
				$product_icon = get_sub_field('product_icon');
				$product_icon_alt = get_sub_field('product_icon_alt');
				$product_headline = get_sub_field('product_headline');
				$product_content = get_sub_field('product_content');
				$product_content = apply_filters('the_content', $product_content);
				$product_image = get_sub_field('product_image');
				$product_image_alt = get_sub_field('product_image_alt');
				$modal_type = get_sub_field('modal_type');
				$modal_image = get_sub_field('modal_image');
				$modal_video_url = get_sub_field('modal_video_url');
				$image_type = get_sub_field('image_type');

				$related_content_columns = get_sub_field( 'related_content_columns');
				$related_content_column1 = get_sub_field('related_content_column1');
				$related_content_column2 = get_sub_field('related_content_column2');

				// intro text to second text area
				$related_content_headline = get_sub_field('related_content_headline');
				$related_content = get_sub_field('related_content');

				$product_features = get_sub_field('product_features');  //repeater
				$product_features_header = get_sub_field('product_features_header');
				$product_features_content = get_sub_field('product_features_content');

				$enhancements_icon = get_sub_field('enhancements_icon'); 
				$enhancements_icon_alt = get_sub_field('enhancements_icon_alt'); 
				$enhancements_header = get_sub_field('enhancements_header'); 
				$enhancements_features = get_sub_field('enhancements_features'); 
				$enhancements_features_header = get_sub_field('enhancements_features_header'); 
				$enhancements_features_content = get_sub_field('enhancements_features_content'); 
				$enhancements_cta_text = get_sub_field('enhancements_cta_text'); 
				$enhancements_cta_link = get_sub_field('enhancements_cta_link'); 

			// end vars

			$section_num++; // count sections for section-XX class
			if( get_row_layout() == 'image_text_section' ): // IMAGE AND TEXT LAYOUT ***************************?>

				<div id="<?php the_sub_field('link_location'); ?>" class="row section-<?php echo $section_num; ?>">
					<div class="m-all t-1of2 d-1of2 cf fifty">
						<?php if( get_sub_field('product_icon') ): ?>
							<div class="icons"><img src="<?php echo $product_icon; ?>" alt="<?php echo $product_icon_alt; ?>"></div>
						<?php endif; ?>
						<h2><?php echo $product_headline; ?></h2>
						<?php echo $product_content; ?>
						<?php if( $related_content_columns ): ?>
							<div class="m-all t-1of2 d-1of2 cf"><?php echo $related_content_column1; ?></div>
							<div class="m-all t-1of2 d-1of2 cf"><?php echo $related_content_column2; ?></div>
						<?php endif; ?>
					</div>
					<div class="m-all t-1of2 d-1of2 cf fifty">
						<span class="images-area <?php echo $image_type; ?>">
							<?php if ($modal_type == 'modal-image') : ?>
								<a class="modal-image" href="<?php echo $modal_image; ?>">
									<img src="<?php echo $product_image ?>" alt="<?php echo $product_image_alt; ?> " width="100%" />
								</a>
							<?php elseif ($modal_type == 'modal-video') : ?>
								<a class="modal-video" href="<?php echo $modal_video_url; ?>">
									<img src="<?php echo $product_image ?>" alt="<?php echo $product_image_alt; ?> " width="100%" />
								</a>
							<?php else : ?>
								<img src="<?php echo $product_image ?>" alt="<?php echo $product_image_alt; ?> " width="100%" />
							<?php endif; ?>

<!-- 							<?php if ($modal_window) { echo '<a class="modal-image" href="' . $modal_image . '">'; } ?>
<img src="<?php echo $product_image ?>" alt="<?php echo $product_image_alt; ?> " width="100%" />
<?php if ($modal_window) { echo '</a>'; } ?> -->
						</span>
					</div>
					
					<?php if( get_field('product_features_content') ): ?>
					<!-- <?php // if( have_rows('product_features') ): ?>   features of this product -->
						<div class="m-all t-all d-all cf sections-featured">
							<ul class="products-features">

							<?php while( have_rows('product_features') ): the_row(); // vars
								$col_count++;
								endwhile;
								if ( $col_count == 1 ) { $col_count = 2; };
							?>
							<?php while( have_rows('product_features') ): the_row(); // vars
								$product_features_header = get_sub_field('product_features_header');
								$product_features_content = get_sub_field('product_features_content');
							?>						
								<li class="m-all t-1of2 d-1of<?php echo $col_count; ?> cf">
									<h5><?php echo $product_features_header; ?></h5>
									<p><?php echo $product_features_content; ?></p>
								</li>
							<?php endwhile; $col_count=0; ?>
							</ul>
						</div>
					<?php endif; ?>


				</div> <!-- /row -->

			<?php elseif( get_row_layout() == 'two_text_section' ): // NO IMAGE (TWO TEXT AREA) LAYOUT *********************?>

				<div id="<?php the_sub_field('link_location'); ?>" class="row section-<?php echo $section_num; ?>">
					<div class="m-all t-1of2 d-1of2 cf fifty">
						<?php if( get_sub_field('product_icon') ): ?>
							<div class="icons"><img src="<?php echo $product_icon; ?>" alt="<?php echo $product_icon_alt; ?>"></div>
						<?php endif; ?>
						<h2><?php echo $product_headline; ?></h2>
						<?php echo $product_content; ?>
					</div>
					<div class="m-all t-1of2 d-1of2 cf fifty">
						<h2><?php echo $related_content_headline; ?></h2>
						<?php echo $related_content; ?>
						<?php if( $related_content_columns ): ?>
							<div class="m-all t-1of2 d-1of2 cf"><?php echo $related_content_column1; ?></div>
							<div class="m-all t-1of2 d-1of2 cf"><?php echo $related_content_column2; ?></div>
						<?php endif; ?>
					</div>
					<?php if( have_rows('product_features') ): ?><!-- features of this product -->
						<div class="m-all t-all d-all cf sections-featured">
							<ul class="products-features">

							<?php while( have_rows('product_features') ): the_row(); // vars
								$product_features_header = get_sub_field('product_features_header');
								$product_features_content = get_sub_field('product_features_content');
								?>						
								<li class="m-all t-1of2 d-1of4 cf">
									<h5><?php echo $product_features_header; ?></h5>
									<p><?php echo $product_features_content; ?></p>
								</li>
							<?php endwhile; ?>
							</ul>
						</div>
					<?php endif; ?>
				</div> <!-- /row -->

			<?php elseif( get_row_layout() == 'enhancements_section' ): // ENHANCEMENTS LAYOUT *********************?>

				<div id="enhancements" class="m-all t-all d-all cf enhancements-area"><!-- Enhancements, this is the last product section dynamically added to the "Sections" navigation -->
					<?php if( get_sub_field('enhancements_icon') ): ?>
						<div class="icons"><img src="<?php echo $enhancements_icon; ?>" alt="<?php echo $enhancements_icon_alt; ?>"></div>
					<?php endif; ?>

					<h2><?php echo $enhancements_header; ?></h2>
					<hr class="yellow-hr">

					<?php if( have_rows('enhancements_features') ): ?><!-- enhancement features of this product -->
						<div class="m-all t-all d-all cf sections-featured">
							<ul class="products-features">

							<?php while( have_rows('enhancements_features') ): the_row(); // vars
								$enhancements_features_header = get_sub_field('enhancements_features_header');
								$enhancements_features_content = get_sub_field('enhancements_features_content');
								?>						
								<li class="m-all t-1of2 d-1of4 cf">
									<h5><?php echo $enhancements_features_header; ?></h5>
									<p><?php echo $enhancements_features_content; ?></p>
								</li>
							<?php endwhile; ?>

							</ul>
						</div>

					<?php endif; ?> <!-- ends enhancement features -->	

					<?php if( get_sub_field('enhancements_cta_text') ): ?>
						<div class="m-all t-all d-all cf">
							<p><a href="<?php echo $enhancements_cta_link; ?>" class="themebutton"><?php echo $enhancements_cta_text; ?> </a></p>
						</div>
					<?php endif; ?>

				</div> <!-- ends enhancements -->

			<?php endif; ?>

		<?php endwhile;

	else :

		// no layouts found

	endif;

	// END FLEX CONTENT ******************************
?>
</div> <!-- /products-content -->

<?php if( have_rows('product_related_article') ): ?>

	<div class="three-callouts cf">
		<?php $x=1; while( have_rows('product_related_article') ): the_row();   // $x=1; counts the number of these that are added 

			$last = count(get_field('product_related_article')); // gets the total number of these divs that were added

			$pArticleSource = get_sub_field('product_related_article_source');
			$pArticleTitle = get_sub_field('product_related_article_title');
			$pArticleContent = get_sub_field('product_related_article_content');
			$pArticleLinkedText = get_sub_field('product_related_article_linked_text');
			$pArticleLink = get_sub_field('product_related_article_link');
			?>

		<?php if($x==$last) { $lastly = ' last'; } else { $lastly = ''; } ?> <!-- If it's the last instance add a class of last -->

		<div class="m-all t-1of3 d-1of3 cf row<?php echo $lastly?>"> <!-- add the class of .last here -->
			<span class="source"><?php echo $pArticleSource; ?></span>
			<h4><?php echo $pArticleTitle; ?></h4>
			<p><?php echo $pArticleContent; ?></p>
			<p><a href="<?php echo $pArticleLink; ?>"><?php echo $pArticleLinkedText; ?> <i class="fa fa-chevron-right smaller"></i></a></p>
		</div>

		<?php $x++; endwhile; ?>

	</div><!--  three-callouts  -->
<?php endif; ?>


</article>
</div>
</div>
</div>

<?php get_footer(); ?>
