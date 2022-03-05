<?php
$settings = $args['settings'];
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