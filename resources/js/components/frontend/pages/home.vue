<template>
    <div>
        <main class="main-wrapper">
            <!-- Start Slider Area -->
            <div class="axil-main-slider-area main-slider-style-2 main-slider-style-8">
                <div class="container">
                    <div class="mt-3">
                        <div class="row row--20">
                            <div class="col-lg-6">
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
                            <div class="col-lg-6">
                                <div class="row">
                                    <div class="col-6">
                                         <div class="slider-product-box">
                                            <div class="product-thumb">
                                                <a href="single-product.html">
                                                    <img style="width:180px" src="https://dodopizza-a.akamaihd.net/static/Img/Products/11ee812a80cc48f7a14a00c77e41bfce_366x366.webp" alt="Product">
                                                </a>
                                            </div>
                                            <h1 class="title"><a href="single-product.html">Stylish Leather Bag</a></h1>
                                            <span class="price">$29.99</span>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                         <div class="slider-product-box">

                                            <h1 class="title"><a href="single-product.html">Stylish Leather Bag</a></h1>
                                            <span class="price">$29.99</span>
                                             <div class="product-thumb">
                                                <a href="single-product.html">
                                                    <img style="width:180px" src="https://dodopizza-a.akamaihd.net/static/Img/Products/11ee812a80cc48f7a14a00c77e41bfce_366x366.webp" alt="Product">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
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
            <div v-for="(category, categoryId) in products" :key="categoryId" class="axil-new-arrivals-product-area  flash-sale-area bg-color-white  pb--0 mt-5" :id="category.name">
                <div class="container">
                <template v-if="category.products.length > 0">
                    <div class="product-area pb--50">
                        <div class="d-md-flex align-items-end flash-sale-section">
                        <div class="section-title-wrapper">
                            <h4 class="title">{{ category.category_name }}</h4>
                        </div>
                        <div class="sale-countdown countdown"></div>
                        </div>
                        <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                        <div class="row">
                            <div v-for="product in category.products" :key="product.id" class="col-6 col-md-3">
                                <div class="slick-single-layout">
                                    <div class="axil-product product-style-four">
                                    <div @click="getProductDetails(product.id)" class="thumbnail">
                                        <a @click="getProductDetails(product.id)">
                                        <img :src="'/frontend/product_images/' + product.image" alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                        <!-- <div class="product-badget">20% OFF</div> -->
                                        </div>
                                        <div class="product-hover-action">
                                        <ul class="cart-action">

                                            <li class="select-option">
                                                <a @click="getProductDetails(product.id)">Select</a>
                                            </li>
                                        </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                        <h5 class="title">
                                            <a href="single-product.html">{{product.name}}</a>
                                        </h5>
                                        <div class="product-price-variant">
                                            <span class="price old-price">$80</span>
                                            <span class="price current-price">$60</span>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>


                    </div>
                </template>
                </div>

                <div v-if="categoryId==2" class="axil-new-arrivals-product-area  flash-sale-area bg-color-white  pb--0" style="background-color:rgb(238, 110, 45)">
                    <div class="container">
                        <div class="row py-5">
                            <div class="col-lg-4 col-sm-12">
                            <div class="elementor-element elementor-element-a489fec elementor-column elementor-col-33 elementor-top-column" data-id="a489fec" data-element_type="column">
                                <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                <div class="elementor-element elementor-element-2a9e9a4 elementor-widget elementor-widget-heading" data-id="2a9e9a4" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                <h2 class="elementor-heading-title elementor-size-default" style="color:#fff; font-size:40px">Are you interested in entrepreneurship?</h2> </div>
                                </div>
                                <div class="elementor-element elementor-element-9c12109 elementor-widget elementor-widget-heading" data-id="9c12109" data-element_type="widget" data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                <p class="elementor-heading-title elementor-size-default" style="color:#fff">We are looking for lovers of good street food to become new Elias döner entrepreneurs Previous restaurant experience, managerial experience and/or entrepreneurial experience is considered an advantage.</p> </div>
                                </div>
                                <div class="elementor-element elementor-element-374b8dc elementor-align-left elementor-widget elementor-widget-button" data-id="374b8dc" data-element_type="widget" data-settings="{&quot;_animation&quot;:&quot;none&quot;}" data-widget_type="button.default">
                                <div class="elementor-widget-container">
                                <div class="elementor-button-wrapper">
                                <a href="#" class="elementor-button-link elementor-button elementor-size-sm" role="button">
                                <span class="elementor-button-content-wrapper">
                                <span class="elementor-button-text btn btn-warning mt-3" style="color:#fff; padding:10px; font-size:20px;" >Contact Us</span>
                                </span>
                                </a>
                                &nbsp;&nbsp;&nbsp;
                                <a href="#" class="elementor-button-link elementor-button elementor-size-sm" role="button">
                                <span class="elementor-button-content-wrapper">
                                <span class="elementor-button-text btn btn-secondary mt-3" style="color:#fff; padding:10px; font-size:20px;" >Read More</span>
                                </span>
                                </a>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="elementor-column-wrap  elementor-element-populated">
                                <img src="https://demo74leotheme.b-cdn.net/prestashop/leo_poco_elementor_demo/25-home_default/hummingbird-printed-t-shirt.jpg" title="" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="elementor-element elementor-element-ab6aaad elementor-column elementor-col-33 elementor-top-column" data-id="ab6aaad" data-element_type="column">
                                <div class="elementor-column-wrap  elementor-element-populated">
                                <div class="elementor-widget-wrap">
                                <div class="elementor-element elementor-element-04d3530 service-wr-h5 elementor-widget elementor-widget-LeoBlockCarousel" data-id="04d3530" data-element_type="widget" data-settings="{&quot;slides_to_scroll&quot;:&quot;6&quot;,&quot;slides_to_show&quot;:2,&quot;slides_to_show_tablet&quot;:2,&quot;slides_to_show_mobile&quot;:1,&quot;slides_to_scroll_tablet&quot;:2,&quot;slides_to_scroll_mobile&quot;:1,&quot;slick_arrows&quot;:&quot;1&quot;,&quot;slick_dot&quot;:&quot;1&quot;,&quot;infinite&quot;:&quot;1&quot;,&quot;speed&quot;:500,&quot;autoplay&quot;:&quot;1&quot;,&quot;pause_on_hover&quot;:&quot;1&quot;,&quot;autoplay_speed&quot;:5000}" data-widget_type="LeoBlockCarousel.default">
                                <div class="elementor-widget-container">
                                <div class="block block_carousel exclusive LeoBlockCarousel elementor-slick-slider ">
                                <div class="block_content">
                                <div class="slick-row hide-loading">
                                <div class="slick-blogs slick-slider slick-initialized slick-dotted slick-loaded" id="LeoBlockCarousel_2148003574"><div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 528px; transform: translate3d(0px, 0px, 0px);"><div class="slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 263.97px;" tabindex="0" role="tabpanel" id="slick-slide40" aria-describedby="slick-slide-control40"><div><div class="slick-slide first" aria-hidden="true" style="width: 100%; display: inline-block;">
                                <div class="item">
                                <div class="block-carousel-container">
                                <div class="left-block">
                                <div class="block-carousel-image-container image">
                                <div class="ap-more-info" data-id="65385"></div>
                                <a title="Online Order" href="" tabindex="0" style="color:#fff"> <div class="item-title" style="width:100%" >Online Order</div>
                                <img class="img-fluid" src="https://cdn.shopify.com/s/files/1/0905/2012/files/poco-icon-1.png?v=1673511017" alt="Online Order">
                                </a>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div></div><div><div class="slick-slide" aria-hidden="true" style="width: 100%; display: inline-block;">
                                <div class="item">
                                <div class="block-carousel-container">
                                <div class="left-block">
                                <div class="block-carousel-image-container image">
                                <div class="ap-more-info" data-id="19226"></div>
                                <a title="24/7 Service" href="" tabindex="0" style="color:#fff">  <div class="item-title" style="width:100%" >24/7 Service</div>
                                <img class="img-fluid" src="https://cdn.shopify.com/s/files/1/0905/2012/files/poco-icon-2.png?v=1673511017" alt="24/7 Service">
                                </a>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div></div><div><div class="slick-slide" aria-hidden="true" style="width: 100%; display: inline-block;">
                                <div class="item">
                                <div class="block-carousel-container">
                                <div class="left-block">
                                <div class="block-carousel-image-container image">
                                <div class="ap-more-info" data-id="634700"></div>
                                <a title="Clean Kitchen" href="" tabindex="0" style="color:#fff"> <div class="item-title" style="width:100%" >Clean Kitchen</div>
                                <img class="img-fluid" src="https://cdn.shopify.com/s/files/1/0905/2012/files/poco-icon-3.png?v=1673511017" alt="Clean Kitchen">
                                </a>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div></div></div><div class="slick-slide slick-active" data-slick-index="1" aria-hidden="false" style="width: 263.97px;" tabindex="0" role="tabpanel" id="slick-slide41"><div><div class="slick-slide" aria-hidden="true" style="width: 100%; display: inline-block;">
                                <div class="item">
                                <div class="block-carousel-container">
                                <div class="left-block">
                                <div class="block-carousel-image-container image">
                                <div class="ap-more-info" data-id="0"></div>
                                <a title="Pre-Reservation" href="" tabindex="0" style="color:#fff"> <div class="item-title" style="width:100%">Pre-Reservation</div>
                                <img class="img-fluid" src="https://cdn.shopify.com/s/files/1/0905/2012/files/poco-icon-4.png?v=1673511017" alt="Pre-Reservation">
                                </a>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div></div><div><div class="slick-slide" aria-hidden="true" style="width: 100%; display: inline-block;">
                                <div class="item">
                                <div class="block-carousel-container">
                                <div class="left-block">
                                <div class="block-carousel-image-container image">
                                <div class="ap-more-info" data-id="4129"></div>
                                <a title="Oraganized Foodie Place" href="" tabindex="0" style="color:#fff"> <div class="item-title" style="width:100%">Oraganized Foodie Place</div>
                                <img class="img-fluid" src="https://cdn.shopify.com/s/files/1/0905/2012/files/poco-icon-5.png?v=1673511017" alt="Oraganized Foodie Place">
                                </a>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div></div><div><div class="slick-slide" aria-hidden="true" style="width: 100%; display: inline-block;">
                                <div class="item">
                                <div class="block-carousel-container">
                                <div class="left-block">
                                <div class="block-carousel-image-container image">
                                <div class="ap-more-info" data-id="4"></div>
                                <a title="Online Order" href="" tabindex="0" style="color:#fff"> <div class="item-title" style="width:100%">Online Order</div>
                                <img class="img-fluid" src="https://cdn.shopify.com/s/files/1/0905/2012/files/poco-icon-6.png?v=1673511017" alt="Online Order">
                                </a>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div></div></div></div></div><ul class="slick-dots" role="tablist"><li class="slick-active" role="presentation"><button type="button" role="tab" id="slick-slide-control40" aria-controls="slick-slide40" aria-label="1 of 1" tabindex="0" aria-selected="true">1</button></li></ul></div>
                                </div>

                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

            </div>
        <!-- End Flash Sale Area  -->


            <!-- <div class="axil-new-arrivals-product-area  flash-sale-area bg-color-white  pb--0 pt-3">
                <div class="container">
                    <div class="product-area pb--50">
                        <div class="d-md-flex align-items-end flash-sale-section">
                            <div class="section-title-wrapper">
                                <h4 class="title">Snacks</h4>
                            </div>
                            <div class="sale-countdown countdown"></div>
                        </div>
                      <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/468612f786de4d1499927e4dd562d854_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                    <div class="product-badget">20% OFF</div>
                                    </div>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">Level 20 RGB Cherry</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$80</span>
                                        <span class="price current-price">$60</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/11eeb4598db3bf85980e2813b29ccc80_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">Sky Blue T-shirt</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$40</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/11ee812a80cc48f7a14a00c77e41bfce_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                    <div class="product-badget">50% OFF</div>
                                    </div>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">Women's Stylish Hat</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$24</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/b5f5e56ce2a94e29a8ef6d52b6945258_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                    </div>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">Diamond Ring</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/b5f5e56ce2a94e29a8ef6d52b6945258_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">Neue Sofa Chair</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$50</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/c3ea7e21bb3f40da8f885ad01b7266f6_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                    <div class="product-badget">50% OFF</div>
                                    </div>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">3D™ wireless headset</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$24</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/4f7dc2ed66db499e9eb52b2f2f36b870_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                    </div>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">Men's Winter Jacket</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/1849a4bb94534a5994f833d8ff2a51b8_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">Leather Hand Bag</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$50</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
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
                       <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/468612f786de4d1499927e4dd562d854_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                    <div class="product-badget">20% OFF</div>
                                    </div>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">Level 20 RGB Cherry</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$80</span>
                                        <span class="price current-price">$60</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/11eeb4598db3bf85980e2813b29ccc80_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">Sky Blue T-shirt</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$40</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/11ee812a80cc48f7a14a00c77e41bfce_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                    <div class="product-badget">50% OFF</div>
                                    </div>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">Women's Stylish Hat</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$24</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/b5f5e56ce2a94e29a8ef6d52b6945258_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                    </div>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">Diamond Ring</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/b5f5e56ce2a94e29a8ef6d52b6945258_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">Neue Sofa Chair</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$50</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/c3ea7e21bb3f40da8f885ad01b7266f6_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                    <div class="product-badget">50% OFF</div>
                                    </div>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">3D™ wireless headset</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$30</span>
                                        <span class="price current-price">$24</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/4f7dc2ed66db499e9eb52b2f2f36b870_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                    <div class="product-badget">30% OFF</div>
                                    </div>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">Men's Winter Jacket</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$50</span>
                                        <span class="price current-price">$40</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xsm-2">
                            <div class="slick-single-layout">
                                <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="single-product.html">
                                    <img src="https://dodopizza-a.akamaihd.net/static/Img/Products/1849a4bb94534a5994f833d8ff2a51b8_366x366.webp" alt="Product Images">
                                    </a>
                                    <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="wishlist">
                                        <a href="wishlist.html">
                                            <i class="far fa-heart"></i>
                                        </a>
                                        </li>
                                        <li class="select-option">
                                        <a href="cart.html">Add to Cart</a>
                                        </li>
                                        <li class="quickview">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        </li>
                                    </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                    <h5 class="title">
                                        <a href="single-product.html">Leather Hand Bag</a>
                                    </h5>
                                    <div class="product-price-variant">
                                        <span class="price old-price">$60</span>
                                        <span class="price current-price">$50</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <Details :productData="product" :productSizes="productSizes" :productTopings="productTopings" maxMin:="maxMin" v-if="showAddToCart" @closeModal="handleModalClose"></Details>
            <div class="cart-dropdown" id="cart-dropdown">
                <div class="cart-content-wrap">
                    <div class="cart-header">
                        <h2 class="header-title">Cart review</h2>
                        <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="cart-body">
                        <ul class="cart-item-list">
                            <ul>
                                <li v-for="(productSizes, productId) in cart" :key="productId">
                                    <div v-if="cart.hasOwnProperty(productId)">
                                    <ul>
                                        <li v-for="(item, sizeId) in productSizes" :key="sizeId">
                                            <img style="width:40px;" :src="'/frontend/product_images/' + item.product.image" alt="Product Images">
                                            {{ item.product.name }} ({{ item.size.name }})
                                        </li>
                                    </ul>
                                    </div>
                                </li>
                            </ul>


                        </ul>
                    </div>
                    <div class="cart-footer">
                        <h3 class="cart-subtotal">
                            <span class="subtotal-title">Subtotal:</span>
                            <span class="subtotal-amount">$610.00</span>
                        </h3>
                        <div class="group-btn">
                            <a href="cart.html" class="axil-btn btn-bg-primary viewcart-btn">View Cart</a>
                            <a href="checkout.html" class="axil-btn btn-bg-secondary checkout-btn">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
     <!-- <div class="input-group">
        <input type="radio" id="radio2"  name="shipping">
        <label for="radio2">Free Shippping</label>
    </div>
     <div class="input-group">
        <input type="radio" id="radio1"  name="shipping">
        <label for="radio1">Free Shippping</label>
    </div> -->

</template>
<script>
import {Swiper,SwiperSlide} from 'swiper/vue';
import Details from '../../../components/frontend/pages/modal/details.vue';
import 'swiper/css';
export default {
    name: 'home',
    components: {
        Swiper,
        SwiperSlide,
        Details
    },
     data(){
        return{
            products:{},
            product:null,
            productSizes:null,
            productTopings:null,
            maxMin:null,
            showAddToCart:false,
            cart:[],
        }
    },
    mounted(){
        this.getCategoryWiseProduct();
        this.loadCartFromLocalStorage();
    },
    methods: {
        getCategoryWiseProduct(){
            axios.get('get-products')
            .then((res)=>{
                this.products = res.data;
            })
            .catch((err)=>{
                console.log(err);
            })
        },
        getProductDetails(productId) {
            // alert(productId)
            axios.get('get-product-details', {
                    params: {
                        id: productId
                    }
            }).then((res) => {
                    // console.log();
                    if (res.data[0]) {
                        this.showAddToCart = true;
                        this.product = res.data[0];
                        this.productSizes = res.data[1];
                        this.productTopings =  res.data[2];
                        this.maxMin =  res.data[3];
                        console.log(this.maxMin);
                    }
            }).catch((err) => {
                    console.log(err);
            });
        },
        handleModalClose() {
            this.showAddToCart = false;
        },

        loadCartFromLocalStorage() {
            const savedCart = localStorage.getItem('cart');
            this.cart = savedCart ? JSON.parse(savedCart) : [];

            // for (const productId in this.cart) {
            //     if (this.cart.hasOwnProperty(productId)) {
            //         const productSizes = this.cart[productId];
            //         // Loop through product sizes
            //         for (const sizeId in productSizes) {
            //             if (productSizes.hasOwnProperty(sizeId)) {
            //                 const item = productSizes[sizeId];
            //                 // Access item properties
            //                 console.log('Quantity:', item.quantity);
            //                 console.log('Product:', item.product);
            //                 console.log('Size:', item.size);
            //                 console.log('Toppings:', item.topings);
            //                 console.log('Total Price:', item.totalPrice);
            //             }
            //         }
            //     }
            // }
        }
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
