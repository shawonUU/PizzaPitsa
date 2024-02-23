<template>
    <div
      class="modal fade quick-view-product show"
      id="quick-view-modal"
      tabindex="-1"
      aria-modal="true"
      role="dialog"
      style="padding-right: 17px; display: block"
    >
  
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-body" style="padding-top: 0px; padding-right: 13px;">
            <div class="d-flex justify-content-end pt-3">
                <button type="button" class="btn-close" style="height:5px; width:5px; margin-bottom: 15px;" data-bs-dismiss="modal" aria-label="Close" @click="handleButtonClick">
                  <!-- <i class="far fa-times" style="height:10px; width:10px;"></i> -->
              </button>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  export default {
      name: 'signup',
        props: {
        
        },
      data(){
          return{
            
          }
      },
      components: {
         
      },
      mounted(){
        
      },
      methods: {
        handleButtonClick() {
            this.$emit('closeModal');
        },
      }
  }
  </script>
  
  <style scoped>
  
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
  