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
                                                            <a href="" class="axil-btn">Shop Now <i
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
            <div v-for="(category, categoryId) in sortedCategories" :key="categoryId" class="axil-new-arrivals-product-area  flash-sale-area bg-color-white  pb--0 mt-5" :id="'product_section'+category.category_id">
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
                                        <img :src="product.image ? '/frontend/product_images/' +product.image : '/frontend/product_images/placeholder.jpg'" alt="Product Images">
                                        </a>
                                        <div class="label-block label-right">
                                        <!-- <div class="product-badget">20% OFF</div> -->
                                        </div>
                                        <div class="product-hover-action">

                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                        <h5 class="title">
                                            <a style="cursor:pointer; font-size:20px" @click="getProductDetails(product.id)">{{product.name}}</a>
                                        </h5>
                                        <div class="product-price-variant">
                                            <!-- Show min_price in old-price div -->
                                            <span  class="price current-price">From</span>
                                            <span v-if="product.calculated_offer_price" class="price old-price">{{ product.min_price }}{{ baseCurrencySymbol }}</span>
                                            <!-- Display calculated_offer_price in current-price div -->
                                            <span v-else class="price current-price">{{ product.min_price }}{{ baseCurrencySymbol }}</span>
                                            <!-- Display calculated_offer_price in current-price div if both exist -->
                                            <span v-if="product.calculated_offer_price" class="price current-price">{{ product.calculated_offer_price }}{{ baseCurrencySymbol }}</span>
                                        </div>
                                            <a class="btn selectBtn" @click="getProductDetails(product.id)">Select</a>
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

                <div v-if="categoryId==2" class="axil-new-arrivals-product-area  flash-sale-area bg-color-white  pb--0" >
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-sm-12">                        
                                <div class="francicise" style="margin-top:100px">
                                <h2 class="elementor-heading-title elementor-size-default" style="font-size:40px">Are you interested in entrepreneurship?</h2>
                                                                                              
                                <p class="elementor-heading-title elementor-size-default" >We are looking for lovers of good street food to become new Elias döner entrepreneurs Previous restaurant experience, managerial experience and/or entrepreneurial experience is considered an advantage.</p> 
                              
                                
                                <a href="#" class="elementor-button-link elementor-button elementor-size-sm" role="button">
                               
                                <span class="elementor-button-text btn btn-warning mt-3" style="color:#fff; padding:10px; font-size:20px;" >Contact Us</span>
                              
                                </a>
                                &nbsp;&nbsp;&nbsp;
                                <a href="#" class="elementor-button-link elementor-button elementor-size-sm" role="button">
                                <span class="elementor-button-content-wrapper">
                                <span class="elementor-button-text btn btn-secondary mt-3" style="color:#fff; padding:10px; font-size:20px;" >Read More</span>
                                </span>
                                </a>
                                </div>    
                            </div>
                        <div class="col-lg-5 col-sm-12">
                            
                                <img src="https://templatekit.jegtheme.com/icelab/wp-content/uploads/sites/175/2021/09/vanillaice.png" title="" alt="">
                            
                        </div>
                      
                        </div>
                    </div>
                </div>
                

            </div>
              <!-- <section id="team-section-1">
                 <p>The team section</p>
                </section> -->
        <!-- End Flash Sale Area  -->
            <div v-if="isVisible" class="toast-container">
                <div class="toast">{{ message }}</div>
            </div>
            <div class="cart-dropdown" id="cart-dropdown">
                <div class="cart-content-wrap" style="padding: 18px 22px !important;">
                    <div class="cart-header">
                        <h2 class="header-title">Cart review</h2>
                        <button class="cart-close sidebar-close"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="cart-body">

                        <table class="m-0 p-0">
                            <tbody>
                                <!-- <tr>
                                    <th colspan="2">Item</th>
                                    <th style="text-align:center;">Qty</th>
                                    <th style="text-align:left;">Toping</th>
                                    <th style="text-align:right;">Amount</th>
                                    <th style="text-align:right;"></th>
                                </tr> -->
                                <template v-for="(productSizes, productId) in cart" :key="productId">
                                    <template v-if="cart.hasOwnProperty(productId)">
                                        <template v-for="(item, sizeId) in productSizes" :key="sizeId">
                                            <tr style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px; margin-top:20">
                                                <td>
                                                    <div>
                                                        <div class="d-flex flex-row bd-highlight mb-3">
                                                            <div class="p-2 bd-highlight">
                                                                <img  style="width:80px;" :src="item.product.image ? '/frontend/product_images/' + item.product.image : '/frontend/product_images/placeholder.jpg'" alt="Product Images">
                                                            </div>
                                                            <div class="p-2 bd-highlight w-100">
                                                                <div >
                                                                    <div class="d-flex bd-highlight" style="line-height:1.3;">
                                                                        <div class="mr-auto bd-highlight" style="margin-right:auto !important;">
                                                                            <p style="margin: 0; padding: 0; line-height: 1; text-align:left; width:100% !important;"><b>{{ item.product.name }}</b></p>
                                                                        </div>
                                                                        <div class=" bd-highlight">
                                                                            <i style="cursor:pointer; " @click="removeItem(item.product.id+'_'+item.size.id)" class="fas fa-times"></i>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <p style="margin: 0; padding: 0; line-height:1.3; font-size: 14px; text-align:left;">{{ item.size.name }}({{ item.size.price }})</p>
                                                                <p style=" width:100% !important; line-height:1.3;">
                                                                    <template  v-for="(toping, topingId) in item.topings" :key="topingId">
                                                                        <span style="margin:0; padding:0; font-size:12px; padding: 0 2px;" v-if="toping">{{ toping.name }}({{ toping.price }})</span>
                                                                    </template>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex bd-highlight mb-3" >
                                                            <div class="mr-auto p-2 bd-highlight" style="margin-right:auto !important;">
                                                                <div class="input-group">
                                                                    <div @click="qtyDn(item.product.id+'_'+item.size.id)"  class="input-group-prepend" style="cursor:pointer;">
                                                                        <span class="input-group-text "><b>-</b></span>
                                                                    </div>
                                                                    <input @change="changeQty(item.product.id+'_'+item.size.id)" :id="'qty'+item.product.id+'_'+item.size.id" :value="item.quantity" min="1" type="text" class="form-control" style="text-align:center; font-size: 16px; height: 25px; width:40px; padding: 0px;" aria-label="Amount (to the nearest dollar)">
                                                                    <div @click="qtyUp(item.product.id+'_'+item.size.id)"  class="input-group-append " style="cursor:pointer;">
                                                                        <span class="input-group-text"><b>+</b></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="p-2 bd-highlight">
                                                                <span :id="'amount'+item.product.id+'_'+item.size.id">{{ item.totalPrice }}{{ baseCurrencySymbol }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </template>
                                    </template>
                                </template>
                            </tbody>
                        </table>
                    </div>
                    <div class="cart-footer">
                        <div>
                            <div class="input-group">
                                <input id="coupon" type="text" class="form-control" placeholder="Coupon Code" style="text-align:left; font-size: 16px; height: 25px; width:40px; padding: 20px; border:1px solid #bbb2b2;" aria-label="Amount (to the nearest dollar)">
                                <div @click="applyCoupon()" class="input-group-append " style="cursor:pointer;">
                                    <span class="input-group-text" style="padding:13px; border-radius:0px; line-height:14px">Apply</span>
                                </div>
                            </div>
                            <p v-if="isCouponNotMatched" style="color: red; font-size:12px;">Coupon code not matched</p>
                        </div><br>
                        <p class="cart-subtotal m-0">
                            <span class="subtotal-title">Subtotal:</span>
                            <span class="subtotal-amount">{{ subTotal }}{{ baseCurrencySymbol }}</span>
                        </p>
                        <p class="cart-subtotal m-0" v-if="isDiscount">
                            <span class="subtotal-title">Discount:</span>
                            <span class="subtotal-amount">{{ showDiscount }}</span>
                        </p>
                         <p class="cart-subtotal m-0">
                            <span class="subtotal-title">GrandTotal:</span>
                            <span class="subtotal-amount">{{ grandTotal }}{{ baseCurrencySymbol }}</span>
                        </p>
                        <div class="group-btn d-none">
                            <!-- <a href="javascript:void(0)" class="axil-btn btn-bg-primary viewcart-btn">View Cart</a> -->
                            <a href="javascript:void(0)" @click="checkout()" class="axil-btn btn-bg-secondary checkout-btn float-right">Checkout</a>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-6 mt-5 mb-3">
                                <div class="input-group" style="cursor:pointer;">
                                    <button @click="showMap()" type="button" class="btn" style=" cursor:pointer !important; background: #ee6e2d; color: white; width: 100%; border-radius: 9999px; padding: 5px; font-size: 16px;">Specify The Delivery Address</button>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 mt-5 mb-3">
                                <div class="input-group" style="cursor:pointer;">
                                    <button @click="showSchedule()"  type="button" class="btn" style="cursor:pointer !important; background: #ee6e2d; color: white; width: 100%; border-radius: 9999px; padding: 5px; font-size: 16px;">Or Dine In / Pick Up</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <Details :productData="product" :productSizes="productSizes" :productTopings="productTopings" :maxMin="maxMin" v-if="showAddToCart" @closeModal="handleModalClose"></Details>
            <Authentication  v-if="showAuthentication" @closeModal="handleAuthenticationModalClose"></Authentication>
            <DeliveryPlace :discount="discount" :subTotal="subTotal" :grandTotal="grandTotal" :orderType="orderType"  v-if="showDeliveryPlace" @closeModal="handleDeliveryPlaceModalClose"></DeliveryPlace>
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
import axios from 'axios';
import {Swiper,SwiperSlide} from 'swiper/vue';
import Details from '../../../components/frontend/pages/modal/details.vue';
import DeliveryPlace from '../../../components/frontend/pages/modal/deliveryPlace.vue';
import Authentication from './modal/authentication.vue';
import 'swiper/css';
import { getBaseCurrencySymbol, HelperFunctions } from '../helpers.js';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
export default {
    name: 'home',
    mixins: [HelperFunctions],
    components: {
        Swiper,
        SwiperSlide,
        Details,
        Authentication,
        DeliveryPlace,
    },
     data(){
        return{
            products:{},
            product:null,
            productSizes:null,
            productTopings:null,
            maxMin:null,
            showAddToCart:false,
            showAuthentication:false,
            showDeliveryPlace:false,
            subTotal:0,
            grandTotal:0,
            cart:[],
            coupon:null,
            isCouponNotMatched:false,
            isDiscount:false,
            showDiscount:'',
            discount:0,
            baseCurrencySymbol: '',
            isVisible:true,
            message:'',
            orderType:null,
        }
    },
    created (){
        this.emitter.on('my-event', (evt) => {
        this.testEvent = evt.eventContent;
        this.loadCartFromLocalStorage();
        const dropdownElement = document.getElementById('cart-dropdown');
        // Check if the element exists and remove the 'open' class
        if (dropdownElement) {
            dropdownElement.classList.remove('open');
        }
        const closeMaskElement = document.querySelector('.closeMask');

        // Check if the element exists and remove it
        if (closeMaskElement) {
            closeMaskElement.remove();
        }
    });
    this.emitter.on('loginModalEvent', (evt) => {
        var loginModalEvent = evt.loginModalEvent;
        if(loginModalEvent == '1') {            
            this.showAuthentication = true;
        }
    });
    },
    mounted(){
        this.getCategoryWiseProduct();
        this.loadCartFromLocalStorage();
        this.fetchBaseCurrencySymbol();
        this.emitter.on('scrollToTeamSection', this.handleScrollToTeamSection);
    },
    computed: {
      sortedCategories() {
            // Convert object to array
            const categoriesArray = Object.values(this.products);

            // Sort categories by order_by value
            categoriesArray.sort((a, b) => a.order_by - b.order_by);

            return categoriesArray;
        }
    },
    methods: {
        getCategoryWiseProduct() {
            axios.get('get-products')
            .then((res) => {
                console.log(res.data);
               this.products = res.data;
            })
            .catch((err) => {
                console.log(err);
            });
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
                        // console.log(this.maxMin);
                    }
            }).catch((err) => {
                    console.log(err);
            });
        },
        handleModalClose() {
            this.showAddToCart = false;
        },
        handleAuthenticationModalClose(){
            this.showAuthentication = false;
        },
        handleDeliveryPlaceModalClose(){
            this.showDeliveryPlace = false;
        },

        loadCartFromLocalStorage() {
            // localStorage.setItem('cart', []);return;
            const savedCart = localStorage.getItem('cart');
            this.cart = savedCart ? JSON.parse(savedCart) : [];


            this.subTotal = 0;
            this.cartItemCount = 0;
            for (const productId in this.cart) {
                if (this.cart.hasOwnProperty(productId)) {
                    const productSizes = this.cart[productId];
                    // Loop through product sizes
                    for (const sizeId in productSizes) {
                        if (productSizes.hasOwnProperty(sizeId)) {
                            const item = productSizes[sizeId];
                            // Access item properties
                            // console.log('Quantity:', item.quantity);
                            // console.log('Product:', item.product);
                            // console.log('Size:', item.size);
                            // // console.log('Toppings:', item.topings);
                            // console.log('Total Price:', item.totalPrice);

                            var topings = item.topings;
                            var topingsPrice = 0;
                            for (const i in topings) {
                                if(topings[i])  {
                                    topingsPrice += topings[i].price;
                                }
                            }
                            this.subTotal += (item.size.price * item.quantity) + topingsPrice;
                            item.totalPrice = (item.size.price * item.quantity) + topingsPrice;

                        }
                    }
                }
            }
            this.grandTotal =  this.subTotal;

            this.isDiscount = false;
            if(this.coupon){
                this.isDiscount = true;
                var coupon = this.coupon;
                if(coupon.discount_type){
                    this.showDiscount = coupon.discount + '%';
                    this.discount = this.grandTotal*(coupon.discount/100);
                    this.grandTotal -= this.grandTotal*(coupon.discount/100);
                }else{
                    this.showDiscount = coupon.discount+this.baseCurrencySymbol;
                    this.discount = coupon.discount;
                    this.grandTotal -= coupon.discount;
                }



            }
        },
        changeQty(id){
            let parts = id.split('_');
            var currenValue = document.getElementById('qty'+id).value;
            if(currenValue<1){
                currenValue = 1;
            }
            document.getElementById('qty'+id).value = currenValue;
            var cart = this.cart;
            if (cart[parts[0]] && cart[parts[0]][parts[1]]) {
                cart[parts[0]][parts[1]].quantity = currenValue;
                cart[parts[0]][parts[1]].totalPrice = cart[parts[0]][parts[1]].size.price * currenValue;
            }
            this.cart = cart;
            localStorage.setItem('cart', JSON.stringify(this.cart));
            this.loadCartFromLocalStorage();
            toast.success('Qty Change success', {
                timeout: 3000 // Optional: Time in milliseconds before the toast auto-closes
            });
        },
        qtyDn(id){
            let parts = id.split('_');
            var currenValue = document.getElementById('qty'+id).value;
            if(currenValue>1){
                currenValue--;
            }
            document.getElementById('qty'+id).value = currenValue;
            var cart = this.cart;
            if (cart[parts[0]] && cart[parts[0]][parts[1]]) {
                cart[parts[0]][parts[1]].quantity = currenValue;
                cart[parts[0]][parts[1]].totalPrice = cart[parts[0]][parts[1]].size.price * currenValue;
            }
            this.cart = cart;
            localStorage.setItem('cart', JSON.stringify(this.cart));
            this.loadCartFromLocalStorage();
            toast.success('Qty update success', {
                timeout: 3000 // Optional: Time in milliseconds before the toast auto-closes
            });
        },
        qtyUp(id){
            let parts = id.split('_');
            var currenValue = document.getElementById('qty'+id).value;
            currenValue++;
            document.getElementById('qty'+id).value = currenValue;

            var cart = this.cart;
            if (cart[parts[0]] && cart[parts[0]][parts[1]]) {
                cart[parts[0]][parts[1]].quantity = currenValue;
                cart[parts[0]][parts[1]].totalPrice = cart[parts[0]][parts[1]].size.price * currenValue;
            }
            this.cart = cart;
            localStorage.setItem('cart', JSON.stringify(this.cart));
            this.loadCartFromLocalStorage();
            toast.success('Qty update success', {
                timeout: 3000 // Optional: Time in milliseconds before the toast auto-closes
            });
        },
        removeItem(id){
            let parts = id.split('_');
            var cart = this.cart;
            if (cart[parts[0]] && cart[parts[0]][parts[1]]) {
                delete cart[parts[0]][parts[1]]
            }
            this.cart = cart;
            localStorage.setItem('cart', JSON.stringify(this.cart));
            this.loadCartFromLocalStorage();
            this.emitMyEvent();
            toast.success('Remove to cart success', {
                timeout: 3000 // Optional: Time in milliseconds before the toast auto-closes
            });

        },
        emitMyEvent() {
          this.emitter.emit('my-event', {'eventContent': 'String changed'})
        },
        applyCoupon(){
            var coupon = document.getElementById('coupon').value.trim();
            if(coupon != ""){
                axios.get('check-coupon', {
                    params: {
                        coupon: coupon,
                    }
                })
                .then((res)=>{
                    if(res.data['coupon']){
                        this.coupon = res.data['coupon'];
                        this.isCouponNotMatched = false;
                        this.isDiscount = true;
                    }else{
                        this.coupon = null;
                        this.isCouponNotMatched = true;
                        this.isDiscount = false;
                    }
                    this.loadCartFromLocalStorage();
                })
                .catch((err)=>{
                    console.log(err);
                })
            }

        },
        checkout(){
            var auth = localStorage.getItem('auth');
            auth = auth ? JSON.parse(auth) : null;
            // console.log(auth);
            if(auth) this.showDeliveryPlace = true;
            else this.showAuthentication = true;
        },
        async fetchBaseCurrencySymbol() {
            // console.log(await this.showAmount(655))
            try {
                this.baseCurrencySymbol = await getBaseCurrencySymbol();
            } catch (error) {
                // Handle error (e.g., show an error message)
                // console.error('Error fetching base currency symbol in component:', error);
            }
        },
        showMap() {               
            if(this.grandTotal>=12){
                // this.deliveryPlace = false;
                this.orderType = 1;
                // this.modalWidth = 80;
                // this.initMap();
                var auth = localStorage.getItem('auth');
                auth = auth ? JSON.parse(auth) : null;
                // console.log(auth);
                if(auth) this.showDeliveryPlace = true;
                else this.showAuthentication = true;
            }else{
                this.isVisible = true;
                this.message = 'Minium Order Amount is 12';
                this.showToast(this.message,0);
            }
        },
        showSchedule(){
            this.orderType = 2;
            var auth = localStorage.getItem('auth');
            auth = auth ? JSON.parse(auth) : null;
            // console.log(auth);
            if(auth) this.showDeliveryPlace = true;
            else this.showAuthentication = true;
        },
        showToast(message,type) {
            if(type){
                toast.success(message, {timeout: 2000});
            }else{
                toast.warning(message, {timeout: 2000});
            }
                
                this.message = message;
                this.isVisible = true;

            setTimeout(() => {
                this.isVisible = false;
            }, 2000);
        },
        handleScrollToTeamSection(id) {
          
            const targetId = 'product_section' + id;
              console.log(targetId); // Assuming your team section IDs follow a pattern
            const teamSection = document.getElementById(targetId);
            if (teamSection) {
                teamSection.scrollIntoView({ behavior: 'smooth' });
            }
        }
    },
    beforeDestroy() {
        this.emitter.off('scrollToTeamSection', this.handleScrollToTeamSection);
     },
    setup() {
        const onSwiper = (swiper) => {
        };
        const onSlideChange = () => {
            // console.log('slide change');
        };
        return {
            onSwiper,
            onSlideChange,
        };
    },
};
</script>
<style scoped>
  .selectBtn {
        cursor: pointer;
        font-size: 18px;
        color: rgb(255, 255, 255);
        width: 200px;
        padding: 8px;
        background: rgb(238, 110, 45);
  }
@media only screen and (max-width: 768px) {
  .selectBtn {
        cursor: pointer;
        font-size: 18px;
        color: rgb(255, 255, 255);
        width: 100px;
        padding: 8px;
        background: rgb(238, 110, 45);
  }
}
</style>