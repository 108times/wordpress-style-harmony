<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Style_Symfony
 */

?>
    <!DOCTYPE html>
    <html class="wide wow-animation" <?php language_attributes(); ?>>
  <head>
    <title>Home</title>
      <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   	<link rel="profile" href="https://gmpg.org/xfn/11">

<!--    <script src="/cdn-cgi/apps/head/3ts2ksMwXvKRuG480KNifJ2_JNM.js"></script>-->
      <link rel="icon" href="https://livedemo00.template-help.com/wt_prod-22310/images/favicon.png" type="image/x-icon">

      <!--[if lt IE 10]>
      <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;"><a href="https://windows.microsoft.com/en-US/internet-explorer/"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/ie8-panel/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <script src="js/html5shiv.min.js"></script>
      <![endif]-->
	  <?php wp_head(); ?>

  </head>
  <body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'style-symfony' ); ?></a>

    <div class="preloader">
      <div class="preloader-body">
        <div class="cssload-container">
            <span></span><span></span><span></span><span></span>
        </div>
      </div>
    </div>
    <div class="page">
      <!-- Page Header-->
        <?php print_r(wp_basename( '' )) ?>
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap rd-navbar-modern-wrap">
          <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="46px" data-xl-stick-up-offset="46px" data-xxl-stick-up-offset="70px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
              <div class="rd-navbar-main">
                <!-- RD Navbar Panel-->
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand" href="/"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/logo-default-149x43.png" alt="" width="149" height="43"/></a></div>
                </div>
                <div class="rd-navbar-main-element">
                  <div class="rd-navbar-nav-wrap">
                    <!-- RD Navbar Basket-->
                    <div class="rd-navbar-basket-wrap">
                      <button class="rd-navbar-basket fl-bigmug-line-shopping198" data-rd-navbar-toggle=".cart-inline"><span>2</span></button>
                      <div class="cart-inline">
                        <div class="cart-inline-header">
                          <h5 class="cart-inline-title">In cart:<span> 2</span> Products</h5>
                          <h6 class="cart-inline-title">Total price:<span> $524</span></h6>
                        </div>
                        <div class="cart-inline-body">
                          <div class="cart-inline-item">
                            <div class="unit align-items-center">
                              <div class="unit-left"><a class="cart-inline-figure" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-mini-9-100x100.png" alt="" width="100" height="100"/></a></div>
                              <div class="unit-body">
                                <h6 class="cart-inline-name"><a href="#">Burdur Pearl</a></h6>
                                <div>
                                  <div class="group-xs group-middle-2">
                                    <div class="table-cart-stepper">
                                      <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000">
                                    </div>
                                    <h6 class="cart-inline-title">$289</h6>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="cart-inline-item">
                            <div class="unit align-items-center">
                              <div class="unit-left"><a class="cart-inline-figure" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-mini-10-100x100.png" alt="" width="100" height="100"/></a></div>
                              <div class="unit-body">
                                <h6 class="cart-inline-name"><a href="#">Lymra Limestone</a></h6>
                                <div>
                                  <div class="group-xs group-middle-2">
                                    <div class="table-cart-stepper">
                                      <input class="form-input" type="number" data-zeros="true" value="1" min="1" max="1000">
                                    </div>
                                    <h6 class="cart-inline-title">$235</h6>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="cart-inline-footer">
                          <div class="group-sm"><a class="button button-md button-default-outline button-wapasha" href="#">Go to cart</a><a class="button button-md button-secondary button-pipaluk" href="#">Checkout</a></div>
                        </div>
                      </div>
                    </div><a class="rd-navbar-basket rd-navbar-basket-mobile fl-bigmug-line-shopping198" href="#"><span>2</span></a>
                    <!-- RD Navbar Search-->
                    <div class="rd-navbar-search">
                      <button class="rd-navbar-search-toggle" data-rd-navbar-toggle=".rd-navbar-search"><span></span></button>
                      <form class="rd-search" action="search-results.html" data-search-live="rd-search-results-live" method="GET">
                        <div class="form-wrap">
                          <label class="form-label" for="rd-navbar-search-form-input">Search...</label>
                          <input class="rd-navbar-search-form-input form-input" id="rd-navbar-search-form-input" type="text" name="s" autocomplete="off">
                          <div class="rd-search-results-live" id="rd-search-results-live"></div>
                          <button class="rd-search-form-submit fl-bigmug-line-search74" type="submit"></button>
                        </div>
                      </form>
                    </div>

	                  <?php wp_nav_menu( array(
		                                     'theme_location' => '',
		                                     'container' => 'ul',
		                                     'menu_class' => 'rd-navbar-nav',
		                                     'menu_id' => '',
	                                     )); ?>

                  </div>
                  <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
                    <div class="project-hamburger"><span class="project-hamburger-arrow-top"></span><span class="project-hamburger-arrow-center"></span><span class="project-hamburger-arrow-bottom"></span></div>
                    <div class="project-hamburger-2"><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span><span class="project-hamburger-arrow"></span>
                    </div>
                    <div class="project-close"><span></span><span></span></div>
                  </div>
                </div>
                <div class="rd-navbar-project rd-navbar-modern-project">
                  <div class="rd-navbar-project-modern-header">
                    <h4 class="rd-navbar-project-modern-title">Follow us</h4>
                    <div class="rd-navbar-project-hamburger" data-multitoggle=".rd-navbar-main" data-multitoggle-blur=".rd-navbar-wrap" data-multitoggle-isolate>
                      <div class="project-close"><span></span><span></span></div>
                    </div>
                  </div>
                  <div class="rd-navbar-project-content rd-navbar-modern-project-content">
                    <div>
                      <p class="text-spacing-25">Want to get the latest flooring ideas from our team? Follow us on Instagram to keep up with the newest trends and offers from Flooria.</p>
                      <div class="row row-10 gutters-10" data-lightgallery="group">
                        <div class="col-6 col-lg-4">
                          <!-- Thumbnail Classic-->
                          <article class="thumbnail thumbnail-mary">
                            <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/gallery-image-14-124x124.jpg" alt="" width="124" height="124"/>
                            </div>
                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="https://livedemo00.template-help.com/wt_prod-22310/images/gallery-image-14-1200x800-original.jpg" data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/gallery-image-14-124x124.jpg" alt="" width="124" height="124"/></a>
                            </div>
                          </article>
                        </div>
                        <div class="col-6 col-lg-4">
                          <!-- Thumbnail Classic-->
                          <article class="thumbnail thumbnail-mary">
                            <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/gallery-image-15-124x124.jpg" alt="" width="124" height="124"/>
                            </div>
                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-3-1200x800-original.jpg" data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/gallery-image-15-124x124.jpg" alt="" width="124" height="124"/></a>
                            </div>
                          </article>
                        </div>
                        <div class="col-6 col-lg-4">
                          <!-- Thumbnail Classic-->
                          <article class="thumbnail thumbnail-mary">
                            <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/gallery-image-16-124x124.jpg" alt="" width="124" height="124"/>
                            </div>
                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-5-1200x800-original.jpg" data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/gallery-image-16-124x124.jpg" alt="" width="124" height="124"/></a>
                            </div>
                          </article>
                        </div>
                        <div class="col-6 col-lg-4">
                          <!-- Thumbnail Classic-->
                          <article class="thumbnail thumbnail-mary">
                            <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/gallery-image-17-124x124.jpg" alt="" width="124" height="124"/>
                            </div>
                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="https://livedemo00.template-help.com/wt_prod-22310/images/gallery-image-17-530x800-original.jpg" data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/gallery-image-17-124x124.jpg" alt="" width="124" height="124"/></a>
                            </div>
                          </article>
                        </div>
                        <div class="col-6 col-lg-4">
                          <!-- Thumbnail Classic-->
                          <article class="thumbnail thumbnail-mary">
                            <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/gallery-image-18-124x124.jpg" alt="" width="124" height="124"/>
                            </div>
                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-2-530x800-original.jpg" data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/gallery-image-18-124x124.jpg" alt="" width="124" height="124"/></a>
                            </div>
                          </article>
                        </div>
                        <div class="col-6 col-lg-4">
                          <!-- Thumbnail Classic-->
                          <article class="thumbnail thumbnail-mary">
                            <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/gallery-image-19-124x124.jpg" alt="" width="124" height="124"/>
                            </div>
                            <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-1-570x800-original.jpg" data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/gallery-image-19-124x124.jpg" alt="" width="124" height="124"/></a>
                            </div>
                          </article>
                        </div>
                      </div>
                      <ul class="rd-navbar-modern-contacts">
                        <li>
                          <div class="unit unit-spacing-sm">
                            <div class="unit-left"><span class="icon fa fa-phone"></span></div>
                            <div class="unit-body"><a class="link-phone" href="tel:#">+1 323-913-4688</a></div>
                          </div>
                        </li>
                        <li>
                          <div class="unit unit-spacing-sm">
                            <div class="unit-left"><span class="icon fa fa-location-arrow"></span></div>
                            <div class="unit-body"><a class="link-location" href="#">4730 Crystal Springs Dr, Los Angeles, CA 90027</a></div>
                          </div>
                        </li>
                        <li>
                          <div class="unit unit-spacing-sm">
                            <div class="unit-left"><span class="icon fa fa-envelope"></span></div>
                            <div class="unit-body"><a class="link-email" href="mailto:#">mail@demolink.org</a></div>
                          </div>
                        </li>
                      </ul>
                      <ul class="list-inline rd-navbar-modern-list-social">
                        <li><a class="icon fa fa-facebook" href="#"></a></li>
                        <li><a class="icon fa fa-twitter" href="#"></a></li>
                        <li><a class="icon fa fa-google-plus" href="#"></a></li>
                        <li><a class="icon fa fa-instagram" href="#"></a></li>
                        <li><a class="icon fa fa-pinterest" href="#"></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </nav>
        </div>
      </header>