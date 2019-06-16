<?php
/*
* The template for displaying Blog Posts index page
*/
get_header(); ?>

<div class="section-main-content">
	<div class="container-fluid mauer-container-fluid-with-max-width">
		<?php

			if (!is_search()) {
				$layout = mauer_stills_get_blog_layout_setting();
				// these two layouts are extemely similar, so, in the spirit of DRY, both are handled by the same template part
				if ($layout == 'flow_2cols' || $layout == 'grid_2cols') {$template_particle = '2cols';} else {$template_particle = $layout;}
			}
			else {
				// for usability reasons we want the search results to always appear as a list
				$template_particle = 'list';
			}

			get_template_part("content", "blog_" . $template_particle);
		?>
	</div>
</div><!-- /.section-main-content -->

<?php get_footer();?>