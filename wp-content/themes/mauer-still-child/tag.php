<?php get_header() ?>


<div class="container-fluid mauer-container-fluid-with-max-width mauer-container-fluid-with-max-width-wider">
		<div class="row">
			<div class="col-xs-12">

				<div class="tag-details">
					<h1>
						<?php single_tag_title(); ?>
					</h1>

					<div class="tag-custom-fields">
						<p><strong>Online</strong></p>
						<a href="<?php the_field('online') ?>" target="_blank"><?php the_field('online'); ?></p>
						<br>
						<p><strong>Location</strong></p>
						<p><?php the_field('location'); ?></p>
					</div>
					
				</div>

				<!-- WP Query copied from portfolio page and edited to only include tag of brand page.
				Also commented out posts per page limitation. Uncomment to limit to number entered in theme options -->

				<?php

				$tag = get_queried_object_id();

					// $paged = 1;
					// if (get_query_var('paged')) {$paged = get_query_var('paged');}
					// if (get_query_var('page')) {$paged = get_query_var('page');}
					$args = array(
						'post_type' => 'project',
						'tag_id' => $tag
						// 'paged' => $paged,
					);
					// $args['posts_per_page'] = mauer_stills_get_project_posts_per_page();

					global $wp_query;
					query_posts($args);

					set_query_var('on_tag_page', true);
					get_template_part("content", "projects_" . mauer_stills_get_portfolio_layout_setting());
					wp_reset_query();
				?>

			</div>
		</div>	
</div>



<?php get_footer() ?>