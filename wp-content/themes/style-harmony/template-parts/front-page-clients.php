<?php
$settings = $args['settings'];
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
if (count($clients) > 0):
?>
<section class="section section-md bg-gray-4">
        <div class="container">
          <!-- Owl Carousel-->

            <div class="row row-30 justify-content-center">
		<?php
		if ( count( $clients ) > 0 ): ?>
			<?php
			foreach ( $clients as $index => $post ): ?>
                <div class="col-sm-6 col-lg-4 wow fadeInRight"
                     style="margin-bottom: 130px"
                     data-wow-delay="0s">
                     <a class="clients-modern"
                        href="<?php
                        the_field( 'link' ) ?>">
                          <img src="<?php
                          echo get_the_post_thumbnail_url() ?>"
                               alt=""
                               width="270"
                               height="145"/>
                         <h5 class="client-title"><?php
	                         the_title() ?></h5>
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
endif;