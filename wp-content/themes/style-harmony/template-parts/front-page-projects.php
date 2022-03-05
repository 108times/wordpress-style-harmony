<?php
$settings = $args['settings'];
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

if (count($projects) > 0):
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