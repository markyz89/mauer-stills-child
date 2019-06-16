<?php
/*
 * Project content
 */
?>

<?php if ( have_posts() ) : ?>

	<?php  while ( have_posts() ) : the_post(); ?>

		<div <?php post_class('entry-full no-post-thumbnail-output'); ?>>

			<div class="row">
				<?php
					$display_meta = true;
					if (function_exists('get_field') && !get_field('show_portfolio_categories_in_single_projects', 'option')) {$display_meta = false;}
				?>
				<!-- edited layout to 1/3 -->
				<div class="col-sm-4 col-md-4">
					<h1 class="entry-title left-align <?php if(!$display_meta) {echo " entry-title-without-meta";} ?>"><?php the_title(); ?></h1>
					<p class="brand-collaborators"><strong>Collaborators</strong></p>
					<?php $brands = get_the_tags(); ?>
					<p class="brand-tags"><?php 
						$count = 0;
						foreach ($brands as $brand) {
							//print_r($brand);

						if ($count < sizeof($brands)-1) {
							
							?>
							<a href="<?php echo home_url() .'/tag/'. $brand->slug; ?>"><?php echo $brand->name.', '; ?></a>
							<?php 
							$count += 1;	
						}	else { ?>
							<a href="<?php echo home_url() .'/tag/'. $brand->slug; ?>"><?php echo $brand->name; ?></a>
							<?php
						}							
						
					} ?></p>

					<!-- Box containing links to various links about artist -->
					<div class="artist-details">
						<?php $artist = get_field('artist_details');
						 ?>
						<?php if ($artist['online']) {
							?>
							<a href="<?php echo $artist['online']?>" target="_blank">Online</a>  <i class="fas fa-external-link-alt"></i><br> <?php
						} ?>

						<?php if ($artist['representation']) {
							?>
							<a href="<?php echo $artist['representation']?>" target="_blank">Representation</a>  <i class="fas fa-external-link-alt"></i><br> <?php
						} ?>

						<?php if ($artist['representation']) {
							?>
							<a href="<?php echo $artist['instagram']?>" target="_blank">Instagram</a>   <i class="fas fa-external-link-alt"></i><?php
						} ?>
						
						
						
						
					</div>


					<?php if ($display_meta): ?>
						<div class="entry-meta">
							<span class="entry-cats"><?php echo mauer_stills_get_the_term_list(get_the_ID(), 'project_cat', ', '); ?></span>
						</div>
					<?php endif ?>
				</div>

				<!-- Layout now changed to 2/3 -->
				<div class="col-sm-8 col-md-8 col-lg-8">

					<div class="entry-content">
						<?php  
						// replacing editor content with more intuitive custom fields 
						$useCustomFields = get_field('enable_fields');

						if ( !$useCustomFields) {
							the_content(); 
							}
						?>
						<!-- ACF repeater field  -->
						<?php 

						if ( $useCustomFields):

							// check if the repeater field has rows of data
							if( have_rows('work_section') ):

							 	// loop through the rows of data
							    while ( have_rows('work_section') ) : the_row();
							    
							    	// outputting the brand name, which is a tag

							    	$brandID = get_sub_field('brand');
							    	 
							    	$brands = get_the_tags();

							    	

							    	foreach ($brands as $brand) {
							    		
							    		// print_r($brand);
							    		$id = $brand->term_id;
							    		if ($id == $brandID) {
							    			$name = $brand->name;
						    			?>

						    			<div class="brand-header">
						    				<a href="<?php echo home_url()."/tag/".$name ?>">
					    						<p> <?php echo $name; ?></p>
							    			</a>
							    			<p>	<?php echo $brand->count; ?></p>
						    			</div>
					    				
						    			<?php
							    			
							    		}
							    	}

							    	the_sub_field('new_editor');

							        

							    endwhile;

							else :

							    // no rows found

							endif;

						endif;

						?>
					</div> 

					

					<?php wp_link_pages(mauer_stills_wp_link_pages_parameters()); ?>
					<?php comments_template(); ?>

				</div>

			</div>


		</div><!-- /.entry-full -->

	<?php endwhile; ?>

<?php else: ?>
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
			<p class="text-center"><?php esc_html_e('Sorry, no posts matched your criteria', 'mauer-stills'); ?></p>
		</div>
	</div>
<?php endif; ?>