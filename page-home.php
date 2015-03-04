<?php
/*
Template Name: Home Page
*/
?>

<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="wrap cf">
		<div id="main" class="m-all t-all d-all cf" role="main">
			
			<div class="main-banner m-all t-all d-all cf">
				
				<div class="rslides_container">
					<?php if( have_rows('banner_repeater') ): ?>	
						<ul class="rslides" id="slider">
							<?php while( have_rows('banner_repeater') ): the_row(); 
								// vars
								$banner_image = get_sub_field('banner_image');
								$banner_headline = get_sub_field('banner_headline');
								$banner_text = get_sub_field('banner_text');
								$banner_cta_text = get_sub_field('banner_cta_text');
								$banner_cta_link = get_sub_field('banner_cta_link');
								?>
									<li>	
										<div class="featured">
											<div class="featured-title"><?php echo $banner_headline; ?></div>
											<div class="featured-excerpt">
											<p><?php echo $banner_text; ?></p>
											</div>
											<div class="featured-link"><a href="<?php echo $banner_cta_link; ?>"><?php echo $banner_cta_text; ?></a></div>
										</div>
										<div class="banner-images">
											<img src="<?php echo $banner_image; ?>">
										</div>
									</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>		
				</div><!-- .rslides #slider -->
			</div><!--  rslides_container  -->



			<?php if( have_rows('products_services') ): ?>

				<div class="product-callouts cf">
					<?php while( have_rows('products_services') ): the_row(); 
					// vars
					$image = get_sub_field('products_services_logo');
					$imageAlt = get_sub_field('products_services_alt');
					$heading = get_sub_field('products_services_headline');
					$content = get_sub_field('product_service_content');
					$link = get_sub_field('products_services_link');
					?>
					<div class="m-all t-1of2 d-1of4 cf products-list">
						<a href="<?php echo $link; ?>">
							<img src="<?php echo $image; ?>" alt="<?php echo $imageAlt; ?>" />
							<?php if( has_sub_fields('products_services_headline') ): ?>
								<h2><?php echo $heading; ?></h2>
							<?php endif; ?>
							<p><?php echo $content; ?></p>
						</a>
					</div>
		
					<?php endwhile; ?>
				</div>

				<?php endif; ?>



			<div class="logo-slider" data-cycle-fx=carousel data-cycle-timeout=1000>
				<div class="next-slide"><i class="fa fa-chevron-right"></i></div>
				<div class="prev-slide"><i class="fa fa-chevron-left"></i></div>
				<div class="logobox-wrap">
					<div class="logobox">
						<?php if( have_rows('slider_logos') ): ?>

							<?php while( have_rows('slider_logos') ): the_row();
								$LogoGraphic = get_sub_field('logo_graphic');
								$LogoAlt = get_sub_field('logo_alt_text');
							?>
							
								<span><img src="<?php echo $LogoGraphic; ?>" alt="<?php echo $LogoAlt; ?>"></span>
							
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div> <!-- /logobox-wrap -->
			</div>


			<div class="blue-callouts cf">
					<!-- <div class="m-all t-1of2 d-1of2 cf"> -->
						<div class="blue-gradient">
							<h3><strong>WEBINAR</strong>: Navigating The Maze: How To Stay Compliant With the Affordable Care Act (ACA)</h3>
							<hr>
							<p>Thursday, February 26, 2015<br>
2:00 PM-3:00 PM EST</p>
							<p><a href="https://attendee.gotowebinar.com/register/5745026684876123138">Learn more/register <i class="fa fa-chevron-right smaller"></i></a></p>
						</div>
					<!-- </div> -->

					<!-- <div class="m-all t-1of2 d-1of2 cf last"> -->
					<div class="blue-gallery last">
						<div class="rslides_container">
							<ul class="rslides" id="slider2">
								<?php if( have_rows('video_slides') ): ?>
									<?php while( have_rows('video_slides') ): the_row(); ?>
										<li>	
											<div class="blue-callout-text">
												<h3><?php the_sub_field('video_title'); ?></h3>
												<hr>
												<div class="video-link">
													<a class="modal-video" href="<?php the_sub_field('video_url') ?>">
														<div class="text"><p><?php the_sub_field('video_sub_title'); ?></p></div>
														<div class="icon"><i class="fa fa-play-circle"></i></div>
													</a>
												</div>
											</div>
											<img src="<?php the_sub_field('preview_image'); ?>" width="100%" alt="" />
										</li>
									<?php endwhile; ?>
								<?php endif; ?> 
							</ul>
						</div>
					</div><!-- gallery  -->
				<!-- </div> one-half  -->
			</div><!--  blue-callouts  -->


			<?php if( have_rows('home_related_article') ): ?>

				<div class="three-callouts cf">
					<?php $x=1; while( have_rows('home_related_article') ): the_row();   // $x=1; counts the number of these that are added 

						$last = count(get_field('home_related_article')); // gets the total number of these divs that were added

						$HomeArticleSource = get_sub_field('home_related_article_source');
						$HomeArticleTitle = get_sub_field('home_related_article_title');
						$HomeArticleContent = get_sub_field('home_related_article_content');
						$HomeArticleLinkedText = get_sub_field('home_related_article_linked_text');
						$HomeArticleLink = get_sub_field('home_related_article_link_location');
						?>

					<?php if($x==$last) { $lastly = ' last'; } else { $lastly = ''; } ?> <!-- If it's the last instance add a class of last -->

					<div class="m-all t-1of3 d-1of3 cf row<?php echo $lastly ?>"> <!-- add the class of .last here -->
						<span class="source"><?php echo $HomeArticleSource; ?></span>
						<h4><?php echo $HomeArticleTitle; ?></h4>
						<p><?php echo $HomeArticleContent; ?></p>
						<p><a href="<?php echo $HomeArticleLink; ?>"><?php echo $HomeArticleLinkedText; ?> <i class="fa fa-chevron-right smaller"></i></a></p>
					</div>

					<?php $x++; endwhile; ?>

				</div><!--  three-callouts  -->
			<?php endif; ?>




		</div><!--  <div id="main" class="m-all t-all d-all cf" role="main"> -->
	</div><!--  <div id="inner-content" class="wrap cf"> -->
</div><!--  <div id="content"> -->




<?php get_footer(); ?>
