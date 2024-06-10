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
                                                <swiper-slide v-for="(slider,index) in sliders" :key="index">
                                                    <div class="single-slide slick-slide">
                                                    
                                                        <div class="main-slider-thumb">
                                                            <img style="border-radius:10px" 
                                                            :src="slider.image ? '/frontend/assets/images/slider/' + slider.image : '/frontend/product_images/placeholder.jpg'"
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
                                                    <img style="border-radius:10px"
                                                    :src="'/frontend/assets/images/ads/' + firstAd "
                                                     :alt="firstAd">
                                                </a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="col-6">
                                         <div class="slider-product-box">                                              
                                             <div class="product-thumb">
                                                 <a href="javacript:void(0)">
                                                    <img style="border-radius:10px"
                                                     :src="'/frontend/assets/images/ads/' + secondAd" 
                                                     :alt="secondAd">
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
                        <swiper-slide v-for="(item, index) in popularProduct" :key="index">
                            <div class="d-flex align-items-center" @click="getProductDetails(item.id)">
                                <div class="flex-shrink-0">
                                    <img style="width:70px"
                                        :src="item.image ? '/frontend/product_images/' + item.image : '/frontend/product_images/placeholder.jpg'"
                                        alt="...">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <span>{{ item.name }}</span><br>
                                    <strong>From{{ item.min_price }}{{baseCurrencySymbol}}</strong>
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
          

            <Details :productData="product" :productSizes="productSizes" :productTopings="productTopings" :allTopings="allTopings" :moreTopings="moreTopings" :sizeVsTopings="sizeVsTopings" :maxMin="maxMin" :productTages="productTages" :productOptions="productOptions" v-if="showAddToCart" @closeModal="handleModalClose"></Details>
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
            freeOption:1,
            products:{},
            product:null,
            productSizes:null,
            productTopings:null,
            allTopings:null,
            moreTopings:null,
            sizeVsTopings:null,
            productTages:null,
            productAllTages:null,
            productOptions:null,
            maxMin:null,
            showAddToCart:false,
            showAuthentication:false,
            showDeliveryPlace:false,
            subTotal:0,
            grandTotal:0,
            cart:[],
            relatedProduct:[],
            coupon:null,
            isCouponNotMatched:false,
            isDiscount:false,
            showDiscount:'',
            discount:0,
            baseCurrencySymbol: '',
            isVisible:true,
            message:'',
            orderType:null,
            availableCoupon:null,
            popularProduct:null,
            sliders:null,
            firstAd:null,
            secondAd:null,
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
        this.getSliders();
        this.getAds();
        this.getCategoryWiseProduct();
        this.loadCartFromLocalStorage();
        this.fetchBaseCurrencySymbol();
        this.emitter.on('scrollToTeamSection', this.handleScrollToTeamSection);
        this.getCoupon();
        this.getPopularProduct();      
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
        getSliders () {
            axios.get('get-sliders')
            .then((res) => {
               this.sliders = res.data;                            
            })
            .catch((err) => {
            }); 
        },
    
        getAds () {
            axios.get('get-ads')
            .then((res) => {              
               this.firstAd = res.data.first_ad;             
               this.secondAd = res.data.second_ad;                             
            })
            .catch((err) => {
            });
        },
        getCategoryWiseProduct() {
            axios.get('get-products')
            .then((res) => {
               this.products = res.data[0];
               this.productAllTages = res.data[1];               
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
                        // console.log(res.data);
                        this.showAddToCart = true;
                        this.product = res.data[0];
                        this.productSizes = res.data[1];
                        this.productTopings =  res.data[2];
                        this.maxMin =  res.data[3];
                        this.allTopings =  res.data[4];
                        this.moreTopings = res.data[5];
                        this.sizeVsTopings = res.data[6];
                        this.productTages = res.data[7];
                        this.productOptions = res.data[8];
                    }
            }).catch((err) => {
            });
        },
        getPopularProduct(){
             axios.get('get-popular-products')
            .then((res) => {
              
                // console.log(res.data);
                this.popularProduct = res.data;
            })
            .catch((err) => {
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

            const relatedProduct = localStorage.getItem('related_product');
          this.relatedProduct = relatedProduct ? JSON.parse(relatedProduct) : [];

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

                            // this.subTotal += (item.size.price * item.quantity) + topingsPrice;
                            // item.totalPrice = (item.size.price * item.quantity) + topingsPrice;


                            var options = item.options;
                            var optionQtys = item.optionQtys;
                            var optionFreeQtys = item.optionFreeQtys;
                            var optionPrices = item.optionPrices;
                            var optionsPrice = 0;
                            for (const i in options) {
                                if(options[i])  {
                                    var price = optionPrices[options[i].id];
                                    var qty = optionQtys[options[i].id];
                                    var freeQty = optionFreeQtys[options[i].id];
                                    price = parseFloat(price);
                                    qty = parseFloat(qty);
                                    freeQty = parseFloat(freeQty);
                                    var paidQty = qty - freeQty;
                                    if(paidQty<0) paidQty = 0;
                                    optionsPrice += parseFloat(price*paidQty);
                                }
                            }
                            this.subTotal += (item.size.price * item.quantity) + topingsPrice + optionsPrice;
                            item.totalPrice = (item.size.price * item.quantity) + topingsPrice + optionsPrice;

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

        getCoupon () {
            axios.get('get-coupon', {
                
            })
            .then((res)=>{
                console.log(res.data)
                if (res.data) {
                     this.availableCoupon = res.data;      
                }                         
            })
            .catch((err)=>{
            })
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
        },

        formatDiscount(value) {
            // Convert value to a number in case it's a string
            value = Number(value);
            
            // Check if the fractional part is 0
            if (value % 1 === 0) {
                return value.toFixed(0); // Return without decimal places
            } else {
                return value.toFixed(2); // Return with two decimal places
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