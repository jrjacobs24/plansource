<?php
/*
Template Name: Products Lower Page
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
<div id="content" class="products-page">
	<div id="inner-content" class="wrap cf">
		<div id="main" class="m-all t-all d-all cf" role="main">

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				<header class="pinned article-header cf">
					<div class="page-title">
					<?php if( get_field('pl_page_title_image') ): ?>
					<div class="title-image"><img src="<?php the_field('pl_page_title_image'); ?>"></div>
					<?php endif; ?> 
					 <?php the_field('pl_page_title_text'); ?></div>
					
					<ul class="header-ctas">
						<?php if( get_field('pl_pinned_nav_cta_1_text') ): ?>
							<li class="cta-1"><a class="modal-video" href="<?php the_field('pl_pinned_nav_cta_1_link'); ?>"><span class="text"><?php the_field('pl_pinned_nav_cta_1_text'); ?></span> <span class="icon"><?php the_field('pl_pinned_nav_cta_1_icon'); ?></span></a></li>
						<?php endif; ?> 
						<?php if( get_field('pl_pinned_nav_cta_2_text') ): ?>
						<li class="cta-2"><a href="<?php the_field('pl_pinned_nav_cta_2_link'); ?>" target="_blank"><span class="text"><?php the_field('pl_pinned_nav_cta_2_text'); ?></span> <span class="icon"><?php the_field('pl_pinned_nav_cta_2_icon'); ?></span></a></li>
						<?php endif; ?> 
					</ul>
				</header>
				<div class="lower-page-banner gradient cf" style="background-image: url(<?php the_field('products_banner_image'); ?>); background-position:center center; backgound-repeat:no-repeat; background-size:cover;"><!-- Banner area -->
					<div class="headline-text"><?php the_field('pl_products_banner_text'); ?></div>
					<div class="headline-link">
						<p><?php the_field('pl_products_banner_cta'); ?></p>
					</div>
				</div>







				<div class="products-overview cf"><!-- Starts Products Overview Area -->
					<h1><?php the_field('pl_overview_headline'); ?></h1>
					<div class="m-all t-all d-all cf">

						<div class="m-all t-1of2 d-1of2 cf">
							<?php if( get_field('pl_overview_left_icon') ): ?>
							<div class="overview-icon"><img src="<?php the_field('pl_overview_left_icon'); ?>" alt="<?php the_field('pl_overview_left_alt'); ?>" /></div>
							<?php endif; ?>
							<h2 class="left"><?php the_field('pl_overview_left_headline'); ?></h2>
							<p class="overview-left-content"><?php the_field('pl_overview_left_content'); ?></p>
						</div>


						<div class="m-all t-1of2 d-1of2 cf">
						
						<!-- This needs to have video or image modal functionallity -->

							<span class="images-area <?php // echo $image_type; ?>"> 
								<?php // if ($modal_window) { echo '<a class="modal-image" href="' . $modal_image . '">'; } ?>
								<img src="<?php the_field('pl_overview_right_image'); ?>" alt="<?php the_field('pl_overview_right_image'); ?>" width="100%" />
								<?php // if ($modal_window) { echo '</a>'; } ?>
							</span>
						</div>
				
					</div>
				</div><!-- Ends Products Overview Area -->







				<div class="key-benefits cf"><!-- Benefits Sections --> 

					<div class="m-all t-all d-all fifty section-1"> <!--has the same backgound color as the first "section-1" -->
						<div class="m-all t-all d-all cf"> 
						<?php if( get_field('benefits_list_icon') ): ?>
							<div class="benefits-icon"><img src="<?php the_field('benefits_list_icon'); ?>" alt="<?php the_field('benefits_list_icon_alt'); ?>" /></div>
						<?php endif; ?>	
							<h2><?php the_field('benefits_list_headline'); ?></h2>
						</div>
					</div>


					<?php if( have_rows('key_benefit_items') ): ?>
						<?php $item_count = 0; $section_count = 1; ?>
						<?php while( have_rows('key_benefit_items') ): the_row(); ?>
					
							<?php if ( ( $item_count == 0 ) ) : ?>
								<div class="m-all t-all d-all fifty section-<?php echo $section_count; ?>"> <!--has the same backgound color as the first "section-1" -->
							<?php endif; ?>
								<?php $item_count++; ?>
								<div class="m-all t-1of2 d-1of4 benifits-sections cf">
									<div class="hr"></div>
									<h5><?php the_sub_field('benefit_title'); ?></h5>
									<p><?php the_sub_field('benefit_details'); ?></p>
								</div> <!-- /end item -->
							<?php if ( ( $item_count == 4 ) ) : $section_count++; $item_count = 0; ?>
								</div> <!-- end section -->
							<?php endif; ?>

						<?php endwhile; ?>
						<?php if ( ( $item_count != 0 ) ): ?>
							</div> <!-- end section -->
						<?php endif; ?>
					<?php endif; ?> 


					<?php $section_num = 0;
						if( have_rows('benefits_list') ): ?>

							<?php while( have_rows('benefits_list') ): the_row(); 
								// vars
								$benefits_list_headline = get_sub_field('benefits_list_headline'); // this is the h2
								$benefits_list_item = get_sub_field('benefits_list_item');  
								$benefits_list_item_content = get_sub_field('benefits_list_item_content');

								$section_num++; // count sections for section-XX class
							?>
							
							<div class="m-all t-all d-all fifty section-<?php echo $section_num; ?>">
								<div class="m-all t-1of2 d-1of4 cf"> 
									<div class="hr"></div>
									<h5><?php echo $benefits_list_item; ?></h5>
									<p><?php echo $benefits_list_item_content; ?></p>
								</div>
							</div>

							<?php endwhile; ?>
					<?php endif; ?>

				</div><!-- benefits sections --> 
				

				<?php if( have_rows('pl_related_article') ): ?>

					<div class="three-callouts cf">
						<?php $x=1; while( have_rows('pl_related_article') ): the_row();   // $x=1; counts the number of these that are added 

							$last = count(get_field('pl_related_article')); // gets the total number of these divs that were added

							$pl_related_article_source = get_sub_field('pl_related_article_source');
							$pl_related_article_title = get_sub_field('pl_related_article_title');
							$pl_related_article_content = get_sub_field('pl_related_article_content');
							$pl_related_article_linked_text = get_sub_field('pl_related_article_linked_text');
							$pl_related_article_link = get_sub_field('pl_related_article_link');
							?>

						<?php if($x==$last) { $lastly = ' last'; } else { $lastly = ''; } ?> <!-- If it's the last instance add a class of last -->

						<div class="m-all t-1of3 d-1of3 cf row<?php echo $lastly ?>"> <!-- adds the class of .last here -->
							<span class="source"><?php echo $pl_related_article_source; ?></span>
							<h4><?php echo $pl_related_article_title; ?></h4>
							<p><?php echo $pl_related_article_content; ?></p>
							<p><a href="<?php echo $pl_related_article_link; ?>"><?php echo $pl_related_article_linked_text; ?> <i class="fa fa-chevron-right smaller"></i></a></p> 
						</div>

						<?php $x++; endwhile; ?>

					</div><!--  three-callouts  -->
				<?php endif; ?>

			</article>
		</div>
	</div>
</div>

<?php get_footer(); ?>
