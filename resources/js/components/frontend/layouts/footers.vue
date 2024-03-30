<template>
    <div>
         <footer class="axil-footer-area footer-style-2">
            <div class="footer-img">
                 <img :src="'/frontend/assets/images/Pizza-Pitsa-full-shop-footer.jpg'" alt="footer image">
            </div>
            <!-- Start Footer Top Area  -->
            <div class="footer-top ">
                <div class="container">
                    <div class="row">
                        <!-- Start Single Widget  -->
                        <div class="col-lg-4 col-sm-6">
                            <div class="axil-footer-widget">                              
                                <div class="logo mb--30">
                                <a href="index.html">
                                    <img width="300px" :src="'/frontend/assets/images/logo/Pizzapitsa-logo-balck-footer.png'" alt="Logo Images">
                                </a>
                            </div>
                                <div class="inner">
                                    <p>
                                        Introducing Pizza Pitsa: Finland's newest pizza sensation! Born in December 2023, we're dedicated to crafting perfect pizzas that celebrate flavor, freshness, and authenticity. Join us for a culinary experience where passion and quality meet.
                                    </p>                                  
                                </div>
                            </div>
                        </div>
                        <!-- End Single Widget  -->
                        <!-- Start Single Widget  -->                    
                        <!-- End Single Widget  -->
                        <!-- Start Single Widget  -->
                     <div class="col-lg-4 col-sm-6">
                            <div class="axil-footer-widget">
                                <h5 class="widget-title" style="color:#fff">Support</h5>
                                <!-- <div class="logo mb--30">
                                <a href="index.html">
                                    <img class="light-logo" src="assets/images/logo/logo.png" alt="Logo Images">
                                </a>
                            </div> -->
                                <div class="inner">
                                    <p>Työnjohtajankatu 5, 00880 Helsinki
                                    </p>
                                    <ul class="support-list-item">
                                        <li><a style="color:#fff" href="tel:+35826220208"><i class="fal fa-phone-alt"></i>+35826220208</a></li>
                                        <li><a style="color:#fff" href="mailto:info@pizzapitsa.fi"><i class="fal fa-envelope-open"></i>info@pizzapitsa.fi</a></li>
                                        <li><a style="color:#fff" href="mailto:maria@pizzapitsa.fi"><i class="fal fa-envelope-open"></i>maria@pizzapitsa.fi</a></li>
                                        <li><a style="color:#fff" href="mailto:feedback@pizzapitsa.fi"><i class="fal fa-envelope-open"></i>feedback@pizzapitsa.fi</a></li>
                                        <li><a style="color:#fff" href="mailto:iFRANCHISE@pizzapitsa.fi"><i class="fal fa-envelope-open"></i>FRANCHISE@pizzapitsa.fi</a></li>
                                        <li><a style="color:#fff" href="mailto:order@pizzapitsa.fi"><i class="fal fa-envelope-open"></i>order@pizzapitsa.fi</a></li>                                        
                                        <!-- <li><i class="fal fa-map-marker-alt"></i> 685 Market Street,  <br> Las Vegas, LA 95820, <br> United States.</li> -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Widget  -->
                        <!-- Start Single Widget  -->
                        <div class="col-lg-4 col-sm-6">
                            <div class="axil-footer-widget">
                                <h5 class="widget-title" style="color:#fff">Map</h5>
                                <div class="inner">
                                     <div class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=University ofTyönjohtajankatu 5, 00880 Helsinki Oxford&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://strandsgame.net/">Strands NYT</a></div>                                    
                                     </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Widget  -->
                    </div>
                </div>
            </div>
            <!-- End Footer Top Area  -->
            <!-- Start Copyright Area  -->
            <div class="copyright-area copyright-default separator-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-4">
                            <div class="social-share">
                                <a href="#" style="color: #fff;"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" style="color: #fff;" ><i class="fab fa-instagram"></i></a>
                                <a href="#" style="color: #fff;"><i class="fab fa-twitter"></i></a>
                                <a href="#" style="color: #fff;"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#" style="color: #fff;"><i class="fab fa-discord"></i></a>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12">
                            <div class="copyright-left d-flex flex-wrap justify-content-center">
                                <ul class="quick-link">
                                    <li style="color:#fff">© {{ currentYear }}. All rights reserved by <a target="_blank" href="https://axilthemes.com/" style="color:#fff">Pizza Pitsa</a>.</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-12">
                            <div class="copyright-right d-flex flex-wrap justify-content-xl-end justify-content-center align-items-center">                                
                                <ul class="payment-icons-bottom quick-link">
                                   <li class="sc-xlo7eb-4 bvuzKi">
                                    <router-link to="/about" class="sc-2c0aw7-0 wwSTC sc-xlo7eb-7 kkaUZR" data-active="false" data-type="primary" data-size="normal" style="color:#fff">About</router-link>
                                    </li>
                                    <li class="sc-xlo7eb-4 bvuzKi">
                                        <router-link to="/franchise" class="sc-2c0aw7-0 wwSTC sc-xlo7eb-7 kkaUZR" data-active="false" data-type="primary" data-size="normal" style="color:#fff">Franchise</router-link>
                                    </li>
                                    <li class="sc-xlo7eb-4 bvuzKi">
                                        <router-link to="/contact" class="sc-2c0aw7-0 wwSTC sc-xlo7eb-7 kkaUZR"    data-active="false" data-type="primary" data-size="normal" style="color:#fff">Contact</router-link>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area  -->
        </footer>
    </div>
</template>
<script>
export default {
  name: 'AppFooter',
  components: {

  },
  data(){
    return{
        currentYear: new Date().getFullYear(),
    }
  }
}
</script>
 <style scoped>
 .mapouter{position:relative;text-align:right;width:400px;height:300px;}.gmap_canvas {overflow:hidden;background:none!important;width:400px;height:300px;}.gmap_iframe {width:400px!important;height:300px!important;}
 footer.axil-footer-area.footer-style-2 {
    color: #fff;
    background: rgb(238, 110, 45);
}
.widget-title {
    color: #fff!important;
}
.social-share a i{
    color: #fff!important;
}
.axil-footer-widget .logo img {
    height: 65px;
    width: auto;
}
 </style>