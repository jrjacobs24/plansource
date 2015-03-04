<?php
/*
Template Name: Contact Landing Page
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
<div id="content" class="contact-page">
	<div id="inner-content" class="wrap cf">
		<div id="main" class="m-all t-all d-all cf" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="pinned article-header cf">
					<div class="page-title">Contact</div>
				</header>

				<div class="lower-page-banner gradient cf" style="background-image: url(<?php the_field('contact_banner_image'); ?>); background-position:center center; backgound-repeat:no-repeat; background-size:cover;"><!-- Banner area -->
					<div class="headline-text"><?php the_field('contact_landing_banner_text'); ?></div>
				</div>

				<div class="m-all t-all d-all contact-container">
					
					<div class="m-all t-all d-1of4 cf">
						<div class="top-borders"><h5><?php the_field('contact_landing_column1_title'); ?></h5></div>
						<div class="m-all t-all d-all cf">
							<?php the_field('contact_landing_column1'); ?>
						</div>					
					</div>
					
					<div class="m-all t-all d-1of2 cf">
						<div class="top-borders"><h5><?php the_field('contact_landing_column2_title'); ?></h5></div>
						<div class="m-all t-all d-1of2 cf">
							<?php the_field('contact_landing_column2'); ?>
						</div>
						<div class="m-all t-all d-1of2 cf">
							<?php the_field('contact_landing_column3'); ?>
						</div>
					</div>

					<div class="m-all t-1of4 d-1of4 cf">
						<?php if( get_field('contact_landing_column4_title') ): ?>
							<div class="top-borders"><h5><?php the_field('contact_landing_column4_title'); ?></h5></div>
						<?php endif; ?>	
						<div class="m-all t-all d-all cf">
							<?php the_field('contact_landing_column4'); ?>
							<h5 class="inquiries-header">PRODUCT INQUIRIES</h5>
							
	
						<?php if( have_rows('form_link_list') ): ?>
							<ul class="form-links">

							<?php while( have_rows('form_link_list') ): the_row(); 
								// vars
								$form_link_location = get_sub_field('form_link_location');
								$form_link_image = get_sub_field('form_link_image');
								$form_link_image_alt = get_sub_field('form_link_image_alt');
							?>
							
								<li><a href="<?php echo $form_link_location; ?>"><img src="<?php echo $form_link_image; ?>" alt="<?php echo $form_link_image_alt; ?>"> <span class="yellow"><i class="fa fa-chevron-circle-right"></i></span></a></li>
							
							<?php endwhile; ?>
					
						</ul>
					<?php endif; ?>


						</div>
					</div>



				</div>
			


			</article>
		</div>
	</div>
</div>

<?php get_footer(); ?>
