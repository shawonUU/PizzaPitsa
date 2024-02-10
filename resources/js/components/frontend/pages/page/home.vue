<template>
    <div>
        <main class="main-wrapper">
            <!-- Start Slider Area -->
            <div class="axil-main-slider-area main-slider-style-2 main-slider-style-8">
                <div class="container">
                    <div class="mt-3">
                        <div class="row row--20">
                            <div class="col-lg-7">
                                <div class="slider-box-wrap">
                                    <div class="slider-activation-one axil-slick-dots">
                                        <swiper :slides-per-view="1" :space-between="50" @swiper="onSwiper"
                                            @slideChange="onSlideChange">
                                            <swiper-slide>
                                                <div class="single-slide slick-slide">
                                                    <div class="main-slider-content">                                                        
                                                        <h1 class="title">Up to 60% off Sale</h1>
                                                        <div class="shop-btn">
                                                            <a href="shop.html" class="axil-btn">Shop Now <i
                                                                    class="fal fa-long-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="main-slider-thumb">
                                                        <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/e9a8dcd478f2459f9c645d7b96e0bef2_366x366.webp"
                                                            alt="Product">
                                                    </div>
                                                </div>
                                            </swiper-slide>
                                            <swiper-slide>
                                                <div class="single-slide slick-slide">
                                                    <div class="main-slider-content">                                                        
                                                        <h1 class="title">Up to 60% off Voucher</h1>
                                                        <div class="shop-btn">
                                                            <a href="shop.html" class="axil-btn">Shop Now <i
                                                                    class="fal fa-long-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="main-slider-thumb">
                                                        <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/95d174f38e8340248aee29afa3dff5e9_366x366.webp"
                                                            alt="Product">
                                                    </div>
                                                </div>
                                            </swiper-slide>
                                            <swiper-slide>
                                                <div class="single-slide slick-slide">
                                                    <div class="main-slider-content">                                                      
                                                        <h1 class="title">Up to 60% off Voucher</h1>
                                                        <div class="shop-btn">
                                                            <a href="shop.html" class="axil-btn">Shop Now <i
                                                                    class="fal fa-long-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="main-slider-thumb">
                                                        <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/1fd214b146f14696a630ffff0f529c82_366x366.webp"
                                                            alt="Product">
                                                    </div>
                                                </div>
                                            </swiper-slide>
                                        </swiper>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="slider-product-box">
                                    <div class="product-thumb">
                                        <a href="single-product.html">
                                            <img style="width:200px" src="https://dodopizza-a.akamaihd.net/static/Img/Products/11ee812a80cc48f7a14a00c77e41bfce_366x366.webp" alt="Product">
                                        </a>
                                    </div>
                                    <h6 class="title"><a href="single-product.html">Stylish Leather Bag</a></h6>
                                    <span class="price">$29.99</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Slider Area -->
            <!-- Start Categorie Area  -->
            <div class="axil-categorie-area bg-color-white">
                <div class="container">
                    <div class="section-title-wrapper">
                        <h4 class="title">New and Popular</h4>
                    </div>

                    <swiper :space-between="50"
                        :breakpoints="{
                            '320': {
                                slidesPerView: 2,
                                spaceBetween: 10,
                            },
                            '640': {
                                slidesPerView: 3,
                                spaceBetween: 20,
                            },
                            '768': {
                                slidesPerView: 4,
                                spaceBetween: 40,
                            },
                            '1024': {
                                slidesPerView: 5,
                                spaceBetween: 50,
                            },
                        }"
                        @swiper="onSwiper" @slideChange="onSlideChange">
                        <swiper-slide>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img style="width:70px"
                                        src="https://dodopizza-a.akamaihd.net/static/Img/Products/b5f5e56ce2a94e29a8ef6d52b6945258_366x366.webp"
                                        alt="...">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span>Julienne</span><br>
                                    <strong>from 11.25 €</strong>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img style="width:70px"
                                        src="https://dodopizza-a.akamaihd.net/static/Img/Products/11ee812a80cc48f7a14a00c77e41bfce_366x366.webp"
                                        alt="...">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span>Julienne</span><br>
                                    <strong>from 11.25 €</strong>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img style="width:70px"
                                        src="https://dodopizza-a.akamaihd.net/static/Img/Products/b00a55e947524c0ab1a05b48d0d9bebe_183x183.webp"
                                        alt="...">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span>Julienne</span><br>
                                    <strong>from 11.25 €</strong>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img style="width:70px"
                                        src="https://dodopizza-a.akamaihd.net/static/Img/Products/11ee96c94a1ad044b0a88a81e24f3a11_183x183.webp"
                                        alt="...">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span>Julienne</span><br>
                                    <strong>from 11.25 €</strong>
                                </div>
                            </div>
                        </swiper-slide>
                    </swiper>

                </div>

            </div>
            <!-- End Categorie Area  -->
            <!-- Start Flash Sale Area  -->
            <div class="axil-new-arrivals-product-area  flash-sale-area bg-color-white  pb--0 mt-5">
                <div class="container">
                    <div class="product-area pb--50">
                        <div class="d-md-flex align-items-end flash-sale-section">
                            <div class="section-title-wrapper">
                                <h4 class="title">Pizza</h4>
                            </div>
                            <div class="sale-countdown countdown"></div>
                        </div>
                        <div
                            class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                            <swiper :space-between="50"
                                :breakpoints="{
                                    '320': {
                                        slidesPerView: 2,
                                        spaceBetween: 10,
                                    },
                                    '640': {
                                        slidesPerView: 3,
                                        spaceBetween: 20,
                                    },
                                    '768': {
                                        slidesPerView: 4,
                                        spaceBetween: 40,
                                    },
                                    '1024': {
                                        slidesPerView: 5,
                                        spaceBetween: 50,
                                    },
                                }"
                                @swiper="onSwiper" @slideChange="onSlideChange">
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/468612f786de4d1499927e4dd562d854_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Level 20 RGB
                                                            Cherry</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$80</span>
                                                        <span class="price current-price">$60</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/11eeb4598db3bf85980e2813b29ccc80_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Sky Blue
                                                            T-shirt</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$40</span>
                                                        <span class="price current-price">$40</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/11ee812a80cc48f7a14a00c77e41bfce_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">50% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Women's Stylish
                                                            Hat</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$30</span>
                                                        <span class="price current-price">$24</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/b5f5e56ce2a94e29a8ef6d52b6945258_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">30% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Diamond Ring</a>
                                                    </h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$50</span>
                                                        <span class="price current-price">$40</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/b5f5e56ce2a94e29a8ef6d52b6945258_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Neue Sofa
                                                            Chair</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$60</span>
                                                        <span class="price current-price">$50</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/c3ea7e21bb3f40da8f885ad01b7266f6_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">50% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">3D™ wireless
                                                            headset</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$30</span>
                                                        <span class="price current-price">$24</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/4f7dc2ed66db499e9eb52b2f2f36b870_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">30% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Men's Winter
                                                            Jacket</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$50</span>
                                                        <span class="price current-price">$40</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/1849a4bb94534a5994f833d8ff2a51b8_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Leather Hand
                                                            Bag</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$60</span>
                                                        <span class="price current-price">$50</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                            </swiper>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Flash Sale Area  -->

               <div class="axil-new-arrivals-product-area  flash-sale-area bg-color-white  pb--0">
                <div class="container">
                    <div class="product-area pb--50">
                        <div class="d-md-flex align-items-end flash-sale-section">
                            <div class="section-title-wrapper">
                                <h4 class="title">Snacks</h4>
                            </div>
                            <div class="sale-countdown countdown"></div>
                        </div>
                        <div
                            class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                            <swiper :space-between="50"
                                :breakpoints="{
                                    '320': {
                                        slidesPerView: 2,
                                        spaceBetween: 10,
                                    },
                                    '640': {
                                        slidesPerView: 3,
                                        spaceBetween: 20,
                                    },
                                    '768': {
                                        slidesPerView: 4,
                                        spaceBetween: 40,
                                    },
                                    '1024': {
                                        slidesPerView: 5,
                                        spaceBetween: 50,
                                    },
                                }"
                                @swiper="onSwiper" @slideChange="onSlideChange">
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/468612f786de4d1499927e4dd562d854_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Level 20 RGB
                                                            Cherry</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$80</span>
                                                        <span class="price current-price">$60</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/11eeb4598db3bf85980e2813b29ccc80_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Sky Blue
                                                            T-shirt</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$40</span>
                                                        <span class="price current-price">$40</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/11ee812a80cc48f7a14a00c77e41bfce_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">50% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Women's Stylish
                                                            Hat</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$30</span>
                                                        <span class="price current-price">$24</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/b5f5e56ce2a94e29a8ef6d52b6945258_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">30% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Diamond Ring</a>
                                                    </h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$50</span>
                                                        <span class="price current-price">$40</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/b5f5e56ce2a94e29a8ef6d52b6945258_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Neue Sofa
                                                            Chair</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$60</span>
                                                        <span class="price current-price">$50</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/c3ea7e21bb3f40da8f885ad01b7266f6_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">50% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">3D™ wireless
                                                            headset</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$30</span>
                                                        <span class="price current-price">$24</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/4f7dc2ed66db499e9eb52b2f2f36b870_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">30% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Men's Winter
                                                            Jacket</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$50</span>
                                                        <span class="price current-price">$40</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/1849a4bb94534a5994f833d8ff2a51b8_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Leather Hand
                                                            Bag</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$60</span>
                                                        <span class="price current-price">$50</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                            </swiper>
                        </div>
                    </div>
                </div>
            </div>
               <div class="axil-new-arrivals-product-area  flash-sale-area bg-color-white  pb--0">
                <div class="container">
                    <div class="product-area pb--50">
                        <div class="d-md-flex align-items-end flash-sale-section">
                            <div class="section-title-wrapper">
                                <h4 class="title">Snacks</h4>
                            </div>
                            <div class="sale-countdown countdown"></div>
                        </div>
                        <div
                            class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                            <swiper :space-between="50"
                                :breakpoints="{
                                    '320': {
                                        slidesPerView: 2,
                                        spaceBetween: 10,
                                    },
                                    '640': {
                                        slidesPerView: 3,
                                        spaceBetween: 20,
                                    },
                                    '768': {
                                        slidesPerView: 4,
                                        spaceBetween: 40,
                                    },
                                    '1024': {
                                        slidesPerView: 5,
                                        spaceBetween: 50,
                                    },
                                }"
                                @swiper="onSwiper" @slideChange="onSlideChange">
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/468612f786de4d1499927e4dd562d854_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">20% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Level 20 RGB
                                                            Cherry</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$80</span>
                                                        <span class="price current-price">$60</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/11eeb4598db3bf85980e2813b29ccc80_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Sky Blue
                                                            T-shirt</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$40</span>
                                                        <span class="price current-price">$40</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/11ee812a80cc48f7a14a00c77e41bfce_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">50% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Women's Stylish
                                                            Hat</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$30</span>
                                                        <span class="price current-price">$24</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/b5f5e56ce2a94e29a8ef6d52b6945258_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">30% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Diamond Ring</a>
                                                    </h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$50</span>
                                                        <span class="price current-price">$40</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/b5f5e56ce2a94e29a8ef6d52b6945258_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Neue Sofa
                                                            Chair</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$60</span>
                                                        <span class="price current-price">$50</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/c3ea7e21bb3f40da8f885ad01b7266f6_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">50% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">3D™ wireless
                                                            headset</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$30</span>
                                                        <span class="price current-price">$24</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/4f7dc2ed66db499e9eb52b2f2f36b870_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="label-block label-right">
                                                    <div class="product-badget">30% OFF</div>
                                                </div>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Men's Winter
                                                            Jacket</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$50</span>
                                                        <span class="price current-price">$40</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                                <swiper-slide>
                                    <div class="slick-single-layout">
                                        <div class="axil-product product-style-four">
                                            <div class="thumbnail">
                                                <a href="single-product.html">
                                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/1849a4bb94534a5994f833d8ff2a51b8_366x366.webp"
                                                        alt="Product Images">
                                                </a>
                                                <div class="product-hover-action">
                                                    <ul class="cart-action">
                                                        <li class="wishlist"><a href="wishlist.html"><i
                                                                    class="far fa-heart"></i></a></li>
                                                        <li class="select-option"><a href="cart.html">Add to Cart</a>
                                                        </li>
                                                        <li class="quickview"><a href="#"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#quick-view-modal"><i
                                                                    class="far fa-eye"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="inner">
                                                    <h5 class="title"><a href="single-product.html">Leather Hand
                                                            Bag</a></h5>
                                                    <div class="product-price-variant">
                                                        <span class="price old-price">$60</span>
                                                        <span class="price current-price">$50</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </swiper-slide>
                                <!-- End .slick-single-layout -->
                            </swiper>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
<script>
    import {
        Swiper,
        SwiperSlide
    } from 'swiper/vue';
    import 'swiper/css';
    export default {
        name: 'home',
        components: {
            Swiper,
            SwiperSlide,
        },
        setup() {
            const onSwiper = (swiper) => {               
            };
            const onSlideChange = () => {
                console.log('slide change');
            };
            return {
                onSwiper,
                onSlideChange,
            };
        },
    };
</script>
