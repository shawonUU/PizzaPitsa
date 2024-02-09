<template>
    <div>
        <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
        <!-- Start Header -->
        <header class="header axil-header header-style-5">
            <div class="axil-header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="header-top-dropdown">
                                <div class="dropdown">
                                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        English
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">English</a></li>
                                        <li><a class="dropdown-item" href="#">Arabic</a></li>
                                        <li><a class="dropdown-item" href="#">Spanish</a></li>
                                    </ul>
                                </div>                            
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="header-top-link">
                                <ul class="quick-link">
                                    <li><a href="#">Help</a></li>
                                    <li><a href="sign-up.html">Join Us</a></li>
                                    <li><a href="sign-in.html">Sign In</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Mainmenu Area  -->
            <div id="axil-sticky-placeholder" style="height: 0px;"></div>
            <div class="axil-mainmenu">
                <div class="container">
                    <div class="header-navbar">
                        <div class="header-brand">
                            <a href="index-2.html" class="logo logo-dark">
                                <img  width="100px" :src="'/frontend/assets/images/logo/pizza logo-02.jpg'" alt="Site Logo">
                            </a>
                            <a href="index-2.html" class="logo logo-light">
                                <img width="200px" :src="'/frontend/assets/images/logo/pizza logo-02.jpg'" alt="Site Logo">
                            </a>
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
                                <ul class="mainmenu">
                                    <li>
                                        <a href="#">Home</a>                                   
                                    </li>                               
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </nav>
                            <!-- End Mainmanu Nav -->
                        </div>
                        <div class="header-action">
                            <ul class="action-list">
                                
                                <li class="axil-search d-xl-none d-block">
                                    <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                        <i class="flaticon-magnifying-glass"></i>
                                    </a>
                                </li>
                                
                                <li class="shopping-cart">
                                    <a href="#" class="cart-dropdown-btn">
                                        <span class="cart-count">3</span>
                                        <i class="flaticon-shopping-cart"></i>
                                    </a>
                                </li>
                                <li class="my-account">
                                    <a href="javascript:void(0)">
                                        <i class="flaticon-person"></i>
                                    </a>
                                    <div class="my-account-dropdown">
                                        <span class="title">QUICKLINKS</span>
                                        <ul>
                                            <li>
                                                <a href="my-account.html">My Account</a>
                                            </li>
                                            <li>
                                                <a href="#">Initiate return</a>
                                            </li>
                                            <li>
                                                <a href="#">Support</a>
                                            </li>
                                            <li>
                                                <a href="#">Language</a>
                                            </li>
                                        </ul>
                                        <div class="login-btn">
                                            <a href="sign-in.html" class="axil-btn btn-bg-primary">Login</a>
                                        </div>
                                        <div class="reg-footer text-center">No account yet? <a href="sign-up.html" class="btn-link">REGISTER HERE.</a></div>
                                    </div>
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
export default {
  name: 'header',
  components: {
    
  },
  methods: {
    getLogoUrl(filename) {
      return process.env.MIX_PUBLIC_PATH + '/frontend/assets/images/' + filename;
    },
}
}
</script>