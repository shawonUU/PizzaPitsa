<template>
    <div
      class="modal fade quick-view-product show"
      id="quick-view-modal"
      tabindex="-1"
      aria-modal="true"
      role="dialog"
      style="display: block"
    >

      <div class="modal-dialog modal-dialog-centered" :style="{ 'max-width': modalWidth + '%' }">
        <div class="modal-content">
          <div class="modal-body" style="padding-top: 0px; padding-right: 13px;">
            <div class="d-flex justify-content-end pt-3">
                <button type="button" class="btn-close" style="height:5px; width:5px; margin-bottom: 15px;" data-bs-dismiss="modal" aria-label="Close" @click="handleButtonClick">
                </button>
            </div>
            <div v-if="deliveryPlace" class="d-none">
                <h4 class="text-center m-2 p-0">What's your delivery address?</h4>
                <p class=" m-0 p-0" style="line-height:1;">We’ll check that you are in the delivery zone and save your address for future orders. </p>
                <div class="row">
                    <div class="col-12 mt-5">
                        <div class="input-group" style="cursor:pointer;">
                                  <button @click="showMap()" type="button" class="btn" style=" cursor:pointer !important; background: #ee6e2d; color: white; width: 100%; border-radius: 9999px; padding: 5px; font-size: 16px;">Specify The Delivery Address</button>
                            </div>
                    </div>
                    <div class="col-12 mt-3">
                        <div class="input-group" style="cursor:pointer;">
                                <button @click="placeOrder(2)" type="button" class="btn" style="cursor:pointer !important; background: #f5c6ae; color: white; width: 100%; border-radius: 9999px; padding: 5px; font-size: 16px;">Or Dine In / Pick Up</button>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="mapSection"> 
                <div class="container">
                  <!-- <h4>Home delivery option is under development. You can order now only Pickup/Dine-in or Call us for order at <a href="tel:+35826220208" style="color:blue"> +35826220208 </a></h4>   -->
                </div>               
                <div class="row">
                    <div class="col-12 col-md-4">
                      <div v-if="!auth" class="">
                        <h4>Order as a Guest <span style="font-size:12px; margin-left: 5px;"> Or <a style="margin-left: 5px; color:#ee6e2d;" href="javascript:void(0)">Sing In</a></span></h4>
                        <h6 class="m-0 mb-2">Basic Info</h6>
                        <div class="row">
                          <div class="col-12 mb-5">
                            <input id="temp_name" type="text" class="form-group m-0" style="border:1px solid #000; height: 50px;" placeholder="Name">
                          </div>
                          <div class="col-12 mb-5">
                            <input id="temp_email" type="text" class="form-group m-0" style="border:1px solid #000; height: 50px;" placeholder="Email">
                            <span style="font-size:12px; color:red;" v-if="!is_guest_email">The email is already exsist. Please Sign In</span>
                          </div>
                          <div class="col-12 mb-5">
                            <input id="temp_phone" type="text" class="form-group m-0" style="border:1px solid #000; height: 50px;" placeholder="Phone">
                          </div>
                        </div>
                      </div>
                        <h6 class="m-0 mb-2">Delivery Address</h6>
                          <div v-if="isVisible" class="toast-container">
                            <div class="toast">{{ message }}</div>
                          </div>
                        <form action="javascript:void(0)">
                            <div class="row">
                                <div class="col-12 mb-5">
                                  <input id="daliveryAddress" @input="searchPlaces()" @change="changeDaliveryAddress" type="text" class="form-group m-0" style="border:1px solid #000; height: 50px;" :value="selectedAddress" placeholder="Address">
                                  <ul class="list-group shadow-lg" v-if="suggestions.length">
                                    <li class="list-group-item mb-0 suggestion" style="cursor:pointer;" v-for="(suggestion, index) in suggestions" :key="index" @click="selectPlace(suggestion)">{{ suggestion.description }}</li>
                                  </ul>
                                  <p v-if="deliveryAddressError" class="m-0 p-0" style="color :red;">{{ deliveryAddressError }}</p>
                                </div>
                                <div class="col-6">
                                    <input id="entrance" type="text" class="form-group mb-5" style="border:1px solid #000; height: 50px;" placeholder="Entrance">
                                </div>
                                <div class="col-6">
                                    <input id="door_code" type="text" class="form-group mb-5" style="border:1px solid #000; height: 50px;" placeholder="Door Code">
                                </div>
                                <div class="col-6">
                                    <input id="floor" type="text" class="form-group mb-5" style="border:1px solid #000; height: 50px;" placeholder="Floor">
                                </div>
                                <div class="col-6">
                                    <input id="apartment" type="text" class="form-group mb-5" style="border:1px solid #000; height: 50px;" placeholder="Apartment">
                                </div>
                                <div class="col-12">
                                    <input id="comment" type="text" class="form-group mb-5" style="border:1px solid #000; height: 50px;" placeholder="Apt., Suite, Room and Comments">
                                </div>
                            </div>
                            <div class="mt-auto">
                              <button id="cashOnDeliveryBtn" type="button" @click="checkout('cashOnDeliveryBtn')" class="btn" style="background:#cecac8; cursor: not-allowed; color: #fff; border-radius: 9999px; padding: 5px; font-size: 16px;" >Checkout</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-8">
                        <div id="map" style="height: 600px;"></div>
                    </div>
                </div>
            </div>

            <div v-if="scheduleSection">                
                <div class="row">
                    <div class="col-12 col-md-4">
                        <h3 class="d-none">Pick Up/ Dine In</h3>
                        <div v-if="isVisible" class="toast-container">
                          <div class="toast">{{ message }}</div>
                        </div>
                        <div v-if="!auth" class="">
                          <h4>Order as a Guest <span style="font-size:12px; margin-left: 5px;"> Or <a style="margin-left: 5px; color:#ee6e2d;" href="javascript:void(0)">Sing In</a></span></h4>
                          <h6 class="m-0 mb-2">Basic Info</h6>
                          <div class="row">
                            <div class="col-12 mb-5">
                              <input id="temp_name" type="text" class="form-group m-0" style="border:1px solid #000; height: 50px;" placeholder="Name">
                            </div>
                            <div class="col-12 mb-5">
                              <input id="temp_email" type="text" class="form-group m-0" style="border:1px solid #000; height: 50px;" placeholder="Email">
                              <span style="font-size:12px; color:red;" v-if="!is_guest_email">The email is already exsist. Please Sign In</span>
                            </div>
                            <div class="col-12 mb-5">
                              <input id="temp_phone" type="text" class="form-group m-0" style="border:1px solid #000; height: 50px;" placeholder="Phone">
                            </div>
                          </div>
                        </div>
                        <form action="javascript:void(0)">
                            <div class="row">
                                <div class="col-12">
                                  <div class="schedule-div p-3 " v-html="shopAddress" style="border-radius: 15px; border: solid 1px #ffc3c3;  margin-bottom: 10px;text-align:left; line-height:1; padding:3px;">
                                     
                                    </div>
                                  <div class="schedule-div p-3 " v-html="shopSchedule" style="border-radius: 15px; border: solid 1px #ffc3c3;  margin-bottom: 10px;text-align:left; line-height:1; padding:3px;">
                                     
                                  </div>
                                </div>
                            </div>
                            <div class="mt-auto">
                              <button id="checkoutBtn" type="button" @click="checkout('checkoutBtn')" class="btn" style="margin-top: 10px;background:#ee6e2d; cursor: pointer; color: #fff; border-radius: 9999px; padding: 5px; font-size: 16px;" >Checkout</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-8">
                        <div id="map-container">
                             <div id="map" style="height: 500px;"></div>
                        </div>
                        <div v-if="orderType==1" id="overlay"></div>
                    </div>
                </div>
            </div>

            <div v-if="orderDetails">                
                <div class="row">
                    <div class="col-12">
                        <h3>Order Details</h3>                          
                          <div class="row">
                            <div class="col-12 col-sm-6 col-xsm-6">
                              <strong v-if="orderType==1">Delivery Address Info</strong>
                              <strong v-if="orderType==2">Customer Info</strong>
                              <hr>
                              <address>                                 
                                  <div class="d-flex justify-content-between">
                                    <div>
                                      <strong class="text-main"> Name: {{auth ? auth.name : tempName}}</strong>
                                    </div>
                                  </div> <strong>Email:</strong> {{auth ? auth.email : tempEmail}}<br> 
                                <template  v-if="orderType==1">
                                  <strong>Selected Address:</strong> {{selectedAddress}}<br> 
                                  <strong>Entrance:</strong> {{entrance}}<br> 
                                  <strong>Door Code:</strong> {{doorCode}}<br> 
                                  <strong>Floor:</strong> {{floor}}<br> 
                                  <strong>Apartment:</strong> {{apartment}}<br> 
                                  <strong>Comment:</strong> {{addressComment}}<br> 
                                </template>
                                

                              </address>
                            </div>
                            <div class="col-12 col-sm-6 col-xsm-6">
                              <strong>Order Info</strong>
                              <hr>
                              <table>
                                <tbody>
                                  <tr class="infoTd">
                                    <td class="text-main text-bold p-0"><strong>Order Type:</strong></td>
                                    <td class="text-main text-bold p-0">
                                      {{ orderType==1 ? 'Delivery' : 'Dine in or Pickup' }}                          
                                    </td>                    
                                  </tr>
                                  
                                  <tr class="infoTd d-none">
                                    <td class="text-main text-bold p-0"><strong>Date:</strong> </td>
                                    <td class="text-right p-0">March 3, 2024 at 5:32 PM</td>
                                  </tr>
                                  <tr class="infoTd">
                                    <td class="text-main text-bold p-0"> <strong>Amount:</strong> </td>
                                    <td class="text-right p-0">{{ grandTotal }}{{ baseCurrencySymbol }}</td>
                                  </tr>          
                                </tbody>
                              </table>
                            </div>
                          </div>                          
                          <div class="row">
                            <div class="col-lg-12 table-responsive">
                              <table  class="table-bordered aiz-table invoice-summary table footable footable-1 breakpoint-xl" style="font-size: 13px !important;">
                                <thead>
                                  <tr class="bg-trans-dark footable-header">
                                    <th width="10%" style="display: table-cell;">Photo</th>
                                    <th class="text-uppercase" style="display: table-cell;">Name</th>                  
                                    <th data-breakpoints="lg" class="min-col text-uppercase text-center" style="display: table-cell;">Qty</th>
                                    <th data-breakpoints="lg" class="min-col text-uppercase text-center" style="display: table-cell;">Price</th>
                                    <th data-breakpoints="lg" class="min-col text-uppercase text-center d-none" style="display: table-cell;">Option Price</th>
                                    <th data-breakpoints="lg" class="min-col text-uppercase text-center" style="display: table-cell;">Topping Price</th>
                                    <th data-breakpoints="lg" class="min-col text-uppercase text-center footable-last-visible" style="display: table-cell;">Total</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <template v-for="(productSizes, productId) in cart" :key="productId">
                                    <template v-if="cart.hasOwnProperty(productId)">
                                        <template v-for="(item, sizeId) in productSizes" :key="sizeId">
                                          <tr>
                                            <td style="display: table-cell;">                     
                                                <img height="50" :src="item.product.image ? '/frontend/product_images/' +item.product.image : '/frontend/product_images/placeholder.jpg'">                     
                                            </td>
                                            <td style="display: table-cell;">
                                              <strong style="display:block;"> {{ item.product.name }}</strong>
                                              <small style="display:block;">Size:  {{ item.size.name }} </small>
                                              <small style="display:block;" v-if="item.options.length>0">
                                                <span>+</span> 
                                                <template  v-for="(toping, topingId) in item.options" :key="topingId">
                                                  <template v-if="toping">
                                                      {{ toping.name }}({{ item.optionPrices[toping.id]}}{{ baseCurrencySymbol }} x {{item.optionQtys[toping.id]}})
                                                      <span v-if="topingId != item.options.length-1">,</span>
                                                  </template>
                                                </template>
                                              </small>
                                              <small v-if="item.topings.length>0">
                                                <span>+</span> 
                                                <template  v-for="(toping, topingId) in item.topings" :key="topingId">
                                                  <template v-if="toping">
                                                      {{ toping.name }}({{ item.toppingPrices[toping.id]}}{{ baseCurrencySymbol }} x {{item.toppingQtys[toping.id]}})
                                                      <span v-if="topingId != item.topings.length-1">,</span>
                                                  </template>
                                                </template>
                                              </small>
                                              <p v-if="item.removedTags.length>0" style=" width:100% !important; line-height: 0.8;">
                                                  <span>-</span>
                                                  <template  v-for="(tag, tagid) in item.removedTags" :key="tagid">
                                                      <span style="margin:0; padding:0; font-size:12px; padding: 0 2px;">{{ productAllTages[tag] }}</span>
                                                      <span v-if="tagid != item.removedTags.length-1">,</span>
                                                  </template>
                                              </p>
                                              <br>                  
                                            </td>                   
                                            <td class="text-center" style="display: table-cell;"> {{ item.quantity }} </td>
                                            <td class="text-center" style="display: table-cell;"> {{ item.size.price }}{{ baseCurrencySymbol }}</td>
                                            <td class="text-center footable-last-visible" style="display: none;"> {{ item.totalOptionPrice }}{{ baseCurrencySymbol }} </td>
                                            <td class="text-center footable-last-visible" style="display: table-cell;"> {{ (item.totalTopingPrice * 1) + (item.totalOptionPrice * 1) }}{{ baseCurrencySymbol }} </td>
                                            <td class="text-center footable-last-visible" style="display: table-cell;"> {{ item.totalPrice }}{{ baseCurrencySymbol }} </td>
                                          </tr>    
                                        </template>
                                      </template>
                                  </template>   

                                  <tr>
                                  <td colspan="5" style="text-align: right;">
                                    <strong class="text-muted">Sub Total :</strong>
                                  </td>
                                  <td style="text-align: center;">{{ subTotal }} {{ baseCurrencySymbol }} </td>
                                </tr>
                                <tr v-if="orderType==1">
                                  <td colspan="5" style="text-align: right;">
                                    <strong class="text-muted">Shipping Charge:</strong>
                                  </td>
                                  <td style="text-align: center;"> {{deliveryCharge}}€ </td>
                                </tr>
                                <tr v-if="discount">
                                  <td colspan="5" style="text-align: right;">
                                    <strong class="text-muted">Discount :</strong>
                                  </td>
                                  <td style="text-align: center;">{{discount}} {{baseCurrencySymbol}}</td>
                                </tr>
                                <tr>
                                  <td colspan="5" style="text-align: right;">
                                    <strong class="text-muted">Total :</strong>
                                  </td>
                                  <td style="text-align: center;">{{ parseFloat(grandTotal)+parseFloat(deliveryCharge) }} {{baseCurrencySymbol}} </td>
                                </tr>
                                  
                                </tbody>
                              </table>
                            </div>
                          </div>                       
                          <div class="row">
                            <div v-if="!auth" class="col-12">
                              <input id="verification_code" class="form-controll" style="height: 50px; border:1px solid #000;" :placeholder="'Enter email verification code.'" type="text">
                              <span v-if="is_mail_verifide==false" style="color:red; font-size:12px;">Verification code not metched.</span>
                            </div>
                              <div class="col-12 col-md-6 mt-5 mb-3">
                                  <div class="input-group" style="cursor:pointer;">
                                      <button id="deliveryOnCash" @click="placeOrder(orderType, 1)" type="button" class="btn" style=" cursor:pointer !important; background: #ee6e2d; color: white; width: 100%; border-radius: 9999px; padding: 5px; font-size: 16px;">Cash On Delivery</button>
                                  </div>
                              </div>
                              <div class="col-12 col-md-6 mt-5 mb-3">
                                  <div class="input-group" style="cursor:pointer;">
                                      <button id="payOnline" @click="placeOrder(orderType, 2)" type="button" class="btn" style="cursor:pointer !important; background-color: rgb(238, 110, 45); color: white; width: 100%; border-radius: 9999px; padding: 5px; font-size: 16px;">Pay Online</button>
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
  </template>


<script>
    import axios from 'axios';
    import { toast } from 'vue3-toastify';
    import 'vue3-toastify/dist/index.css';
    import { getBaseCurrencySymbol } from '../../helpers.js';
    export default {
        name: 'deliveryPlace',
        props: {
          discount: Object,
          subTotal: Object,
          grandTotal: Object,
          orderType:Object,
          productAllTages:Object,
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
                suggestions:[],
                baseCurrencySymbol:'',
                tempName:'',
                tempEmail:'',
                tempPhpne:'',
                is_guest_email:true,
                verification_code: null,
                is_mail_verifide:null,
            };
        },
        mounted() {
          var auth = localStorage.getItem('auth');
          this.auth = auth ? JSON.parse(auth) : null;

          axios.get('get-location-schedule')
          .then((res)=>{                  
            //console.log(this.orderType);
            this.shopAddress = res.data.address;
            this.shopSchedule = res.data.schedule;
            this.lng = parseFloat(res.data.longitude);
            this.lat = parseFloat(res.data.latitude);
            if(this.orderType==1){this.showMap();}
            if(this.orderType==2){this.showSchedule();}
            this.fetchBaseCurrencySymbol();
          })
          .catch((err)=>{
              console.log(err);
          });
        },
        methods: {
          startProcessing(id,noOf){
                if(noOf){
                  var addToListBtn = document.getElementById(id);
                  if(!addToListBtn){return;}
                  addToListBtn.dataset.html = addToListBtn.innerHTML;
                  addToListBtn.dataset.bgColor = addToListBtn.style.backgroundColor;
                  addToListBtn.innerHTML = "Processing..";
                  addToListBtn.style.backgroundColor = "#ee6e2d";
                  addToListBtn.disabled = true;
                }else{
                  var addToListBtn = document.getElementById(id);
                  if(!addToListBtn){return;}
                  var text = addToListBtn.dataset.html;
                  var color = addToListBtn.dataset.bgColor;
                  if(!text || text == "") return;

                  addToListBtn.innerHTML = text;
                  addToListBtn.style.backgroundColor = color;
                  addToListBtn.disabled = false;
                  delete addToListBtn.dataset.html;
                  delete addToListBtn.dataset.bgColor;
                }
            },
            handleButtonClick() {
                this.$emit('closeModal');
            },
            async fetchBaseCurrencySymbol() {
              try {
                  this.baseCurrencySymbol = await getBaseCurrencySymbol();
              } catch (error) {
                  // Handle error (e.g., show an error message)
                  console.error('Error fetching base currency symbol in component:', error);
              }
            },
            showMap() {
                if(this.grandTotal>=12){
                  this.deliveryPlace = false;
                  this.mapSection = true;
                  this.modalWidth = 80;
                  axios.get('get-delivery-charge')
                  .then((res)=>{ 
                    if(res.data){
                      console.log(res.data.amount);
                      this.deliveryCharge = res.data.amount; 
                    }
                    this.initMap();
                  })
                  .catch((err)=>{
                      console.log(err);
                  });
                }else{
                  this.isVisible = true;
                  this.message = 'Minium Order Amount is 12';
                 // this.showToast(this.message,0);
                }
            },
            showSchedule(){
                this.deliveryPlace = false;
                this.scheduleSection = true;
                this.modalWidth = 80;
                this.initMap();
            },
            placeOrder(type, paymentType){

              if(!this.auth){
                var verification_code = document.getElementById('verification_code').value.trim()
                if(verification_code == this.verification_code){
                  this.is_mail_verifide = true;
                }else{
                  this.is_mail_verifide = false;
                  return;
                }
              }

              if(!confirm('Are want to confirm this order?')){
                return;
              }

              if(type==1 && !(this.latitude && this.longitude)){
                   //this.showToast('select delivery address',0);
                   return;
              }

                const savedCart = localStorage.getItem('cart');
                // console.log(savedCart ? JSON.parse(savedCart) : []);return;
                var entrance = this.entrance;
                var door_code = this.doorCode;
                var floor = this.floor;
                var apartment = this.apartment;
                var comment = this.addressComment;


                var id = paymentType == 1? "deliveryOnCash" : "payOnline";
                this.startProcessing(id,true);
                axios.post('palce-order', {
                  type: type,
                  cart: savedCart,
                  subTotal:this.subTotal,
                  discount:this.discount,
                  grandTotal:parseFloat(this.grandTotal)+parseFloat(this.deliveryCharge),
                  deliveryCharge:this.deliveryCharge,
                  latitude:this.latitude,
                  longitude:this.longitude,
                  selectedAddress:this.selectedAddress,
                  entrance:entrance,
                  door_code:door_code,
                  floor:floor,
                  apartment:apartment,
                  comment:comment,
                  paymentType:paymentType,
                  tempEmail:this.tempEmail,
                })
                .then((res)=>{ 
                  this.startProcessing(id,false);  
                  console.log(res.data);             
                  if(res.data.success){
                    if(paymentType==1){
                      localStorage.setItem('cart', '');
                      this.handleButtonClick();
                      this.emitMyEvent();
                    // this.showToast(res.data.message,1);
                      this.handleCart();
                      this.$router.push({ name: 'dashboard', query: { tab: 'orders' } });
                    }
                    else if(paymentType==2){
                      // console.log(res.data.url)
                      window.location.href = res.data.url;
                    }
                    
                  }else{
                      this.checkOutError = true;
                      this.checkOutMessage = res.data.message;
                     // this.showToast(res.data.message,0);
                  }
                })
                .catch((err)=>{
                    console.log(err);
                })
            },
            showToast(message,type) {
                if(type){
                  //toast.success(message, {timeout: 2000});
                }else{
                  //toast.warning(message, {timeout: 2000});
                }
                  
                  this.message = message;
                  this.isVisible = true;

                setTimeout(() => {
                  this.isVisible = false;
                }, 2000);
            },
            handleCart(){
                this.emitter.emit('handleCart', {'handleCart': 1});
            },
            emitMyEvent() {
                this.emitter.emit('my-event', {'eventContent': 'String changed'});
            },
            initMap() {
              const apiKey = 'AIzaSyDuJ7HTs7w-V7nTKOQR0-hDylWSyzjI6bw';
              const script = document.createElement('script');
              script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&libraries=places`;
              script.defer = true;

              script.onload = () => {
                this.createMap();
              };

              document.head.appendChild(script);
            },
            createMap() {
              const center = { lat:  this.lat, lng: this.lng };
              console.log(center);
              this.map = new google.maps.Map(document.getElementById('map'), {
                center: center,
                zoom: 12,
              });


              if(this.orderType==1){
                this.marker = new google.maps.Marker({
                  position: center,
                  map: this.map,
                  title: 'Selected Location',
                  draggable: true,
                });

                var circle = new google.maps.Circle({
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#e883839c',
                    fillOpacity: 0.35,
                    map: this.map,
                    center: center,
                    radius: 5000,
                    clickable: false,
                });
                google.maps.event.addListener(this.map, 'idle', function () {
                    //this.updateOverlay(this.map, circle);
                });

                this.marker.addListener('click', () => this.handleMarkerClick());
                this.marker.addListener('dragend', () => this.handleDragEnd());

                this.map.addListener('click', (event) => {
                    if (google.maps.geometry.spherical.computeDistanceBetween(event.latLng, circle.getCenter()) <= circle.getRadius()) {
                        this.moveMarker(event.latLng);
                        this.getAddress(event.latLng);
                    }
                });

              }
              document.getElementById('map').addEventListener('wheel', this.handleMapScroll);

              if(this.orderType==2){
                this.marker = new google.maps.Marker({
                  position: center,
                  map: this.map,
                  title: 'Selected Location',
                  draggable: false,
                });
              }
            },
            updateOverlay(map, circle) {
                var overlay = document.getElementById('overlay');
                var bounds = map.getBounds();
                var circleBounds = circle.getBounds();

                if (bounds.intersects(circleBounds)) {
                    overlay.style.display = 'none';
                } else {
                    overlay.style.display = 'block';
                }
            },
            moveMarker(location) {
                this.marker.setPosition(location);
            },
            handleMarkerClick() {
              // Handle marker click if needed
            },
            handleDragEnd() {
              const latLng = this.marker.getPosition();
              this.getAddress(latLng);
            },
            handleMapScroll(event) {
              // Prevent default behavior
              event.preventDefault();
              let currentZoom = this.map.getZoom();
              let delta = event.deltaY > 0 ? -1 : 1;
              let newZoom = currentZoom + delta;
              newZoom = Math.min(Math.max(newZoom, 0), 21);
              this.map.setZoom(newZoom);
            },
            getAddress(latLng) {
              const geocoder = new google.maps.Geocoder();
              geocoder.geocode({ location: latLng }, (results, status) => {
                if (status === 'OK' && results[0]) {

                  var center = new google.maps.LatLng(this.lat, this.lng);
                  var current = new google.maps.LatLng(latLng.lat(), latLng.lng()); 
                  var distance = google.maps.geometry.spherical.computeDistanceBetween(center,current);
                  console.log("distance = "+distance);
                  this.selectedAddress = results[0].formatted_address;
                  this.deliveryAddressError = "";
                  this.latitude = null;
                  this.longitude = null;
                  if(distance>5000){
                    this.deliveryAddressError = "Sorry, we can't deliver to this address. Please select pick-up or enter a different delivery address.";
                  }else{
                    this.selectedLocation = latLng;
                    this.latitude = latLng.lat();
                    this.longitude = latLng.lng();
                  }
                  
                   if(this.latitude && this.longitude){
                      document.getElementById("cashOnDeliveryBtn").style.backgroundColor = "#ee6e2d";
                      document.getElementById("cashOnDeliveryBtn").style.cursor = 'pointer';
                    }else{
                      document.getElementById("cashOnDeliveryBtn").style.backgroundColor = "#cecac8";
                      document.getElementById("cashOnDeliveryBtn").style.cursor = 'not-allowed';
                    }
                   
                } else {
                  console.error('Geocoder failed due to:', status);
                }
              });
            },
            searchPlaces(){
              var queryTxt = document.getElementById("daliveryAddress").value;
              this.selectedAddress = queryTxt;
              this.deliveryAddressError = '';
              if (!queryTxt) {
                this.suggestions = [];
                return;
              }
              let autocompleteService = new google.maps.places.AutocompleteService();
              autocompleteService.getPlacePredictions({ input: queryTxt }, (predictions, status) => {
                if (status === google.maps.places.PlacesServiceStatus.OK) {
                  this.suggestions = predictions;
                  console.log(predictions);
                } else {
                  this.suggestions = [];
                }
              });
            },
            selectPlace(place) {
              this.suggestions = [];
              let geocoder = new google.maps.Geocoder();
              geocoder.geocode({ 'placeId': place.place_id }, (results, status) => {
                if (status === 'OK') {
                  if (results[0]) {
                    this.selectedAddress = place.description;
                    var lat = results[0].geometry.location.lat();
                    var lng = results[0].geometry.location.lng();
                    const latLng = new google.maps.LatLng(lat, lng);
                    this.marker.setPosition(latLng);
                    this.getAddress(latLng);
                  }
                } else {
                  console.error('Geocode was not successful for the following reason:', status);
                }
              });
            },
            changeDaliveryAddress(){
              var address = document.getElementById('daliveryAddress').value.trim();
              
              if(address == ""){
                  this.selectedLocation = null;
                  this.selectedAddress = '';
                  this.latitude = null;
                  this.longitude = null;
              }
              if(this.latitude && this.longitude){
                document.getElementById("cashOnDeliveryBtn").style.backgroundColor = "#ee6e2d";
                document.getElementById("cashOnDeliveryBtn").style.cursor = 'pointer';
              }else{
                document.getElementById("cashOnDeliveryBtn").style.backgroundColor = "#cecac8";
                document.getElementById("cashOnDeliveryBtn").style.cursor = 'not-allowed';
              }
            },
            async checkout(id){

              if(!this.auth){
                console.log('sdfsddf');
                this.tempName = document.getElementById('temp_name').value.trim();
                this.tempEmail = document.getElementById('temp_email').value.trim();
                this.tempPhone = document.getElementById('temp_phone').value.trim();
                if(this.tempName=="" || this.tempEmail=="" || this.tempPhone==""){
                  return;
                }
                this.startProcessing(id,true);
                await axios.post('/add-guest-info', {
                  name:this.tempName,
                  email:this.tempEmail,
                  phone:this.tempPhone,

                }).then(response => {
                  // this.is_guest_email = response.data;
                  if(response.data.success == true){
                    console.log(response.data);
                    this.verification_code = response.data.message;
                  }else{
                    return;
                  }
                  this.startProcessing(id,false);
                  
                })
                .catch(error => {
                  console.error(error);
                });
              }//return;
              console.log("after");
              

              if(this.orderType==1){
                if(!(this.latitude && this.longitude)){
                    this.showToast('select delivery address',0);
                    return;
                }

                this.entrance = document.getElementById('entrance').value;
                this.doorCode = document.getElementById('door_code').value;
                this.floor = document.getElementById('floor').value;
                this.apartment = document.getElementById('apartment').value;
                this.addressComment = document.getElementById('comment').value;
              }

              var auth = localStorage.getItem('auth');
              this.auth = auth ? JSON.parse(auth) : null;
              const savedCart = localStorage.getItem('cart');
              this.cart = savedCart ? JSON.parse(savedCart) : [];

              this.scheduleSection=false;
              this.orderDetails = true;
              this.mapSection = false;
            },
            initiatePayment() {
              // Make an AJAX request to initiate the payment
              axios.post('/paytrail/create-payment')
                .then(response => {
                  console.log(response.data);
                  // window.location.href = response.data;
                })
                .catch(error => {
                  console.error(error);
                });
            }

        },
    };
</script>

  <style scoped>

  #map-container {
      position: relative;
      z-index: 1; /* Ensure the map is above other elements */
      height: 400px;
      width: 100%;
  }
  #map {
    height: 400px;
  }


  #overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      pointer-events: none;
  }

  schedule-div p {
    margin: 0;
}

.suggestion:hover {
    background-color: #dddcdcd9;
  }

.social-login {
  align-items: center;
  -moz-align-items: center;
  -webkit-align-items: center;
  -o-align-items: center;
  -ms-align-items: center;
  margin-top: 80px;
}
list-type-ulli, .socials {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
.social-login, .socials {
  display: flex;
  display: -webkit-flex;
}

  .toast-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 9999;
  }

  .toast {
    background-color: #407cca;
    color: #000000;
    padding: 10px 20px;
    border-radius: 5px;
  }

 .modal {
  display: none;
  position: fixed;
  z-index: 1000; /* Ensure modal appears on top of overlay */
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #0000009e;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.modal-content {
  position: relative;
}

.close {
  position: absolute;
  top: 0;
  right: 0;
  cursor: pointer;
  padding: 5px;
}

.modal-overlay {
  position: fixed;
  z-index: 999; /* Ensure overlay appears behind modal */
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
}
      .tooltipr {
              position: relative;
              display: inline-block;
              cursor: pointer;
          }

          .tooltipr-text {
              width: 215px;
              /* visibility: hidden; */
              background-color: #000;
              color: #fff !important;
              text-align: center;
              border-radius: 4px;
              padding: 5px;
              margin-top: 7px;
              position: absolute;
              z-index: 9;
              top: 100%;
              left: 0%;
              margin-left: -190px;
              opacity: 0;
              transition: opacity 0.3s;
              font: 500 12px / 13px Dodo, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", !important;
          }

          .tooltipr-text:after {
              content: '';
              position: absolute;
              top: -9px; /* Adjust this value to control the distance between the tooltip and the triggering element */
              left: 90%;
              border-width: 5px;
              border-style: solid;
              border-color: transparent transparent #333 transparent;
          }

          .tooltipr:hover .tooltipr-text {
              visibility: visible;
              opacity: 1;
          }
          .topings:active{
            /* border: 1px solid red; */
            /* border-color: red; */
          }
          @media only screen and (max-width: 768px) { 
          .modal-dialog {
            max-width: 100%!important;
          
          }
          #map[data-v-05123fd1] {
            margin-top: 19px!important;          
        }
         address {
          font-size: 11px;
          }
         .infoTd{
          font-size: 10px;
         } 
          }

   
  </style>