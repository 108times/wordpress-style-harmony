<?php
$settings = $args['settings'];
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
