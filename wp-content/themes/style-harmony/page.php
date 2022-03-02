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
		$value  = json_encode( $value );
		$string = 'JSON.parse(`' . $value . '`.replaceAll("\n", ""))';
	}
	echo '<script>console.log(' . $string . ')</script>';
}

function alert( $value, $text = '' ) {
	echo '<script>setTimeout(() => alert(`' . $text . ' ==> ' . ( $value )
	     . '`))</script>';
}

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

	/**
	 * Настройки главной страницы
	 */
	$page_settings = new WP_Query(
		[
			'post_type'  => 'pages_settings',
			'meta_query' => [
				[
					'meta_key'   => 'ID',
					'meta_value' => '79',
				],
			],
		]
	);

	$settings = null;
	while ( $page_settings->have_posts() ) :
		$page_settings->the_post();
		$settings = get_fields();
	endwhile;
	wp_reset_postdata();

	console_log( $settings, true );
	?>

    <!-- Слайдер -->
	<?php
	if ( $settings['show_slider'] === 'Да' ):
		// параметры по умолчанию
		$slides = get_posts(
			[
				'numberposts' => $settings['slider_limit'],
				'post_type'   => 'slider',
				'category_id' => '5',
				'order'       => 'ASC',
				'meta_key'    => 'sort',
				'orderby'     => 'meta_value',
			]
		);

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
                 data-slide-bg="<?php
	             echo get_the_post_thumbnail_url() ?>"

            >
        <div class="swiper-slide-caption">
          <div class="container">
            <div class="row">
              <div class="col-11 col-sm-8 col-md-7 col-lg-5 col-xxl-4">
                <div class="slider-modern-box">
                    <?php

                    $title           = get_the_title();
                    $words_until_separation
                                     = get_field( 'words_until_separation' );
                    $separated_parts = separate_title(
	                    $title,
	                    $words_until_separation
                    );
                    $first_part      = $separated_parts[0];
                    $second_part     = $separated_parts[1];

                    ?>
                    <h2 class="oh slider-modern-title"><span data-caption-animate="slideInDown"
                                                             data-caption-delay="0"><?php
			                echo $first_part ?>
                               </span><span data-caption-animate="slideInLeft"
                                            data-caption-delay="0"><?php
			                echo $second_part ?></span></h2>
                  <p data-caption-animate="fadeInRight"
                     data-caption-delay="400"><?php
	                  the_content(); ?></p>
                  <div class="oh button-wrap"><a class="button button-default-outline-2 button-ujarak"
                                                 href="<?php
                                                 the_field( 'link' ); ?>"
                                                 data-caption-animate="slideInUp"
                                                 data-caption-delay="400"><?php
		                  the_field( 'button_text' ); ?></a></div>
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
		<?php
		endif; ?>
	<?php
	endif; ?>

<!-- Услуги -->
<?php
	if ( $settings['show_services'] === 'Да' ):
		// параметры по умолчанию
		$services = get_posts(
			[
				'numberposts'      => $settings['services_amount'],
				'post_type'        => 'service',
				'suppress_filters' => true,
				'order'            => 'ASC',
				'meta_key'         => 'sort',
				'orderby'          => 'meta_value',
			]
		);

		function print_stickers_section() {
			$sale    = get_field( 'sale' );
			$is_sale = ( ( $sale !== "" ) && ( $sale !== 0 )
			             && ( $sale !== '0' ) );
			if ( $is_sale ) {
				echo "<div class='box-sportlight-badge box-sportlight-sale'>-"
				     . $sale . "%</div>";
			}

			$is_new = ( get_field( 'new' ) === 'Да' );
			if ( $is_new ) {
				echo "<div class='box-sportlight-badge box-sportlight-new' style='"
				     . ( $is_sale ? 'top:80px' : '' ) . "'>Новинка</div>";
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
              <h6 class="title-decoration-lines-content"><?php
	              echo $settings['services_title'] ?></h6>
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
                                                                href="<?php
                                                                the_field(
	                                                                'link'
                                                                ) ?>"><img src="<?php
		                                echo get_the_post_thumbnail_url() ?>"
                                                                           alt=""
                                                                           width="770"
                                                                           height="332"/></a>
                                  <div class="box-sportlight-caption">
                                    <h5 class="box-sportlight-title"><a href="<?php
	                                    the_field( 'link' ) ?>"><?php
		                                    the_title(); ?></a></h5>
                                    <div class="box-sportlight-arrow"></div>
                                  </div>
	                                <?php
	                                print_stickers_section(); ?>
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
                                   href="<?php
                                   the_field( 'link' ) ?>">
                                    <img src="<?php
                                    echo get_the_post_thumbnail_url() ?>"
                                         alt=""
                                         width="370"
                                         height="332"
                                    />
                                </a>
	                            <?php
	                            $title          = get_the_title();
	                            $title_splitted = explode( ' ', $title );
	                            $title_class    = ( count( $title_splitted ) )
	                                              > 2
		                            ? 'service-title-small' : '';
	                            ?>
                                <div class="box-sportlight-caption <?php
	                            echo $title_class ?>">
                                <h5 class="box-sportlight-title"><a href="<?php
	                                the_field( 'link' ) ?>"><?php
		                                the_title(); ?></a></h5>
                                <div class="box-sportlight-arrow"></div>
                              </div>
	                            <?php
	                            print_stickers_section(); ?>

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
		<?php
		endif ?>

	<?php
	endif ?>

<!-- Преимущества -->
<?php
	if ( $settings['show_advantages'] === 'Да' ):

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
	<?php
	endif; ?>

<!-- Баннер 1 -->
<?php
	if ( $settings['show_banner_1'] === 'Да' ):

		$banner = $settings['banner_object'];

		if ( isset( $banner ) ):
			?>
            <section class="section section-sm bg-default text-md-center">
                <?php
                $banner_id = $banner->ID;

                $image_url = has_post_thumbnail( $banner_id )
	                ? get_the_post_thumbnail_url( $banner_id ) : '';

                $title                  = $banner->post_title;
                $words_until_separation = $banner->words_until_separation;
                $separated_parts        = separate_title(
	                $title,
	                $words_until_separation
                );
                list( $first_part, $second_part ) = $separated_parts;

                ?>

                <div class="parallax-container"
                     data-parallax-img="<?php
				     echo $image_url; ?>">

                                <div class="parallax-content section-xl section-inset-custom-2 context-dark">
                <div class="container">
                  <div class="row justify-content-center">



                    <div class="col-md-7 col-lg-6">
                      <h3 class="oh font-weight-normal">
                          <span class="d-inline-block wow slideInDown"
                                data-wow-delay="0s">
                              <?php
                              echo $first_part ?><br><?php
	                          echo $second_part ?>
                          </span>
                      </h3>
                      <p class="text-spacing-75 wow fadeInRight"
                         data-wow-delay=".1s"><?php
	                      echo $banner->post_content ?></p>
                              <a class="button button-primary button-ujarak wow fadeInUp"
                                 href="<?php
                                 the_field( 'link', $banner_id ); ?>"
                                 data-wow-delay=".2s"><?php
	                              the_field( 'button_text', $banner_id );
	                              ?></a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </section>
		<?php
		endif; ?>
	<?php
	endif; ?>




    <?php
	if ( $settings['show_projects'] === 'Да' ):
		$projects = get_posts(
			[
				'numberposts'      => $settings['projects_amount'],
				'post_type'        => 'project',
				'suppress_filters' => true,
				'order'            => 'ASC',
				'meta_key'         => 'sort',
				'orderby'          => 'meta_value',
			]
		);

		?>
        <section class="section section-sm bg-default"
                 id="projects"
                 data-type="anchor">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp"
                 data-wow-delay="0s">
              <h6 class="title-decoration-lines-content"><?php
	              echo $settings['projects_title'] ?></h6>
            </div>
          </div>
          <div class="row row-30"
               data-lightgallery="group">
              <?php

              foreach ( $projects as $index => $post ):
	              setup_postdata( $post );
	              $full_image_url
		              = wp_get_attachment_image_url(
		              get_post_thumbnail_id(),
		              'full'
	              );

//	              $small_image_url = wp_get_attachment_image_url(
//		              get_post_thumbnail_id(),
//		              'medium'
//	              );

	              console_log( $image_url );
	              ?>


                  <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInLeft"
                         data-wow-delay="0s">
                  <div class="thumbnail-mary-figure"><img src="<?php
	                  echo $full_image_url ?>"
                                                          alt=""
                                                          width="370"
                                                          height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60"
                                                         href="<?php
                                                         echo $full_image_url ?>>"
                                                         data-lightgallery="item"><img src="<?php
		                  echo $full_image_url ?>"
                                                                                       alt=""
                                                                                       width="370"
                                                                                       height="303"/></a>
                    <h5 class="thumbnail-mary-title"><a href="<?php
	                    the_field( 'link' ); ?>"><?php
		                    the_title() ?></a></h5>
                  </div>
                </article>
              </div>
            </div>

	              <?php
	              wp_reset_postdata();
              endforeach;
              ?>

          </div>
        </div>
      </section>
        <!-- Section CTA-->

	<?php
	endif;
	?>








<!--Калькулятор-->

    <section class="section section-sm bg-default"
             id="calculator">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp"
                 data-wow-delay="0s">
              <h6 class="title-decoration-lines-content">Калькулятор</h6>
            </div>
          </div>
          <div class="row row-lg row-50 justify-content-center border-classic border-classic-2">
              <div style="height: 300px; width: 200px"></div>
              <!--            <div class="col-sm-6 col-md-3 wow fadeInLeft"-->
              <!--                 data-wow-delay="0s">-->
              <!--              <div class="counter-creative">-->
              <!--                <div class="counter-creative-number"><span class="counter">12</span><span class="icon counter-creative-icon fl-bigmug-line-trophy55"></span>-->
              <!--                </div>-->
              <!--                <h6 class="counter-creative-title">Awards</h6>-->
              <!--              </div>-->
              <!--            </div>-->
              <!--            <div class="col-sm-6 col-md-3 wow fadeInLeft"-->
              <!--                 data-wow-delay=".1s">-->
              <!--              <div class="counter-creative">-->
              <!--                <div class="counter-creative-number"><span class="counter">2</span><span class="symbol">k</span><span class="icon counter-creative-icon fl-bigmug-line-cube29"></span>-->
              <!--                </div>-->
              <!--                <h6 class="counter-creative-title">Projects</h6>-->
              <!--              </div>-->
              <!--            </div>-->
              <!--            <div class="col-sm-6 col-md-3 wow fadeInLeft"-->
              <!--                 data-wow-delay=".2s">-->
              <!--              <div class="counter-creative">-->
              <!--                <div class="counter-creative-number"><span class="counter">679</span><span class="icon counter-creative-icon fl-bigmug-line-sun81"></span>-->
              <!--                </div>-->
              <!--                <h6 class="counter-creative-title">Happy clients</h6>-->
              <!--              </div>-->
              <!--            </div>-->
              <!--            <div class="col-sm-6 col-md-3 wow fadeInLeft"-->
              <!--                 data-wow-delay=".3s">-->
              <!--              <div class="counter-creative">-->
              <!--                <div class="counter-creative-number"><span class="counter">25</span><span class="icon counter-creative-icon fl-bigmug-line-user143"></span>-->
              <!--                </div>-->
              <!--                <h6 class="counter-creative-title">Team members</h6>-->
              <!--              </div>-->
              <!--            </div>-->
          </div>
        </div>
      </section>
      <!-- What people say-->




<!-- Отзывы -->
<?php
	if ( $settings['show_reviews'] === 'Да' ): ?>
        <section class="section section-sm bg-default"
                 id="testimonials"
                 data-type="anchor">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp"
                 data-wow-delay="0s">
              <h6 class="title-decoration-lines-content"><?php
	              echo $settings['reviews_title']
	              ?></h6>
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
              <?php
              $reviews = get_posts(
	              [
		              'numberposts'      => $settings['reviews_amount'],
		              'post_type'        => 'review',
		              'suppress_filters' => true,
		              'order'            => 'ASC',
		              'meta_key'         => 'sort',
		              'orderby'          => 'meta_value',
	              ]
              );

              if ( count( $reviews ) > 0 ):
	              foreach ( $reviews as $index => $post ):
		              setup_postdata( $post )
		              ?>
                      <!-- Quote Lisa-->
                      <article class="quote-lisa">
              <div class="quote-lisa-body"><a class="quote-lisa-figure"
                                              href="<?php
                                              the_field( 'link' ); ?>"><img
                              class="img-circles"
                              src="<?php
				              echo
				              get_the_post_thumbnail_url() ?>"
                              alt=""
                              width="100"
                              height="100"/></a>
                <div class="quote-lisa-text">
                  <p class="q">
                      <?php
                      the_content(); ?>
                  </p>
                </div>
                <h5 class="quote-lisa-cite"><a href="<?php
	                the_field( 'link' ); ?>"><?php
		                the_title()
		                ?></a></h5>
                <p class="quote-lisa-status"><?php
	                the_field( 'status' ); ?></p>
              </div>
            </article>


		              <?php
		              wp_reset_postdata();
	              endforeach; ?>
              <?php
              endif; ?>
          </div>
        </div>
      </section>
        <!-- Team of professionals-->
	<?php
	endif; ?>



<!--Баннер #2-->
<?php
	if ( $settings['show_banner_2'] === 'Да' ):

		$banner = $settings['banner_object_2'];

		if ( isset( $banner ) ):
			?>
            <section class="section bg-default text-center">
                <?php
                $banner_id = $banner->ID;

                $image_url = has_post_thumbnail( $banner_id )
	                ? get_the_post_thumbnail_url( $banner_id ) : '';

                $title                  = $banner->post_title;
                $words_until_separation = $banner->words_until_separation;
                $separated_parts        = separate_title(
	                $title,
	                $words_until_separation
                );
                list( $first_part, $second_part ) = $separated_parts;

                ?>

                <div class="parallax-container"
                     data-parallax-img="<?php
				     echo $image_url; ?>">
<div class="parallax-content section-xl section-inset-custom-1 context-dark">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-9 col-lg-7 col-xl-6">


                        <h3 class="oh"><span class="d-inline-block wow slideInDown"
                                             data-wow-delay="0s">
                                <?php
                                echo $first_part ?><br>
                                <?php
                                echo $second_part ?></span></h3>
                  <p class="oh"><span class="d-inline-block wow slideInUp"
                                      data-wow-delay=".2s">
                         <?php
                         echo $banner->post_content ?>
                      </span></p><a class="button button-primary button-ujarak wow fadeInUp"
                                    href="<?php
                                    the_field( 'link', $banner_id ); ?>"
                                    data-wow-delay=".1s"><?php
		                the_field( 'button_text', $banner_id );
		                ?></a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </section>
		<?php
		endif; ?>
	<?php
	endif; ?>




<!--Клиенты-->
<?php
	if ( $settings['show_clients'] === 'Да' ):
		$clients = get_posts(
			[
				'numberposts'      => $settings['clients_amount'],
				'post_type'        => 'client',
				'suppress_filters' => true,
				'order'            => 'ASC',
				'meta_key'         => 'sort',
				'orderby'          => 'meta_value',
			]
		);

		?>
        <section class="section section-md bg-gray-4">
        <div class="container">
          <!-- Owl Carousel-->

            <div class="row row-30 justify-content-center">
		<?php
		if ( count( $clients ) > 0 ): ?>
			<?php
			foreach ( $clients as $ndex => $post ): ?>
                <div class="col-sm-6 col-lg-4 wow fadeInRight"
                     data-wow-delay="0s">
                     <a class="clients-modern"
                        href="<?php the_field('link') ?>">
                          <img src="<?php echo get_the_post_thumbnail_url() ?>"
                               alt=""
                               width="270"
                               height="145"/>
                         <h5 class="client-title"><?php the_title() ?></h5>
                      </a>
                </div>
			<?php
			endforeach; ?>
		<?php
		endif; ?>

            </div>

        </div>
      </section>
	<?php
	endif; ?>

<?php
endwhile;
endif; ?>
        </main><!-- #main -->
<?php
get_footer();
