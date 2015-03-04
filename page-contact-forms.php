<?php
/*
Template Name: Contact Form Pages
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
					<div class="page-title">Contact Us</div>
				</header>


				<div class="m-all t-all d-all contact-container">
				
					<div class="m-all t-2of3 d-2of3 cf">
					
						<div class="m-all t-all d-all cf">
							<div class="form-content-area">
								<div class="form-title"><img src="<?php the_field('form_page_title_image'); ?>"> <?php the_field('form_title'); ?></div>
								<?php the_field('form_content'); ?>
							</div>	
						</div>
						
					<?php if( have_rows('form_features') ): ?>
							<?php while( have_rows('form_features') ): the_row(); 
								// vars
								$form_feature_icon = get_sub_field('form_feature_icon');
								$form_feature_content = get_sub_field('form_feature_content');
							?>
							<div class="form-features">
								<?php if( get_field('form_feature_icon') ): ?>
									<img src="<?php echo $form_feature_icon; ?>">
								<?php endif; ?>	
								<div><?php echo $form_feature_content; ?></div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>


					</div>

					<div class="m-all t-1of3 d-1of3 cf">
						<div class="top-borders">
							<h5><?php the_field('above_form_headline'); ?></h5>
						</div>
						
						<p><?php the_field('above_form_text'); ?></p>
						<?php the_field('contact_form'); ?>
						
					</div>
				</div>
	
			</article>
		</div>
	</div>
</div>

<?php get_footer(); ?>