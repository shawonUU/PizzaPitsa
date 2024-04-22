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
                                                    
                                                        <div class="main-slider-thumb">
                                                            <img style="border-radius:10px" src="/frontend/assets/images/mega-pizza-slider-1-update.jpg"
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
                                                <a href="javacript:void(0)">
                                                    <img style="border-radius:10px" src="/frontend/assets/images/mega-pizza-add-1.jpg" alt="Product">
                                                </a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                         <div class="slider-product-box">                                              
                                             <div class="product-thumb">
                                                 <a href="javacript:void(0)">
                                                    <img style="border-radius:10px" src="/frontend/assets/images/mega-pizza-add-2.jpg" alt="Product">
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
                                        src="/frontend/product_images/20240322191731_u8B4dGgTFs.jpg"
                                        alt="...">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span>Margherita</span><br>
                                    <strong>From11.90€</strong>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img style="width:70px"
                                        src="/frontend/product_images/20240322132414.jpg"
                                        alt="...">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span>Kana pizza</span><br>
                                    <strong>From11.90€</strong>
                                </div>
                            </div>
                        </swiper-slide>                     
                        <swiper-slide>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img style="width:70px"
                                        src="/frontend/product_images/20240321161154.jpg"
                                        alt="...">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span>Caesar-salaatti</span><br>
                                    <strong>From13.90€</strong>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img style="width:70px"
                                    src="/frontend/product_images/20240321203653.jpg"
                                    alt="...">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <span>Sieni Pizza</span><br>
                                <strong>From14.90€</strong>
                            </div>
                        </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img style="width:70px"
                                        src="/frontend/product_images/20240321185936.jpg"
                                        alt="...">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span>Goa Special</span><br>
                                    <strong>From11.90€</strong>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img style="width:70px"
                                        src="/frontend/product_images/20240321203545.jpg"
                                        alt="...">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span>Chilidippi</span><br>
                                    <strong>From1.20€</strong>
                                </div>
                            </div>
                        </swiper-slide>
                         <swiper-slide>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img style="width:70px"
                                        src="/frontend/product_images/20240321185936.jpg"
                                        alt="...">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span>JYMY LUOMUJÄÄTELÖ 500ML LIQUORICE</span><br>
                                    <strong>From8.90€</strong>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img style="width:70px"
                                        src="/frontend/product_images/20240321185936.jpg"
                                        alt="...">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span>CocaCola 1.5L</span><br>
                                    <strong>From5.90€</strong>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img style="width:70px"
                                        src="/frontend/product_images/20240322092107.jpg"
                                        alt="...">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span>Taffel sips</span><br>
                                    <strong>From3.45€</strong>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <img style="width:70px"
                                        src="/frontend/product_images/20240322091114.jpg"
                                        alt="...">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span>Donitsi</span><br>
                                    <strong>From4.90€</strong>
                                </div>
                            </div>
                        </swiper-slide>
                    </swiper>
                </div>
            </div>
            <!-- End Categorie Area  -->
            <!-- Start Flash Sale Area  -->
            <div v-for="(category, categoryId) in sortedCategories" :key="categoryId" class="axil-new-arrivals-product-area  flash-sale-area bg-color-white  pb--0" :id="'product_section'+category.category_id">
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
                            <div v-for="product in category.products" :key="product.id" class="col-6 col-lg-3 col-md-6">
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

                <div v-if="categoryId==2" class="axil-new-arrivals-product-area  flash-sale-area bg-color-white  pb--0" style="position: relative; background-image: linear-gradient(rgb(0 0 0 / 67%), rgb(0 0 0 / 56%)), url(/frontend/assets/images/Pizza-Pitsa-full-shop-footer.jpg); background-size: cover; background-position: center; backdrop-filter: blur(5px);">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-sm-12">                        
                                <div class="francicise" style="margin-top:100px; margin-bottom:20px">
                                <h4 class="elementor-heading-title elementor-size-default" style="font-size:40px; color:#fff">Are you interested in entrepreneurship?</h4>
                                                                                              
                                <p class="elementor-heading-title elementor-size-default" style="color:#fff">we are looking for lovers of good pizza food to become new pizzapitsa enterpreneurs.</p> 
                              
                                
                                <router-link to="/contact" class="elementor-button-link elementor-button elementor-size-sm" role="button">
                               
                                <span class="elementor-button-text btn mt-3" style="background:rgb(238, 110, 45);color:#fff; padding:10px; font-size:20px;" >Contact Us</span>
                              
                                </router-link>
                                &nbsp;&nbsp;&nbsp;
                                <router-link to="/franchise" class="elementor-button-link elementor-button elementor-size-sm" role="button">
                                <span class="elementor-button-content-wrapper">
                                <span class="elementor-button-text btn btn-secondary mt-3" style="color:#fff; padding:10px; font-size:20px;" >Read More</span>
                                </span>
                                </router-link>
                                </div>    
                            </div>
                        <div class="col-lg-5 col-sm-12">                            
                            <img style="width:400px; border-radius:10px" :src="'/frontend/assets/images/Pizza-Pitsa-model-ed.jpg'" title="" alt="">                            
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
                                                                <img  style="width:100px;" :src="item.product.image ? '/frontend/product_images/' + item.product.image : '/frontend/product_images/placeholder.jpg'" alt="Product Images">
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
                                                                <p style=" width:100% !important; line-height: 0.8; margin: 0;">
                                                                    <span>+</span>
                                                                    <template  v-for="(toping, topingId) in item.topings" :key="topingId">
                                                                        <span style="margin:0; padding:0; font-size:12px; padding: 0 2px;" v-if="toping">{{ toping.name }}({{ item.toppingPrices[toping.id]}} x {{item.toppingQtys[toping.id]}})</span>
                                                                    </template>
                                                                </p>
                                                                <p v-if="productAllTages" style=" width:100% !important; line-height: 0.8;">
                                                                    <span>-</span>
                                                                    <template  v-for="(tag, tagid) in item.removedTags" :key="tagid">
                                                                        <span style="margin:0; padding:0; font-size:12px; padding: 0 2px;">{{ productAllTages[tag] }}</span>,
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
                            <span class="subtotal-title">Sub Total:</span>
                            <span class="subtotal-amount">{{ subTotal }}{{ baseCurrencySymbol }}</span>
                        </p>
                        <p class="cart-subtotal m-0" v-if="isDiscount">
                            <span class="subtotal-title">Discount:</span>
                            <span class="subtotal-amount">{{ showDiscount }}</span>
                        </p>
                         <p class="cart-subtotal m-0">
                            <span class="subtotal-title">Grand Total:</span>
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
                                    <span style="font-size:10px; color: red; width:100%; text-align: center;">Minimal order delivery value is 12{{ baseCurrencySymbol }}</span>
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

             <Details :productData="product" :productSizes="productSizes" :productTopings="productTopings" :allTopings="allTopings" :moreTopings="moreTopings" :sizeVsTopings="sizeVsTopings" :maxMin="maxMin" :pdoductTages="pdoductTages" v-if="showAddToCart" @closeModal="handleModalClose"></Details>
            <Authentication  v-if="showAuthentication" @closeModal="handleAuthenticationModalClose"></Authentication>
            <DeliveryPlace :discount="discount" :subTotal="subTotal" :grandTotal="grandTotal" :orderType="orderType" :productAllTages="productAllTages"  v-if="showDeliveryPlace" @closeModal="handleDeliveryPlaceModalClose"></DeliveryPlace>
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
            allTopings:null,
            moreTopings:null,
            sizeVsTopings:null,
            pdoductTages:null,
            productAllTages:null,
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
                if(this.testEvent != "form cart")
                    dropdownElement.classList.remove('open');
            }
            
            const closeMaskElement = document.querySelector('.closeMask');

            // Check if the element exists and remove it
            if (closeMaskElement) {
                if(this.testEvent != "form cart")
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
               this.products = res.data[0];
               this.productAllTages = res.data[1];
                console.log(this.productAllTages);
            })
            .catch((err) => {
            });
        },
        getProductDetails(productId) {
            axios.get('get-product-details', {
                    params: {
                        id: productId
                    }
            }).then((res) => {
                    if (res.data[0]) {
                        this.showAddToCart = true;
                        this.product = res.data[0];
                        this.productSizes = res.data[1];
                        this.productTopings =  res.data[2];
                        this.maxMin =  res.data[3];
                        this.allTopings =  res.data[4];
                        this.moreTopings = res.data[5];
                        this.sizeVsTopings = res.data[6];
                        this.pdoductTages = res.data[7];
                    }
            }).catch((err) => {
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
            //this.cartItemCount = 0;
            for (const productId in this.cart) {
                if (this.cart.hasOwnProperty(productId)) {
                    const productSizes = this.cart[productId];
                    for (const sizeId in productSizes) {
                        if (productSizes.hasOwnProperty(sizeId)) {
                            const item = productSizes[sizeId];

                            var topings = item.topings;
                            var toppingQtys = item.toppingQtys;
                            var toppingPrices = item.toppingPrices;
                            var topingsPrice = 0;
                            for (const i in topings) {
                                if(topings[i])  {
                                    var price = toppingPrices[topings[i].id];
                                    var qty = toppingQtys[topings[i].id];
                                    price = parseFloat(price);
                                    qty = parseFloat(qty);
                                    topingsPrice += parseFloat(price*qty);
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
            this.grandTotal = this.grandTotal.toFixed(2);
            this.subTotal = this.subTotal.toFixed(2);
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
            // toast.success('Qty Change success', {
            //     timeout: 3000 // Optional: Time in milliseconds before the toast auto-closes
            // });
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
            // toast.success('Qty update success', {
            //     timeout: 3000 // Optional: Time in milliseconds before the toast auto-closes
            // });
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
            // toast.success('Qty update success', {
            //     timeout: 3000 // Optional: Time in milliseconds before the toast auto-closes
            // });
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
            // toast.success('Remove to cart success', {
            //     timeout: 3000 // Optional: Time in milliseconds before the toast auto-closes
            // });

        },
        emitMyEvent() {
          this.emitter.emit('my-event', {'eventContent': 'form cart'})
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
                })
            }

        },
        checkout(){
            var auth = localStorage.getItem('auth');
            auth = auth ? JSON.parse(auth) : null;
            if(auth) this.showDeliveryPlace = true;
            else this.showAuthentication = true;
        },
        async fetchBaseCurrencySymbol() {
            try {
                this.baseCurrencySymbol = await getBaseCurrencySymbol();
            } catch (error) {
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
            if(auth) this.showDeliveryPlace = true;
            else this.showAuthentication = true;
        },
        showToast(message,type) {
            if(type){
                // toast.success(message, {timeout: 2000});
            }else{
                // toast.warning(message, {timeout: 2000});
            }
                
                this.message = message;
                this.isVisible = true;

            setTimeout(() => {
                this.isVisible = false;
            }, 2000);
        },
        handleScrollToTeamSection(id) {
          
            const targetId = 'product_section' + id;
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

.flash-sale-section{
    margin-bottom: 0;
}

.main-slider-style-2 .slider-box-wrap {
    background-color:#fff;
    border-radius: 6px;
    padding: 0px 0px;
}
.main-slider-style-2 .slider-product-box {
    background-color: #fff;
    border-radius: 6px;
    text-align: center;
    padding: 0px 0px;
    overflow: hidden;
}
.container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    padding-left: 9px!important;
    padding-right: 16px!important;
}


/* CSS for devices with screen widths between 449px and 767px */
@media screen and (min-width: 449px) and (max-width: 767px) {
    .main-slider-style-2 .main-slider-thumb {
    position: relative;
    margin-left: 9px;
    z-index: 1;
    flex: 1;
    text-align: right;
}
}

@media screen and (min-width: 768px) and (max-width: 990px) { 
       .main-slider-style-2 .main-slider-thumb {
        position: relative;
        margin-left: 60px;
        z-index: 1;
        flex: 1;
    } 
}

</style>