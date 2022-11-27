<?php
$pageTitle = "Home Page";
include_once "init.php";
?>
<!--Start Page-->

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section breadcrumb-bg-color--golden">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3 class="breadcrumb-title">Product Details - Variable</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop-grid-sidebar-left.html">Shop</a></li>
                                <li class="active" aria-current="page">Product Details Variable</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- Start Product Details Section -->
<div class="product-details-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                    <!-- Start Large Image -->
                    <div class="product-large-image product-large-image-horaizontal swiper-container">
                        <div class="swiper-wrapper">
                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                <img src="layout/assets/images/product/default/home-1/default-1.jpg" alt="">
                            </div>
                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                <img src="layout/assets/images/product/default/home-1/default-2.jpg" alt="">
                            </div>
                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                <img src="layout/assets/images/product/default/home-1/default-3.jpg" alt="">
                            </div>
                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                <img src="layout/assets/images/product/default/home-1/default-4.jpg" alt="">
                            </div>
                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                <img src="layout/assets/images/product/default/home-1/default-5.jpg" alt="">
                            </div>
                            <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                <img src="layout/assets/images/product/default/home-1/default-6.jpg" alt="">
                            </div>
                        </div>
                    </div>
                    <!-- End Large Image -->
                    <!-- Start Thumbnail Image -->
                    <div
                        class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5">
                        <div class="swiper-wrapper">
                            <div class="product-image-thumb-single swiper-slide">
                                <img class="img-fluid" src="layout/assets/images/product/default/home-1/default-1.jpg"
                                     alt="">
                            </div>
                            <div class="product-image-thumb-single swiper-slide">
                                <img class="img-fluid" src="layout/assets/images/product/default/home-1/default-2.jpg"
                                     alt="">
                            </div>
                            <div class="product-image-thumb-single swiper-slide">
                                <img class="img-fluid" src="layout/assets/images/product/default/home-1/default-3.jpg"
                                     alt="">
                            </div>
                            <div class="product-image-thumb-single swiper-slide">
                                <img class="img-fluid" src="layout/assets/images/product/default/home-1/default-4.jpg"
                                     alt="">
                            </div>
                            <div class="product-image-thumb-single swiper-slide">
                                <img class="img-fluid" src="layout/assets/images/product/default/home-1/default-5.jpg"
                                     alt="">
                            </div>
                            <div class="product-image-thumb-single swiper-slide">
                                <img class="img-fluid" src="layout/assets/images/product/default/home-1/default-6.jpg"
                                     alt="">
                            </div>
                        </div>
                        <!-- Add Arrows -->
                        <div class="gallery-thumb-arrow swiper-button-next"></div>
                        <div class="gallery-thumb-arrow swiper-button-prev"></div>
                    </div>
                    <!-- End Thumbnail Image -->
                </div>
            </div>
            <div class="col-xl-7 col-lg-6">
                <div class="product-details-content-area product-details--golden" data-aos="fade-up"
                     data-aos-delay="200">
                    <!-- Start  Product Details Text Area-->
                    <div class="product-details-text">
                        <h4 class="title">Ornare sed consequat</h4>
                        <div class="d-flex align-items-center">
                            <ul class="review-star">
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="fill"><i class="ion-android-star"></i></li>
                                <li class="empty"><i class="ion-android-star"></i></li>
                            </ul>
                            <a href="#" class="customer-review ml-2">(customer review )</a>
                        </div>
                        <div class="price">$80.00</div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est
                            tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis
                            justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id
                            nulla.</p>
                    </div> <!-- End  Product Details Text Area-->
                    <!-- Start Product Variable Area -->
                    <div class="product-details-variable">
                        <h4 class="title">Available Options</h4>
                        <!-- Product Variable Single Item -->
                        <div class="variable-single-item">
                            <div class="product-stock"> <span class="product-stock-in"><i
                                        class="ion-checkmark-circled"></i></span> 200 IN STOCK</div>
                        </div>
                        <!-- Product Variable Single Item -->
                        <div class="variable-single-item">
                            <span>Color</span>
                            <div class="product-variable-color">
                                <label for="product-color-red">
                                    <input name="product-color" id="product-color-red" class="color-select"
                                           type="radio" checked>
                                    <span class="product-color-red"></span>
                                </label>
                                <label for="product-color-tomato">
                                    <input name="product-color" id="product-color-tomato" class="color-select"
                                           type="radio">
                                    <span class="product-color-tomato"></span>
                                </label>
                                <label for="product-color-green">
                                    <input name="product-color" id="product-color-green" class="color-select"
                                           type="radio">
                                    <span class="product-color-green"></span>
                                </label>
                                <label for="product-color-light-green">
                                    <input name="product-color" id="product-color-light-green" class="color-select"
                                           type="radio">
                                    <span class="product-color-light-green"></span>
                                </label>
                                <label for="product-color-blue">
                                    <input name="product-color" id="product-color-blue" class="color-select"
                                           type="radio">
                                    <span class="product-color-blue"></span>
                                </label>
                                <label for="product-color-light-blue">
                                    <input name="product-color" id="product-color-light-blue" class="color-select"
                                           type="radio">
                                    <span class="product-color-light-blue"></span>
                                </label>
                            </div>
                        </div>

                        <!-- Product Variable Single Item -->
                        <div class="variable-single-item">
                            <span>Size</span>
                            <select class="product-variable-size">
                                <option selected value="1"> size in option</option>
                                <option value="2">s</option>
                                <option value="3">m</option>
                                <option value="4">l</option>
                                <option value="5">xl</option>
                                <option value="6">xxl</option>
                            </select>
                        </div>
                        <!-- Product Variable Single Item -->
                        <div class="d-flex align-items-center ">
                            <div class="variable-single-item ">
                                <span>Quantity</span>
                                <div class="product-variable-quantity">
                                    <input min="1" max="100" value="1" type="number">
                                </div>
                            </div>

                            <div class="product-add-to-cart-btn">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modalAddcart">+ Add To Cart</a>
                            </div>
                        </div>
                        <!-- Start  Product Details Meta Area-->
                        <div class="product-details-meta mb-20">
                            <a href="wishlist.html" class="icon-space-right"><i class="icon-heart"></i>Add to
                                wishlist</a>
                            <a href="compare.html" class="icon-space-right"><i class="icon-refresh"></i>Compare</a>
                        </div> <!-- End  Product Details Meta Area-->
                    </div> <!-- End Product Variable Area -->

                    <!-- Start  Product Details Catagories Area-->
                    <div class="product-details-catagory mb-2">
                        <span class="title">CATEGORIES:</span>
                        <ul>
                            <li><a href="#">BAR STOOL</a></li>
                            <li><a href="#">KITCHEN UTENSILS</a></li>
                            <li><a href="#">TENNIS</a></li>
                        </ul>
                    </div> <!-- End  Product Details Catagories Area-->


                    <!-- Start  Product Details Social Area-->
                    <div class="product-details-social">
                        <span class="title">SHARE THIS PRODUCT:</span>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> <!-- End  Product Details Social Area-->
                </div>
            </div>
        </div>
    </div>
</div> <!-- End Product Details Section -->

<!-- Start Product Content Tab Section -->
<div class="product-details-content-tab-section section-top-gap-100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-details-content-tab-wrapper" data-aos="fade-up" data-aos-delay="0">

                    <!-- Start Product Details Tab Button -->
                    <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                        <li><a class="nav-link active" data-bs-toggle="tab" href="#description">
                                Description
                            </a></li>
                        <li><a class="nav-link" data-bs-toggle="tab" href="#specification">
                                Specification
                            </a></li>
                        <li><a class="nav-link" data-bs-toggle="tab" href="#review">
                                Reviews (1)
                            </a></li>
                    </ul> <!-- End Product Details Tab Button -->

                    <!-- Start Product Details Tab Content -->
                    <div class="product-details-content-tab">
                        <div class="tab-content">
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane active show" id="description">
                                <div class="single-tab-content-item">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue
                                        nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi
                                        ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate
                                        adipiscing cursus eu, suscipit id nulla. </p>
                                    <p>Pellentesque aliquet, sem eget laoreet ultrices, ipsum metus feugiat sem,
                                        quis fermentum turpis eros eget velit. Donec ac tempus ante. Fusce ultricies
                                        massa massa. Fusce aliquam, purus eget sagittis vulputate, sapien libero
                                        hendrerit est, sed commodo augue nisi non neque. Lorem ipsum dolor sit amet,
                                        consectetur adipiscing elit. Sed tempor, lorem et placerat vestibulum, metus
                                        nisi posuere nisl, in accumsan elit odio quis mi. Cras neque metus,
                                        consequat et blandit et, luctus a nunc. Etiam gravida vehicula tellus, in
                                        imperdiet ligula euismod eget</p>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane" id="specification">
                                <div class="single-tab-content-item">
                                    <table class="table table-bordered mb-20">
                                        <tbody>
                                        <tr>
                                            <th scope="row">Compositions</th>
                                            <td>Polyester</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Styles</th>
                                            <td>Girly</td>
                                        <tr>
                                            <th scope="row">Properties</th>
                                            <td>Short Dress</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <p>Fashion has been creating well-designed collections since 2010. The brand
                                        offers feminine designs delivering stylish separates and statement dresses
                                        which have since evolved into a full ready-to-wear collection in which every
                                        item is a vital part of a woman's wardrobe. The result? Cool, easy, chic
                                        looks with youthful elegance and unmistakable signature style. All the
                                        beautiful pieces are made in Italy and manufactured with the greatest
                                        attention. Now Fashion extends to a range of accessories including shoes,
                                        hats, belts and more!</p>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="tab-pane" id="review">
                                <div class="single-tab-content-item">
                                    <!-- Start - Review Comment -->
                                    <ul class="comment">
                                        <!-- Start - Review Comment list-->
                                        <li class="comment-list">
                                            <div class="comment-wrapper">
                                                <div class="comment-img">
                                                    <img src="layout/assets/images/user/image-1.png" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-content-top">
                                                        <div class="comment-content-left">
                                                            <h6 class="comment-name">Kaedyn Fraser</h6>
                                                            <ul class="review-star">
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="empty"><i class="ion-android-star"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="comment-content-right">
                                                            <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>

                                                    <div class="para-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Tempora inventore dolorem a unde modi iste odio amet,
                                                            fugit fuga aliquam, voluptatem maiores animi dolor nulla
                                                            magnam ea! Dignissimos aspernatur cumque nam quod sint
                                                            provident modi alias culpa, inventore deserunt
                                                            accusantium amet earum soluta consequatur quasi eum eius
                                                            laboriosam, maiores praesentium explicabo enim dolores
                                                            quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam
                                                            officia, saepe repellat. </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Start - Review Comment Reply-->
                                            <ul class="comment-reply">
                                                <li class="comment-reply-list">
                                                    <div class="comment-wrapper">
                                                        <div class="comment-img">
                                                            <img src="layout/assets/images/user/image-2.png" alt="">
                                                        </div>
                                                        <div class="comment-content">
                                                            <div class="comment-content-top">
                                                                <div class="comment-content-left">
                                                                    <h6 class="comment-name">Oaklee Odom</h6>
                                                                </div>
                                                                <div class="comment-content-right">
                                                                    <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                                </div>
                                                            </div>

                                                            <div class="para-content">
                                                                <p>Lorem ipsum dolor sit amet, consectetur
                                                                    adipisicing elit. Tempora inventore dolorem a
                                                                    unde modi iste odio amet, fugit fuga aliquam,
                                                                    voluptatem maiores animi dolor nulla magnam ea!
                                                                    Dignissimos aspernatur cumque nam quod sint
                                                                    provident modi alias culpa, inventore deserunt
                                                                    accusantium amet earum soluta consequatur quasi
                                                                    eum eius laboriosam, maiores praesentium
                                                                    explicabo enim dolores quaerat! Voluptas ad
                                                                    ullam quia odio sint sunt. Ipsam officia, saepe
                                                                    repellat. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul> <!-- End - Review Comment Reply-->
                                        </li> <!-- End - Review Comment list-->
                                        <!-- Start - Review Comment list-->
                                        <li class="comment-list">
                                            <div class="comment-wrapper">
                                                <div class="comment-img">
                                                    <img src="layout/assets/images/user/image-3.png" alt="">
                                                </div>
                                                <div class="comment-content">
                                                    <div class="comment-content-top">
                                                        <div class="comment-content-left">
                                                            <h6 class="comment-name">Jaydin Jones</h6>
                                                            <ul class="review-star">
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="fill"><i class="ion-android-star"></i>
                                                                </li>
                                                                <li class="empty"><i class="ion-android-star"></i>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="comment-content-right">
                                                            <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                        </div>
                                                    </div>

                                                    <div class="para-content">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                            Tempora inventore dolorem a unde modi iste odio amet,
                                                            fugit fuga aliquam, voluptatem maiores animi dolor nulla
                                                            magnam ea! Dignissimos aspernatur cumque nam quod sint
                                                            provident modi alias culpa, inventore deserunt
                                                            accusantium amet earum soluta consequatur quasi eum eius
                                                            laboriosam, maiores praesentium explicabo enim dolores
                                                            quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam
                                                            officia, saepe repellat. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li> <!-- End - Review Comment list-->
                                    </ul> <!-- End - Review Comment -->
                                    <div class="review-form">
                                        <div class="review-form-text-top">
                                            <h5>ADD A REVIEW</h5>
                                            <p>Your email address will not be published. Required fields are marked
                                                *</p>
                                        </div>

                                        <form action="#" method="post">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="default-form-box">
                                                        <label for="comment-name">Your name <span>*</span></label>
                                                        <input id="comment-name" type="text"
                                                               placeholder="Enter your name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="default-form-box">
                                                        <label for="comment-email">Your Email <span>*</span></label>
                                                        <input id="comment-email" type="email"
                                                               placeholder="Enter your email" required>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="default-form-box">
                                                        <label for="comment-review-text">Your review
                                                            <span>*</span></label>
                                                        <textarea id="comment-review-text"
                                                                  placeholder="Write a review" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-md btn-black-default-hover"
                                                            type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- End Product Details Tab Content Singel -->
                        </div>
                    </div> <!-- End Product Details Tab Content -->

                </div>
            </div>
        </div>
    </div>
</div> <!-- End Product Content Tab Section -->

<!-- Start Product Default Slider Section -->
<div class="product-default-slider-section section-top-gap-100 section-fluid">
    <!-- Start Section Content Text Area -->
    <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-content-gap">
                        <div class="secton-content">
                            <h3 class="section-title">RELATED PRODUCTS</h3>
                            <p>Browse the collection of our related products.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Start Section Content Text Area -->
    <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-slider-default-1row default-slider-nav-arrow">
                        <!-- Slider main container -->
                        <div class="swiper-container product-default-slider-4grid-1row">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                                <div class="product-default-single-item product-color--golden swiper-slide">
                                    <div class="image-box">
                                        <a href="product-details-default.html" class="image-link">
                                            <img src="layout/assets/images/product/default/home-1/default-9.jpg" alt="">
                                            <img src="layout/assets/images/product/default/home-1/default-10.jpg" alt="">
                                        </a>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalAddcart">Add to Cart</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalQuickview"><i
                                                        class="icon-magnifier"></i></a>
                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="product-details-default.html">Epicuri per
                                                    lobortis</a></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price">$68</span>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                                <div class="product-default-single-item product-color--golden swiper-slide">
                                    <div class="image-box">
                                        <a href="product-details-default.html" class="image-link">
                                            <img src="layout/assets/images/product/default/home-1/default-11.jpg" alt="">
                                            <img src="layout/assets/images/product/default/home-1/default-3.jpg" alt="">
                                        </a>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalAddcart">Add to Cart</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalQuickview"><i
                                                        class="icon-magnifier"></i></a>
                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="product-details-default.html">Kaoreet
                                                    lobortis sagit</a></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price">$95.00</span>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                                <div class="product-default-single-item product-color--golden swiper-slide">
                                    <div class="image-box">
                                        <a href="product-details-default.html" class="image-link">
                                            <img src="layout/assets/images/product/default/home-1/default-5.jpg" alt="">
                                            <img src="layout/assets/images/product/default/home-1/default-7.jpg" alt="">
                                        </a>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalAddcart">Add to Cart</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalQuickview"><i
                                                        class="icon-magnifier"></i></a>
                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="product-details-default.html">Condimentum
                                                    posuere</a></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price">$115.00</span>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                                <div class="product-default-single-item product-color--golden swiper-slide">
                                    <div class="image-box">
                                        <a href="product-details-default.html" class="image-link">
                                            <img src="layout/assets/images/product/default/home-1/default-6.jpg" alt="">
                                            <img src="layout/assets/images/product/default/home-1/default-9.jpg" alt="">
                                        </a>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalAddcart">Add to Cart</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalQuickview"><i
                                                        class="icon-magnifier"></i></a>
                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="product-details-default.html">Convallis quam
                                                    sit</a></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price">$75.00 - $85.00</span>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                                <div class="product-default-single-item product-color--golden swiper-slide">
                                    <div class="image-box">
                                        <a href="product-details-default.html" class="image-link">
                                            <img src="layout/assets/images/product/default/home-1/default-1.jpg" alt="">
                                            <img src="layout/assets/images/product/default/home-1/default-2.jpg" alt="">
                                        </a>
                                        <div class="tag">
                                            <span>sale</span>
                                        </div>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalAddcart">Add to Cart</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalQuickview"><i
                                                        class="icon-magnifier"></i></a>
                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="product-details-default.html">Aliquam
                                                    lobortis</a></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price">$75.00 - $85.00</span>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                                <div class="product-default-single-item product-color--golden swiper-slide">
                                    <div class="image-box">
                                        <a href="product-details-default.html" class="image-link">
                                            <img src="layout/assets/images/product/default/home-1/default-3.jpg" alt="">
                                            <img src="layout/assets/images/product/default/home-1/default-4.jpg" alt="">
                                        </a>
                                        <div class="tag">
                                            <span>sale</span>
                                        </div>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalAddcart">Add to Cart</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalQuickview"><i
                                                        class="icon-magnifier"></i></a>
                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="product-details-default.html">Condimentum
                                                    posuere</a></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price"><del>$89.00</del> $80.00</span>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                                <div class="product-default-single-item product-color--golden swiper-slide">
                                    <div class="image-box">
                                        <a href="product-details-default.html" class="image-link">
                                            <img src="layout/assets/images/product/default/home-1/default-5.jpg" alt="">
                                            <img src="layout/assets/images/product/default/home-1/default-6.jpg" alt="">
                                        </a>
                                        <div class="tag">
                                            <span>sale</span>
                                        </div>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalAddcart">Add to Cart</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalQuickview"><i
                                                        class="icon-magnifier"></i></a>
                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="product-details-default.html">Cras neque
                                                    metus</a></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price"><del>$70.00</del> $60.00</span>
                                        </div>

                                    </div>
                                </div>
                                <!-- End Product Default Single Item -->
                                <!-- Start Product Default Single Item -->
                                <div class="product-default-single-item product-color--golden swiper-slide">
                                    <div class="image-box">
                                        <a href="product-details-default.html" class="image-link">
                                            <img src="layout/assets/images/product/default/home-1/default-7.jpg" alt="">
                                            <img src="layout/assets/images/product/default/home-1/default-8.jpg" alt="">
                                        </a>
                                        <div class="action-link">
                                            <div class="action-link-left">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalAddcart">Add to Cart</a>
                                            </div>
                                            <div class="action-link-right">
                                                <a href="#" data-bs-toggle="modal"
                                                   data-bs-target="#modalQuickview"><i
                                                        class="icon-magnifier"></i></a>
                                                <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                <a href="compare.html"><i class="icon-shuffle"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <div class="content-left">
                                            <h6 class="title"><a href="product-details-default.html">Donec eu libero
                                                    ac</a></h6>
                                            <ul class="review-star">
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="fill"><i class="ion-android-star"></i></li>
                                                <li class="empty"><i class="ion-android-star"></i></li>
                                            </ul>
                                        </div>
                                        <div class="content-right">
                                            <span class="price">$74</span>
                                        </div>

                                    </div>
                                </div> <!-- End Product Default Single Item -->
                            </div>
                        </div>
                        <!-- If we need navigation buttons -->
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Default Slider Section -->

<!--End Page-->
<?php include "includes/templates/footer.php"; ?>
