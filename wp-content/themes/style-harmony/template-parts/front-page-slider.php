<?php
$settings = $args['settings'];
$slides = get_posts(
		[
			'numberposts' => $settings['slides_amount'],
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

					list($first_part, $second_part) = $separated_parts
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

