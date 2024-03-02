<template>
    <div
      class="modal fade quick-view-product show"
      id="quick-view-modal"
      tabindex="-1"
      aria-modal="true"
      role="dialog"
      style="padding-right: 17px; display: block"
    >

      <div class="modal-dialog modal-dialog-centered" :style="{ 'max-width': modalWidth + 'px' }">
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
                    <div class="col-4">
                        <h3>New Address</h3>
                          <div v-if="isVisible" class="toast-container">
                            <div class="toast">{{ message }}</div>
                          </div>
                        <form action="javascript:void(0)">
                            <input type="text" class="form-group" style="border:1px solid #000; height: 50px;" :value="selectedAddress">
                            <div class="mt-auto">
                              <button type="button" @click="placeOrder(1)" class="btn" style="background:#ee6e2d; color: #fff; border-radius: 9999px; padding: 5px; font-size: 16px;">Cash On Delivery</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-8">
                        <div id="map"></div>
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
        },
        data() {
            return {
                deliveryPlace: true,
                mapSection: false,
                modalWidth: 400,
                message: '',
                isVisible:false,

                map: null,
                marker: null,
                selectedLocation: null,
                selectedAddress: '',
                latitude:null,
                longitude:null,
            };
        },
        mounted() {},
        methods: {
            handleButtonClick() {
                this.$emit('closeModal');
            },
            showMap() {
                this.deliveryPlace = false;
                this.mapSection = true;
                this.modalWidth = 1000;
                this.initMap();
            },
            placeOrder(type){

              if(type==2 && !(this.latitude && this.longitude)){
                   this.showToast('select delivery asddress',0);
                   return;
              }

                const savedCart = localStorage.getItem('cart');
                
                axios.post('palce-order', {
                  type: type,
                  cart: savedCart,
                  subTotal:this.subTotal,
                  discount:this.discount,
                  grandTotal:this.grandTotal,
                  latitude:this.latitude,
                  longitude:this.longitude,
                  selectedAddress:this.selectedAddress,
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
              // Replace 'YOUR_GOOGLE_MAPS_API_KEY' with your actual API key
              const apiKey = 'AIzaSyDuJ7HTs7w-V7nTKOQR0-hDylWSyzjI6bw';

              // Load the Google Maps JavaScript API
              const script = document.createElement('script');
              script.src = `https://maps.googleapis.com/maps/api/js?key=${apiKey}&libraries=places`;
              script.defer = true;

              script.onload = () => {
                this.createMap();
              };

              document.head.appendChild(script);
            },
            createMap() {
              // Set default center coordinates
              const center = { lat:  65.021545, lng: 25.469885 };

              // Create a new map
              this.map = new google.maps.Map(document.getElementById('map'), {
                center: center,
                zoom: 12,
              });

              // Add a marker at the default center
              this.marker = new google.maps.Marker({
                position: center,
                map: this.map,
                title: 'Selected Location',
                draggable: true,
              });

              // Add event listeners for click and dragend
              this.marker.addListener('click', () => this.handleMarkerClick());
              this.marker.addListener('dragend', () => this.handleDragEnd());

              // Initially, get the address of the default center
              //this.getAddress(center);
            },
            handleMarkerClick() {
              // Handle marker click if needed
            },
            handleDragEnd() {
              const latLng = this.marker.getPosition();
              this.getAddress(latLng);
            },
            getAddress(latLng) {
              // Reverse geocode to get the address
              const geocoder = new google.maps.Geocoder();
              geocoder.geocode({ location: latLng }, (results, status) => {
                if (status === 'OK' && results[0]) {
                  this.selectedAddress = results[0].formatted_address;
                  console.log("latLng");
                  console.log(latLng);
                  this.selectedLocation = latLng;
                  this.latitude = latLng.lat();
                  this.longitude = latLng.lng();
                  console.log(this.latitude);
                  console.log(this.longitude);
                } else {
                  console.error('Geocoder failed due to:', status);
                }
              });
            },
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