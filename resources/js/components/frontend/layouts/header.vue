<template>
    <div>
        <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
        <!-- Start Header -->
        <header class="header axil-header header-style-5">
            <div class="axil-header-top d-none d-lg-block">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="header-top-dropdown">
                                <div class="dropdown">
                                    <button class="dropdown-toggle" @click="toggleDropdown()" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                       {{selectedLanguage}}
                                    </button>
                                    <ul :class="['dropdown-menu', { 'show': isOpen }]">
                                        <li v-for="(language, index) in languages" :key="index">
                                            <a class="dropdown-item" @click="selectLanguage(language)">{{ language }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="header-top-link">
                                <ul class="quick-link">
                                    <li><a href="#">Tracking</a></li>
                                    <li><a href="sign-up.html">Store Info</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none d-lg-block" style="background-color:rgb(238 110 45)">
                <div class="sc-1of5u0p-0 guZDAe container">
                    <div class="left">
                        <router-link to="/"  class="sc-2c0aw7-0 wwSTC sc-1of5u0p-1 ibZIbo" data-active="true" data-type="primary" data-size="normal">
                        <img  width="160px" style="margin-top: 12px;" :src="'/frontend/assets/images/logo/2 pizza logo-02.png'" alt="Site Logo">
                        </router-link>
                        <div class="sc-yrfxdq-0 bzQMgF header__about" style="margin-top: 12px;">
                        <span class="header__about-slogan">
                            <span class="header__about-slogan-text" style="color:#fff">Pizza delivery </span>
                            <a data-testid="header__about-slogan-text_link" class="header__about-slogan-text header__about-slogan-text_locality header__about-slogan-text_link" href="#" style="color:#fff">Finland</a>
                        </span>

                        </div>
                        <div class="sc-52lbjw-0 fpBABM contacts-phone">
                        <div class="contacts-phone__number">
                            <a class="contacts-phone__number-link" href="tel:6299209" style="color:#fff">6 299 209</a>
                            <div class="contacts-phone__description"><span class="contacts-phone__description-text" style="color:#fff">Call</span></div>
                        </div>
                        </div>
                        <ul class="mainmenu">
                            <li class="sc-xlo7eb-4 bvuzKi">
                                <a class="sc-2c0aw7-0 wwSTC sc-xlo7eb-7 kkaUZR" style="color:#fff" data-active="false" data-type="primary" data-size="normal">About</a>
                            </li>
                            <li class="sc-xlo7eb-4 bvuzKi">
                                <a class="sc-2c0aw7-0 wwSTC sc-xlo7eb-7 kkaUZR" style="color:#fff" data-active="false" data-type="primary" data-size="normal">Franchise</a>
                            </li>
                            <li class="sc-xlo7eb-4 bvuzKi">
                                <a class="sc-2c0aw7-0 wwSTC sc-xlo7eb-7 kkaUZR" style="color:#fff" data-active="false" data-type="primary" data-size="normal">Contact</a>
                            </li>
                        </ul>
                    </div>
                    <div class="right">
                        <a class="sc-2c0aw7-0 llYDFl sc-1of5u0p-2 jzJZpw" href="javascript:void(0)" data-active="false" data-type="primary" data-size="normal">
                        <span class="icon">
                            <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11 1a1 1 0 011 1v2a8 8 0 110 16v2a1 1 0 11-2 0v-2H6.6c-.56 0-.84 0-1.05-.1a1 1 0 01-.44-.45C5 19.24 5 18.96 5 18.4V5.6c0-.56 0-.84.1-1.05a1 1 0 01.45-.44C5.76 4 6.04 4 6.6 4H10V2a1 1 0 011-1zm1 17a6 6 0 000-12H7v12h5z" fill="#000"></path>
                            </svg>
                        </span>
                        <div class="header-action">
                            <ul class="action-list">
                                <li class="shopping-cart" @click="handleCartClick">
                                    <a href="javascript:void(0)" class="cart-dropdown-btn">
                                        <span class="cart-count">{{ cartItemCount }}</span>
                                        <i class="flaticon-shopping-cart" style="color:#fff"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        </a>
                        <router-link v-if="isAuth" to="/dashboard" data-type="tertiary" data-size="small" class="sc-1rmt3mq-0 dOEDNV">Dashboard</router-link>
                        <button data-testid="header_login" v-else @click="loginModalEvent"  type="button" data-type="tertiary" data-size="small" class="sc-1rmt3mq-0 dOEDNV">Log in</button>
                    </div>
                </div>
            </div>
            <!-- Start Mainmenu Area  -->
            <div id="axil-sticky-placeholder" style="height: 0px;"></div>
            <div class="axil-mainmenu">
                <div class="container">
                    <div class="header-navbar">
                        <div class="header-brand d-none">
                            <router-link to="/" class="logo logo-dark">
                                <img width="100px" :src="'/frontend/assets/images/logo/pizza logo-02.jpg'" alt="Site Logo">
                            </router-link>
                            <router-link to="/" class="logo logo-light">
                                <img width="200px" :src="'/frontend/assets/images/logo/pizza logo-02.jpg'" alt="Site Logo">
                            </router-link>
                        </div>
                        <div class="header-main-nav">
                            <!-- Start Mainmanu Nav -->
                            <nav class="mainmenu-nav">
                                <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                                <div class="mobile-nav-brand">
                                    <a href="index-2.html" class="logo">
                                        <img :src="'/frontend/assets/images/logo/pizza logo-02.jpg'" alt="Site Logo">
                                    </a>
                                </div>
                                <!-- <ul class="mainmenu">
                                    <li>
                                        <a href="#">Home</a>
                                    </li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul> -->
                                <ul class="mainmenu">
                                    <li class="sc-xlo7eb-4 bvuzKi" v-for="(category,index) in catgories" :key="index" :value="category.id">
                                        <a class="sc-2c0aw7-0 wwSTC sc-xlo7eb-7 kkaUZR" :href="'#' + category.name" @click="scrollToSection(category.name)">{{ category.name }}</a>
                                    </li>
                                </ul>
                            </nav>
                            <!-- End Mainmanu Nav -->
                        </div>
                        <div class="header-action">
                            <ul class="action-list">

                                <!-- <li class="axil-search d-xl-none d-block">
                                    <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                        <i class="flaticon-magnifying-glass"></i>
                                    </a>
                                </li>

                                <li class="shopping-cart">
                                    <a href="#" class="cart-dropdown-btn">
                                        <span class="cart-count">3</span>
                                        <i class="flaticon-shopping-cart"></i>
                                    </a>
                                </li> -->
                                <li>
                                    <button data-testid="header_login" type="button" data-type="tertiary" data-size="small" class="sc-1rmt3mq-0 dOEDNV">My Orders</button>
                                </li>
                                <li class="axil-mobile-toggle">
                                    <button class="menu-btn mobile-nav-toggler">
                                        <i class="flaticon-menu-2"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    name: 'AppHeader',
    data(){
        return{
            catgories:{},
            selectedLanguage: 'English',
            isOpen: false,
            languages: ['English','Finnish'],
            cartItemCount:0,
            testEvent: 'String to change',
            isAuth:false,
        }
    },
    created (){
        this.emitter.on('my-event', (evt) => {
            this.testEvent = evt.eventContent;
            this.loadCartFromLocalStorage();
        });

        this.emitter.on('updateHeaderAfterLogin', (evt) => {
            var updateHeaderAfterLogin = evt.updateHeaderAfterLogin;
            if(updateHeaderAfterLogin == '1') {
                this.isAuth = true;
            }
        });
    },
    components: {

    },
    mounted(){
        this.getCategories();
        this.loadCartFromLocalStorage();
        var auth = localStorage.getItem('auth');
        if(auth != null) {
            this.isAuth = true;
        }
    },
    methods: {
        loadCartFromLocalStorage() {
            // localStorage.setItem('cart', []);return;
            const savedCart = localStorage.getItem('cart');
            this.cart = savedCart ? JSON.parse(savedCart) : [];
            this.cartItemCount = 0;
            for (const productId in this.cart) {
                if (this.cart.hasOwnProperty(productId)) {
                    const productSizes = this.cart[productId];
                    for (const sizeId in productSizes) {
                        if (productSizes.hasOwnProperty(sizeId)) {
                            // console.log('fff');
                            this.cartItemCount++;
                        }
                    }
                }
            }
        },
        getCategories(){
            axios.get('get-categories')
            .then((res)=>{
                this.catgories = res.data;
            })
            .catch((err)=>{
                console.log(err);
            })
        },
        toggleDropdown() {
            this.isOpen = !this.isOpen;
        },
        selectLanguage(language) {
            this.selectedLanguage = language;
            this.isOpen = false;
        // You can add more logic here if needed
        },
        handleCartClick() {

        this.$emit('openCartModal'); // Emitting event when cart icon is clicked
        },

        loginModalEvent() {
          this.emitter.emit('loginModalEvent', {'loginModalEvent': '1'})
        }


    }
}
</script>

<style scoped>
.guZDAe {
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    padding: 0px 0px 0px;
    z-index: 100;
    /* width: 1280px; */
    margin-left: auto;
    margin-right: auto;
}
.guZDAe .left {
    display: flex;
}
.guZDAe .left > :nth-child(n) {
    margin-right: 40px;
}
.guZDAe .left > :nth-child(n) {
    margin-right: 40px;
}
.bzQMgF {
    position: relative;
}

.bzQMgF .header__about-slogan {
    color: rgb(0, 0, 0);
    font-size: 18px;
    line-height: 1.2;
    font-family: Dodo, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-weight: 500;
    margin: 0px;
}
.bzQMgF .header__about-slogan-text {
    display: inline-block;
    white-space: pre-wrap;
}
.bzQMgF .header__about-slogan {
    color: rgb(0, 0, 0);
    font-size: 18px;
    line-height: 1.2;
    font-family: Dodo, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-weight: 500;
    margin: 0px;
}
.bzQMgF .header__about-slogan-text_link {
    color: rgb(255, 105, 0);
    text-decoration: none;
}
.bzQMgF .header__about-slogan-text_locality {
    white-space: normal;
}

.bzQMgF .header__about-slogan-text {
    display: inline-block;
    white-space: pre-wrap;
}
.fafGiC {
    position: relative;
    margin-top: 1px;
    color: rgb(0, 0, 0);
    font-size: 15px;
    font-family: Dodo, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-weight: 500;
    z-index: 2;
}
.lbkYqN {
    position: relative;
    display: inline-block;
    z-index: 2;
}
.bjNpWs {
    vertical-align: -2px;
    margin-left: 2px;
}

.fpBABM {
    position: relative;
}
.fpBABM .contacts-phone__number {
    white-space: nowrap;
    font-size: 18px;
    line-height: 1.2;
    font-family: Dodo, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-weight: 500;
}
.fpBABM .contacts-phone__number-link {
    color: rgb(0, 0, 0);
    text-decoration: none;
}
.fpBABM .contacts-phone__description {
    margin-top: 4px;
    color: rgb(153, 153, 153);
    font-size: 15px;
    line-height: 1;
    font-family: Dodo, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-weight: 500;
}
.fpBABM .contacts-phone__description-text {
    display: inline-block;
}
.fpBABM .contacts-phone__description {
    margin-top: 4px;
    color: rgb(153, 153, 153);
    font-size: 15px;
    line-height: 1;
    font-family: Dodo, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-weight: 500;
}
.guZDAe .right {
    display: flex;
    column-gap: 32px;
    -webkit-box-align: center;
    align-items: center;
}
.jzJZpw {
    display: flex;
    position: relative;
    flex-direction: column;
    -webkit-box-align: center;
    align-items: center;
}
.llYDFl {
    text-decoration: none;
    cursor: pointer;
    outline: none;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-weight: 600;
    color: rgb(255, 105, 0);
}
.dOEDNV[data-size="small"] {
    height: 32px;
    padding: 8px 16px;
    font-size: 14px;
    line-height: 16px;
}
.dOEDNV[data-type="tertiary"] {
    background-color: rgb(243, 243, 247);
    color: rgb(92, 99, 112);
}
.dOEDNV {
    outline: none;
    border: none;
    border-radius: 9999px;
    text-align: center;
    font-family:system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-weight: 500;
    text-decoration: none;
    position: relative;
    overflow: hidden;
    cursor: pointer;
    user-select: none;
    transition-property: background-color, color;
    transition-duration: 200ms;
    transition-timing-function: ease-out;
}
.service-wr-h5 a {
    display: flex;
    align-items: center;
    flex-direction: row-reverse;
    gap: 15px;
    margin-bottom: 25px;
}
</style>
