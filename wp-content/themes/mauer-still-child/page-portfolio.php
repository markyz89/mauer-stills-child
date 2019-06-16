<?php
/*
* Template Name: Portfolio
* Description: Template for displaying a page with the projects archive.
*/


get_header(); ?>

<div class="section-main-content">

	<div class="container-fluid mauer-container-fluid-with-max-width mauer-container-fluid-with-max-width-wider">
		<div class="row">
			<div class="col-xs-12">

				<div class="row">
					<div class="col-xs-12 col-md-9 col-lg-7">
						<?php if (function_exists('get_field') && get_field('portfolio_welcome_phrase', 'option')): ?>
							<div class="portfolio-welcome-phrase no-auto-hyphenation"><?php echo get_field('portfolio_welcome_phrase', 'option'); ?></div>
						<?php endif ?>
					</div>
				</div>

				<?php 
				// Removed theme default behaviour to show categories

				// mauer_stills_display_portfolio_categories_menu(); ?>

				<div id="sort-options">
					<div id="sort">
						<button>Sort</button>
						<i class="fas fa-plus-circle show"></i>
						<i class="fas fa-minus-circle hide"></i> <!-- Icons that look more like design available as premium at fontawesome -->
					</div>
					
					<div id="hidden-sort-options" class="hide">
						<a href="<?php echo home_url()."?sort=date"?>">Recent</a>
							<a href="?sort=title">A-Z</a>

					</div>
				</div>
				


				<?php

				$sort= $_GET['sort'];
					if($sort == "title")
						{
							$order = "title";
							$ascordesc = "ASC";
						}
					if($sort == "date")
						{
							$order= "date";
							$ascordesc = "DESC";
						}

						$paged = 1;
						if (get_query_var('paged')) {$paged = get_query_var('paged');}
						if (get_query_var('page')) {$paged = get_query_var('page');}
						$args = array(
							'post_type' => 'project',
							'paged' => $paged,
							'orderby' => $order,
							'order' => $ascordesc
						);
						$args['posts_per_page'] = mauer_stills_get_project_posts_per_page();

						$sort = get_query_var('orderby');
						
						// if ($sort) {
						// 	echo "SORT IS TRUE";
						// 	$args['orderby'] = $order;
						// 	$args['order'] = 'ASC';
						// 	$args['post_type'] = 'project';
						// }

						global $wp_query;
						query_posts($args);

						get_template_part("content", "projects_" . mauer_stills_get_portfolio_layout_setting());
					

					wp_reset_query();	
						

				?>

			</div>
		</div>
	</div>

</div><!-- /.section-main-content -->

<?php get_footer();?>