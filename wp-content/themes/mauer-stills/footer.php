<?php
/*
 * The Footer
 */
?>

	<?php if (is_singular('project') && function_exists('get_field') && get_field('show_other_projects', 'option')): ?>
		<div class="section section-other-projects">
			<?php get_template_part("content", "other_projects"); ?>
		</div>
	<?php endif ?>


	<div id="footer">
		<?php if (get_post_type() == 'post' || is_search()) {get_template_part("content", "widgetized_area");} ?>

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12">
					<div class="footer-content">
						<div class="footer-copyright"><?php echo wp_kses_post(mauer_stills_copyright_text()); ?></div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<?php wp_footer(); ?>

</body>
</html>