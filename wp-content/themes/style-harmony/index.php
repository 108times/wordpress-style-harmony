<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no front-page.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Style_Symfony
 */
get_header();

?>


      <!-- Swiper-->
      <section class="section swiper-container swiper-slider swiper-slider-modern" id="home" data-loop="true" data-autoplay="5000" data-simulate-touch="true" data-nav="true" data-slide-effect="fade" data-type="anchor">
        <div class="swiper-wrapper text-left">
          <div class="swiper-slide" data-slide-bg="https://livedemo00.template-help.com/wt_prod-22310/images/slide-3-1920x850.jpg">
            <div class="swiper-slide-caption">
              <div class="container">
                <div class="row">
                  <div class="col-11 col-sm-8 col-md-7 col-lg-5 col-xxl-4">
                    <div class="slider-modern-box">
                      <h2 class="oh slider-modern-title"><span data-caption-animate="slideInDown" data-caption-delay="0">unique and</span><span data-caption-animate="slideInLeft" data-caption-delay="0">affordable</span></h2>
                      <p data-caption-animate="fadeInRight" data-caption-delay="400">We offer our clients a unique variety of affordable flooring products.</p>
                      <div class="oh button-wrap"><a class="button button-default-outline-2 button-ujarak" href="#" data-caption-animate="slideInUp" data-caption-delay="400">Shop now</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide" data-slide-bg="https://livedemo00.template-help.com/wt_prod-22310/images/slide-1-1920x850.jpg">
            <div class="swiper-slide-caption">
              <div class="container">
                <div class="row">
                  <div class="col-11 col-sm-9 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
                    <div class="slider-modern-box">
                      <h2 class="oh slider-modern-title"><span data-caption-animate="slideInDown" data-caption-delay="0">High quality</span><span data-caption-animate="slideInUp" data-caption-delay="0">flooring solutions</span></h2>
                      <p data-caption-animate="fadeInRight" data-caption-delay="400">Flooria has been providing top-notch flooring products and solutions since our establishment.</p>
                      <div class="oh button-wrap"><a class="button button-default-outline-2 button-ujarak" href="#" data-caption-animate="slideInLeft" data-caption-delay="400">Shop now</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide" data-slide-bg="https://livedemo00.template-help.com/wt_prod-22310/images/slide-2-1920x850.jpg">
            <div class="swiper-slide-caption">
              <div class="container">
                <div class="row">
                  <div class="col-10 col-sm-8 col-md-7 col-lg-6 col-xl-5 col-xxl-4">
                    <div class="slider-modern-box">
                      <h2 class="oh slider-modern-title"><span data-caption-animate="slideInLeft" data-caption-delay="0">Professionals</span><span data-caption-animate="slideInUp" data-caption-delay="0">You can rely on</span></h2>
                      <p data-caption-animate="fadeInRight" data-caption-delay="400">Let our professional team design the floor of your dreams today.</p>
                      <div class="oh button-wrap"><a class="button button-default-outline-2 button-ujarak" href="#" data-caption-animate="slideInLeft" data-caption-delay="400">Shop now</a></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <!-- Swiper Navigation-->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
          <!-- Swiper Pagination-->
        <div class="swiper-pagination swiper-pagination-style-2"></div>
      </section>
      <!-- In the spotlight-->
      <section class="section section-sm section-first bg-default" id="about-us" data-type="anchor">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp" data-wow-delay="0s">
              <h6 class="title-decoration-lines-content">What We Offer</h6>
            </div>
          </div>
          <div class="row row-30 justify-content-center">
            <div class="col-md-12 col-lg-8">
              <div class="oh">
                <!-- box Spotlight-->
                <article class="box-sportlight wow slideInDown" data-wow-delay="0s"><a class="box-sportlight-figure" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/spotlight-1-770x332.jpg" alt="" width="770" height="332"/></a>
                  <div class="box-sportlight-caption">
                    <h5 class="box-sportlight-title"><a href="#">Natural stone</a></h5>
                    <div class="box-sportlight-arrow"></div>
                  </div>
                  <div class="box-sportlight-badge box-sportlight-new">New</div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- box Spotlight-->
                <article class="box-sportlight box-sportlight-sm wow slideInRight" data-wow-delay=".1s"><a class="box-sportlight-figure" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/spotlight-2-370x332.jpg" alt="" width="370" height="332"/></a>
                  <div class="box-sportlight-caption">
                    <h5 class="box-sportlight-title"><a href="#">Hardwood</a></h5>
                    <div class="box-sportlight-arrow"></div>
                  </div>
                  <div class="box-sportlight-badge box-sportlight-sale">-30%</div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- box Spotlight-->
                <article class="box-sportlight box-sportlight-sm wow slideInLeft" data-wow-delay="0s"><a class="box-sportlight-figure" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/spotlight-3-370x332.jpg" alt="" width="370" height="332"/></a>
                  <div class="box-sportlight-caption">
                    <h5 class="box-sportlight-title"><a href="#">Tile</a></h5>
                    <div class="box-sportlight-arrow"></div>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh">
                <!-- box Spotlight-->
                <article class="box-sportlight wow slideInUp" data-wow-delay=".1s"><a class="box-sportlight-figure" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/spotlight-4-370x332.jpg" alt="" width="370" height="332"/></a>
                  <div class="box-sportlight-caption">
                    <h5 class="box-sportlight-title"><a href="#">Carpet</a></h5>
                    <div class="box-sportlight-arrow"></div>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- box Spotlight-->
                <article class="box-sportlight box-sportlight-sm wow slideInRight" data-wow-delay=".1s"><a class="box-sportlight-figure" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/spotlight-5-370x332.jpg" alt="" width="370" height="332"/></a>
                  <div class="box-sportlight-caption">
                    <h5 class="box-sportlight-title"><a href="#">Laminate</a></h5>
                    <div class="box-sportlight-arrow"></div>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Trending products-->
      <section class="section section-sm bg-default">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp" data-wow-delay="0s">
              <h6 class="title-decoration-lines-content">Trending products</h6>
            </div>
          </div>
          <div class="row row-40 justify-content-center">
            <div class="col-sm-8 col-md-7 col-lg-6 wow fadeInLeft" data-wow-delay="0s">
              <div class="box-ordered-2"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/image-map-1-570x715.jpg" alt="" width="570" height="715"/>
              </div>
            </div>
            <div class="col-md-5 col-lg-6">
              <div class="row row-30 justify-content-center">
                <div class="col-sm-6 col-md-12 col-lg-6">
                  <div class="oh-desktop">
                    <!-- Product-->
                    <article class="product product-2 wow slideInRight" data-wow-delay="0s">
                      <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                          <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-14-270x280.png" alt="" width="270" height="280"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
                          </div>
                        </div>
                        <div class="unit-body">
                          <h5 class="product-title"><a href="#">Carrara Marble</a></h5>
                          <div class="product-price-wrap">
                            <div class="product-price product-price-old">$400.00</div>
                            <div class="product-price">$500.00</div>
                          </div><a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
                <div class="col-sm-6 col-md-12 col-lg-6">
                  <div class="oh-desktop">
                    <!-- Product-->
                    <article class="product product-2 wow slideInLeft" data-wow-delay="0s">
                      <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                          <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-15-270x280.png" alt="" width="270" height="280"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
                          </div>
                        </div>
                        <div class="unit-body">
                          <h5 class="product-title"><a href="#">Polished Marble</a></h5>
                          <div class="product-price-wrap">
                            <div class="product-price">$150.00</div>
                          </div><a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
                <div class="col-sm-6 col-md-12 col-lg-6">
                  <div class="oh-desktop">
                    <!-- Product-->
                    <article class="product product-2 wow slideInLeft" data-wow-delay="0s">
                      <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                          <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-16-270x280.png" alt="" width="270" height="280"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
                          </div>
                        </div>
                        <div class="unit-body">
                          <h5 class="product-title"><a href="#">Bastille Gray</a></h5>
                          <div class="product-price-wrap">
                            <div class="product-price">$520.00</div>
                          </div><a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
                <div class="col-sm-6 col-md-12 col-lg-6">
                  <div class="oh-desktop">
                    <!-- Product-->
                    <article class="product product-2 wow slideInRight" data-wow-delay="0s">
                      <div class="unit flex-row flex-lg-column">
                        <div class="unit-left">
                          <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-17-270x280.png" alt="" width="270" height="280"/>
                            <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
                          </div>
                        </div>
                        <div class="unit-body">
                          <h5 class="product-title"><a href="#">Baycliff Caulfeild</a></h5>
                          <div class="product-price-wrap">
                            <div class="product-price">$350.00</div>
                          </div><a class="button button-sm button-secondary button-ujarak" href="#">Add to cart</a>
                        </div>
                      </div>
                    </article>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Icons Ruby-->
      <section class="section section-sm bg-default">
        <div class="container">
          <div class="row row-30 justify-content-center">
            <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay="0s">
              <article class="box-icon-ruby">
                <div class="unit box-icon-ruby-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-ruby-icon fl-bigmug-line-airplane86"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-ruby-title"><a href="#">Free worldwide Delivery</a></h5>
                    <p class="box-icon-ruby-text">When ordering from $300</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay=".1s">
              <article class="box-icon-ruby">
                <div class="unit box-icon-ruby-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-ruby-icon fl-bigmug-line-circular220"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-ruby-title"><a href="#">High-Quality products</a></h5>
                    <p class="box-icon-ruby-text">Award-winning flooring</p>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-sm-6 col-lg-4 wow fadeInRight" data-wow-delay=".2s">
              <article class="box-icon-ruby">
                <div class="unit box-icon-ruby-body flex-column flex-md-row text-md-left flex-lg-column text-lg-center flex-xl-row text-xl-left">
                  <div class="unit-left">
                    <div class="box-icon-ruby-icon fl-bigmug-line-hot67"></div>
                  </div>
                  <div class="unit-body">
                    <h5 class="box-icon-ruby-title"><a href="#">-20% on new collections</a></h5>
                    <p class="box-icon-ruby-text">Get your discount today!</p>
                  </div>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
      <!-- Improve your interior with deco-->
      <section class="section section-sm bg-default" id="projects" data-type="anchor">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp" data-wow-delay="0s">
              <h6 class="title-decoration-lines-content">Best flooring projects</h6>
            </div>
          </div>
          <div class="row row-30" data-lightgallery="group">
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInLeft" data-wow-delay="0s">
                  <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-1-370x303.jpg" alt="" width="370" height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-1-570x800-original.jpg" data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-1-370x303.jpg" alt="" width="370" height="303"/></a>
                    <h5 class="thumbnail-mary-title"><a href="#">Project #1</a></h5>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInUp" data-wow-delay=".1s">
                  <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-2-370x303.jpg" alt="" width="370" height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-2-530x800-original.jpg" data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-2-370x303.jpg" alt="" width="370" height="303"/></a>
                    <h5 class="thumbnail-mary-title"><a href="#">Project #2</a></h5>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInRight" data-wow-delay=".0s">
                  <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-3-370x303.jpg" alt="" width="370" height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-3-1200x800-original.jpg" data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-3-370x303.jpg" alt="" width="370" height="303"/></a>
                    <h5 class="thumbnail-mary-title"><a href="#">Project #3</a></h5>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInUp" data-wow-delay=".1s">
                  <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-4-370x303.jpg" alt="" width="370" height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-4-530x800-original.jpg" data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-4-370x303.jpg" alt="" width="370" height="303"/></a>
                    <h5 class="thumbnail-mary-title"><a href="#">Project #4</a></h5>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInLeft" data-wow-delay="0s">
                  <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-5-370x303.jpg" alt="" width="370" height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-5-1200x800-original.jpg" data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-5-370x303.jpg" alt="" width="370" height="303"/></a>
                    <h5 class="thumbnail-mary-title"><a href="#">Project #5</a></h5>
                  </div>
                </article>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="oh-desktop">
                <!-- Thumbnail Classic-->
                <article class="thumbnail thumbnail-mary thumbnail-sm wow slideInDown" data-wow-delay=".1s">
                  <div class="thumbnail-mary-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-6-370x303.jpg" alt="" width="370" height="303"/>
                  </div>
                  <div class="thumbnail-mary-caption"><a class="icon fl-bigmug-line-zoom60" href="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-6-1200x800-original.jpg" data-lightgallery="item"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/grid-gallery-6-370x303.jpg" alt="" width="370" height="303"/></a>
                    <h5 class="thumbnail-mary-title"><a href="#">Project #6</a></h5>
                  </div>
                </article>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Section CTA-->
      <section class="section section-sm bg-default text-md-center">
        <div class="parallax-container" data-parallax-img="https://livedemo00.template-help.com/wt_prod-22310/images/bg-cta-2.jpg">
          <div class="parallax-content section-xl section-inset-custom-2 context-dark">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-7 col-lg-6">
                  <h3 class="oh font-weight-normal"><span class="d-inline-block wow slideInDown" data-wow-delay="0s">Get New & Amazing<br>Flooring From Us!</span></h3>
                  <p class="text-spacing-75 wow fadeInRight" data-wow-delay=".1s">Flooria offers lots of great flooring solutions for home owners. Whether you prefer laminate or natural stone flooring, our experts can manufacture and install anything you like!</p><a class="button button-primary button-ujarak wow fadeInUp" href="#" data-wow-delay=".2s">Shop now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- About us-->
      <section class="section section-sm bg-default">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp" data-wow-delay="0s">
              <h6 class="title-decoration-lines-content">About us</h6>
            </div>
          </div>
          <div class="row row-lg row-50 justify-content-center border-classic border-classic-2">
            <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay="0s">
              <div class="counter-creative">
                <div class="counter-creative-number"><span class="counter">12</span><span class="icon counter-creative-icon fl-bigmug-line-trophy55"></span>
                </div>
                <h6 class="counter-creative-title">Awards</h6>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay=".1s">
              <div class="counter-creative">
                <div class="counter-creative-number"><span class="counter">2</span><span class="symbol">k</span><span class="icon counter-creative-icon fl-bigmug-line-cube29"></span>
                </div>
                <h6 class="counter-creative-title">Projects</h6>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay=".2s">
              <div class="counter-creative">
                <div class="counter-creative-number"><span class="counter">679</span><span class="icon counter-creative-icon fl-bigmug-line-sun81"></span>
                </div>
                <h6 class="counter-creative-title">Happy clients</h6>
              </div>
            </div>
            <div class="col-sm-6 col-md-3 wow fadeInLeft" data-wow-delay=".3s">
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
      <section class="section section-sm bg-default" id="testimonials" data-type="anchor">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp" data-wow-delay="0s">
              <h6 class="title-decoration-lines-content">What people say</h6>
            </div>
          </div>
            <!-- Owl Carousel-->
          <div class="owl-carousel owl-modern" data-items="1" data-stage-padding="15" data-margin="30" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" data-autoplay="true">
            <!-- Quote Lisa-->
            <article class="quote-lisa">
              <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="https://livedemo00.template-help.com/wt_prod-22310/images/user-16-100x100.jpg" alt="" width="100" height="100"/></a>
                <div class="quote-lisa-text">
                  <p class="q">I just wanted to say thank you and the team very much for the brilliant service around renovating the floors at our house. You were absolutely brilliant and we can see you’ve gone the extra mile matching the floors between rooms etc. You’ve kept the place really tidy too, cannot ask for more.</p>
                </div>
                <h5 class="quote-lisa-cite"><a href="#">Catherine Williams</a></h5>
                <p class="quote-lisa-status">Client</p>
              </div>
            </article>
            <!-- Quote Lisa-->
            <article class="quote-lisa">
              <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="https://livedemo00.template-help.com/wt_prod-22310/images/user-17-100x100.jpg" alt="" width="100" height="100"/></a>
                <div class="quote-lisa-text">
                  <p class="q">Fantastic service from start to finish. After our ceiling collapsed we never thought our damaged floor would look so good again. These guys worked in a tight time frame and were very accommodating to the other trades working in the same area to produce brilliant results and restore our badly damaged floor to look like new!</p>
                </div>
                <h5 class="quote-lisa-cite"><a href="#">Rupert Wood</a></h5>
                <p class="quote-lisa-status">Client</p>
              </div>
            </article>
            <!-- Quote Lisa-->
            <article class="quote-lisa">
              <div class="quote-lisa-body"><a class="quote-lisa-figure" href="#"><img class="img-circles" src="https://livedemo00.template-help.com/wt_prod-22310/images/user-18-100x100.jpg" alt="" width="100" height="100"/></a>
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
      <section class="section section-sm bg-default" id="team" data-type="anchor">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp" data-wow-delay="0s">
              <h6 class="title-decoration-lines-content">Team of professionals</h6>
            </div>
          </div>
          <div class="row row-30">
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInRight" data-wow-delay="0s">
              <!-- Team Classic-->
              <article class="team-classic"><a class="team-classic-figure" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/team-1-370x406.jpg" alt="" width="370" height="406"/></a>
                <div class="team-classic-caption">
                  <h5 class="team-classic-name"><a href="#">Ryan Wilson</a></h5>
                  <p class="team-classic-status">Founder, Owner</p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInRight" data-wow-delay=".1s">
              <!-- Team Classic-->
              <article class="team-classic"><a class="team-classic-figure" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/team-2-370x406.jpg" alt="" width="370" height="406"/></a>
                <div class="team-classic-caption">
                  <h5 class="team-classic-name"><a href="#">Amanda Clark</a></h5>
                  <p class="team-classic-status">Measure Technician</p>
                </div>
              </article>
            </div>
            <div class="col-md-6 col-lg-4 col-xl-4 wow fadeInRight" data-wow-delay=".2s">
              <!-- Team Classic-->
              <article class="team-classic"><a class="team-classic-figure" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/team-3-370x406.jpg" alt="" width="370" height="406"/></a>
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
            <div class="title-decoration-lines wow slideInUp" data-wow-delay="0s">
              <h6 class="title-decoration-lines-content">Popular products</h6>
            </div>
          </div>
            <!-- Owl Carousel-->
          <div class="owl-carousel owl-products" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-margin="30" data-dots="true" data-autoplay="true">
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-13-270x280.png" alt="" width="270" height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
              </div>
              <h5 class="product-title"><a href="#">Burdur Pearl</a></h5>
              <div class="product-price-wrap">
                <div class="product-price">$235.00</div>
              </div>
            </article>
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-18-270x280.png" alt="" width="270" height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
              </div>
              <h5 class="product-title"><a href="#">Seagrass Limestone</a></h5>
              <div class="product-price-wrap">
                <div class="product-price">$254.00</div>
              </div>
            </article>
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-19-270x280.png" alt="" width="270" height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
              </div>
              <h5 class="product-title"><a href="#">Ibiza white</a></h5>
              <div class="product-price-wrap">
                <div class="product-price">$650.00</div>
              </div>
            </article>
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-5-270x280.png" alt="" width="270" height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
              </div>
              <h5 class="product-title"><a href="#">Lymra Limestone</a></h5>
              <div class="product-price-wrap">
                <div class="product-price">$650.00</div>
              </div>
            </article>
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-2-270x280.png" alt="" width="270" height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
              </div>
              <h5 class="product-title"><a href="#">Carrara Marble</a></h5>
              <div class="product-price-wrap">
                <div class="product-price">$94.00</div>
              </div>
            </article>
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-1-270x280.png" alt="" width="270" height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
              </div>
              <h5 class="product-title"><a href="#">Bardiglio Grey</a></h5>
              <div class="product-price-wrap">
                <div class="product-price">$520.00</div>
              </div>
            </article>
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-3-270x280.png" alt="" width="270" height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
              </div>
              <h5 class="product-title"><a href="#">Bastille Gray</a></h5>
              <div class="product-price-wrap">
                <div class="product-price">$200.00</div>
              </div>
            </article>
            <!-- Product-->
            <article class="product">
              <div class="product-figure"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/product-4-270x280.png" alt="" width="270" height="280"/>
                <div class="product-button"><a class="button button-md button-white button-ujarak" href="#">Add to cart</a></div>
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
      <section class="section section-md bg-default" id="news" data-type="anchor">
        <div class="container">
          <div class="oh">
            <div class="title-decoration-lines wow slideInUp" data-wow-delay="0s">
              <h6 class="title-decoration-lines-content">Latest posts</h6>
            </div>
          </div>
          <div class="row row-50 justify-content-center">
            <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4 wow fadeInLeft" data-wow-delay="0s">
              <!-- Post Creative-->
              <article class="post post-creative">
                <div class="post-creative-header">
                  <div class="group-md">
                    <div>
                      <div class="unit flex-column flex-sm-row unit-spacing-sm align-items-center">
                        <div class="unit-left"><img class="img-circles" src="https://livedemo00.template-help.com/wt_prod-22310/images/user-4-49x49.jpg" alt="" width="49" height="49"/>
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
                </div><a class="post-creative-figure" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/post-16-370x267.jpg" alt="" width="370" height="267"/></a>
                <div class="post-creative-footer">
                  <h5 class="post-creative-title"><a href="#">Flooring Pro’s Secrets that can Raise Your Home Value</a></h5>
                </div>
              </article>
            </div>
            <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4 wow fadeInLeft" data-wow-delay=".1s">
              <!-- Post Creative-->
              <article class="post post-creative">
                <div class="post-creative-header">
                  <div class="group-md">
                    <div>
                      <div class="unit flex-column flex-sm-row unit-spacing-sm align-items-center">
                        <div class="unit-left"><img class="img-circles" src="https://livedemo00.template-help.com/wt_prod-22310/images/user-5-49x49.jpg" alt="" width="49" height="49"/>
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
                </div><a class="post-creative-figure" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/post-17-370x267.jpg" alt="" width="370" height="267"/></a>
                <div class="post-creative-footer">
                  <h5 class="post-creative-title"><a href="#">Best laminate &amp; Hardwood Flooring Trends for 2019</a></h5>
                </div>
              </article>
            </div>
            <div class="col-sm-9 col-md-6 col-lg-5 col-xl-4 wow fadeInLeft" data-wow-delay=".2s">
              <!-- Post Creative-->
              <article class="post post-creative">
                <div class="post-creative-header">
                  <div class="group-md">
                    <div>
                      <div class="unit flex-column flex-sm-row unit-spacing-sm align-items-center">
                        <div class="unit-left"><img class="img-circles" src="https://livedemo00.template-help.com/wt_prod-22310/images/user-6-49x49.jpg" alt="" width="49" height="49"/>
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
                </div><a class="post-creative-figure" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/post-18-370x267.jpg" alt="" width="370" height="267"/></a>
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
        <div class="parallax-container" data-parallax-img="https://livedemo00.template-help.com/wt_prod-22310/images/bg-cta-3.jpg">
          <div class="parallax-content section-xl section-inset-custom-1 context-dark">
            <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-9 col-lg-7 col-xl-6">
                  <h3 class="oh"><span class="d-inline-block wow slideInDown" data-wow-delay="0s">Ready for a new experience?</span></h3>
                  <p class="oh"><span class="d-inline-block wow slideInUp" data-wow-delay=".2s">Flooria is ready to give your floor a completely new look, which is achieved throgh numerous solutions you can find at our store.</span></p><a class="button button-primary button-ujarak wow fadeInUp" href="#" data-wow-delay=".1s">Shop now</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section section-md bg-gray-4">
        <div class="container">
          <!-- Owl Carousel-->
          <div class="owl-carousel owl-clients" data-items="1" data-sm-items="2" data-md-items="3" data-lg-items="4" data-margin="30" data-dots="true" data-animation-in="fadeIn" data-animation-out="fadeOut" data-autoplay="true"><a class="clients-modern" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-1-270x145.png" alt="" width="270" height="145"/></a><a class="clients-modern" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-2-270x145.png" alt="" width="270" height="145"/></a><a class="clients-modern" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-3-270x145.png" alt="" width="270" height="145"/></a><a class="clients-modern" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-4-270x145.png" alt="" width="270" height="145"/></a><a class="clients-modern" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-5-270x145.png" alt="" width="270" height="145"/></a><a class="clients-modern" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-6-270x145.png" alt="" width="270" height="145"/></a><a class="clients-modern" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-7-270x145.png" alt="" width="270" height="145"/></a><a class="clients-modern" href="#"><img src="https://livedemo00.template-help.com/wt_prod-22310/images/clients-8-270x145.png" alt="" width="270" height="145"/></a></div>
        </div>
      </section>
      <!-- Contact information-->
      <section class="section section-sm section-first bg-default" id="contacts" data-type="anchor">
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
              <div class="google-map-container" data-center="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-styles="[{&quot;featureType&quot;:&quot;administrative&quot;,&quot;elementType&quot;:&quot;labels.text.fill&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#444444&quot;}]},{&quot;featureType&quot;:&quot;landscape&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#f2f2f2&quot;}]},{&quot;featureType&quot;:&quot;poi&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;poi.business&quot;,&quot;elementType&quot;:&quot;geometry.fill&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;on&quot;}]},{&quot;featureType&quot;:&quot;road&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;saturation&quot;:-100},{&quot;lightness&quot;:45}]},{&quot;featureType&quot;:&quot;road.highway&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;simplified&quot;}]},{&quot;featureType&quot;:&quot;road.arterial&quot;,&quot;elementType&quot;:&quot;labels.icon&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;transit&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;visibility&quot;:&quot;off&quot;}]},{&quot;featureType&quot;:&quot;water&quot;,&quot;elementType&quot;:&quot;all&quot;,&quot;stylers&quot;:[{&quot;color&quot;:&quot;#b4d4e1&quot;},{&quot;visibility&quot;:&quot;on&quot;}]}]">
                <div class="google-map"></div>
                <ul class="google-map-markers">
                  <li data-location="9870 St Vincent Place, Glasgow, DC 45 Fr 45." data-description="9870 St Vincent Place, Glasgow" data-icon="https://livedemo00.template-help.com/wt_prod-22310/images/gmap_marker.png" data-icon-active="https://livedemo00.template-help.com/wt_prod-22310/images/gmap_marker_active.png"></li>
                </ul>
              </div>
            </div>
            <div class="col-lg-6">
              <h4 class="text-spacing-50">Contact Form</h4>
              <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                <div class="row row-14 gutters-14">
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-first-name" type="text" name="name" data-constraints="@Required">
                      <label class="form-label" for="contact-first-name">First Name</label>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-last-name" type="text" name="name" data-constraints="@Required">
                      <label class="form-label" for="contact-last-name">Last Name</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap">
                      <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email @Required">
                      <label class="form-label" for="contact-email">E-mail</label>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="form-wrap">
                      <label class="form-label" for="contact-message">Message</label>
                      <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                    </div>
                  </div>
                </div>
                <button class="button button-primary button-pipaluk" type="submit">Send Message</button>
              </form>
            </div>
          </div>
        </div>
      </section>
      <!-- Page Footer-->





	<main id="primary" class="site-main">

		<?php

//		if ( have_posts() ) :
//
//			if ( is_home() && ! is_front_page() ) :
//				?>
<!--				<header>-->
<!--					<h1 class="page-title screen-reader-text">--><?php //single_post_title(); ?><!--</h1>-->
<!--				</header>-->
<!--				--><?php
//			endif;
//
//			/* Start the Loop */
//			while ( have_posts() ) :
//				the_post();
//
//				/*
//				 * Include the Post-Type-specific template for the content.
//				 * If you want to override this in a child theme, then include a file
//				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
//				 */
//				get_template_part( 'template-parts/content', get_post_type() );
//
//			endwhile;
//
//			the_posts_navigation();
//
//		else :
//
//			get_template_part( 'template-parts/content', 'none' );
//
//		endif;
		?>

	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
