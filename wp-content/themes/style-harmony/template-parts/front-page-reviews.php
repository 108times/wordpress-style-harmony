<?php

$settings = $args['settings'];

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
	?>
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
                </div>
        </div>
        </section>
    <!-- Team of professionals-->
<?php
endif; ?>
