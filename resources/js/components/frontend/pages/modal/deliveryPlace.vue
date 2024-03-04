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
            <div v-if="deliveryPlace">
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
                                  <input id="daliveryAddress" @change="changeDaliveryAddress" type="text" class="form-group m-0" style="border:1px solid #000; height: 50px;" :value="selectedAddress" placeholder="Address">>
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

            <div v-if="orderDetails">                
                <div class="row">
                    <div class="col-12">
                      <h3>Order Details</h3>
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
                deliveryPlace: true,
                mapSection: false,
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
            };
        },
        mounted() {
          if(this.orderType==1){
            this.showMap();
          }
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
                  this.initMap();
                }else{
                  this.isVisible = true;
                  this.message = 'Minium Order Amount is 300';
                  this.showToast(this.message,0);
                }
            },
            placeOrder(type){

              if(type==2 && !(this.latitude && this.longitude)){
                   this.showToast('select delivery address',0);
                   return;
              }

                const savedCart = localStorage.getItem('cart');
                var entrance = document.getElementById('entrance').value;
                var door_code = document.getElementById('door_code').value;
                var floor = document.getElementById('floor').value;
                var apartment = document.getElementById('apartment').value;
                var comment = document.getElementById('comment').value;
                
                axios.post('palce-order', {
                  type: type,
                  cart: savedCart,
                  subTotal:this.subTotal,
                  discount:this.discount,
                  grandTotal:this.grandTotal,
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
              const center = { lat:  65.021545, lng: 25.469885 };
              this.map = new google.maps.Map(document.getElementById('map'), {
                center: center,
                zoom: 12,
              });

              this.marker = new google.maps.Marker({
                position: center,
                map: this.map,
                title: 'Selected Location',
                draggable: true,
              });

              this.marker.addListener('click', () => this.handleMarkerClick());
              this.marker.addListener('dragend', () => this.handleDragEnd());
              // this.map.addListener('wheel', this.handleMapScroll());
              document.getElementById('map').addEventListener('wheel', this.handleMapScroll);
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
              if(!(this.latitude && this.longitude)){
                   this.showToast('select delivery address',0);
                   return;
              }

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