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
                            <div class="bradcrumb-thumb d-none">
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
                                   <form @submit.prevent="submitForm" class="axil-contact-form">
                                    <div class="row row--10">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                            <label for="contact-name">Name <span>*</span></label>
                                            <input type="text" v-model="formData.name" id="contact-name" required>
                                            <span class="error" v-if="errors.name"> {{ errors.name }} </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                            <label for="contact-phone">Phone <span>*</span></label>
                                            <input type="text" v-model="formData.phone" id="contact-phone" required>
                                            <span class="error" v-if="errors.phone"> {{ errors.phone }} </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                            <label for="contact-email">E-mail <span>*</span></label>
                                            <input type="email" v-model="formData.email" id="contact-email" required>
                                            <span class="error" v-if="errors.email"> {{ errors.email }} </span>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                            <label for="contact-message">Your Message</label>
                                            <textarea v-model="formData.message" id="contact-message" cols="1" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <VueClientRecaptcha
                                                :value="inputValue"
                                                chars="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789"
                                                :hidelines="false"
                                                custom-text-color="black"
                                                @getCode="getCaptchaCode"
                                                @isValid="checkValidCaptcha"
                                                class="vue-recaptcha"
                                                >                                                             
                                            </VueClientRecaptcha>
                                            <input
                                                type="text"
                                                style="height: 40px; padding:5px;border: 1px solid #cfcbcb;" 
                                                v-model="inputValue"
                                                placeholder="Captcha"
                                            />
                                        </div>
                                        <div class="col-12 mt-3">
                                            <div class="form-group mb--0">
                                            <button type="submit" class="axil-btn btn-bg-primary">Send Message</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="contact-location mb--40">
                                <h4 class="title mb--20">Our Store</h4>                                
                                <p>Työnjohtajankatu 5, 00880 Helsinki
                                    </p>                                
                                    <ul class="support-list-item">
                                         <li><a  href="tel:+35826220208"><i class="fal fa-phone-alt"></i> +35826220208</a></li>
                                        <li><a  href="mailto:info@pizzapitsa.fi"><i class="fal fa-envelope-open"></i> info@pizzapitsa.fi</a></li>
                                        <li><a  href="mailto:maria@pizzapitsa.fi"><i class="fal fa-envelope-open"></i> maria@pizzapitsa.fi</a></li>
                                        <li><a  href="mailto:feedback@pizzapitsa.fi"><i class="fal fa-envelope-open"></i> feedback@pizzapitsa.fi</a></li>
                                        <li><a  href="mailto:franchise@pizzapitsa.fi"><i class="fal fa-envelope-open"></i> franchise@pizzapitsa.fi</a></li>
                                        <li><a  href="mailto:order@pizzapitsa.fi"><i class="fal fa-envelope-open"></i> order@pizzapitsa.fi</a></li>                                       
                                        <!-- <li><i class="fal fa-map-marker-alt"></i> 685 Market Street,  <br> Las Vegas, LA 95820, <br> United States.</li> -->
                                    </ul>
                            </div>                         
                            <div class="opening-hour">
                                <h4 class="title mb--20">Opening Hours:</h4>
                                
                                <p>
                                    {{ shopAddress }}
                                    {{ shopSchedule }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Start Google Map Area  -->
                <div class="axil-google-map-wrap axil-section-gap pb--0">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe width="1080" height="500" id="gmap_canvas" src="https://maps.google.com/maps?width=600&amp;height=400&amp;hl=en&amp;q=University ofTyönjohtajankatu 5, 00880 Helsinki Oxford&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
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
    import VueClientRecaptcha from "vue-client-recaptcha";
    export default {
        name: 'contact',
        data() {
            return {
               formData: {
                name: '',
                phone: '',
                email: '',
                message: ''
                },                
                errors: {},
                inputValue: null,
                isValidCaptcha: false,                
            };
        },
        components: {
            VueClientRecaptcha
        },
        mounted() {
          
        },
        methods: {
            async submitForm() {
                
                if (this.isValidCaptcha) { 
                    try {
                        const response = await axios.post('contact-us-submit', this.formData);
                        toast.success('Form submitted success!', {
                            timeout: 3000
                        });  
                        this.name = '';
                        this.phone = '';
                        this.email = '';
                        this.message = '';
                    } catch (error) {
                        if (error.response && error.response.status === 422) {
                        this.errors = error.response.data.errors;
                        } else {
                        console.error('Form submission error:', error);
                        }
                    }
                } else {
                    alert("Your Form Not Submited! captcha is inValid");
                }
                
            } ,
            getCaptchaCode(capthaResult) {
                /* you can access captcha code */
                // console.log(capthaResult);
            },
            checkValidCaptcha(capthaResult) {
                /* expected return boolean if your value and captcha code are same return True otherwise return False */
                // console.log("this is captha valid " + capthaResult);
                this.isValidCaptcha = capthaResult;
            },
    }
};
</script>
<style scoped>
 ul li {
    list-style: none;
 }

 .error {
  color: red;
}
</style>