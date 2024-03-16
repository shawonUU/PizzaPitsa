<template>
    <div>
        <main class="main-wrapper">
        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><router-link to="/">Home</router-link></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">Contact</li>
                            </ul>
                            <h1 class="title">Contact With Us</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="inner">
                            <div class="bradcrumb-thumb">
                                <img src="https://new.axilthemes.com/demo/template/etrade-rtl/assets/images/product/product-45.png" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start Contact Area  -->
        <div class="axil-contact-page-area axil-section-gap">
            <div class="container">
                <div class="axil-contact-page">
                    <div class="row row--30">
                        <div class="col-lg-8">
                            <div class="contact-form">
                                <h3 class="title mb--10">We would love to hear from you.</h3>
                                <p>If you’ve got great products your making or looking to work with us then drop us a line.</p>
                                <form id="contact-form" method="POST" action="https://new.axilthemes.com/demo/template/etrade/mail.php" class="axil-contact-form">
                                    <div class="row row--10">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-name">Name <span>*</span></label>
                                                <input type="text" name="contact-name" id="contact-name">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-phone">Phone <span>*</span></label>
                                                <input type="text" name="contact-phone" id="contact-phone">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="contact-email">E-mail <span>*</span></label>
                                                <input type="email" name="contact-email" id="contact-email">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="contact-message">Your Message</label>
                                                <textarea name="contact-message" id="contact-message" cols="1" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group mb--0">
                                                <button name="submit" type="submit" id="submit" class="axil-btn btn-bg-primary">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="contact-location mb--40">
                                <h4 class="title mb--20">Our Store</h4>
                                <span class="address mb--20">Työnjohtajankatu 5, 00880 Helsinki</span>
                                <span class="phone"><a href="tel:+35826220208">+35826220208</a></span>
                                <span class="email">Email: <a href="mailto:info@pizzapitsa.fi">info@pizzapitsa.fi</a></span>
                            </div>                         
                            <div class="opening-hour">
                                <h4 class="title mb--20">Opening Hours:</h4>
                                
                                <p v-html="shopAddress+shopSchedule">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Google Map Area  -->
                <div class="axil-google-map-wrap axil-section-gap pb--0">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="1080" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=melbourne&amp;t=&amp;z=13&amp;ie=UTF8&amp;iwloc=&amp;output=embed"></iframe>
                        </div>
                    </div>
                </div>
                <!-- End Google Map Area  -->
            </div>
        </div>
        <!-- End Contact Area  -->
    </main>
    <div class="service-area">
        <div class="container">
            <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="https://new.axilthemes.com/demo/template/etrade-rtl/assets/images/icons/service1.png" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Fast &amp; Secure Delivery</h6>
                            <p>Tell about your service.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="https://new.axilthemes.com/demo/template/etrade-rtl/assets/images/icons/service3.png" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Money Back Guarantee</h6>
                            <p>Within 10 days.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="https://new.axilthemes.com/demo/template/etrade-rtl/assets/images/icons/service2.png" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">24 Hour Return Policy</h6>
                            <p>No question ask.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="https://new.axilthemes.com/demo/template/etrade-rtl/assets/images/icons/service1.png" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title">Pro Quality Support</h6>
                            <p>24/7 Live support.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>


<script>
    import axios from 'axios';
    import { toast } from 'vue3-toastify';
    import 'vue3-toastify/dist/index.css';
    export default {
        name: 'deliveryPlace',
        props: {
          discount: Object,
          subTotal: Object,
          grandTotal: Object,
          orderType:Object,
        },
        data() {
            return {
                lat:0,
                lng:0,
                deliveryPlace: true,
                mapSection: false,
                scheduleSection:false,
                modalWidth: 25,
                message: '',
                isVisible:false,

                map: null,
                marker: null,
                selectedLocation: null,
                selectedAddress: '',
                latitude:null,
                longitude:null,
                orderDetails:false,
                auth:true,
                entrance:'',
                doorCode:'',
                floor:'',
                apartment:'',
                addressComment:'',
                cart:[],
                shopAddress:'',
                shopLatitude:'',
                shopLongitude:'',
                shopSchedule:'',
                deliveryCharge:0,
                deliveryAddressError:'',
            };
        },
        mounted() {
          axios.get('get-location-schedule')
          .then((res)=>{                  
            console.log(res.data);
            this.shopAddress = res.data.address;
            this.shopSchedule = res.data.schedule;
            this.lng = res.data.longitude;
            this.lat = res.data.latitude;
            if(this.orderType==1){this.showMap();}
            if(this.orderType==2){this.showSchedule();}
          })
          .catch((err)=>{
              console.log(err);
          });
        },
        methods: {
            
        },
    };
</script>
