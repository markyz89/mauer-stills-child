<?php
/*
 * The Header
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="mauer-preloader">
	<div class="mauer-spinner"></div>
</div>

<div class="search-popup">
	<div class="container-fluid mauer-container-fluid-with-max-width">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
	<a href="#" class="mauer-close search-popup-closer"></a>
</div>

<div class="section section-header">

	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">

				<div class="menu-stripe-wrapper">

					<nav class="navbar navbar-default navbar-static-top mauer-navbar">

						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
								<span class="sr-only"><?php echo esc_html__('Toggle navigation', 'mauer-stills'); ?></span>
								<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
							</button>
							<a href="<?php echo esc_url(home_url('/')); ?>" class="logo-link" title="<?php bloginfo('name'); ?>">
								<?php mauer_stills_display_header_logo(); ?>
							</a>
						</div>

						<div id="navbar" class="navbar-collapse collapse">
							<div class="mauer-header-right navbar-right">
								<?php mauer_stills_wp_nav_menu(); ?>
							</div>

							<?php if (function_exists('get_field') && (get_field('search_icon_in_header','option') || get_field('social_links', 'option'))): ?>
								<div class="icon-links-in-navbar-wrapper">
									<span class="icon-links-in-navbar">
										<?php mauer_stills_display_social_buttons(); ?>
										<?php if ((function_exists('get_field') && get_field('search_icon_in_header','option')) || !function_exists('get_field')): ?>
											<a href="#" class="header-search-icon-link search-popup-opener"><i class="fa fa-search" aria-hidden="true"></i></a>
										<?php endif ?>
									</span>
								</div>
							<?php endif ?>

						</div>

					</nav>
					<div class="clearfix"></div>

				</div>

			</div>
		</div>
	</div>

</div>