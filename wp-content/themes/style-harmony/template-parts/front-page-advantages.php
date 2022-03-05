<?php
$settings = $args['settings'];
$advantages = get_posts(
	[
		'numberposts'      => $settings['advantages_amount'],
		'post_type'        => 'advantage',
		'suppress_filters' => true,
		'order'            => 'ASC',
		'meta_key'         => 'sort',
		'orderby'          => 'meta_value',
	]
);
function print_icon() {
	$selected_icon = get_field( 'selected_icon' );
	$icon          = '';
	$type          = '';
	switch ( $selected_icon ) {
		case strpos( $selected_icon, 'bigmug' ):
			$icon = get_field( 'bigmug' );
			$type = 'font';
			break;

		case strpos( $selected_icon, 'font-awesome' ):
			$icon = get_field( 'font-awesome' );
			$type = 'font';
			break;

		case strpos( $selected_icon, 'file' ):
			$type = 'file';
			$icon = get_field( 'file' );
			break;
	}

	if ( $type === 'font' ) {
		$icon_color     = get_field( 'icon_color' );
		$icon_font_size = get_field( 'icon_size' );

		$use_icon_color     = ! empty( $icon_color );
		$use_icon_font_size = ! empty( $icon_font_size );

		$icon_color_style     = $use_icon_color ? "--my-icon-color:"
		                                          . $icon_color . ";"
			: "";
		$icon_font_size_style = $use_icon_font_size
			? "--my-icon-font-size: " . $icon_font_size . "px;" : "";

		$use_style = $use_icon_color || $use_icon_font_size;
		$style     = $use_style ? "style='" . $icon_color_style
		                          . $icon_font_size_style . "'" : '';

		echo "<div class='advantages-icon "
		     . ( $use_icon_color ? "a-i-color" : "" )
		     . ( $use_icon_font_size ? "a-i-color" : "" )
		     . "'" . $style . ">" . $icon . "</div>";
	}

	if ( $type === 'file' ) {
		$url  = $icon['url'];
		$size = get_field( 'icon_size' );

		echo '<img width="' . $size . '" height="' . $size
		     . '" class="box-icon-ruby-icon" src="' . esc_html( $url )
		     . '"/>';
	}
}

if ( count( $advantages ) > 0 ):
	?>

    <section class="section section-sm bg-default"
             id="advantages">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp"
                 data-wow-delay="0s">
              <h6 class="title-decoration-lines-content"><?php
	              echo $settings['advantages_title'] ?></h6>
            </div>
          </div>
        <div class="container"
             style="padding-top: 60px">
          <div class="row row-30 justify-content-center">
              <?php

              foreach ( $advantages as $index => $post ):
	              setup_postdata( $post );


	              ?>
                  <div class="col-sm-6 col-lg-4 wow fadeInRight"
                       data-wow-delay="0s">
                      <article class="box-icon-ruby">
                        <div class="unit box-icon-ruby-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                          <div class="unit-left">
	                          <?php
	                          print_icon(); ?>
                          </div>
                          <div class="unit-body">
                            <h5 class="box-icon-ruby-title"><a href="#"><?php
		                            the_title() ?></a></h5>
                            <p class="box-icon-ruby-text"><?php
	                            the_content(); ?></p>
                          </div>
                        </div>
                      </article>
                    </div>

	              <?php

	              wp_reset_postdata();
              endforeach;
              ?>
          </div>
        </div>

        </div>
      </section>
    <!-- Icons Ruby-->
<?php
endif; ?>