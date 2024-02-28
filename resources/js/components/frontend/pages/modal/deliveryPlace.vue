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
                               
                                <button type="button" class="btn" style="cursor:pointer !important; background: #f5c6ae; color: white; width: 100%; border-radius: 9999px; padding: 5px; font-size: 16px;">Specify The Delivery Address</button>
                        </div>
                    </div>
                </div>
            </div>
             <div v-if="mapSection">
                
                <div class="row">
                    <div class="col-4"></div>
                    <div class="col-8">
                        <h1>kkkknk</h1>
                        <template>
                            <GoogleMap api-key="AIzaSyDuJ7HTs7w-V7nTKOQR0-hDylWSyzjI6bw" style="width: 100%; height: 500px" :center="center" :zoom="5">
                                <Polygon :options="bermudaTriangle" />
                            </GoogleMap>
                        </template>
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
    import { defineComponent } from "vue";
    import { GoogleMap, Polygon } from "vue3-google-map";

    export default {
        name: 'deliveryPlace',
        setup() {
            const center = { lat: 24.886, lng: -70.268 };
            const triangleCoords = [
            { lat: 25.774, lng: -80.19 },
            { lat: 18.466, lng: -66.118 },
            { lat: 32.321, lng: -64.757 },
            { lat: 25.774, lng: -80.19 },
            ];
            const bermudaTriangle = {
                paths: triangleCoords,
                strokeColor: "#FF0000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#FF0000",
                fillOpacity: 0.35,
            };

            return { center, bermudaTriangle };
        },
        props: {},
        data() {
            return {
                deliveryPlace: true,
                mapSection: false,
                modalWidth: 400,
               
            };
        },
        components: { GoogleMap, Polygon },
        mounted() {},
        methods: {
            handleButtonClick() {
                this.$emit('closeModal');
            },
            showMap() {
                this.deliveryPlace = false;
                this.mapSection = true;
                this.modalWidth = 1000;
            },
        },
    };
</script>

  <style scoped>

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
