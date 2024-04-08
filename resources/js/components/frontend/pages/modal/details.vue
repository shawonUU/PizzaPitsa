<template>
  <div
    class="modal fade quick-view-product show"
    id="quick-view-modal"
    tabindex="-1"
    aria-modal="true"
    role="dialog"
    style="display: block"
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
                            <img class="sizeImages"  id="" :src="productData.image ? '/frontend/product_images/' +productData.image : '/frontend/product_images/placeholder.jpg'" alt="Product Images" />
                            <img class="sizeImages d-none"  v-for="(productSize, sizeId) in productSizes" :key="sizeId" :id="'sizeImages'+sizeId"
                              :src="productSize.image ? '/frontend/product_images/' +productSize.image : '/frontend/product_images/placeholder.jpg'"  alt="Product Images"
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
                          <template  v-for="(productSize, sizeId) in productSizes" :key="sizeId" >
                            <p  style="color: #fff !important; margin-bottom: 20px;" :class="['tooltipItem', 'tooltipr-text', sizeId != 0 ? 'd-none' : 'd-none']"  :id="'tooltipItem'+sizeId" v-html="productSize.description" ></p>
                            <p style="color:#fff" :class="['tooltipItem', 'tooltipr-text']"  v-html="productData.description" ></p>
                          </template>
                        </div>
                      </div>
                    </div>
                    <!-- <span class="price-amount d-none ">$155.00 - $255.00</span> -->
                    <span class="sizeWisePrice price-amount">{{ maxMin[0] }}{{ baseCurrencySymbol }} - {{maxMin[1]}}{{baseCurrencySymbol}}</span>
                    <span v-for="(productSize, sizeId) in productSizes" :key="sizeId" :id="'sizeWisePrice'+sizeId" class="sizeWisePrice d-none price-amount">{{productSize.price}}{{ baseCurrencySymbol }}</span>

                    <p v-html="productData.description" class="description m-0 p-0"></p>


                    <div class="product-variations-wrapper">
                      <!-- Start Product Variation  -->

                      <!-- End Product Variation  -->

                      <!-- Start Product Variation  -->

                      <div class="product-variation">
                        <h6 class="title">Size:</h6>
                        <ul class="range-variant">
                          <li  v-for="(productSize, sizeId) in productSizes" :key="sizeId" @click="clickOnSize(sizeId)" class="sizeRadioBtn" :id="'sizeRadioBtn'+productSize.id" style=" padding: 0px 15px; font-size: 14px; min-height: 30px !important; padding: 0 8px; cursor:pointer; margin:0 2px;">
                              <div class="input-group" style="cursor:pointer;">
                                  <input style="" class="sizeRadio" type="radio" :id="'sizeRadio'+productSize.id"  name="sizeRadio" :value="productSize.id">
                                  <label class="sizeRadioLbl" style="display:none !important; cursor:pointer;" :for="'sizeRadio'+productSize.id"></label>
                                  <span style="cursor:pointer;">{{productSize.name}}</span>
                              </div>
                          </li>
                        </ul>
                      </div>
                      <!-- End Product Variation  -->
                    </div>

                    <h6  style="margin-bottom:5px;">Your Favorit Toppings</h6>
                    <div class="row">
                      <div class="col-3 p-2" v-for="(productToping, topingId) in productTopings" :key="topingId">
                          <div :id="'topingDiv'+productToping.id" @click="clickOnTopings(productToping.id)" class="topings text-center shadow-lg  mb-2 bg-white py-3" style="width: 100%; border-radius: 10%; cursor:pointer;">
                              <img class="p-2" :src="'/frontend/toping_images/' + productToping.image" alt="" style="width: 65px; ">
                              <p class="text-center m-0" style="font-size:12px; margin-bottom: 10px !important;">{{productToping.name}}</p>
                              <p class="text-center m-0" style="font-size:12px;"><b>{{productToping.price}}{{ baseCurrencySymbol }}</b></p>
                              <input :id="'topingsItem'+productToping.id" :value="productToping.id" name="topingsItem" class="topingsItem" type="checkbox" style="display:none; width: 20px; height: 20px; border: 2px solid #333; border-radius: 4px; opacity: 7;">
                              
                              <div style="padding: 0 5px; padding-left: 20%;"  onclick="event.stopPropagation();">
                                <div  class="input-group" >
                                  <div  class="input-group-prepend" style="cursor: pointer;" >
                                    <span :id="'toppingQtyMuns'+productToping.id"  class="input-group-text" style="padding: 0.20rem .50rem;" @click="qtyMinus(productToping.id)">
                                      <b >-</b>
                                    </span>
                                  </div>
                                  <input @change="updateToppingQty(productToping.id)"  :id="'toppingQty'+productToping.id" min="1" type="text" value="1" class="" style="margin-left: 0px;text-align: center; font-size: 14px; height: 20px; width: 35% !important; padding: 0px; border: solid 1px #000; font-size: 10px;">
                                  <div  class="input-group-append" style="cursor: pointer;" >
                                    <span :id="'toppingQtyPls'+productToping.id" @click="qtyPlus(productToping.id)" class="input-group-text" style="padding: 0.20rem .50rem;" >
                                      <b >+</b>
                                    </span>
                                  </div>
                                </div>
                              </div>

                          </div>
                      </div>
                    </div>
                    
                    <h6  style="margin-bottom:5px;">All Toppings</h6>
                    <div class="row mb-2">
                          <div>
                            <select style="height:30px; border:1px solid #ee6e2d;">
                              <option value="">--Select--</option>
                              <option v-for="(topping, topingId) in moreTopings" :key="topingId" :value="topping.id" @click="selectExtraTopping(topping)">{{topping.name}}</option>
                            </select>
                          </div>
                    </div>
                    <div class="row mb-5" id="selectdeExtraTopping">
                      
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
                              <a href="javascript:void(0)" class="axil-btn btn" style="background:rgb(238, 110, 45); color:#fff" @click="addTocart">Add to Cart for {{orderPrice ? baseCurrencySymbol : ''}} {{orderPrice}}</a>
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
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import { getBaseCurrencySymbol } from '../../helpers.js';
import $ from 'jquery'; 
import Select2 from 'select2';
import 'select2/dist/css/select2.css';
export default {
    name: 'details',
      props: {
        productData: Object,
        productSizes: Object,
        productTopings: Object,
        allTopings: Object,
        moreTopings: Object,
        maxMin:""
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
            baseCurrencySymbol:'',
           
        }
    },
    components: {
    },
    mounted(){
        console.log("jh");
        console.log(this.allTopings);
        this.loadCartFromLocalStorage();
        this.fetchBaseCurrencySymbol();
        this.selectFirstSizeAsDefault();
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

        var orderPrice = parseFloat(this.productSizes[selectedSize].price) * parseFloat(this.quantity);
        var elements = document.getElementsByClassName('topingsItem');
        for(var i=0; i<elements.length; i++){
          if(elements[i].checked){
            
              var pric = parseFloat(this.allTopings[elements[i].value].price);
              var qty = parseInt(document.getElementById('toppingQty'+elements[i].value).value.trim());
              console.log(qty);
              orderPrice += (pric*qty);
          }
        }
        this.orderPrice = orderPrice.toFixed(2);
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
          var toppingQtys = [];
          for(var i=0; i<elements.length; i++){
            if(elements[i].checked){
                topings[this.productTopings[elements[i].value].id] = this.productTopings[elements[i].value];
                toppingQtys[this.productTopings[elements[i].value].id] = document.getElementById('toppingQty'+elements[i].value).value.trim();
            }
          }

          if(!selectedSize){
            this.showToast('Select Any Size',0);return;
          }

          if(selectedSize && this.orderPrice && this.productData && this.quantity){
                var item = {
                    quantity: this.quantity,
                    product: this.productData,
                    size: this.productSizes[selectedSize],
                    topings: topings,
                    toppingQtys: toppingQtys,
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
                        }else{
                          existingItem.toppingQtys[topings[i].id] += item.toppingQtys[topings[i].id];
                        }
                    }

                    existingItem.totalPrice = parseFloat(existingItem.quantity) * parseFloat(item.size.price);
                     for (const i in bindTopings) {
                        existingItem.totalPrice += parseFloat(bindTopings[i].price) * parseInt(existingItem.toppingQtys[bindTopings[i].id]);
                    }

                    existingItem.topings = bindTopings;

                   this.cart[this.productData.id][this.productSizes[selectedSize].id] = existingItem;
              }

              this.updateLocalStorage();
              this.emitMyEvent(); 
              this.handleButtonClick();
          }
      },
      updateLocalStorage() {
          localStorage.setItem('cart', JSON.stringify(this.cart));
          this.loadCartFromLocalStorage();
      },
      loadCartFromLocalStorage() {
          const savedCart = localStorage.getItem('cart');
          this.cart = savedCart ? JSON.parse(savedCart) : [];
          //console.log(this.cart);
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
    selectFirstSizeAsDefault(){
      const clickEvent = new Event('click', { bubbles: true });
      var eles = document.getElementsByClassName("sizeRadio");
      if(eles[0] != undefined)eles[0].checked = true;
      var eles = document.getElementsByClassName("sizeRadioBtn");
      if(eles[0] != undefined)eles[0].dispatchEvent(clickEvent);
    },
    selectExtraTopping(topping){
        var html = `
          <div class="col-3 p-2">
              <div id="topingDiv${topping.id}" class="topings text-center shadow-lg  mb-2 bg-white py-3" style="width: 100%; border-radius: 10%; cursor:pointer;">
                  <img class="p-2" src="/frontend/toping_images/${topping.image}" alt="" style="width: 65px; ">
                  <p class="text-center m-0" style="font-size:12px; margin-bottom: 10px !important;">${topping.name}</p>
                  <p class="text-center m-0" style="font-size:12px;"><b>${topping.price}${ this.baseCurrencySymbol }</b></p>
                  <input id="topingsItem${topping.id}" value="${topping.id}" name="topingsItem" class="topingsItem" type="checkbox" style="display:none; width: 20px; height: 20px; border: 2px solid #333; border-radius: 4px; opacity: 7;">


                  <div style="padding: 0 5px; padding-left: 20%;"  onclick="event.stopPropagation();">
                    <div  class="input-group" >
                      <div  class="input-group-prepend" style="cursor: pointer;" >
                        <span id="toppingQtyMuns${topping.id}"  class="input-group-text" style="padding: 0.20rem .50rem;">
                          <b >-</b>
                        </span>
                      </div>
                      <input id="toppingQty${topping.id}" min="1" type="text" value="1" class="" style="margin-left: 0px;text-align: center; font-size: 14px; height: 20px; width: 35% !important; padding: 0px; border: solid 1px #000; font-size: 10px;">
                      <div  class="input-group-append" style="cursor: pointer;" >
                        <span id="toppingQtyPls${topping.id}" class="input-group-text" style="padding: 0.20rem .50rem;" >
                          <b >+</b>
                        </span>
                      </div>
                    </div>
                  </div>


              </div>
          </div>
        `;

        document.getElementById('selectdeExtraTopping').insertAdjacentHTML('beforeend', html);
        document.getElementById("topingDiv"+topping.id).addEventListener('click', () => this.clickOnTopings(topping.id));
        document.getElementById("toppingQtyMuns"+topping.id).addEventListener('click', () => this.qtyMinus(topping.id));
        document.getElementById("toppingQty"+topping.id).addEventListener('change', () => this.updateToppingQty(topping.id));
        document.getElementById("toppingQtyPls"+topping.id).addEventListener('click', () => this.qtyPlus(topping.id));
        this.clickOnTopings(topping.id);
    },
    qtyPlus(toppingId){
        var currentQty = document.getElementById('toppingQty'+toppingId).value.trim();
        if(currentQty=="") currentQty = 1;
        currentQty = parseInt(currentQty);
        currentQty++;
        document.getElementById('toppingQty'+toppingId).value = currentQty;
        this.generatePrice();
    },
    qtyMinus(toppingId){
        var currentQty = document.getElementById('toppingQty'+toppingId).value.trim();
        if(currentQty=="") currentQty = 1;
        currentQty = parseInt(currentQty);
        currentQty--;
        if(currentQty<1) currentQty = 1;
        document.getElementById('toppingQty'+toppingId).value = currentQty;
        this.generatePrice();
    },
    updateToppingQty(toppingId){
      var currentQty = document.getElementById('toppingQty'+toppingId).value.trim();
      if(currentQty=="") currentQty = 1;
      currentQty = parseInt(currentQty);
      document.getElementById('toppingQty'+toppingId).value = currentQty;
      this.generatePrice();
    }

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
            visibility: hidden;
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
        .sizeImages{
          width: 300px!important;
        }
}
</style>
