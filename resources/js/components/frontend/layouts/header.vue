<template>
    <div>
        <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
        <!-- Start Header -->
        <header class="header axil-header header-style-5">
            <div class="axil-header-top d-none d-lg-block d-md-block">
                <div class="container">
                    <div class="row align-items-center pb-2">
                        <div class="col-lg-6 col-sm-6 col-md-8 col-12">
                            <div class="header-top-link">
                            <ul class="langAndNum">
                                <li>
                                <div class="header-top-dropdown" style="margin-top: 4px">
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
                                </li>
                                <li>
                                    <a  href="tel:+35826220208" style="color:#fff">Call: +35826220208</a>
                                </li>
                                <li>
                                    <a  href="mailto:info@pizzapitsa.fi" style="color:#fff">Email: info@pizzapitsa.fi</a>
                                </li>
                            </ul>
                            </div>                             
                        </div>
                        <div class="col-lg-6 col-sm-6 col-md-4 col-12">
                            <div class="header-top-link">
                                <!-- <ul class="quick-link">
                                    <li><a href="#">Tracking</a></li>
                                    <li><a href="sign-up.html">Store Info</a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-none d-lg-block d-md-none" style="background-color:rgb(238 110 45)">
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
                        <ul class="mainmenu">
                            <li class="sc-xlo7eb-4 bvuzKi">
                                <router-link to="/about" class="sc-2c0aw7-0 wwSTC sc-xlo7eb-7 kkaUZR" style="color:#fff" data-active="false" data-type="primary" data-size="normal">About</router-link>
                            </li>
                            <li class="sc-xlo7eb-4 bvuzKi">
                                <router-link to="/franchise" class="sc-2c0aw7-0 wwSTC sc-xlo7eb-7 kkaUZR" style="color:#fff" data-active="false" data-type="primary" data-size="normal">Franchise</router-link>
                            </li>
                            <li class="sc-xlo7eb-4 bvuzKi">
                                <router-link to="/contact" class="sc-2c0aw7-0 wwSTC sc-xlo7eb-7 kkaUZR" style="color:#fff" data-active="false" data-type="primary" data-size="normal">Contact</router-link>
                            </li>
                        </ul>
                    </div>
                    <div class="right">
                        <a class="sc-2c0aw7-0 llYDFl sc-1of5u0p-2 jzJZpw" href="#" data-active="false" data-type="primary" data-size="normal">
                        <span class="icon">
                            <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11 1a1 1 0 011 1v2a8 8 0 110 16v2a1 1 0 11-2 0v-2H6.6c-.56 0-.84 0-1.05-.1a1 1 0 01-.44-.45C5 19.24 5 18.96 5 18.4V5.6c0-.56 0-.84.1-1.05a1 1 0 01.45-.44C5.76 4 6.04 4 6.6 4H10V2a1 1 0 011-1zm1 17a6 6 0 000-12H7v12h5z" fill="#000"></path>
                            </svg>
                        </span>
                        <div class="header-action">
                            <ul class="action-list">
                                <li class="shopping-cart">
                                    <a href="#" class="cart-dropdown-btn">
                                        <span class="cart-count">{{ cartItemCount }}</span>
                                        <i class="flaticon-shopping-cart" style="color:#fff"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        </a>
                        <router-link v-if="isAuth" to="/dashboard" data-type="tertiary" data-size="small" class="sc-1rmt3mq-0 dOEDNV">Dashboard</router-link>
                        <button data-testid="header_login" v-else @click="loginModalEvent"  type="button" data-type="tertiary" data-size="small" class="sc-1rmt3mq-0 dOEDNV">Login</button>
                    </div>
                </div>
            </div>
            <!-- Start Mainmenu Area  -->
            <div id="axil-sticky-placeholder" style="height: 0px;"></div>
            <div :class="mainMenuClass" ref="mainMenu">
                <div class="container">
                    <div class="header-navbar">
                        <div class="header-brand">
                            <router-link to="/" class="logo logo-dark">
                                <img width="150px" :src="'/frontend/assets/images/logo/2 pizza logo-02.png'" alt="Site Logo">
                            </router-link>
                            <router-link to="/" class="logo logo-light">
                                <img width="200px" :src="'/frontend/assets/images/logo/2 pizza logo-02.png'" alt="Site Logo">
                            </router-link>
                        </div>
                        <div class="header-main-nav" id="headerMainNav">
                            <!-- Start Mainmanu Nav -->
                            <nav class="mainmenu-nav">
                                <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                                <div class="mobile-nav-brand">
                                    <router-link to="/" class="logo">
                                        <img :src="'/frontend/assets/images/logo/2 pizza logo-02.png'" alt="Site Logo">
                                    </router-link>
                                </div>
                                <ul v-if="currentPage !=='dashboard'" class="mainmenu">                                    
                                    <li class="sc-xlo7eb-4 bvuzKi" v-for="(category,index) in catgories" :key="index" :value="category.id">
                                        <a class="sc-2c0aw7-0 wwSTC sc-xlo7eb-7 kkaUZR" :href="'#' + category.name" @click.prevent="scrollToTeamSection(category.id)">{{ category.name }}</a>
                                    </li>
                                    <li id="hide-on-small">
                                        <a href="#" :class="cartClass" style="margin-top:10px">
                                            <span class="cart-count stickCartCount" 
                                            style="text-align: center;
                                                background-color: #fff;
                                                border: 2px solid var(--color-white);
                                                font-size: 12px;
                                                font-weight: 500;
                                                color: #ff7900;
                                                border-radius: 50%;
                                                height: 20px;
                                                width: 20px;
                                                line-height: 19px;
                                                position: absolute;
                                                top: 9px;
                                                right: -12px;">{{ cartItemCount }}</span>
                                            <i class="flaticon-shopping-cart" style="color:#fff;font-size: 24px;font-weight: 500;margin-top:10px"></i>
                                        </a>
                                    </li>  
                                    <li :class="cartClass" id="hide-on-small">
                                       <router-link v-if="isAuth" to="/dashboard" data-type="tertiary" data-size="small" class=""><img style="width:25px" src="frontend/assets/images/user.png" alt=""></router-link>
                                       <button data-testid="header_login" v-else @click="loginModalEvent"  type="button" data-type="tertiary" data-size="small" class="sc-1rmt3mq-0 dOEDNV">Login</button>     
                                    </li>                                  
                                     <hr style="background:#fff">                                   
                                    <li class="mobileMenu">
                                        <router-link to="/about" class="sc-2c0aw7-0 wwSTC sc-xlo7eb-7 kkaUZR" style="color:#fff" data-active="false" data-type="primary" @click="closeNav()"  data-size="normal">About</router-link>
                                    </li>
                                    <li class="mobileMenu">
                                        <router-link to="/franchise" class="sc-2c0aw7-0 wwSTC sc-xlo7eb-7 kkaUZR" style="color:#fff" data-active="false" data-type="primary" @click="closeNav()" data-size="normal">Franchise</router-link>
                                    </li>
                                    <li class="mobileMenu">
                                        <router-link to="/contact" class="sc-2c0aw7-0 wwSTC sc-xlo7eb-7 kkaUZR" style="color:#fff" data-active="false" data-type="primary" @click="closeNav()" data-size="normal">Contact</router-link>
                                    </li>                                                                 
                                </ul>                              
                            </nav>
                            <!-- End Mainmanu Nav -->
                        </div>
                        <div class="header-action">
                            <ul class="action-list">
                                <li class="shopping-cart">
                                    <a href="javascript:void(0)" style="font-size: 28px;margin-top: 8px;" class="cart-dropdown-btn mobileCart">
                                        <span class="cart-count">{{ cartItemCount }}</span>
                                        <i class="flaticon-shopping-cart" style="color:#fff"></i>
                                    </a>
                                </li>
                                <li class="d-lg-none">
                                    <router-link v-if="isAuth" to="/dashboard" data-type="tertiary" data-size="small" class=""><img style="width:25px" src="frontend/assets/images/user.png" alt=""></router-link>
                                    <button data-testid="header_login" v-else @click="loginModalEvent"  type="button" data-type="tertiary" data-size="small" class="sc-1rmt3mq-0 dOEDNV">Login</button>
                                </li>
                                <li class="axil-mobile-toggle">
                                    <button class="menu-btn mobile-nav-toggler">
                                        <i  style="color:#fff" class="flaticon-menu-2"></i>
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
import Cart from '../pages/modal/cart.vue';
export default {
    name: 'AppHeader',
    components: {
        // Swiper,
        // SwiperSlide,
        Cart,
        // Authentication,
        // DeliveryPlace,
    },
    data(){
        return{
            catgories:{},
            selectedLanguage: 'English',
            isOpen: false,
            languages: ['English','Finnish'],
            cartItemCount:0,
            testEvent: 'String to change',
            isAuth:false,
            currentPage:'',
            isSticky: false,
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

        this.emitter.on('updateHeaderAfterLogout', (evt) => {
            var updateHeaderAfterLogout = evt.updateHeaderAfterLogout;
            if(updateHeaderAfterLogout == '1') {
                this.isAuth = false;
            }
        });
         this.updateCurrentPage();
    },
    components: {

    },
    computed: {
        mainMenuClass() {
        return {
            'axil-mainmenu': true,
            'axil-sticky': this.isSticky,
        };
        },
        cartClass() {
        return {
            'cart-dropdown-btn': true,
            'd-none': !this.isSticky,
        };
        },
    },
    mounted(){
        this.getCategories();
        this.loadCartFromLocalStorage();
        var auth = localStorage.getItem('auth');
        this.auth = auth ? JSON.parse(auth) : 'null';     
        if (auth && auth !== 'null') {
            this.isAuth = true;
        }  
        window.addEventListener('scroll', this.handleScroll);
        this.handleScroll();     
    },
    beforeDestroy() {
        window.removeEventListener('scroll', this.handleScroll);
    },
    methods: {
        updateCurrentPage() {
            const pathArray = this.$route.path.split('/');
            this.currentPage = pathArray[pathArray.length - 1];
        },
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
        },
        scrollToTeamSection(id) {
            this.emitter.emit('scrollToTeamSection',id); 
            this.closeNav();          
        },
        closeNav () {
            document.getElementById('headerMainNav').classList.remove('open');
            document.getElementsByClassName('closeMask')[0].classList.remove('closeMask');
        },
        handleScroll() {
            const mainMenu = this.$refs.mainMenu;
            if (mainMenu) {
                this.isSticky = window.scrollY > mainMenu.offsetTop;
            }
        },
    },
     watch: {
    '$route'() {
        this.updateCurrentPage();
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
    flex-direction: unset;
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
 .header-brand {
       display: none;
  }
.mobileCart {
    display: none;
}
.menucategory {
    display: none;
}
.mobileMenu {
    display: none;
}
@media only screen and (max-width: 991px){
.header-style-5 .axil-mainmenu {
    background: rgb(238 110 45);    
}
.mobileCart {
    display: block;
}
.header-brand {
    display: block;
}
.header-main-nav .mainmenu-nav {
    background-color: rgb(238 110 45);
   
}
.header-main-nav .mainmenu-nav .mainmenu>li>a {
    color: #ffffff;
}
.mobile-nav-brand img {
    margin-left: -26px;
    max-height: 35px;
}
.mobileMenu {
    display: block;
}
}
@media only screen and (max-width: 768px) {
  .header-brand {
       display: block;
  }
  .mobileCart {
    display: block;
 }
 .axil-mainmenu {
    background: rgb(238, 110, 45);
    padding: 2px 0;
}
.header-main-nav.open .mainmenu-nav {
    background: rgb(238, 110, 45);
    right: 0;
    visibility: visible;
    opacity: 1;
}
.header-main-nav .mainmenu-nav .mainmenu>li>a {
    color: #ffffff;
    line-height: var(--line-height-b2) !important;
    height: auto !important;
    padding: 5px 0;
    display: inline-block;
}
.mobile-nav-brand img {
    margin-left: -25px;
    max-height: 25px;
}
.mobile-close-btn:hover {
    background-color: #fff;
    color: #000;
}
.header-action>ul>li {
    margin: 0px 16px 10px 5px;
}
.menucategory {
    display: block;
}
.mobileMenu {
    display: block;
}
}
.header-top-link .langAndNum {
    display: flex;
    flex-wrap: wrap;
    margin: -10px -33px;
    list-style: none;
}
.header-top-link .langAndNum li {
    padding-left: 24px;
}
@media screen and (min-width: 992px) and (max-width: 1199px) { 
    .header-style-5 .mainmenu>li {
        margin: 0 7px;
    }
}

@media (max-width: 767px) {
    #hide-on-small {
        display: none;
    }
}
</style>