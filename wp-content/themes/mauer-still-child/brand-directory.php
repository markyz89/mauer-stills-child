<?php

// Template Name: Brand Directory

get_header();

?>

<div class="section-main-content">
	<div class="container-fluid mauer-container-fluid-with-max-width mauer-container-fluid-with-max-width-wider">
		<div class="row">
			<div class="col-xs-12">

<?php


$tags = get_tags();



// Create an array of only the tag names

$tagnames = array();

foreach ($tags as $tag) {

	$tagnames[] = $tag->name;

}



// This loop outputs to the page
// The first loop determines the letter heading


foreach ($tagnames as $tagname) {


	$firstChar = $tagname[0]; 

	if ($firstChar != $lastChar) {
		echo '<br><h1>'.$firstChar.'</h1><br>';


		// this loop outputs the brand link, name and count.
	
		?> <div class="columns"> <?php 
		foreach ($tags as $tag) {
			 if ($tag->name[0] == $firstChar) {
			 	
			 		?> <a href="<?php echo home_url().'/tag/'.$tag->name ?>">

			 			<?php echo '<li class="brand-details"><p>'.$tag->name.'</p><p>'.$tag->count.'</p></li>';

			 			?> </a> <?php 
			 }
		}
		?> 	</div>
				
		<?php

 
	}

	$lastChar = $firstChar;



}





?>

			</div>
		</div>
	</div>
</div>

<?php

get_footer();

?>
