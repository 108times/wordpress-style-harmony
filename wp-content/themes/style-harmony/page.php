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

function console_log( $value, $jsonify = false ) {
	$string = '`' . $value . '`';
	if ( $jsonify ) {
		$value  = ( json_encode( $value ) );
		$string = 'JSON.parse(`' . $value . '`)';
	}
	echo '<script>console.log(' . $string . ')</script>';
}

function separate_title( $title, $words_until_separation ) {
	$words       = explode( " ", $title );
	$first_part  = array();
	$second_part = array();
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

	/**
	 * Настройки главной страницы
	 */
	$page_settings = new WP_Query( array(
		                               'post_type'  => 'pages_settings',
		                               'meta_query' => [
			                               [
				                               'meta_key'   => 'ID',
				                               'meta_value' => '79'
			                               ]
		                               ]
	                               ) );

	$settings = NULL;
	while ( $page_settings->have_posts() ) :
		$page_settings->the_post();
		$settings = get_fields();
	endwhile;
	wp_reset_postdata();

	console_log( $settings, true );
	?>

    <!-- Слайдер -->
	<?php if ( $settings[ 'show_slider' ] === 'Да' ):
		// параметры по умолчанию
		$slides = get_posts( array(
			                     'numberposts' => $settings[ 'slider_limit' ],
			                     'post_type'   => 'slider',
			                     'category_id' => '5',
			                     'order'       => 'ASC',
			                     'meta_key'    => 'sort',
			                     'orderby'     => 'meta_value'
		                     ) );

		if ( count( $slides ) > 0 ):
			?>
            <section class="section swiper-container swiper-slider swiper-slider-modern"
                     id="home"
                     data-loop="true"
                     data-autoplay="5000"
                     data-simulate-touch="true"
                     data-nav="true"
                     data-slide-effect="fade"
                     data-type="anchor">
    <div class="swiper-wrapper text-left">

        <?php
        foreach ( $slides as $index => $post ) :
	        setup_postdata( $post );
	        ?>

            <div class="swiper-slide"
                 data-slide-bg="<?php echo get_the_post_thumbnail_url() ?>"

            >
        <div class="swiper-slide-caption">
          <div class="container">
            <div class="row">
              <div class="col-11 col-sm-8 col-md-7 col-lg-5 col-xxl-4">
                <div class="slider-modern-box">
                    <?php

                    $title                  = get_the_title();
                    $words_until_separation = get_field( 'words_until_separation' );
                    $separated_parts        = separate_title( $title, $words_until_separation );
                    $first_part             = $separated_parts[ 0 ];
                    $second_part            = $separated_parts[ 1 ];

                    ?>
                    <h2 class="oh slider-modern-title"><span data-caption-animate="slideInDown"
                                                             data-caption-delay="0"><?php echo $first_part ?>
                               </span><span data-caption-animate="slideInLeft"
                                            data-caption-delay="0"><?php echo $second_part ?></span></h2>
                  <p data-caption-animate="fadeInRight"
                     data-caption-delay="400"><?php the_content(); ?></p>
                  <div class="oh button-wrap"><a class="button button-default-outline-2 button-ujarak"
                                                 href="<?php the_field( 'link' ); ?>"
                                                 data-caption-animate="slideInUp"
                                                 data-caption-delay="400"><?php the_field( 'button_text' ); ?></a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


        <?php

        endforeach;

        wp_reset_postdata(); // сброс

        ?>
</div>
                <!-- Swiper Navigation-->
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
                <!-- Swiper Pagination-->
    <div class="swiper-pagination swiper-pagination-style-2"></div>
  </section>
            <!-- In the spotlight-->
		<?php endif; ?>
	<?php endif; ?>

<!-- Услуги -->
<?php if ( $settings[ 'show_services' ] === 'Да' ):
		// параметры по умолчанию
		$services = get_posts( array(
			                       'numberposts'      => $settings[ 'services_amount' ],
			                       'post_type'        => 'service',
			                       'suppress_filters' => true,
			                       'order'            => 'ASC',
			                       'meta_key'         => 'sort',
			                       'orderby'          => 'meta_value'
		                       ) );

		function print_stickers_section() {
			$sale    = get_field( 'sale' );
			$is_sale = ( ( $sale !== "" ) && ( $sale !== 0 ) && ( $sale !== '0' ) );
			if ( $is_sale ) {
				echo "<div class='box-sportlight-badge box-sportlight-sale'>-" . $sale . "%</div>";
			}

			$is_new = ( get_field( 'new' ) === 'Да' );
			if ( $is_new ) {
				echo "<div class='box-sportlight-badge box-sportlight-new' style='" . ( $is_sale ? 'top:80px' : '' ) . "'>Новинка</div>";
			}
		}

		if ( count( $services ) > 0 ):

			?>
            <section class="section section-sm section-first bg-default"
                     id="services"
                     data-type="anchor">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp"
                 data-wow-delay="0s">
              <h6 class="title-decoration-lines-content"><?php echo $settings[ 'services_title' ] ?></h6>
            </div>
          </div>
                <div class="row row-30 justify-content-center">

                    <?php
                    $point = 3;
                    foreach ( $services as $index => $post ) {
	                    setup_postdata( $post );
	                    if ( $index === 0 || ( $index % $point === 0 ) ):
		                    /**
		                     * place items in correct order
		                     */
		                    if ( ( $point % 4 ) === 0 ) {
			                    $point += 3;
		                    } else {
			                    if ( $index !== 0 ) {
				                    $point += 1;
			                    }
		                    }
		                    ?>
                            <div class="col-md-12 col-lg-8">
                              <div class="oh">
                                <!-- box Spotlight-->
                                <article class="box-sportlight wow slideInDown"
                                         data-wow-delay="0s"><a class="box-sportlight-figure"
                                                                href="<?php the_field( 'link' ) ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>"
                                                                                                         alt=""
                                                                                                         width="770"
                                                                                                         height="332"/></a>
                                  <div class="box-sportlight-caption">
                                    <h5 class="box-sportlight-title"><a href="<?php the_field( 'link' ) ?>"><?php the_title(); ?></a></h5>
                                    <div class="box-sportlight-arrow"></div>
                                  </div>
	                                <?php print_stickers_section(); ?>
                                </article>
                              </div>
                            </div>

	                    <?php
	                    else:
		                    ?>

                            <div class="col-sm-6 col-lg-4">
                          <div class="oh-desktop">
                            <!-- box Spotlight-->
                            <article class="box-sportlight box-sportlight-sm wow slideInRight"
                                     data-wow-delay=".1s">
                                <a class="box-sportlight-figure"
                                   href="<?php the_field( 'link' ) ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url() ?>"
                                         alt=""
                                         width="370"
                                         height="332"
                                    />
                                </a>
                              <div class="box-sportlight-caption">
                                <h5 class="box-sportlight-title"><a href="<?php the_field( 'link' ) ?>"><?php the_title(); ?></a></h5>
                                <div class="box-sportlight-arrow"></div>
                              </div>
	                            <?php print_stickers_section(); ?>

                            </article>
                          </div>
                        </div>


	                    <?php
	                    endif;
                    }

                    wp_reset_postdata(); // сброс

                    ?>


          </div>
        </div>
      </section>
            <!-- Trending products-->
		<?php endif ?>

	<?php endif ?>

<!-- Преимущества -->
<?php if ( $settings[ 'show_advantages' ] === 'Да' ):

		$advantages = get_posts( array(
			                         'numberposts'      => $settings[ 'advantages_amount' ],
			                         'post_type'        => 'advantage',
			                         'suppress_filters' => true,
			                         'order'            => 'ASC',
			                         'meta_key'         => 'sort',
			                         'orderby'          => 'meta_value'
		                         ) );
		function print_icon() {
			$selected_icon = get_field( 'selected_icon' );
			console_log( $selected_icon );
			$icon = '';
			$type = '';
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

				$icon_color_style     = $use_icon_color ? "--my-icon-color:" . $icon_color . ";" : "";
				$icon_font_size_style = $use_icon_font_size ? "--my-icon-font-size: " . $icon_font_size . "px;" : "";

				$use_style = $use_icon_color || $use_icon_font_size;
				$style     = $use_style ? "style='" . $icon_color_style . $icon_font_size_style . "'" : '';

				echo "<div class='advantages-icon "
				     . ( $use_icon_color ? "a-i-color" : "" )
				     . ( $use_icon_font_size ? "a-i-color" : "" )
				     . "'" . $style . ">" . $icon . "</div>";
			}

			if ( $type === 'file' ) {
				$url  = $icon[ 'url' ];
				$size = get_field( 'icon_size' );

				echo '<img width="' . $size . '" height="' . $size . '" class="box-icon-ruby-icon" src="' . esc_html( $url ) . '"/>';
			}
		}

		if ( count( $advantages ) > 0 ):
			?>

            <section class="section section-sm bg-default">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp"
                 data-wow-delay="0s">
              <h6 class="title-decoration-lines-content"><?php echo $settings[ 'advantages_title' ] ?></h6>
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
	                          <?php print_icon(); ?>
                          </div>
                          <div class="unit-body">
                            <h5 class="box-icon-ruby-title"><a href="#"><?php the_title() ?></a></h5>
                            <p class="box-icon-ruby-text"><?php the_content(); ?></p>
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
		<?php endif; ?>
	<?php endif; ?>

<!-- Преимущества -->
<?php if ( $settings[ 'show_banner_1' ] === 'Да' ):
		$banner = get_posts( array(
			                     'numberposts'      => 1,
			                     'post_type'        => 'banner',
			                     'suppress_filters' => true,
			                     'order'            => 'ASC',
			                     'meta_key'         => 'sort',
			                     'orderby'          => 'meta_value'
		                     ) );
		if (true /* count( $banner ) > 0 */ ):
			?>
            <section class="section section-sm bg-default text-md-center">
            <div class="parallax-container"
                 data-parallax-img="https://livedemo00.template-help.com/wt_prod-22310/images/bg-cta-2.jpg">
              <div class="parallax-content section-xl section-inset-custom-2 context-dark">
                <div class="container">
                  <div class="row justify-content-center">
                      <?php
                      foreach ( $banner as $index => $post ):
	                      setup_postdata( $post );

	                      $title                  = get_the_title();
	                      $words_until_separation = get_field( 'words_until_separation' );
	                      $separated_parts        = separate_title( $title, $words_until_separation );
	                      list( $first_part, $second_part ) = $separated_parts;
	                      ?>
                          <div class="col-md-7 col-lg-6">
                      <h3 class="oh font-weight-normal"><span class="d-inline-block wow slideInDown"
                                                              data-wow-delay="0s"><?php echo $first_part ?><br><?php echo $second_part ?></span></h3>
                      <p class="text-spacing-75 wow fadeInRight"
                         data-wow-delay=".1s"><?php the_content() ?></p>
                              <a class="button button-primary button-ujarak wow fadeInUp"
                                 href="#"
                                 data-wow-delay=".2s"><?php the_field( 'button_text' ); ?></a>
                    </div>
	                      <?php
	                      wp_reset_postdata();
                      endforeach;
                      ?>
                  </div>
                </div>
              </div>
            </div>
          </section>

		<?php endif; ?>
	<?php endif; ?>




    

    <section class="section section-sm bg-default"
             id="projects"
             data-type="anchor">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp"
                 data-wow-delay="0s">
              <h6 class="title-decoration-lines-content">Best flooring projects</h6>
            </div>
          </div>
          <div class="row row-30"
               data-lightgallery="group">
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInLeft"
                         data-wow-delay="0s">
                  <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-1-370x303.jpg"
                                                          alt=""
                                                          width="370"
                                                          height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                                                         href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-1-570x800-original.jpg"
                                                         data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-1-370x303.jpg"
                                                                                       alt=""
                                                                                       width="370"
                                                                                       height="303"/></a>
                    <h5 class="thumbnail-mary-title"><a href="#">Project #1</a></h5>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInUp"
                         data-wow-delay=".1s">
                  <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-2-370x303.jpg"
                                                          alt=""
                                                          width="370"
                                                          height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                                                         href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-2-530x800-original.jpg"
                                                         data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-2-370x303.jpg"
                                                                                       alt=""
                                                                                       width="370"
                                                                                       height="303"/></a>
                    <h5 class="thumbnail-mary-title"><a href="#">Project #2</a></h5>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInRight"
                         data-wow-delay=".0s">
                  <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-3-370x303.jpg"
                                                          alt=""
                                                          width="370"
                                                          height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                                                         href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-3-1200x800-original.jpg"
                                                         data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-3-370x303.jpg"
                                                                                       alt=""
                                                                                       width="370"
                                                                                       height="303"/></a>
                    <h5 class="thumbnail-mary-title"><a href="#">Project #3</a></h5>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInUp"
                         data-wow-delay=".1s">
                  <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-4-370x303.jpg"
                                                          alt=""
                                                          width="370"
                                                          height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                                                         href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-4-530x800-original.jpg"
                                                         data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-4-370x303.jpg"
                                                                                       alt=""
                                                                                       width="370"
                                                                                       height="303"/></a>
                    <h5 class="thumbnail-mary-title"><a href="#">Project #4</a></h5>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInLeft"
                         data-wow-delay="0s">
                  <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-5-370x303.jpg"
                                                          alt=""
                                                          width="370"
                                                          height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                                                         href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-5-1200x800-original.jpg"
                                                         data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-5-370x303.jpg"
                                                                                       alt=""
                                                                                       width="370"
                                                                                       height="303"/></a>
                    <h5 class="thumbnail-mary-title"><a href="#">Project #5</a></h5>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInDown"
                         data-wow-delay=".1s">
                  <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-6-370x303.jpg"
                                                          alt=""
                                                          width="370"
                                                          height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                                                         href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-6-1200x800-original.jpg"
                                                         data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-6-370x303.jpg"
                                                                                       alt=""
                                                                                       width="370"
                                                                                       height="303"/></a>
                    <h5 class="thumbnail-mary-title"><a href="#">Project #6</a></h5>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Section CTA-->























    

    <section class="section section-sm bg-default">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp"
                 data-wow-delay="0s">
              <h6 class="title-decoration-lines-content">About us</h6>
            </div>
          </div>
          <div class="row row-lg row-50 justify-content-center border-classic border-classic-2">
            <div class="col-sm-6 col-md-3 wow fadeInLeft"
                 data-wow-delay="0s">
              <div class="counter-creative">
                <div class="counter-creative-number"><span class="counter">12</span><span class="icon counter-creative-icon fl-bigmug-line-trophy55"></span>
                </div>
                <h6 class="counter-creative-title">Awards</h6>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInLeft"
                 data-wow-delay=".1s">
              <div class="counter-creative">
                <div class="counter-creative-number"><span class="counter">2</span><span class="symbol">k</span><span class="icon counter-creative-icon fl-bigmug-line-cube29"></span>
                </div>
                <h6 class="counter-creative-title">Projects</h6>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInLeft"
                 data-wow-delay=".2s">
              <div class="counter-creative">
                <div class="counter-creative-number"><span class="counter">679</span><span class="icon counter-creative-icon fl-bigmug-line-sun81"></span>
                </div>
                <h6 class="counter-creative-title">Happy clients</h6>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInLeft"
                 data-wow-delay=".3s">
              <div class="counter-creative">
                <div class="counter-creative-number"><span class="counter">25</span><span class="icon counter-creative-icon fl-bigmug-line-user143"></span>
                </div>
                <h6 class="counter-creative-title">Team members</h6>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- What people say-->





















    

    <section class="section section-sm bg-default"
             id="testimonials"
             data-type="anchor">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp"
                 data-wow-delay="0s">
              <h6 class="title-decoration-lines-content">What people say</h6>
            </div>
          </div>
            <!-- Owl Carousel-->
          <div class="owl-carousel owl-modern"
               data-items="1"
               data-stage-padding="15"
               data-margin="30"
               data-dots="true"
               data-animation-in="fadeIn"
               data-animation-out="fadeOut"
               data-autoplay="true">
            <!-- Quote Lisa-->
            <article class="quote-lisa">
              <div class="quote-lisa-body"><a class="quote-lisa-figure"
                                              href="#"><img class="img-circles"
                                                            src="https://livedemo00.template-help.com/wt_prod-22310/images/user-16-100x100.jpg"
                                                            alt=""
                                                            width="100"
                                                            height="100"/></a>
                <div class="quote-lisa-text">
                  <p class="q">I just wanted to say thank you and the team very much for the brilliant service around renovating the floors at our house. You were absolutely brilliant and we can see you’ve gone the extra mile matching the floors between rooms etc. You’ve kept the place really tidy too, cannot ask for more.</p>
                </div>
                <h5 class="quote-lisa-cite"><a href="#">Catherine Williams</a></h5>
                <p class="quote-lisa-status">Client</p>
              </div>
            </article>
            <!-- Quote Lisa-->
            <article class="quote-lisa">
              <div class="quote-lisa-body"><a class="quote-lisa-figure"
                                              href="#"><img class="img-circles"
                                                            src="https://livedemo00.template-help.com/wt_prod-22310/images/user-17-100x100.jpg"
                                                            alt=""
                                                            width="100"
                                                            height="100"/></a>
                <div class="quote-lisa-text">
                  <p class="q">Fantastic service from start to finish. After our ceiling collapsed we never thought our damaged floor would look so good again. These guys worked in a tight time frame and were very accommodating to the other trades working in the same area to produce brilliant results and restore our badly damaged floor to look like new!</p>
                </div>
                <h5 class="quote-lisa-cite"><a href="#">Rupert Wood</a></h5>
                <p class="quote-lisa-status">Client</p>
              </div>
            </article>
            <!-- Quote Lisa-->
            <article class="quote-lisa">
              <div class="quote-lisa-body"><a class="quote-lisa-figure"
                                              href="#"><img class="img-circles"
                                                            src="https://livedemo00.template-help.com/wt_prod-22310/images/user-18-100x100.jpg"
                                                            alt=""
                                                            width="100"
                                                            height="100"/></a>
                <div class="quote-lisa-text">
                  <p class="q">The floor looks magnificent and the parquet in the hall sets it off beautifully. Your men were excellent, you were delightful and nothing was too much trouble for you. You have very tidy workers, covering everything, and the house was left in a good shape as the condition allowed.</p>
                </div>
                <h5 class="quote-lisa-cite"><a href="#">Sam Brown</a></h5>
                <p class="quote-lisa-status">Client</p>
              </div>
            </article>
          </div>
        </div>
      </section>
      <!-- Team of professionals-->





















    

    <section class="section section-sm bg-default"
             id="team"
             data-type="anchor">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp"
                 data-wow-delay="0s">
              <h6 class="title-decoration-lines-content">Team of professionals</h6>
            </div>
          </div>
          <div class="row row-30">
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInRight"
                 data-wow-delay="0s">
              <!-- Team Classic-->
              <article class="team-classic"><a class="team-classic-figure"
                                               href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/team-1-370x406.jpg"
                                                             alt=""
                                                             width="370"
                                                             height="406"/></a>
                <div class="team-classic-caption">
                  <h5 class="team-classic-name"><a href="#">Ryan Wilson</a></h5>
                  <p class="team-classic-status">Founder, Owner</p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInRight"
                 data-wow-delay=".1s">
              <!-- Team Classic-->
              <article class="team-classic"><a class="team-classic-figure"
                                               href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/team-2-370x406.jpg"
                                                             alt=""
                                                             width="370"
                                                             height="406"/></a>
                <div class="team-classic-caption">
                  <h5 class="team-classic-name"><a href="#">Amanda Clark</a></h5>
                  <p class="team-classic-status">Measure Technician</p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInRight"
                 data-wow-delay=".2s">
              <!-- Team Classic-->
              <article class="team-classic"><a class="team-classic-figure"
                                               href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/team-3-370x406.jpg"
                                                             alt=""
                                                             width="370"
                                                             height="406"/></a>
                <div class="team-classic-caption">
                  <h5 class="team-classic-name"><a href="#">Sam Robinson</a></h5>
                  <p class="team-classic-status">Installer</p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
      <!-- Popular products-->





















    

    <section class="section section-sm bg-default">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp"
                 data-wow-delay="0s">
              <h6 class="title-decoration-lines-content">Popular products</h6>
            </div>
          </div>
            <!-- Owl Carousel-->
          <div class="owl-carousel owl-products"
               data-items="1"
               data-sm-items="2"
               data-md-items="3"
               data-lg-items="4"
               data-margin="30"
               data-dots="true"
               data-autoplay="true">
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-13-270x280.png"
                                               alt=""
                                               width="270"
                                               height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak"
                                               href="#">Add to cart</a></div>
              </div>
              <h5 class="product-title"><a href="#">Burdur Pearl</a></h5>
              <div class="product-price-wrap">
                <div class="product-price">$235.00</div>
              </div>
            </article>
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-18-270x280.png"
                                               alt=""
                                               width="270"
                                               height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak"
                                               href="#">Add to cart</a></div>
              </div>
              <h5 class="product-title"><a href="#">Seagrass Limestone</a></h5>
              <div class="product-price-wrap">
                <div class="product-price">$254.00</div>
              </div>
            </article>
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-19-270x280.png"
                                               alt=""
                                               width="270"
                                               height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak"
                                               href="#">Add to cart</a></div>
              </div>
              <h5 class="product-title"><a href="#">Ibiza white</a></h5>
              <div class="product-price-wrap">
                <div class="product-price">$650.00</div>
              </div>
            </article>
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-5-270x280.png"
                                               alt=""
                                               width="270"
                                               height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak"
                                               href="#">Add to cart</a></div>
              </div>
              <h5 class="product-title"><a href="#">Lymra Limestone</a></h5>
              <div class="product-price-wrap">
                <div class="product-price">$650.00</div>
              </div>
            </article>
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-2-270x280.png"
                                               alt=""
                                               width="270"
                                               height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak"
                                               href="#">Add to cart</a></div>
              </div>
              <h5 class="product-title"><a href="#">Carrara Marble</a></h5>
              <div class="product-price-wrap">
                <div class="product-price">$94.00</div>
              </div>
            </article>
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-1-270x280.png"
                                               alt=""
                                               width="270"
                                               height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak"
                                               href="#">Add to cart</a></div>
              </div>
              <h5 class="product-title"><a href="#">Bardiglio Grey</a></h5>
              <div class="product-price-wrap">
                <div class="product-price">$520.00</div>
              </div>
            </article>
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-3-270x280.png"
                                               alt=""
                                               width="270"
                                               height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak"
                                               href="#">Add to cart</a></div>
              </div>
              <h5 class="product-title"><a href="#">Bastille Gray</a></h5>
              <div class="product-price-wrap">
                <div class="product-price">$200.00</div>
              </div>
            </article>
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-4-270x280.png"
                                               alt=""
                                               width="270"
                                               height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak"
                                               href="#">Add to cart</a></div>
              </div>
              <h5 class="product-title"><a href="#">Old World Acacia</a></h5>
              <div class="product-price-wrap">
                <div class="product-price">$550.00</div>
              </div>
            </article>
          </div>
        </div>
      </section>
      <!-- Latest posts-->





















    

    <section class="section section-md bg-default"
             id="news"
             data-type="anchor">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp"
                 data-wow-delay="0s">
              <h6 class="title-decoration-lines-content">Latest posts</h6>
            </div>
          </div>
          <div class="row row-50 justify-content-center">
            <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4 wow fadeInLeft"
                 data-wow-delay="0s">
              <!-- Post Creative-->
              <article class="post post-creative">
                <div class="post-creative-header">
                  <div class="group-md">
                    <div>
                      <div class="unit flex-column flex-sm-row unit-spacing-sm align-items-center">
                        <div class="unit-left"><img class="img-circles"
                                                    src="https://livedemo00.template-help.com/wt_prod-22310/images/user-4-49x49.jpg"
                                                    alt=""
                                                    width="49"
                                                    height="49"/>
                        </div>
                        <div class="unit-body">
                          <div class="post-creative-author">by<a href="#"> Mary Lee</a></div>
                        </div>
                      </div>
                    </div>
                    <div class="post-creative-time">
                      <time datetime="2019-05-17">May 17, 2019</time>
                    </div>
                  </div>
                </div><a class="post-creative-figure"
                         href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/post-16-370x267.jpg"
                                       alt=""
                                       width="370"
                                       height="267"/></a>
                <div class="post-creative-footer">
                  <h5 class="post-creative-title"><a href="#">Flooring Pro’s Secrets that can Raise Your Home Value</a></h5>
                </div>
              </article>
            </div>
            <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4 wow fadeInLeft"
                 data-wow-delay=".1s">
              <!-- Post Creative-->
              <article class="post post-creative">
                <div class="post-creative-header">
                  <div class="group-md">
                    <div>
                      <div class="unit flex-column flex-sm-row unit-spacing-sm align-items-center">
                        <div class="unit-left"><img class="img-circles"
                                                    src="https://livedemo00.template-help.com/wt_prod-22310/images/user-5-49x49.jpg"
                                                    alt=""
                                                    width="49"
                                                    height="49"/>
                        </div>
                        <div class="unit-body">
                          <div class="post-creative-author">by<a href="#"> Rupert Wood</a></div>
                        </div>
                      </div>
                    </div>
                    <div class="post-creative-time">
                      <time datetime="2019-05-04">May 04, 2019</time>
                    </div>
                  </div>
                </div><a class="post-creative-figure"
                         href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/post-17-370x267.jpg"
                                       alt=""
                                       width="370"
                                       height="267"/></a>
                <div class="post-creative-footer">
                  <h5 class="post-creative-title"><a href="#">Best laminate &amp; Hardwood Flooring Trends for 2019</a></h5>
                </div>
              </article>
            </div>
            <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4 wow fadeInLeft"
                 data-wow-delay=".2s">
              <!-- Post Creative-->
              <article class="post post-creative">
                <div class="post-creative-header">
                  <div class="group-md">
                    <div>
                      <div class="unit flex-column flex-sm-row unit-spacing-sm align-items-center">
                        <div class="unit-left"><img class="img-circles"
                                                    src="https://livedemo00.template-help.com/wt_prod-22310/images/user-6-49x49.jpg"
                                                    alt=""
                                                    width="49"
                                                    height="49"/>
                        </div>
                        <div class="unit-body">
                          <div class="post-creative-author">by<a href="#"> Ann Anderson</a></div>
                        </div>
                      </div>
                    </div>
                    <div class="post-creative-time">
                      <time datetime="2019-05-17">May 17, 2019</time>
                    </div>
                  </div>
                </div><a class="post-creative-figure"
                         href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/post-18-370x267.jpg"
                                       alt=""
                                       width="370"
                                       height="267"/></a>
                <div class="post-creative-footer">
                  <h5 class="post-creative-title"><a href="#">How to Pick Floors / Carpet &amp; Get the Best Deals</a></h5>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
      <!-- Section CTA 2-->





















    

    <section class="section bg-default text-center">
        <div class="parallax-container"
             data-parallax-img="https://livedemo00.template-help.com/wt_prod-22310/images/bg-cta-3.jpg">
          <div class="parallax-content section-xl section-inset-custom-1 context-dark">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-9 col-lg-7 col-xl-6">
                  <h3 class="oh"><span class="d-inline-block wow slideInDown"
                                       data-wow-delay="0s">Ready for a new experience?</span></h3>
                  <p class="oh"><span class="d-inline-block wow slideInUp"
                                      data-wow-delay=".2s">Flooria is ready to give your floor a completely new look, which is achieved throgh numerous solutions you can find at our store.</span></p><a class="button button-primary button-ujarak wow fadeInUp"
                                                                                                                                                                                                          href="#"
                                                                                                                                                                                                          data-wow-delay=".1s">Shop now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <section class="section section-md bg-gray-4">
        <div class="container">
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-clients"
               data-items="1"
               data-sm-items="2"
               data-md-items="3"
               data-lg-items="4"
               data-margin="30"
               data-dots="true"
               data-animation-in="fadeIn"
               data-animation-out="fadeOut"
               data-autoplay="true"><a class="clients-modern"
                                       href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-1-270x145.png"
                                                     alt=""
                                                     width="270"
                                                     height="145"/></a><a class="clients-modern"
                                                                          href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-2-270x145.png"
                                                                                        alt=""
                                                                                        width="270"
                                                                                        height="145"/></a><a class="clients-modern"
                                                                                                             href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-3-270x145.png"
                                                                                                                           alt=""
                                                                                                                           width="270"
                                                                                                                           height="145"/></a><a class="clients-modern"
                                                                                                                                                href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-4-270x145.png"
                                                                                                                                                              alt=""
                                                                                                                                                              width="270"
                                                                                                                                                              height="145"/></a><a class="clients-modern"
                                                                                                                                                                                   href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-5-270x145.png"
                                                                                                                                                                                                 alt=""
                                                                                                                                                                                                 width="270"
                                                                                                                                                                                                 height="145"/></a><a class="clients-modern"
                                                                                                                                                                                                                      href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-6-270x145.png"
                                                                                                                                                                                                                                    alt=""
                                                                                                                                                                                                                                    width="270"
                                                                                                                                                                                                                                    height="145"/></a><a class="clients-modern"
                                                                                                                                                                                                                                                         href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-7-270x145.png"
                                                                                                                                                                                                                                                                       alt=""
                                                                                                                                                                                                                                                                       width="270"
                                                                                                                                                                                                                                                                       height="145"/></a><a class="clients-modern"
                                                                                                                                                                                                                                                                                            href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-8-270x145.png"
                                                                                                                                                                                                                                                                                                          alt=""
                                                                                                                                                                                                                                                                                                          width="270"
                                                                                                                                                                                                                                                                                                          height="145"/></a></div>
        </div>
      </section>
      <!-- Contact information-->





















    

    <section class="section section-sm section-first bg-default"
             id="contacts"
             data-type="anchor">
        <div class="container">
          <div class="row row-30 justify-content-center">
            <div class="col-sm-8 col-md-6 col-lg-4">
              <article class="box-contacts">
                <div class="box-contacts-body">
                  <div class="box-contacts-icon fl-bigmug-line-cellphone55"></div>
                  <div class="box-contacts-decor"></div>
                  <p class="box-contacts-link"><a href="tel:#">+1 323-913-4688</a></p>
                  <p class="box-contacts-link"><a href="tel:#">+1 323-888-4554</a></p>
                </div>
              </article>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4">
              <article class="box-contacts">
                <div class="box-contacts-body">
                  <div class="box-contacts-icon fl-bigmug-line-up104"></div>
                  <div class="box-contacts-decor"></div>
                  <p class="box-contacts-link"><a href="#">4730 Crystal Springs Dr, Los Angeles, CA 90027</a></p>
                </div>
              </article>
            </div>
            <div class="col-sm-8 col-md-6 col-lg-4">
              <article class="box-contacts">
                <div class="box-contacts-body">
                  <div class="box-contacts-icon fl-bigmug-line-chat55"></div>
                  <div class="box-contacts-decor"></div>
                  <p class="box-contacts-link"><a href="mailto:#">mail@demolink.org</a></p>
                  <p class="box-contacts-link"><a href="mailto:#">info@demolink.org</a></p>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
      <!-- Contact Form and Gmap-->





















    

    <section class="section section-sm section-last bg-default text-md-left">
        <div class="container">
          <div class="row row-50">
            <div class="col-lg-6 section-map-small">
              <div class="google-map-container"
                   data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45."
                   data-styles="[{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#444444&quot;}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi.business&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;road&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:45}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#b4d4e1&quot;},{&quot;visibility&quot;:&quot;on&quot;}]}]">
                <div class="google-map"></div>
                <ul class="google-map-markers">
                  <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45."
                      data-description="9870 St Vincent Place, Glasgow"
                      data-icon="https://livedemo00.template-help.com/wt_prod-22310/images/gmap_marker.png"
                      data-icon-active="https://livedemo00.template-help.com/wt_prod-22310/images/gmap_marker_active.png"></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6">
              <h4 class="text-spacing-50">Contact Form</h4>
              <form class="rd-form rd-mailform"
                    data-form-output="form-output-global"
                    data-form-type="contact"
                    method="post"
                    action="bat/rd-mailform.php">
                <div class="row row-14 gutters-14">
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input"
                             id="contact-first-name"
                             type="text"
                             name="name"
                             data-constraints="@Required">
                      <label class="form-label"
                             for="contact-first-name">First Name</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input"
                             id="contact-last-name"
                             type="text"
                             name="name"
                             data-constraints="@Required">
                      <label class="form-label"
                             for="contact-last-name">Last Name</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap">
                      <input class="form-input"
                             id="contact-email"
                             type="email"
                             name="email"
                             data-constraints="@Email @Required">
                      <label class="form-label"
                             for="contact-email">E-mail</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap">
                      <label class="form-label"
                             for="contact-message">Message</label>
                      <textarea class="form-input"
                                id="contact-message"
                                name="message"
                                data-constraints="@Required"></textarea>
                    </div>
                  </div>
                </div>
                <button class="button button-primary button-pipaluk"
                        type="submit">Send Message</button>
              </form>
            </div>
          </div>
        </div>
      </section>

<?php endwhile;
endif; ?>
        </main><!-- #main -->
<?php
get_footer();
