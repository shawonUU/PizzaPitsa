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
          <div class="single-product-thumb">
            <div class="row">
              <div class="col-lg-7">
                <div class="row">
                  <div class="col-lg-10 order-lg-2">
                    <div
                      class="single-product-thumbnail product-large-thumbnail axil-product thumbnail-badge zoom-gallery slick-initialized slick-slider"
                    >
                      <div class="slick-list">
                        <div
                          class="slick-track"
                          style="
                            opacity: 1;
                            width: 1473px;
                            transform: translate3d(0px, 0px, 0px);
                          "
                        >
                          <div
                            class="thumbnail slick-slide slick-current slick-active"
                            data-slick-index="0"
                            aria-hidden="false"
                            tabindex="0"
                            style="width: 491px"
                          >
                            <img class="sizeImages"  id="" :src="'/frontend/product_images/' + productData.image"  alt="Product Images" />
                            <img class="sizeImages d-none" v-for="(productSize, sizeId) in productSizes" :key="sizeId" :id="'sizeImages'+sizeId"
                             :src="'/frontend/product_images/' + productSize.image"  alt="Product Images"
                            />
                            <!-- <div class="label-block label-right">
                              <div class="product-badget">20% OFF</div>
                            </div> -->
                            <div class="product-quick-view position-view">

                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-2 order-lg-1">
                  </div>
                </div>
              </div>
              <div class="col-lg-5 mb--40">
                <div class="single-product-content">
                  <div class="inner">
                    <!-- <div class="product-rating">
                      <div class="star-rating">
                        <img
                          src="assets/images/icons/rate.png"
                          alt="Rate Images"
                        />
                      </div>
                      <div class="review-link">
                        <a href="#">(<span>1</span> customer reviews)</a>
                      </div>
                    </div> -->


                    <div v-if="isVisible" class="toast-container">
                       <div class="toast">{{ message }}</div>
                    </div>

                    <div class="d-flex justify-content-between">

                      <div>
                          <h3 class="product-title m-0 p-0">{{productData.name}}</h3>
                      </div>
                      <div>

                      </div>
                      <div>
                        <div class="tooltipr">
                          <i class="fas fa-info-circle"></i>
                          <!-- <div class="tooltipr-text"  v-html="productData.description"></div> -->
                           <p style="color:#fff" :class="['tooltipItem', 'tooltipr-text']"  v-html="productData.description" ></p>
                          <template  v-for="(productSize, sizeId) in productSizes" :key="sizeId" >
                            <p  style="color: #fff !important; margin-bottom: 20px;" :class="['tooltipItem', 'tooltipr-text', sizeId != 0 ? 'd-none' : 'd-none']"  :id="'tooltipItem'+sizeId" v-html="productSize.description" ></p>
                          </template>
                        </div>
                      </div>
                    </div>
                    <span class="price-amount d-none ">$155.00 - $255.00</span>
                    <!-- <span class="sizeWisePrice price-amount">${{ maxMin[0] }} - ${{maxMin[1]}}</span> -->
                    <span v-for="(productSize, sizeId) in productSizes" :key="sizeId" :id="'sizeWisePrice'+sizeId" class="sizeWisePrice d-none price-amount">{{ baseCurrencySymbol }}{{productSize.price}}</span>

                    <p v-html="productData.description" class="description m-0 p-0"></p>


                    <div class="product-variations-wrapper">
                      <!-- Start Product Variation  -->

                      <!-- End Product Variation  -->

                      <!-- Start Product Variation  -->

                      <div class="product-variation">
                        <h6 class="title">Size:</h6>
                        <ul class="range-variant">
                          <li  v-for="(productSize, sizeId) in productSizes" :key="sizeId" @click="clickOnSize(sizeId)" class="sizeRadioBtn" :id="'sizeRadioBtn'+productSize.id" style="padding: 2px; font-size:14px; height:30px; padding: 0 8px; cursor:pointer; margin:0 2px;">
                              <div class="input-group" style="cursor:pointer;">
                                  <input style="" class="sizeRadio" type="radio" :id="'sizeRadio'+productSize.id"  name="sizeRadio" :value="productSize.id">
                                  <label style="display:none !important; cursor:pointer;" :for="'sizeRadio'+productSize.id"></label>
                                  <span style="cursor:pointer;">{{productSize.name}}</span>
                              </div>
                          </li>
                        </ul>
                      </div>
                      <!-- End Product Variation  -->
                    </div>


                    <div class="row">
                      <div class="col-3 p-2" v-for="(productToping, topingId) in productTopings" :key="topingId">
                          <div :id="'topingDiv'+topingId" @click="clickOnTopings(topingId)" class="topings text-center shadow-lg  mb-2 bg-white py-3" style="width: 100%; border-radius: 10%; cursor:pointer;">
                              <img class="p-2" :src="'/frontend/toping_images/' + productToping.image" alt="" style="width: 65px; ">
                              <p class="text-center m-0" style="font-size:12px; margin-bottom: 10px !important;">{{productToping.name}}</p>
                              <p class="text-center m-0" style="font-size:12px;"><b>{{ baseCurrencySymbol }}{{productToping.price}}</b></p>
                              <input :id="'topingsItem'+topingId" :value="productToping.id" name="topingsItem" class="topingsItem" type="checkbox" style="display:none; width: 20px; height: 20px; border: 2px solid #333; border-radius: 4px; opacity: 7;">
                          </div>
                      </div>
                    </div>

                    <!-- Start Product Action Wrapper  -->
                    <div class="product-action-wrapper d-flex-center">
                          <!-- Start Quentity Action  -->
                        <div class="pro-qty">
                            <span class="dec qtybtn" @click="decrementQuantity">-</span
                            ><input type="number" :value="quantity" /><span class="inc qtybtn" @click="incrementQuantity">+</span>
                          </div>
                          <!-- End Quentity Action  -->

                          <!-- Start Product Action  -->
                          <br>
                          <ul class="product-action d-flex-center mb--0">
                            <li class="add-to-cart">
                              <a href="javascript:void(0)" class="axil-btn btn-bg-primary" @click="addTocart">Add to Cart for {{orderPrice ? baseCurrencySymbol : ''}} {{orderPrice}}</a>                              
                            </li>
                          </ul>
                    </div>
                    <!-- End Product Action Wrapper  -->
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
import { getBaseCurrencySymbol } from '../../helpers.js';
export default {
    name: 'details',
      props: {
        productData: Object,
        productSizes: Object,
        productTopings: Object,
        // maxMin: object,
      },
    data(){
        return{
            catgories:{},
            tooltipVisible: false,
            quantity: 1,
            orderPrice: null,
            isVisible:false,
            message:'',
            cart: [],
            baseCurrencySymbol: '',
        }
    },
    components: {
        maxPrice() {
          return Math.max(...this.productSizes.map(productSize => productSize.price));
        },
        minPrice() {
          return Math.min(...this.productSizes.map(productSize => productSize.price));
        },
    },
    mounted(){
        // console.log(this.productSize);
        this.loadCartFromLocalStorage();
        this.fetchBaseCurrencySymbol();
    },
    methods: {
       handleButtonClick() {
        this.$emit('closeModal');
      },
      clickOnSize(sizeid){
          var elements = document.getElementsByClassName('sizeImages');
          for(var i=0; i<elements.length; i++){
            elements[i].classList.add('d-none');
          }
          var elements = document.getElementsByClassName('tooltipItem');
          for(var i=0; i<elements.length; i++){
            elements[i].classList.add('d-none');
          }
          var elements = document.getElementsByClassName('sizeWisePrice');
          for(var i=0; i<elements.length; i++){
            elements[i].classList.add('d-none');
          }

          var elements = document.getElementsByClassName('sizeRadioBtn');
          for(var i=0; i<elements.length; i++){
            elements[i].style.border = '2px solid #f6f7fb';
          }



          document.getElementById('tooltipItem'+sizeid).classList.remove('d-none');
          document.getElementById('sizeImages'+sizeid).classList.remove('d-none');
          document.getElementById('sizeWisePrice'+sizeid).classList.remove('d-none');
          document.getElementById('sizeRadioBtn'+sizeid).style.border = '1px solid red';
          this.generatePrice();
      },
      decrementQuantity() {
        if (this.quantity > 1) {
          this.quantity--;
        }
        this.generatePrice();
      },
      incrementQuantity() {
        // You can add any validation or constraints here
        this.quantity++;
        this.generatePrice();
      },
      clickOnTopings(id){
        // alert('');
        if(document.getElementById('topingsItem'+id).checked){
            document.getElementById('topingDiv'+id).style.border="none";
            document.getElementById('topingsItem'+id).checked = false;
            // console.log(document.getElementById('topingDiv'+id));
        }else{
            document.getElementById('topingDiv'+id).style.border="1px solid red";
            document.getElementById('topingsItem'+id).checked = true;
        }
        this.generatePrice();
      },
      generatePrice(){
        var elements = document.getElementsByClassName('sizeRadio');
        var selectedSize = null;
        for(var i=0; i<elements.length; i++){
          if(elements[i].checked){
              selectedSize = elements[i].value;
          }
        }
        if(!selectedSize) return;

        var orderPrice = this.productSizes[selectedSize].price * this.quantity;
        var elements = document.getElementsByClassName('topingsItem');
        for(var i=0; i<elements.length; i++){
          if(elements[i].checked){
              orderPrice += this.productTopings[elements[i].value].price;
          }
        }

        this.orderPrice = orderPrice;

      },
      addTocart(){
          var elements = document.getElementsByClassName('sizeRadio');
          var selectedSize = null;
          for(var i=0; i<elements.length; i++){
            if(elements[i].checked){
                selectedSize = elements[i].value;
            }
          }

          var elements = document.getElementsByClassName('topingsItem');
          var topings = [];
          for(var i=0; i<elements.length; i++){
            if(elements[i].checked){
                topings.push(this.productTopings[elements[i].value]);
            }
          }

          if(!selectedSize){
            this.showToast('Select Any Size');
          }

          if(selectedSize && this.orderPrice && this.productData && this.quantity){
                var item = {
                    quantity: this.quantity,
                    product: this.productData,
                    size: this.productSizes[selectedSize],
                    topings: topings,
                    totalPrice: this.orderPrice
                };

                if (!this.cart[this.productData.id]) {
                    this.cart[this.productData.id] = {};
                }
                if (!this.cart[this.productData.id][this.productSizes[selectedSize].id]) {
                    this.cart[this.productData.id][this.productSizes[selectedSize].id] = item;
                } else {
                    var existingItem = this.cart[this.productData.id][this.productSizes[selectedSize].id];
                    existingItem.quantity = parseInt(existingItem.quantity);
                    existingItem.quantity += parseInt(item.quantity);

                    var bindTopings = [];
                    var exTopings =  existingItem.topings;
                    for (const i in exTopings) {
                        if(exTopings[i])bindTopings[exTopings[i].id] = exTopings[i];
                    }

                    for (const i in topings){
                        if ( typeof bindTopings[topings[i].id] === 'undefined'){
                            if(topings[i])bindTopings[topings[i].id] = topings[i];
                        }
                    }

                    existingItem.totalPrice = existingItem.quantity * item.size.price;
                     for (const i in bindTopings) {
                        existingItem.totalPrice += bindTopings[i].price;
                    }

                    existingItem.topings = bindTopings;

                   this.cart[this.productData.id][this.productSizes[selectedSize].id] = existingItem;
                   this.showToast('Added to cart.');
                   this.handleButtonClick();
                   this.emitMyEvent();

              }
              this.updateLocalStorage();

          }
      },
      updateLocalStorage() {
          localStorage.setItem('cart', JSON.stringify(this.cart));
          this.loadCartFromLocalStorage();
      },
      loadCartFromLocalStorage() {
          const savedCart = localStorage.getItem('cart');
          this.cart = savedCart ? JSON.parse(savedCart) : [];
          console.log(this.cart);
      },
     showToast(message) {
        alert(message);
        this.message = message;
        this.isVisible = true;

       setTimeout(() => {
         this.isVisible = false;
       }, 3000);
    },
    emitMyEvent() {

          this.emitter.emit('my-event', {'eventContent': 'String changed'})

      },
    async fetchBaseCurrencySymbol() {
        try {
            this.baseCurrencySymbol = await getBaseCurrencySymbol();
        } catch (error) {
            // Handle error (e.g., show an error message)
            console.error('Error fetching base currency symbol in component:', error);
        }
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
