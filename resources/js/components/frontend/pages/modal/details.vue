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
                          <div class="thumbnail slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="0" style="width: 491px; display:flex; justify-content:center">

                            <img class="sizeImages"  id="" :src="productData.image ? '/frontend/product_images/' +productData.image : '/frontend/product_images/placeholder.jpg'" alt="Product Images" />
                            <img class="sizeImages d-none"  v-for="(productSize, sizeId) in productSizes" :key="sizeId" :id="'sizeImages'+sizeId"
                              :src="productSize.image ? '/frontend/product_images/' +productSize.image : '/frontend/product_images/placeholder.jpg'"  alt="Product Images"
                            />
                            <!-- <div class="label-block label-right">
                              <div class="product-badget">20% OFF</div>
                            </div> -->
                            <!-- <div class="product-quick-view position-view">

                            </div> -->
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
                    <span v-for="(productSize, sizeId) in productSizes" :key="sizeId" :id="'sizeWisePrice'+sizeId" class="sizeWisePrice d-none price-amount"><del style="font-size: 16px;" v-if="productSize.main_price">{{ productSize.main_price }}{{ baseCurrencySymbol }}</del>  {{productSize.price}}{{ baseCurrencySymbol }}</span>

                    <p v-html="productData.description" class="description m-0 p-0"></p>

                    <div class="sc-1subij5-0 cXTjGP">
                        <template v-for="(tag, tagkey) in productTages" :key="tagkey"> 
                            <template v-if="tag.is_removeable==1">
                                <a :id="'protag'+tag.id" @click="clickOnTag(tag.id)" role="button" :data-tagid="tag.id" data-removed="false" class=" sc-1subij5-1 fqOpCo protag">
                                  {{tag.tag_name}}
                                  <i class="sc-1xbmuk-0 cjWXAF svg-icon" :id="'tagicon'+tag.id">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                      <circle cx="7" cy="7" r="6.6" stroke="#737272" stroke-width="0.8"></circle>
                                      <path d="M5 5L9 9" stroke="#737272" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                      <path d="M9 5L5 9" stroke="#737272" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                  </i>
                                </a>,
                            </template>
                            <template v-else>
                                {{tag.tag_name}},
                            </template>
                        </template>
                    </div>


                    <div class="product-variations-wrapper">
                      <!-- Start Product Variation  -->

                      <!-- End Product Variation  -->

                      <!-- Start Product Variation  -->

                      <div class="product-variation">
                        <h6 class="title">Size:</h6>
                        <ul class="range-variant" id="size_list">
                          <li  v-for="(productSize, sizeId) in productSizes" :key="sizeId" @click="clickOnSize(productSize.id, productSize.size_id, productSize.name)" :data-sizename="productSize.name" class="sizeRadioBtn" :id="'sizeRadioBtn'+productSize.id" style=" padding: 0px 15px; font-size: 14px; min-height: 30px !important; padding: 0 8px; cursor:pointer; margin:0 2px;">
                              <div class="input-group" style="cursor:pointer;">
                                  <input style="" class="sizeRadio" :data-sizename="productSize.name" type="radio" :id="'sizeRadio'+productSize.id" :data-libsizeid="productSize.size_id"  name="sizeRadio" :value="productSize.id">
                                  <label class="sizeRadioLbl" style="display:none !important; cursor:pointer;" :for="'sizeRadio'+productSize.id"></label>
                                  <span style="cursor:pointer;">{{productSize.name}}</span>
                              </div>
                          </li>
                        </ul>
                      </div>
                      <!-- End Product Variation  -->
                    </div>

                    <template v-for="(productOption, optionKey) in productOptions" :key="optionKey">
                        <h6  style="margin-bottom:5px;">{{productOption.details.title}} <span v-if="(productOption.details.freeQty*1)>0" style="font-size: 12px;">(Free QTY {{ productOption.details.freeQty }})</span> <span style="font-size: 12px;" v-else>(No free QTY)</span></h6>

                        <div class="row">
                          <div class="col-6 col-md-3 p-2" v-for="(productToping, topingId) in productOption.options" :key="topingId">
                              <div :id="'optionDiv'+allTopings[productToping.topping_id].id" @click="clickOnOptions(allTopings[productToping.topping_id].id)" class="topings text-center shadow-lg  mb-2 bg-white py-3" style="width: 100%; border:1px solid white; border-radius: 10%; cursor:pointer;">
                                  <img class="p-2" :src="'/frontend/toping_images/' + allTopings[productToping.topping_id].image" alt="" style="width: 65px; ">
                                  <p class="text-center m-0" style="font-size:12px; margin-bottom: 10px !important;">{{allTopings[productToping.topping_id].name}}</p>
                                  <p class="text-center m-0" style="font-size:12px;"><b class="showToppingPrice" :data-toppingId="allTopings[productToping.topping_id].id" :id="'showOptionPrice'+allTopings[productToping.topping_id].id">{{allTopings[productToping.topping_id].price}}</b><b>{{ baseCurrencySymbol }}</b></p>
                                  <input :name="'productoption'+productToping.product_option_id" :data-toppingid="allTopings[productToping.topping_id].id" data-checked="false" :id="'optionsItem'+allTopings[productToping.topping_id].id" :value="allTopings[productToping.topping_id].id" name="optionsItem" class="optionsItem" :type="productToping.type" style="display:none; width: 20px; height: 20px; border: 2px solid #333; border-radius: 4px; opacity: 7;">
                                  <div style="padding: 0 5px; padding-left: 20%;"  onclick="event.stopPropagation();">
                                    <div  class="input-group" >
                                      <div  class="input-group-prepend" style="cursor: pointer;" >
                                        <span :id="'optionQtyMuns'+allTopings[productToping.topping_id].id"  class="input-group-text" style="padding: 0.20rem .50rem;" @click="qtyMinus(allTopings[productToping.topping_id].id, 'optionQty')">
                                          <b >-</b>
                                        </span>
                                      </div>
                                      <input @change="updateQty(allTopings[productToping.topping_id].id,'optionQty')"  :id="'optionQty'+allTopings[productToping.topping_id].id" min="1" type="text" value="1" class="" style="margin-left: 0px;text-align: center; font-size: 14px; height: 20px; width: 35% !important; padding: 0px; border: solid 1px #000; font-size: 10px;">
                                      <input style="display: none;" :id="'optionFreeQty'+allTopings[productToping.topping_id].id" type="number" :value="productOption.details.freeQty">
                                      <div  class="input-group-append" style="cursor: pointer;" >
                                        <span :id="'optionQtyPls'+allTopings[productToping.topping_id].id" @click="qtyPlus(allTopings[productToping.topping_id].id,'optionQty')" class="input-group-text" style="padding: 0.20rem .50rem;" >
                                          <b >+</b>
                                        </span>
                                      </div>
                                    </div>
                                  </div>

                              </div>
                          </div>
                        </div>
                    </template>


                    <h6 v-if="productTopings.length > 0"  style="margin-bottom:5px;">Your Favorit Toppings</h6>
                    <div class="row">
                      <div class="col-6 col-md-3 p-2" v-for="(productToping, topingId) in productTopings" :key="topingId">
                          <div :id="'topingDiv'+productToping.id" @click="clickOnTopings(productToping.id)" class="topings text-center shadow-lg  mb-2 bg-white py-3" style="width: 100%; border:1px solid white; border-radius: 10%; cursor:pointer;">
                              <img class="p-2" :src="'/frontend/toping_images/' + productToping.image" alt="" style="width: 65px; ">
                              <p class="text-center m-0" style="font-size:12px; margin-bottom: 10px !important;">{{productToping.name}}</p>
                              <p class="text-center m-0" style="font-size:12px;"><b class="showToppingPrice" :data-toppingId="productToping.id" :id="'showToppingPrice'+productToping.id">{{productToping.price}}</b><b>{{ baseCurrencySymbol }}</b></p>
                              <input :id="'topingsItem'+productToping.id" :value="productToping.id" name="topingsItem" class="topingsItem" type="checkbox" style="display:none; width: 20px; height: 20px; border: 2px solid #333; border-radius: 4px; opacity: 7;">
                              
                              <div style="padding: 0 5px; padding-left: 20%;"  onclick="event.stopPropagation();">
                                <div  class="input-group" >
                                  <div  class="input-group-prepend" style="cursor: pointer;" >
                                    <span :id="'toppingQtyMuns'+productToping.id"  class="input-group-text" style="padding: 0.20rem .50rem;" @click="qtyMinus(productToping.id,'toppingQty')">
                                      <b >-</b>
                                    </span>
                                  </div>
                                  <input @change="updateQty(productToping.id,'toppingQty')"  :id="'toppingQty'+productToping.id" min="1" type="text" value="1" class="" style="margin-left: 0px;text-align: center; font-size: 14px; height: 20px; width: 35% !important; padding: 0px; border: solid 1px #000; font-size: 10px;">
                                  <div  class="input-group-append" style="cursor: pointer;" >
                                    <span :id="'toppingQtyPls'+productToping.id" @click="qtyPlus(productToping.id,'toppingQty')" class="input-group-text" style="padding: 0.20rem .50rem;" >
                                      <b >+</b>
                                    </span>
                                  </div>
                                </div>
                              </div>

                          </div>
                      </div>
                    </div>
                    
                    <h6  style="margin-bottom:5px;">More Toppings</h6>
                    
                    <templat>
                        <div class="multi-select2">
                            <multiselect
                            v-model="selectedOptions"
                            :options="options"
                            :change="selectExtraTopping()"
                            multiple
                            track-by="id"
                            label="text"
                            ></multiselect>
                        </div>
                    </templat>
                         
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
                              <a href="javascript:void(0)" class="axil-btn btn" style="background:rgb(238, 110, 45); color:#fff" @click="addTocart">Add to Cart for {{orderPrice}}{{orderPrice ? baseCurrencySymbol : ''}} </a>
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
import Multiselect from 'vue-multiselect';
export default {
    name: 'details',
      props: {
        productData: Object,
        productSizes: Object,
        productTopings: Object,
        allTopings: Object,
        moreTopings: Object,
        sizeVsTopings: Object,
        productTages:Object,
        productOptions:Object,
        maxMin:""
        // maxMin: object,
      },
    data(){
        return{
            freeOption:1,
            catgories:{},
            tooltipVisible: false,
            quantity: 1,
            orderPrice: null,
            totalTopingPrice:0,
            totalOptionPrice:0,
            isVisible:false,
            message:'',
            cart: [],
            relatedProduct:[],
            baseCurrencySymbol:'',
            selectedOptions: [],
            options: [],
           
        }
    },
    components: {
      Multiselect
    },
    mounted(){
        var sizes =  Array.from(document.getElementById("size_list").children);
        for(var i=0; i<sizes.length; i++){
          var sizeName = sizes[i].dataset.sizename.trim().toLowerCase();
          var dx = i;
          if(sizeName=="small") dx = 0;
          if(sizeName=="medium") dx = 1;
          if(sizeName=="large") dx = 2;
          var temp = sizes[i];
          sizes[i] = sizes[dx];
          sizes[dx] = temp;
        }
        const fragment = document.createDocumentFragment();
        sizes.forEach(item => {
          fragment.appendChild(item);
        });
        document.getElementById("size_list").innerHTML = '';
        document.getElementById("size_list").appendChild(fragment);

        this.loadCartFromLocalStorage();
        this.fetchBaseCurrencySymbol();
        this.selectFirstSizeAsDefault();
        this.setOptionToMultiSelect();
    },
    methods: {
      setOptionToMultiSelect(){
          for(const i in this.moreTopings){
            if(this.moreTopings[i]){
              var option = {id:this.moreTopings[i].id, text:this.moreTopings[i].name};
            }
            this.options.push(option);
          }
      },
      handleButtonClick() {
        this.$emit('closeModal');
      },
      clickOnSize(sizeid, lib_size, size_name){
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

          size_name = size_name.trim().toLowerCase();
          var imagesize = "100%";
          if(size_name == "small") imagesize = "80%";
          if(size_name == "medium") imagesize = "90%";
          if(size_name == "large") imagesize = "100%";

          document.getElementById('tooltipItem'+sizeid).classList.remove('d-none');
          document.getElementById('sizeImages'+sizeid).classList.remove('d-none');
          document.getElementById('sizeImages'+sizeid).style.width = imagesize;
          document.getElementById('sizeWisePrice'+sizeid).classList.remove('d-none');
          document.getElementById('sizeRadioBtn'+sizeid).style.border = '1px solid red';
       
          var eles = document.getElementsByClassName("showToppingPrice");
          for(var i=0; i<eles.length; i++){
            var topingId = eles[i].dataset.toppingid;
            if (this.sizeVsTopings[topingId] && this.sizeVsTopings[topingId][lib_size]) {
              eles[i].innerHTML = this.sizeVsTopings[topingId][lib_size];
            } else {
              eles[i].innerHTML = this.allTopings[topingId].price;
            }
          }

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
      clickOnTopings(id, flg=false){
        if(document.getElementById('topingsItem'+id).checked && flg==false){
            document.getElementById('topingDiv'+id).style.border="1px solid white";
            document.getElementById('topingsItem'+id).checked = false;
            // console.log(document.getElementById('topingDiv'+id));
        }else{
            document.getElementById('topingDiv'+id).style.border="1px solid red";
            document.getElementById('topingsItem'+id).checked = true;
        }

        /*var item = document.getElementById('topingsItem'+id);
        if(item.type=="radio"){
          var name = item.name;
          var els = document.getElementsByName(name);
          for(var i=0; i<els.length; i++){
              var tid = els[i].dataset.toppingid;
              if(tid==id){
                els[i].checked = true;
                document.getElementById('topingDiv'+tid).style.border = "1px solid red";
              }else{
                els[i].checked = false;
                document.getElementById('topingDiv'+tid).style.border = "1px solid white";
              }
          }
        }*/

        this.generatePrice();
      },
      clickOnOptions(id, flg=false){

        if(document.getElementById('optionsItem'+id).checked && flg==false){
            document.getElementById('optionDiv'+id).style.border="1px solid white";
            document.getElementById('optionsItem'+id).checked = false;
        }else{
            document.getElementById('optionDiv'+id).style.border="1px solid red";
            document.getElementById('optionsItem'+id).checked = true;
        }

        var item = document.getElementById('optionsItem'+id);
        if(item.type=="radio"){
          var name = item.name;
          var els = document.getElementsByName(name);
          for(var i=0; i<els.length; i++){
              var tid = els[i].dataset.toppingid;
              if(tid==id){
                if(els[i].dataset.checked == "true" && flg==false){
                  els[i].checked = false;
                  els[i].dataset.checked = "false";
                  document.getElementById('optionDiv'+tid).style.border = "1px solid white";
                }else{
                  els[i].checked = true;
                  els[i].dataset.checked = "true";
                  document.getElementById('optionDiv'+tid).style.border = "1px solid red";
                }
              }else{
                els[i].checked = false;
                els[i].dataset.checked = "false";
                document.getElementById('optionDiv'+tid).style.border = "1px solid white";
              }
          }
        }
        this.generatePrice();
      },
      generatePrice(){
        var elements = document.getElementsByClassName('sizeRadio');
        var selectedSize = null;
        var lib_size = null;
        for(var i=0; i<elements.length; i++){
          if(elements[i].checked){
              selectedSize = elements[i].value;
              lib_size = elements[i].dataset.libsizeid;
          }
        }
        if(!selectedSize) return;

        var orderPrice = parseFloat(this.productSizes[selectedSize].price) * parseFloat(this.quantity);

        var elements = document.getElementsByClassName('topingsItem');
        var totalTopingPrice = 0;
        for(var i=0; i<elements.length; i++){
          if(elements[i].checked){
            var topingId = elements[i].value;
            var pric = 0;
            if (this.sizeVsTopings[topingId] && this.sizeVsTopings[topingId][lib_size]) {
              pric = this.sizeVsTopings[topingId][lib_size];
            } else {
              pric = this.allTopings[topingId].price;
            }
            pric = parseFloat(pric);
            var qty = parseInt(document.getElementById('toppingQty'+elements[i].value).value.trim());
            orderPrice += (pric*qty);
            totalTopingPrice += (pric*qty);
          }
        }

        var elements = document.getElementsByClassName('optionsItem');
        var totalOptionPrice = 0;
        for(var i=0; i<elements.length; i++){
          if(elements[i].checked){
            var topingId = elements[i].value;
            var pric = 0;
            if (this.sizeVsTopings[topingId] && this.sizeVsTopings[topingId][lib_size]) {
              pric = this.sizeVsTopings[topingId][lib_size];
            } else {
              pric = this.allTopings[topingId].price;
            }
            pric = parseFloat(pric);
            var qty = parseInt(document.getElementById('optionQty'+elements[i].value).value.trim());
            var freeQty = parseInt(document.getElementById('optionFreeQty'+elements[i].value).value.trim());
            qty -= freeQty;
            if(qty<0) qty = 0;
            orderPrice += (pric*qty);
            totalOptionPrice += (pric*qty);
          }
        }

        this.orderPrice = orderPrice.toFixed(2);
        this.totalTopingPrice = totalTopingPrice;
        this.totalOptionPrice = totalOptionPrice;
      },
      addTocart(){
          var elements = document.getElementsByClassName('sizeRadio');
          var selectedSize = null;
          var lib_size = null;
          for(var i=0; i<elements.length; i++){
            if(elements[i].checked){
                selectedSize = elements[i].value;
                lib_size = elements[i].dataset.libsizeid;
            }
          }

          var elements = document.getElementsByClassName('topingsItem');
          var topings = [];
          var toppingQtys = [];
          var toppingPrices = [];
          for(var i=0; i<elements.length; i++){
            if(elements[i].checked){
                var topingId = elements[i].value;
                var pric = 0;
                if (this.sizeVsTopings[topingId] && this.sizeVsTopings[topingId][lib_size]) {
                  pric = this.sizeVsTopings[topingId][lib_size];
                } else {
                  pric = this.allTopings[topingId].price;
                }

                topings[topingId] = this.allTopings[topingId];
                toppingQtys[topingId] = document.getElementById('toppingQty'+topingId).value.trim();
                toppingPrices[topingId] = pric;
            }
          }


          var elements = document.getElementsByClassName('optionsItem');
          var options = [];
          var optionQtys = [];
          var optionFreeQtys = [];
          var optionPrices = [];
          for(var i=0; i<elements.length; i++){
            if(elements[i].checked){
                var topingId = elements[i].value;
                var pric = 0;
                if (this.sizeVsTopings[topingId] && this.sizeVsTopings[topingId][lib_size]) {
                  pric = this.sizeVsTopings[topingId][lib_size];
                } else {
                  pric = this.allTopings[topingId].price;
                }
                options[topingId] = this.allTopings[topingId];
                optionQtys[topingId] = document.getElementById('optionQty'+topingId).value.trim();
                optionFreeQtys[topingId] = document.getElementById('optionFreeQty'+topingId).value.trim();
                optionPrices[topingId] = pric;
            }
          }


          var elements = document.getElementsByClassName('protag');
          var removedTags = [];
          for(var i=0; i<elements.length; i++){
              if(elements[i].dataset.removed=='true'){
                removedTags.push(elements[i].dataset.tagid);
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
                    toppingPrices: toppingPrices,
                    totalTopingPrice: this.totalTopingPrice,

                    options: options,
                    optionQtys: optionQtys,
                    optionFreeQtys: optionFreeQtys,
                    optionPrices: optionPrices,
                    totalOptionPrice: this.totalOptionPrice,

                    totalPrice: this.orderPrice,
                    removedTags: removedTags,
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
                    var bindQtys = [];
                    var bindPrices = [];
                    var exTopings =  existingItem.topings;
                    var exQtys =  existingItem.toppingQtys;
                    var exPrices =  existingItem.toppingPrices;
                    for (const i in exTopings) {
                        if(exTopings[i]){
                            bindTopings[exTopings[i].id] = exTopings[i];
                            bindQtys[exTopings[i].id] = exQtys[exTopings[i].id];
                            bindPrices[exTopings[i].id] = exPrices[exTopings[i].id];
                        }
                    }

                    for (const i in topings){
                      if(topings[i]){
                        topings[i].id = parseInt(topings[i].id);
                        if ( typeof bindTopings[topings[i].id] === 'undefined'){
                              bindTopings[topings[i].id] = topings[i];
                              bindQtys[topings[i].id] = toppingQtys[topings[i].id];
                              bindPrices[topings[i].id] = toppingPrices[topings[i].id];
                        }else{
                          bindQtys[topings[i].id] = parseFloat(bindQtys[topings[i].id]);
                          bindQtys[topings[i].id] += parseFloat(toppingQtys[topings[i].id]);
                        }
                      }
                    }

                    var totalTopingPrice = 0;
                    existingItem.totalPrice = parseFloat(existingItem.quantity) * parseFloat(item.size.price);
                     for (const i in bindTopings) {
                        existingItem.totalPrice += parseFloat(bindPrices[bindTopings[i].id]) * parseInt(bindQtys[bindTopings[i].id]);
                        totalTopingPrice += parseFloat(bindPrices[bindTopings[i].id]) * parseInt(bindQtys[bindTopings[i].id]);
                    }
                    existingItem.totalPrice =  parseFloat(existingItem.totalPrice).toFixed(2);

                    var bindOptions = [];
                    var bindOptionQtys = [];
                    var bindOptionFreeQtys = [];
                    var bindOptionPrices = [];
                    var exOptions =  existingItem.options;
                    var exOptionQtys =  existingItem.optionQtys;
                    var exOptionFreeQtys =  existingItem.optionFreeQtys;
                    var exOptionPrices =  existingItem.optionPrices;
                    for (const i in exOptions) {
                        if(exOptions[i]){
                            bindOptions[exOptions[i].id] = exOptions[i];
                            bindOptionQtys[exOptions[i].id] = exOptionQtys[exOptions[i].id];
                            bindOptionFreeQtys[exOptions[i].id] = exOptionFreeQtys[exOptions[i].id];
                            bindOptionPrices[exOptions[i].id] = exOptionPrices[exOptions[i].id];
                        }
                    }

                    console.log('okkkk');
                    

                    for (const i in options){
                      if(options[i]){
                        options[i].id = parseInt(options[i].id);
                        if ( typeof bindOptions[options[i].id] === 'undefined'){
                              bindOptions[options[i].id] = options[i];
                              bindOptionQtys[options[i].id] = optionQtys[options[i].id];
                              bindOptionFreeQtys[options[i].id] = optionFreeQtys[options[i].id];
                              bindOptionPrices[options[i].id] = optionPrices[options[i].id];
                        }else{
                          bindOptionQtys[options[i].id] = parseFloat(bindOptionQtys[options[i].id]);
                          bindOptionQtys[options[i].id] += parseFloat(optionQtys[options[i].id]);
                        }
                      }
                    }

                    var totalOptionPrice = 0;
                    //existingItem.totalPrice = parseFloat(existingItem.quantity) * parseFloat(item.size.price);
                     for (const i in bindOptions) {
                        var paidQty = parseInt(bindOptionQtys[bindOptions[i].id])-parseInt(bindOptionFreeQtys[bindOptions[i].id]);
                        if(paidQty<0)paidQty=0;
                        existingItem.totalPrice += parseFloat(bindOptionPrices[bindOptions[i].id]) * paidQty;
                        totalOptionPrice += parseFloat(bindOptionPrices[bindOptions[i].id]) * paidQty;
                    }

                    existingItem.totalPrice = parseFloat(existingItem.totalPrice).toFixed(2);

                    var merged = [...new Set([...existingItem.removedTags, ...item.removedTags])];

                    existingItem.removedTags = merged;
                    existingItem.topings = bindTopings;
                    existingItem.toppingQtys = bindQtys;
                    existingItem.toppingPrices = bindPrices;
                    existingItem.totalTopingPrice = totalTopingPrice;

                    existingItem.options = bindOptions;
                    existingItem.optionQtys = bindOptionQtys;
                    existingItem.optionFreeQtys = bindOptionFreeQtys;
                    existingItem.optionPrices = bindOptionPrices;
                    existingItem.totalOptionPrice = totalOptionPrice;

                    this.cart[this.productData.id][this.productSizes[selectedSize].id] = existingItem;
              }


              var proIds = "";

              for(const proId in this.cart){
                if(parseInt(proId)>=1 && this.cart[proId]){
                  if(proIds != "") proIds += ',';
                  proIds += proId;
                }
              }


              console.log(proIds);

              axios.post('get-related-product', {
                  product_ids:proIds,
                })
                .then((res)=>{   
                  console.log(res.data); 
                  this.relatedProduct = res.data;
                  this.updateLocalStorage();
                  this.emitMyEvent(); 
                  this.handleButtonClick();            
                  
                })
                .catch((err)=>{
                    console.log(err);
                })
          }
      },
      updateLocalStorage() {
          localStorage.setItem('cart', JSON.stringify(this.cart));
          localStorage.setItem('related_product', JSON.stringify(this.relatedProduct));
          this.loadCartFromLocalStorage();
      },
      loadCartFromLocalStorage() {
          const savedCart = localStorage.getItem('cart');
          this.cart = savedCart ? JSON.parse(savedCart) : [];

          const relatedProduct = localStorage.getItem('related_product');
          this.relatedProduct = relatedProduct ? JSON.parse(relatedProduct) : [];
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

        var index = 0;

        for(var i=0; i<eles.length; i++){
          var sizeName = eles[i].dataset.sizename;
          sizeName = sizeName.trim().toLowerCase();
          if(sizeName == 'medium'){
            index = i;
          }
        }
        
        if(eles[index] != undefined)eles[index].checked = true;
        var eles = document.getElementsByClassName("sizeRadioBtn");
        if(eles[index] != undefined)eles[index].dispatchEvent(clickEvent);
      },
      selectExtraTopping(){
        var selectedOptionids = [];

        for(const i in this.selectedOptions){
          selectedOptionids.push(this.selectedOptions[i].id);
        }

        var eles = document.getElementsByClassName('more-toppings');
        for (var i = 0; i < eles.length; i++) {
          var tpngId = eles[i].dataset.toppingid;
          tpngId = parseInt(tpngId);
          if (!selectedOptionids.includes(tpngId)) {
            eles[i].remove();
            this.generatePrice();
            return;
          }else{
            selectedOptionids = selectedOptionids.filter(item => item !== tpngId);
          }
        }

        var elements = document.getElementsByClassName('sizeRadio');
        var selectedSize = null;
        var lib_size = null;
        for(var i=0; i<elements.length; i++){
          if(elements[i].checked){
              selectedSize = elements[i].value;
              lib_size = elements[i].dataset.libsizeid;
          }
        }
        if(!selectedSize)return;
      
        for(var i=0; i<selectedOptionids.length; i++){
          var topping = this.allTopings[selectedOptionids[i]];

          var topingId = topping.id;
          var pric = 0;
          if (this.sizeVsTopings[topingId] && this.sizeVsTopings[topingId][lib_size]) {
            pric = this.sizeVsTopings[topingId][lib_size];
          } else {
            pric = this.allTopings[topingId].price;
          }

          var html = `
            <div id="topingContainer${topping.id}" class="col-3 p-2 more-toppings" data-toppingid="${topping.id}" >
                <div id="topingDiv${topping.id}" class="topings text-center shadow-lg  mb-2 bg-white py-3" style="width: 100%; border-radius: 10%; cursor:pointer;">
                    <img class="p-2" src="/frontend/toping_images/${topping.image}" alt="" style="width: 65px; ">
                    <p class="text-center m-0" style="font-size:12px; margin-bottom: 10px !important;">${topping.name}</p>
                    <p class="text-center m-0" style="font-size:12px;"><b class="showToppingPrice" data-toppingId="${topping.id}" id="showToppingPrice${topping.id}">${pric}</b><b>${ this.baseCurrencySymbol }</b></p>
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
          document.getElementById("toppingQtyMuns"+topping.id).addEventListener('click', () => this.qtyMinus(topping.id,'toppingQty'));
          document.getElementById("toppingQty"+topping.id).addEventListener('change', () => this.updateQty(topping.id,'toppingQty'));
          document.getElementById("toppingQtyPls"+topping.id).addEventListener('click', () => this.qtyPlus(topping.id,'toppingQty'));
          this.clickOnTopings(topping.id);
        }
        this.generatePrice();
      },
      qtyPlus(toppingId, prifix){
          var currentQty = document.getElementById(prifix+toppingId).value.trim();
          if(currentQty=="") currentQty = 1;
          currentQty = parseInt(currentQty);
          currentQty++;
          document.getElementById(prifix+toppingId).value = currentQty;
          //this.generatePrice();

          if(prifix=="toppingQty")
            this.clickOnTopings(toppingId,true);
          if(prifix=="optionQty")
            this.clickOnOptions(toppingId,true);

      },
      qtyMinus(toppingId, prifix){
          var currentQty = document.getElementById(prifix+toppingId).value.trim();
          if(currentQty=="") currentQty = 1;
          currentQty = parseInt(currentQty);
          currentQty--;
          if(currentQty<1) currentQty = 1;
          document.getElementById(prifix+toppingId).value = currentQty;
          //this.generatePrice();
          
           if(prifix=="toppingQty")
            this.clickOnTopings(toppingId,true);
          if(prifix=="optionQty")
            this.clickOnOptions(toppingId,true);

      },
      updateQty(toppingId, prifix){
        var currentQty = document.getElementById(prifix+toppingId).value.trim();
        if(currentQty=="" || currentQty < 1) currentQty = 1;
        currentQty = parseInt(currentQty);
        document.getElementById(prifix+toppingId).value = currentQty;
        //this.generatePrice();
        if(prifix=="toppingQty")
          this.clickOnTopings(toppingId,true);
        if(prifix=="optionQty")
          this.clickOnOptions(toppingId,true);
      },
      clickOnTag(id){     
          var tag = document.getElementById('protag'+id);
          if(tag.dataset.removed=="true"){
            var icon = document.getElementById('tagicon'+id);
              icon.innerHTML = `<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="7" cy="7" r="6.6" stroke="#737272" stroke-width="0.8"></circle>
                                <path d="M5 5L9 9" stroke="#737272" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M9 5L5 9" stroke="#737272" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                              </svg>`;
              tag.dataset.removed="false";
          }
          else if(tag.dataset.removed=="false"){
            var icon = document.getElementById('tagicon'+id);
              icon.innerHTML = `<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <circle cx="7" cy="7" r="6.6" stroke="#737272" stroke-width="0.8"></circle>
                                  <path d="M4.687 9.41667C4.687 9.41667 5.58895 9.41667 8.1095 9.41667C10.63 9.41667 10.6303 5.46995 8.1095 5.46995C5.58871 5.46995 5.88146 5.46995 4.82073 5.46995M3.5 5.46995L5.55039 6.90736L4.82073 5.46995M3.5 5.46995L5.55039 4L4.82073 5.46995M3.5 5.46995C3.5 5.46995 4.19855 5.46995 4.82073 5.46995" stroke="#737272" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>`;
              tag.dataset.removed="true";
          }

      }

  }
}

</script>
<style src="vue-multiselect/dist/vue-multiselect.css"></style>
<style>
.multiselect__option--highlight {
    background: rgb(238, 110, 45)!important;
}
.multiselect__option {
    display: block;
    padding: 5px!important;
    min-height: 1px!important;
    line-height: 15px!important;
    text-decoration: none;
    text-transform: none;
    position: relative;
    cursor: pointer;
    white-space: nowrap;
}
.multiselect__content li {
    margin-top: 1px!important; 
    margin-bottom: 1px!important;
}

.multiselect__tags input[type=text] {
    height: auto;
    line-height: 32px;
    padding: 0 15px;
}
.multiselect__option::after{
  background: rgba(238, 109, 45, 0)!important;
}
.multiselect__option--selected::after{
  background: rgba(238, 109, 45, 0)!important;
}
.multiselect__tags {
    padding: 2px 40px 0 11px;
}
.multiselect__tag {
    position: relative;
    display: inline-block;
    padding: 4px 26px 4px 10px;
    border-radius: 5px;
    margin-right: 10px;
    color: #fff;
    line-height: 1;
    background: rgb(238, 110, 45)!important;
    margin-bottom: 5px;
    white-space: nowrap;
    overflow: hidden;
    max-width: 100%;
    text-overflow: ellipsis;
}
.multiselect__tag-icon::after {
    color: #fff;
}
</style>
<style scoped>
.multi-select2 {
  width: 100%;
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

    .fqOpCo[data-removed="true"] {
        text-decoration: line-through;
    }

    .fqOpCo {
      position: relative;
      cursor: pointer;
      outline: none;
      background: transparent;
      border: medium;
      margin: 0px;
      padding: 0px;
      font-size: 14px;
      line-height: 20px;
      text-align: left;
      text-decoration: underline dotted;
      text-underline-offset: 3px;
    }
</style>
