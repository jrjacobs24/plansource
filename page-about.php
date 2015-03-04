<?php
/*
Template Name: About Us
*
* This is your custom page template. You can create as many of these as you need.
* Simply name is "page-whatever.php" and in add the "Template Name" title at the
* top, the same way it is here.
*
* When you create your page, you can just select the template and viola, you have
* a custom page template to call your very own. Your mother would be so proud.
*
* For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>
<div id="content" class="about-page">
	<div id="inner-content" class="wrap cf">
		<div id="main" class="m-all t-all d-all cf" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="pinned article-header cf">
					<div class="page-title"><div class="title-image">About</div>
					<ul class="header-ctas">
						<?php if( get_field('pl_pinned_nav_cta_1_text') ): ?>
							<li class="cta-1"><a class="modal-video" href="<?php the_field('pl_pinned_nav_cta_1_link'); ?>"><span class="text"><?php the_field('pl_pinned_nav_cta_1_text'); ?></span> <span class="icon"><?php the_field('pl_pinned_nav_cta_1_icon'); ?></span></a></li>
						<?php endif; ?> 
					</ul>
				</header>

				<div class="lower-page-banner gradient cf" style="background-image: url(<?php the_field('about_title_image'); ?>); background-position:center center; backgound-repeat:no-repeat; background-size:cover;"><!-- Banner area -->
					<div class="headline-text"><?php the_field('about_page_title_text'); ?></div>
					<div class="headline-link">
						<p><?php the_field('about_banner_cta'); ?></p>
					</div>
				</div>

				<ul class="section-navigation">	
					<li><a href="#aboutValues">Values</a></li>
					<li><a href="#aboutTeam">Team</a></li>
					<li><a href="#aboutCareers">Careers</a></li>
					<li><a href="#aboutAwards">Awards</a></li>
				</ul>

				<div class="section about-overview cf"><!-- Starts About Overview Area -->
					<h1><?php the_field('about_overview_title'); ?></h1>
					<div class="m-all t-all d-all cf">
						<div class="m-all t-1of2 d-1of2">
							<div class="content"><?php the_field('about_overview_text'); ?></div>
						</div>
						<div class="m-all t-1of2 d-1of2">
							<img src="<?php the_field('about_page_title_image'); ?>" class="imgShadow">
						</div>
					</div>
				</div><!-- Ends About Overview Area -->


				<div id="aboutValues" class="section about-values cf"><!-- Our Values Section --> 
					<div class="sectionHeading">
						<h2><?php the_field('about_our_values_title_text'); ?></h2>
						<p><?php the_field('about_our_values_text'); ?></p>
					</div>
					<div class="values cf">
						<?php if( have_rows('about_our_values_grid') ): ?>
							<?php while( have_rows('about_our_values_grid') ): the_row(); ?>
						
								<div class="m-all t-all d-1of4 cf">
									<div class="contentWrap">
										<div class="heading"><?php the_sub_field('about_value_heading'); ?></div>
										<p class="valueText"><?php the_sub_field('about_value_text'); ?></p>
									</div>
								</div> <!-- /end item -->
						
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div><!-- Our Values section --> 
				

				<div id="aboutTeam" class="section about-team cf"><!-- Our Team Section --> 

					<div class="m-all t-all d-all cf">
						<h2><?php the_field('about_our_team_title_text'); ?></h2>
						<p class="sub"><?php the_field('about_our_team_text'); ?></p>
						<br>
						<br>
					</div>
					<div class="cf" style="clear:both;">
						<?php if( have_rows('about_our_team_grid') ): ?>
							<?php while( have_rows('about_our_team_grid') ): the_row(); ?>

								<?php if ( ( $item_count == 0 ) ) : ?>
									<div class="row cf">
								<?php endif; ?>

								<?php $item_count++; ?>
						
								<div class="m-all t-all d-1of3 cf teamMemberProfile">
									<div class="content">
										<div class="imgMask">
											<img src="<?php the_sub_field('about_team_member_photo'); ?>" alt="<?php the_sub_field('about_team_member_name'); ?>">
										</div>
										<div class="teamName"><?php the_sub_field('about_team_member_name'); ?></div>
										<div class="teamTitle"><?php the_sub_field('about_team_member_title'); ?></div>
										<div class="teamBio"><?php the_sub_field('about_team_member_bio'); ?></div>
										<div class="bioAll">
											<?php the_sub_field('about_team_member_bio-full'); ?>
										</div>
										<a href="#" class="gray-button fullBioBttn"><span>Full Bio</span> <i class="fa fa-chevron-circle-right"></i></a>
									</div>
								</div> <!-- /end item -->

								<?php if ( ( $item_count == 3 ) ) : $item_count = 0; ?>
									</div> <!-- end section -->
								<?php endif; ?>
						
							<?php endwhile; ?>
						<?php endif; ?>
					</div>

				</div><!-- Our Team section --> 
				

				<div id="aboutCareers" class="section about-careers cf section-1"><!-- Careers Section --> 

					<div class="sectionHeading"> <!--has the same backgound color as the first "section-1" -->
						<h2><?php the_field('about_careers_title_text'); ?></h2>
						<div class="hr"></div>
					</div>
					<div class="cf bgImageInside" style="background-image: url(<?php the_field('about_careers_background_image'); ?>); background-position:right top; backgound-repeat:no-repeat; background-size:cover;"> <!-- Contains bg image -->
						<div class="m-all t-1of2 d-1of2">
							<?php the_field('about_careers_text'); ?>
						</div>
					</div>

				</div><!-- Careers section --> 
				

				<div class="section about-testimonials cf section-2"><!-- Testimonial Section --> 

					<div class="sectionHeading"> <!--has the same backgound color as the first "section-1" -->
						<h2><?php the_field('about_testimonial_header_text'); ?></h2>
					</div>
					<div class="cf">
						<?php if( have_rows('about_testimonial_grid') ): ?>
							<?php while( have_rows('about_testimonial_grid') ): the_row(); ?>
						
								<div class="m-all t-all d-1of3 testimonialWrapper">
									<div class="content">
										<div class="customerName"><?php the_sub_field('about_testimonial_customer_name'); ?></div>
										<div class="customeritle"><?php the_sub_field('about_testimonial_company_title'); ?></div>
										<div class="customerTestimonial"><p><?php the_sub_field('about_testimonial_text'); ?></p></div>
									</div>
								</div> <!-- /end item -->
						
							<?php endwhile; ?>
						<?php endif; ?>
					</div>

				</div><!-- Testimonial section --> 
				

				<?php if( get_field('about_mission_values_image') ): ?>
				<div class="section about-company cf section-3"><!-- Company Section --> 
					<div class="m-all t-1of2 d-1of2">
						<img src="<?php the_field('about_mission_values_image'); ?>" class="imgShadow">
					</div>
					<div class="m-all t-1of2 d-1of2">
						<?php the_field('about_mission_values_text'); ?>
					</div>
				</div><!-- Company section -->
				<?php endif; ?>
				

				<div id="aboutAwards" class="section about-awards cf"><!-- Awards Section --> 

					<div class="sectionHeading">
						<h2><?php the_field('about_awards_title_text'); ?></h2>
					</div>
					<div class="cf">
						<?php if( have_rows('about_award_text_grid') ): ?>
							<?php $item_count = 0; ?>

							<?php while( have_rows('about_award_text_grid') ): the_row(); ?>
						
								<?php if ( ( $item_count == 0 ) ) : ?>
									<div class="row cf">
								<?php endif; ?>
									<?php $item_count++; ?>
									<div class="m-all t-all d-1of3 cf">
										<div class="content">
											<div class="hr"></div>
											<?php the_sub_field('about_award_text'); ?>
										</div>
									</div> <!-- /end item -->
						
								<?php if ( ( $item_count == 3 ) ) : $item_count = 0; ?>
									</div> <!-- end section -->
								<?php endif; ?>

							<?php endwhile; ?>
						<?php endif; ?>
					</div>
					<div class="cf awardImages">
						<?php if( have_rows('about_award_image_grid') ): ?>
							<?php while( have_rows('about_award_image_grid') ): the_row(); ?>
						
								<div class="m-1of2 t-1of3 d-1of6 cf">
									<img src="<?php the_sub_field('about_award_image'); ?>" alt="<?php the_sub_field('about_award_image_name'); ?>">
								</div> <!-- /end item -->
						
							<?php endwhile; ?>
						<?php endif; ?>
					</div>

				</div><!-- Awards section --> 
				

			</article>
		</div>
	</div>
</div>

<?php get_footer(); ?>
















































