<template>
    <div
      class="modal fade quick-view-product show"
      id="quick-view-modal"
      tabindex="-1"
      aria-modal="true"
      role="dialog"
      style="padding-right: 17px; display: block"
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
                <div class="row">
                    <div class="col-12 col-md-4">
                        <h3>New Address</h3>
                          <div v-if="isVisible" class="toast-container">
                            <div class="toast">{{ message }}</div>
                          </div>
                        <form action="javascript:void(0)">
                            <div class="row">
                                <div class="col-12">
                                  <input id="daliveryAddress" @change="changeDaliveryAddress" type="text" class="form-group mb-5" style="border:1px solid #000; height: 50px;" :value="selectedAddress" placeholder="Address">
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
                              <button id="cashOnDeliveryBtn" type="button" @click="checkout()" class="btn" style="background:#cecac8; cursor: not-allowed; color: #fff; border-radius: 9999px; padding: 5px; font-size: 16px;" >Checkout</button>
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
                        <h3>Pic Up/ Dine In</h3>
                          <div v-if="isVisible" class="toast-container">
                            <div class="toast">{{ message }}</div>
                          </div>
                        <form action="javascript:void(0)">
                            <div class="row">
                                <div class="col-12">
                                  <div class="schedule-div p-3 " v-html="shopAddress+shopSchedule" style="border-radius: 15px; border: solid 1px #ffc3c3;  margin-bottom: 10px;text-align:left; line-height:1; padding:3px;">
                                     
                                  </div>
                                </div>
                            </div>
                            <div class="mt-auto">
                              <button type="button" @click="checkout()" class="btn" style="margin-top: 10px;background:#ee6e2d; cursor: pointer; color: #fff; border-radius: 9999px; padding: 5px; font-size: 16px;" >Checkout</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-12 col-md-8">
                        <div id="map" style="height: 600px;"></div>
                        <div id="overlay"></div>
                    </div>
                </div>
            </div>

            <div v-if="orderDetails">                
                <div class="row">
                    <div class="col-12">
                        <h3>Order Details</h3>
                        <div class="page-content">
                          <div class="container-fluid">
          
                            <div class="aiz-main-content">
                                <div class="">
                                <div class="card">
                                  <div class="card-body">         
                                    <div class="row gutters-5">
                                      <div class="col-6">
                                        <strong v-if="orderType==1">Delivery Address Info</strong>
                                        <strong v-if="orderType==2">Customer Info</strong>
                                        <hr>
                                        <address>                                 
                                            <div class="d-flex justify-content-between">
                                              <div>
                                                <strong class="text-main"> Name: {{auth.name}}</strong>
                                              </div>
                                            </div>                
                                          <br> Email: {{auth.email}}<br> 
                                          <template  v-if="orderType==1">
                                            Selected Address: {{selectedAddress}}<br> 
                                            Entrance: {{entrance}}<br> 
                                            Door Code: {{doorCode}}<br> 
                                            Floor: {{floor}}<br> 
                                            Apartment: {{apartment}}<br> 
                                            Comment: {{addressComment}}<br> 
                                          </template>
                                         

                                        </address>
                                      </div>
                                      <div class="col-md-6">
                                        <strong>Order Info</strong>
                                        <hr>
                                        <table>
                                          <tbody>
                                            <tr>
                                              <td class="text-main text-bold">Order Type</td>
                                              <td class="text-main text-bold">
                                                {{ orderType==1 ? 'Delivery' : 'Dine in or Pickup' }}                          
                                              </td>                    
                                            </tr>
                                            
                                            <tr>
                                              <td class="text-main text-bold">Order date </td>
                                              <td class="text-right">March 3, 2024 at 5:32 PM</td>
                                            </tr>
                                            <tr>
                                              <td class="text-main text-bold"> Total amount </td>
                                              <td class="text-right">{{ grandTotal }}{{ baseCurrencySymbol }}</td>
                                            </tr>          
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    <hr class="new-section-sm bord-no">
                                    

                                    <div class="row">
                                      <div class="col-lg-12 table-responsive">
                                        <table class="table-bordered aiz-table invoice-summary table footable footable-1 breakpoint-xl" style="">
                                          <thead>
                                            <tr class="bg-trans-dark footable-header">
                                              <th data-breakpoints="lg" class="min-col footable-first-visible" style="display: table-cell;">#</th>
                                              <th width="10%" style="display: table-cell;">Photo</th>
                                              <th class="text-uppercase" style="display: table-cell;">Name</th>                  
                                              <th data-breakpoints="lg" class="min-col text-uppercase text-center" style="display: table-cell;">Qty</th>
                                              <th data-breakpoints="lg" class="min-col text-uppercase text-center" style="display: table-cell;">Price</th>
                                              <th data-breakpoints="lg" class="min-col text-uppercase text-center footable-last-visible" style="display: table-cell;">Total</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <template v-for="(productSizes, productId) in cart" :key="productId">
                                              <template v-if="cart.hasOwnProperty(productId)">
                                                  <template v-for="(item, sizeId) in productSizes" :key="sizeId">
                                                    <tr>
                                                      <td class="footable-first-visible" style="display: table-cell;">1</td>
                                                      <td style="display: table-cell;">                     
                                                          <img height="50" :src="'/frontend/product_images/' + item.product.image">                     
                                                      </td>
                                                      <td style="display: table-cell;">
                                                        <strong> {{ item.product.name }}</strong>
                                                        <br>
                                                        <small>Size:  {{ item.size.name }} </small>
                                                        <br>
                                                        <small>Toppings: 
                                                          <template  v-for="(toping, topingId) in item.topings" :key="topingId">
                                                            <template v-if="toping">
                                                                {{ toping.name }}({{ toping.price }}),
                                                            </template>
                                                          </template>
                                                        </small>
                                                        <br>                  
                                                      </td>                   
                                                      <td class="text-center" style="display: table-cell;"> {{ item.quantity }} </td>
                                                      <td class="text-center" style="display: table-cell;"> {{ item.size.price }}{{ baseCurrencySymbol }}</td>
                                                      <td class="text-center footable-last-visible" style="display: table-cell;"> {{ item.totalPrice }}{{ baseCurrencySymbol }} </td>
                                                    </tr>    
                                                  </template>
                                                </template>
                                            </template>       
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    <div class="clearfix float-right" style="width: 300px; float:right">
                                      <table class="table">
                                        <tbody>
                                          <tr>
                                            <td>
                                              <strong class="text-muted">Sub Total :</strong>
                                            </td>
                                            <td>{{ subTotal }} {{ baseCurrencySymbol }} </td>
                                          </tr>
                                          <tr v-if="orderType==1">
                                            <td>
                                              <strong class="text-muted">Shipping Charge:</strong>
                                            </td>
                                            <td> {{deliveryCharge}}€ </td>
                                          </tr>
                                          <tr v-if="discount">
                                            <td>
                                              <strong class="text-muted">Coupon :</strong>
                                            </td>
                                            <td>{{discount}} {{baseCurrencySymbol}}</td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <strong class="text-muted">Total :</strong>
                                            </td>
                                            <td class="text-muted h5">{{ grandTotal-deliveryCharge }} {{baseCurrencySymbol}} </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                      <div class="no-print text-right">
                                        <a href="https://demo.activeitzone.com/ecommerce/invoice/79" type="button" class="btn btn-icon btn-light">
                                          <i class="las la-print"></i>
                                        </a>
                                      </div>
                                    </div>
                                    
                                  </div>
                                  <div class="row">
                                        <div class="col-12 col-md-6 mt-5 mb-3">
                                            <div class="input-group" style="cursor:pointer;">
                                                <button @click="placeOrder(orderType)" type="button" class="btn" style=" cursor:pointer !important; background: #ee6e2d; color: white; width: 100%; border-radius: 9999px; padding: 5px; font-size: 16px;">Cash On Delivery</button>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 mt-5 mb-3">
                                            <div class="input-group" style="cursor:pointer;">
                                                <button  type="button" class="btn" style="cursor:pointer !important; background: #f5c6ae; color: white; width: 100%; border-radius: 9999px; padding: 5px; font-size: 16px;">Pay Online</button>
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
            };
        },
        mounted() {
          axios.get('get-location-schedule')
          .then((res)=>{                  
            console.log(res.data);
            this.shopAddress = res.data.address;
            this.shopSchedule = res.data.schedule;
            this.lng = parseInt(res.data.longitude);
            this.lat = parseInt(res.data.latitude) ;
            if(this.orderType==1){this.showMap();}
            if(this.orderType==2){this.showSchedule();}
          })
          .catch((err)=>{
              console.log(err);
          });
        },
        methods: {
            handleButtonClick() {
                this.$emit('closeModal');
            },
            showMap() {
                if(this.grandTotal>=300){
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
                  this.message = 'Minium Order Amount is 300';
                  this.showToast(this.message,0);
                }
            },
            showSchedule(){
                this.deliveryPlace = false;
                this.scheduleSection = true;
                this.modalWidth = 80;
                this.initMap();
            },
            placeOrder(type){
              if(!confirm('Are want to confirm this order?')){
                return;
              }

              if(type==1 && !(this.latitude && this.longitude)){
                   this.showToast('select delivery address',0);
                   return;
              }

                const savedCart = localStorage.getItem('cart');
                var entrance = this.entrance;
                var door_code = this.doorCode;
                var floor = this.floor;
                var apartment = this.apartment;
                var comment = this.addressComment;
                
                axios.post('palce-order', {
                  type: type,
                  cart: savedCart,
                  subTotal:this.subTotal,
                  discount:this.discount,
                  grandTotal:this.grandTotal-this.deliveryCharge,
                  deliveryCharge:this.deliveryCharge,
                  latitude:this.latitude,
                  longitude:this.longitude,
                  selectedAddress:this.selectedAddress,
                  entrance:entrance,
                  door_code:door_code,
                  floor:floor,
                  apartment:apartment,
                  comment:comment,
                })
                .then((res)=>{   
                  console.log(res.data);               
                  if(res.data.success){
                    localStorage.setItem('cart', '');
                    this.handleButtonClick();
                    this.emitMyEvent();
                    this.showToast(res.data.message,1);
                    this.handleCart();
                  }else{
                      this.checkOutError = true;
                      this.checkOutMessage = res.data.message;
                      this.showToast(res.data.message,0);
                  }
                })
                .catch((err)=>{
                    console.log(err);
                })
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
                this.marker.addListener('click', () => this.handleMarkerClick());
                this.marker.addListener('dragend', () => this.handleDragEnd());
                this.map.addListener('click', (event) => {
                    this.moveMarker(event.latLng);
                    this.getAddress(event.latLng);
                });

                var circle = new google.maps.Circle({
                    strokeColor: '#FF0000',
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: '#e883839c',
                    fillOpacity: 0.35,
                    map: this.map,
                    center: center,
                    radius: 10000,
                });
                console.log("HHHHHHHHHHHHHHHHHHHHHHHH");
                console.log(circle);
                google.maps.event.addListener(this.map, 'idle', function () {
                    this.updateOverlay(this.map, circle);
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
                  this.selectedAddress = results[0].formatted_address;
                  //console.log(latLng);
                  this.selectedLocation = latLng;
                  this.latitude = latLng.lat();
                  this.longitude = latLng.lng();
                  if(this.latitude && this.longitude){
                    document.getElementById("cashOnDeliveryBtn").style.backgroundColor = "#ee6e2d";
                    document.getElementById("cashOnDeliveryBtn").style.cursor = 'pointer';
                  }else{
                    document.getElementById("cashOnDeliveryBtn").style.backgroundColor = "#cecac8;";
                    document.getElementById("cashOnDeliveryBtn").style.cursor = 'not-allowed';
                  }
                   
                } else {
                  console.error('Geocoder failed due to:', status);
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
            checkout(){

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
            }
        },
    };
</script>

  <style scoped>

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
    background-color: #000000ab;
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
  </style>