<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no front-page.php file exists.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Style_Symfony
 */
get_header();

?>
    <main id="primary"
          class="site-main">
<?php

function separate_title( $title, $words_until_separation ) {
	$words       = explode( " ", $title );
	$first_part  = [];
	$second_part = [];
	foreach ( $words as $idx => $word ) {
		if ( $idx < $words_until_separation ) {
			$first_part[] = $word;
		} else {
			$second_part[] = $word;
		}
	}
	$first_part  = join( " ", $first_part );
	$second_part = join( " ", $second_part );

	return [ $first_part, $second_part ];
}

if ( have_posts() ): while ( have_posts() ): the_post();
	?>

	<?php
	get_template_part( 'template-parts/front-page' );
	?>

<?php
endwhile;
endif;
?>
    </main><!-- #main -->
<?php
get_footer();
