<template>
  <div>
    <AppHeader></AppHeader>
    <div class="cart-dropdown" id="cart-dropdown">
      <div class="cart-content-wrap" style="padding: 18px 22px !important">
        <div class="cart-header">
          <h2 class="header-title">Cart review</h2>
          <button class="cart-close sidebar-close">
            <i class="fas fa-times"></i>
          </button>
        </div>
        <div class="cart-body">
          <table class="m-0 p-0">
            <tbody>
              <template
                v-for="(productSizes, productId) in cart"
                :key="productId"
              >
                <template v-if="cart.hasOwnProperty(productId)">
                  <template
                    v-for="(item, sizeId) in productSizes"
                    :key="sizeId"
                  >
                    <tr
                      style="
                        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
                        margin-top: 20;
                      "
                    >
                      <td>
                        <div>
                          <div class="d-flex flex-row bd-highlight mb-3">
                            <div class="p-2 bd-highlight">
                              <img
                                style="width: 100px"
                                :src="item.product.image ? '/frontend/product_images/' + item.product.image : '/frontend/product_images/placeholder.jpg'"
                                alt="Product Images"
                              />
                            </div>
                            <div class="p-2 bd-highlight w-100">
                              <div>
                                <div
                                  class="d-flex bd-highlight"
                                  style="line-height: 1.3"
                                >
                                  <div
                                    class="mr-auto bd-highlight"
                                    style="margin-right: auto !important"
                                  >
                                    <p
                                      style="
                                        margin: 0;
                                        padding: 0;
                                        line-height: 1;
                                        text-align: left;
                                        width: 100% !important;
                                      "
                                    >
                                      <b>{{ item.product.name }}</b>
                                    </p>
                                  </div>
                                  <div class="bd-highlight">
                                    <i
                                      style="cursor: pointer"
                                      @click="removeItem(item.product.id+'_'+item.size.id)"
                                      class="fas fa-times"
                                    ></i>
                                  </div>
                                </div>
                              </div>
                              <p
                                style="
                                  margin: 0;
                                  padding: 0;
                                  line-height: 1.3;
                                  font-size: 14px;
                                  text-align: left;
                                "
                              >
                                {{ item.size.name }}({{ item.size.price }})
                              </p>
                              <p
                                v-if="item.options.length>0"
                                style="
                                  width: 100% !important;
                                  line-height: 0.8;
                                  margin: 0;
                                "
                              >
                                <span>+</span>
                                <template
                                  v-for="(toping, topingId) in item.options"
                                  :key="topingId"
                                >
                                  <template v-if="toping">
                                    <span
                                      style="
                                        margin: 0;
                                        padding: 0;
                                        font-size: 12px;
                                        padding: 0 2px;
                                      "
                                      >{{ toping.name }}({{
                                      item.optionPrices[toping.id] }}{{
                                      baseCurrencySymbol }} x
                                      {{item.optionQtys[toping.id]}})</span
                                    >
                                    <span
                                      v-if="topingId != item.options.length-1"
                                      >,</span
                                    >
                                  </template>
                                </template>
                              </p>
                              <p
                                v-if="item.topings.length>0"
                                style="
                                  width: 100% !important;
                                  line-height: 0.8;
                                  margin: 0;
                                "
                              >
                                <span>+</span>
                                <template
                                  v-for="(toping, topingId) in item.topings"
                                  :key="topingId"
                                >
                                  <template v-if="toping">
                                    <span
                                      style="
                                        margin: 0;
                                        padding: 0;
                                        font-size: 12px;
                                        padding: 0 2px;
                                      "
                                      >{{ toping.name }}({{
                                      item.toppingPrices[toping.id] }}{{
                                      baseCurrencySymbol }} x
                                      {{item.toppingQtys[toping.id]}})</span
                                    >
                                    <span
                                      v-if="topingId != item.topings.length-1"
                                      >,</span
                                    >
                                  </template>
                                </template>
                              </p>
                              <p
                                v-if="item.removedTags.length>0"
                                style="width: 100% !important; line-height: 0.8"
                              >
                                <span>-</span>
                                <template
                                  v-for="(tag, tagid) in item.removedTags"
                                  :key="tagid"
                                >
                                  <span
                                    style="
                                      margin: 0;
                                      padding: 0;
                                      font-size: 12px;
                                      padding: 0 2px;
                                    "
                                    >{{ productAllTages[tag] }}</span
                                  >
                                  <span
                                    v-if="tagid != item.removedTags.length-1"
                                    >,</span
                                  >
                                </template>
                              </p>
                            </div>
                          </div>
                          <div class="d-flex bd-highlight mb-3">
                            <div
                              class="mr-auto p-2 bd-highlight"
                              style="margin-right: auto !important"
                            >
                              <div class="input-group">
                                <div
                                  @click="qtyDn(item.product.id+'_'+item.size.id)"
                                  class="input-group-prepend"
                                  style="cursor: pointer"
                                >
                                  <span class="input-group-text"><b>-</b></span>
                                </div>
                                <input
                                  @change="changeQty(item.product.id+'_'+item.size.id)"
                                  :id="'qty'+item.product.id+'_'+item.size.id"
                                  :value="item.quantity"
                                  min="1"
                                  type="text"
                                  class="form-control"
                                  style="
                                    text-align: center;
                                    font-size: 16px;
                                    height: 25px;
                                    width: 40px;
                                    padding: 0px;
                                  "
                                  aria-label="Amount (to the nearest dollar)"
                                />
                                <div
                                  @click="qtyUp(item.product.id+'_'+item.size.id)"
                                  class="input-group-append"
                                  style="cursor: pointer"
                                >
                                  <span class="input-group-text"><b>+</b></span>
                                </div>
                              </div>
                            </div>
                            <div class="p-2 bd-highlight">
                              <span
                                :id="'amount'+item.product.id+'_'+item.size.id"
                                >{{ item.totalPrice }}{{ baseCurrencySymbol
                                }}</span
                              >
                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </template>
                </template>
              </template>
            </tbody>
          </table>
          <div class="axil-categorie-area bg-color-white">
            <div class="container">
              <div class="section-title-wrapper">
                <h4 class="title">Related Product</h4>
              </div>
              <swiper
                :space-between="50"
                :breakpoints="{
                                        '320': {
                                            slidesPerView: 2,
                                            spaceBetween: 10,
                                        },
                                        '640': {
                                            slidesPerView: 3,
                                            spaceBetween: 20,
                                        },
                                        '768': {
                                            slidesPerView: 4,
                                            spaceBetween: 40,
                                        },
                                        '1024': {
                                            slidesPerView: 5,
                                            spaceBetween: 50,
                                        },
                                    }"
                @swiper="onSwiper"
                @slideChange="onSlideChange"
              >
                <swiper-slide
                  v-for="(item, index) in relatedProduct"
                  :key="index"
                >
                  <div
                    class="d-flex align-items-center"
                    @click="getProductDetails(item.id)"
                  >
                    <div class="flex-shrink-0" style="width: 200px">
                      <img
                        style="width: 70px"
                        :src="item.image ? item.image : '/frontend/product_images/placeholder.jpg'"
                        alt="..."
                      />
                      <div class="flex-grow-1 ms-3">
                        <p>
                          <span style="font-size: 12px">{{ item.name }}</span>
                        </p>
                      </div>
                    </div>
                  </div>
                </swiper-slide>
              </swiper>
            </div>
          </div>
        </div>
        <div class="cart-footer">
          <div>
            <div v-if="availableCoupon">
              <p>
                Use this coupon code
                <strong style="color: rgb(238, 110, 45)"
                  >'{{availableCoupon.coupon.code}}'</strong
                >
                to get {{ formatDiscount(availableCoupon.coupon.discount) }}{{
                availableCoupon.coupon.discount_type=='1'?'%':baseCurrencySymbol
                }} discount
              </p>
            </div>
            <div class="input-group">
              <input
                id="coupon"
                type="text"
                class="form-control"
                placeholder="Coupon Code"
                style="
                  text-align: left;
                  font-size: 16px;
                  height: 25px;
                  width: 40px;
                  padding: 20px;
                  border: 1px solid #bbb2b2;
                "
                aria-label="Amount (to the nearest dollar)"
              />
              <div
                @click="applyCoupon()"
                class="input-group-append"
                style="cursor: pointer"
              >
                <span
                  class="input-group-text"
                  style="padding: 13px; border-radius: 0px; line-height: 14px"
                  >Apply</span
                >
              </div>
            </div>
            <p v-if="isCouponNotMatched" style="color: red; font-size: 12px">
              Coupon code not matched
            </p>
          </div>
          <br />
          <p class="cart-subtotal m-0">
            <span class="subtotal-title">Sub Total:</span>
            <span class="subtotal-amount"
              >{{ subTotal }}{{ baseCurrencySymbol }}</span
            >
          </p>
          <p class="cart-subtotal m-0" v-if="isDiscount">
            <span class="subtotal-title">Discount:</span>
            <span class="subtotal-amount">{{ showDiscount }}</span>
          </p>
          <p class="cart-subtotal m-0">
            <span class="subtotal-title">Grand Total:</span>
            <span class="subtotal-amount"
              >{{ grandTotal }}{{ baseCurrencySymbol }}</span
            >
          </p>
          <div class="group-btn d-none">
            <!-- <a href="javascript:void(0)" class="axil-btn btn-bg-primary viewcart-btn">View Cart</a> -->
            <a
              href="javascript:void(0)"
              @click="checkout()"
              class="axil-btn btn-bg-secondary checkout-btn float-right"
              >Checkout</a
            >
          </div>

          <div class="row">
            <div class="col-12 col-md-6 mt-5 mb-3">
              <div class="input-group" style="cursor: pointer">
                <button
                  @click="showMap()"
                  type="button"
                  class="btn"
                  style="
                    cursor: pointer !important;
                    background: #ee6e2d;
                    color: white;
                    width: 100%;
                    border-radius: 9999px;
                    padding: 5px;
                    font-size: 16px;
                  "
                >
                  Specify The Delivery Address
                </button>
                <span
                  style="
                    font-size: 10px;
                    color: red;
                    width: 100%;
                    text-align: center;
                  "
                  >Minimal order delivery value is 12{{ baseCurrencySymbol
                  }}</span
                >
              </div>
            </div>
            <div class="col-12 col-md-6 mt-5 mb-3">
              <div class="input-group" style="cursor: pointer">
                <button
                  @click="showSchedule()"
                  type="button"
                  class="btn"
                  style="
                    cursor: pointer !important;
                    background: #ee6e2d;
                    color: white;
                    width: 100%;
                    border-radius: 9999px;
                    padding: 5px;
                    font-size: 16px;
                  "
                >
                  Or Dine In / Pick Up
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <details
      :productData="product"
      :productSizes="productSizes"
      :productTopings="productTopings"
      :allTopings="allTopings"
      :moreTopings="moreTopings"
      :sizeVsTopings="sizeVsTopings"
      :maxMin="maxMin"
      :productTages="productTages"
      :productOptions="productOptions"
      v-if="showAddToCart"
      @closeModal="handleModalClose"
    ></details>
    <Authentication
      v-if="showAuthentication"
      @closeModal="handleAuthenticationModalClose"
    ></Authentication>
    <DeliveryPlace
      :discount="discount"
      :subTotal="subTotal"
      :grandTotal="grandTotal"
      :orderType="orderType"
      :productAllTages="productAllTages"
      v-if="showDeliveryPlace"
      @closeModal="handleDeliveryPlaceModalClose"
    ></DeliveryPlace>
    <main class="main-wrapper">
      <router-view></router-view>
    </main>
    <AppFooter></AppFooter>
  </div>
</template>
<script>

  import AppHeader from '../../../components/frontend/layouts/header.vue';
  import AppFooter from '../../../components/frontend/layouts/footers.vue'; // Changed Footer to AppFooter
  import Cart from '../pages/modal/cart.vue';
  import axios from 'axios';
  import {Swiper,SwiperSlide} from 'swiper/vue';
  import Details from '../pages/modal/details.vue';
  import DeliveryPlace from '../pages/modal/deliveryPlace.vue';
  import Authentication from '../pages/modal/authentication.vue';
  import 'swiper/css';
  import { getBaseCurrencySymbol, HelperFunctions } from '../helpers.js';
  import { toast } from 'vue3-toastify';
  import 'vue3-toastify/dist/index.css';
  export default {
    name: 'Main',
    mixins: [HelperFunctions],
    components: {
      AppHeader,
      AppFooter,
      Cart,
      Swiper,
      SwiperSlide,
      Details,
      Authentication,
      DeliveryPlace,
    },
    data(){
          return{
              freeOption:1,
              products:{},
              product:null,
              productSizes:null,
              productTopings:null,
              allTopings:null,
              moreTopings:null,
              sizeVsTopings:null,
              productTages:null,
              productAllTages:null,
              productOptions:null,
              maxMin:null,
              showAddToCart:false,
              showAuthentication:false,
              showDeliveryPlace:false,
              subTotal:0,
              grandTotal:0,
              cart:[],
              relatedProduct:[],
              coupon:"",
              isCouponNotMatched:false,
              isDiscount:false,
              showDiscount:'',
              discount:0,
              baseCurrencySymbol: '',
              isVisible:true,
              message:'',
              orderType:null,
              availableCoupon:"",
              popularProduct:null,
              sliders:null,
              firstAd:null,
              secondAd:null,
          }
      },
       created (){
          this.emitter.on('my-event', (evt) => {
              this.testEvent = evt.eventContent;
              this.loadCartFromLocalStorage();
              const dropdownElement = document.getElementById('cart-dropdown');
              // Check if the element exists and remove the 'open' class
              if (dropdownElement) {
                  if(this.testEvent != "form cart")
                      dropdownElement.classList.remove('open');
              }

              const closeMaskElement = document.querySelector('.closeMask');

              // Check if the element exists and remove it
              if (closeMaskElement) {
                  if(this.testEvent != "form cart")
                      closeMaskElement.remove();
              }
          });
          this.emitter.on('loginModalEvent', (evt) => {
              var loginModalEvent = evt.loginModalEvent;
              if(loginModalEvent == '1') {
                  this.showAuthentication = true;
              }
          });
      },
     mounted(){
          this.getSliders();
          this.getAds();
          this.getCategoryWiseProduct();
          this.loadCartFromLocalStorage();
          this.fetchBaseCurrencySymbol();
          this.emitter.on('scrollToTeamSection', this.handleScrollToTeamSection);
          this.getCoupon();
          this.getPopularProduct();
      },
    methods: {
      // handleCartModal() {
      //   // Add your logic here to affect home.vue or perform any necessary action
      //   console.log('Cart modal');
      // }
    },  computed: {
        sortedCategories() {
              // Convert object to array
              const categoriesArray = Object.values(this.products);

              // Sort categories by order_by value
              categoriesArray.sort((a, b) => a.order_by - b.order_by);

              return categoriesArray;
          }
      },
      methods: {
          getSliders () {
              axios.get('get-sliders')
              .then((res) => {
                 this.sliders = res.data;
              })
              .catch((err) => {
              });
          },

          getAds () {
              axios.get('get-ads')
              .then((res) => {
                 this.firstAd = res.data.first_ad;
                 this.secondAd = res.data.second_ad;
              })
              .catch((err) => {
              });
          },
          getCategoryWiseProduct() {
              axios.get('get-products')
              .then((res) => {
                 this.products = res.data[0];
                 this.productAllTages = res.data[1];
              })
              .catch((err) => {
              });
          },
          getProductDetails(productId) {
              axios.get('get-product-details', {
                      params: {
                          id: productId
                      }
              }).then((res) => {
                      if (res.data[0]) {
                          // console.log(res.data);
                          this.showAddToCart = true;
                          this.product = res.data[0];
                          this.productSizes = res.data[1];
                          this.productTopings =  res.data[2];
                          this.maxMin =  res.data[3];
                          this.allTopings =  res.data[4];
                          this.moreTopings = res.data[5];
                          this.sizeVsTopings = res.data[6];
                          this.productTages = res.data[7];
                          this.productOptions = res.data[8];
                      }
              }).catch((err) => {
              });
          },
          getPopularProduct(){
               axios.get('get-popular-products')
              .then((res) => {

                  // console.log(res.data);
                  this.popularProduct = res.data;
              })
              .catch((err) => {
              });
          },
          handleModalClose() {
              this.showAddToCart = false;
          },
          handleAuthenticationModalClose(){
              this.showAuthentication = false;
          },
          handleDeliveryPlaceModalClose(){
              this.showDeliveryPlace = false;
          },

          loadCartFromLocalStorage() {
              // localStorage.setItem('cart', []);return;
              const savedCart = localStorage.getItem('cart');
              this.cart = savedCart ? JSON.parse(savedCart) : [];

              const relatedProduct = localStorage.getItem('related_product');
            this.relatedProduct = relatedProduct ? JSON.parse(relatedProduct) : [];

              this.subTotal = 0;
              //this.cartItemCount = 0;
              for (const productId in this.cart) {
                  if (this.cart.hasOwnProperty(productId)) {
                      const productSizes = this.cart[productId];
                      for (const sizeId in productSizes) {
                          if (productSizes.hasOwnProperty(sizeId)) {
                              const item = productSizes[sizeId];

                              var topings = item.topings;
                              var toppingQtys = item.toppingQtys;
                              var toppingPrices = item.toppingPrices;
                              var topingsPrice = 0;
                              for (const i in topings) {
                                  if(topings[i])  {
                                      var price = toppingPrices[topings[i].id];
                                      var qty = toppingQtys[topings[i].id];
                                      price = parseFloat(price);
                                      qty = parseFloat(qty);
                                      topingsPrice += parseFloat(price*qty);
                                  }
                              }

                              // this.subTotal += (item.size.price * item.quantity) + topingsPrice;
                              // item.totalPrice = (item.size.price * item.quantity) + topingsPrice;


                              var options = item.options;
                              var optionQtys = item.optionQtys;
                              var optionFreeQtys = item.optionFreeQtys;
                              var optionPrices = item.optionPrices;
                              var optionsPrice = 0;
                              for (const i in options) {
                                  if(options[i])  {
                                      var price = optionPrices[options[i].id];
                                      var qty = optionQtys[options[i].id];
                                      var freeQty = optionFreeQtys[options[i].id];
                                      price = parseFloat(price);
                                      qty = parseFloat(qty);
                                      freeQty = parseFloat(freeQty);
                                      var paidQty = qty - freeQty;
                                      if(paidQty<0) paidQty = 0;
                                      optionsPrice += parseFloat(price*paidQty);
                                  }
                              }
                              this.subTotal += (item.size.price * item.quantity) + topingsPrice + optionsPrice;
                              item.totalPrice = (item.size.price * item.quantity) + topingsPrice + optionsPrice;

                          }
                      }
                  }
              }
              this.grandTotal =  this.subTotal;

              this.isDiscount = false;
              if(this.coupon){
                  this.isDiscount = true;
                  var coupon = this.coupon;
                  if(coupon.discount_type){
                      this.showDiscount = (((coupon.discount*1)/100)*(this.subTotal*1)).toFixed(2);
                      this.discount = (this.grandTotal*(coupon.discount/100)).toFixed(2);
                      this.grandTotal -= this.grandTotal*(coupon.discount/100);
                  }else{
                      this.showDiscount = coupon.discount+this.baseCurrencySymbol;
                      this.discount = (coupon.discount).toFixed(2);
                      this.grandTotal -= (coupon.discount*1);
                  }

              }
              this.grandTotal = this.grandTotal.toFixed(2);
              this.subTotal = this.subTotal.toFixed(2);
          },
          changeQty(id){
              let parts = id.split('_');
              var currenValue = document.getElementById('qty'+id).value;
              if(currenValue<1){
                  currenValue = 1;
              }
              document.getElementById('qty'+id).value = currenValue;
              var cart = this.cart;
              if (cart[parts[0]] && cart[parts[0]][parts[1]]) {
                  cart[parts[0]][parts[1]].quantity = currenValue;
                  cart[parts[0]][parts[1]].totalPrice = cart[parts[0]][parts[1]].size.price * currenValue;
              }
              this.cart = cart;
              localStorage.setItem('cart', JSON.stringify(this.cart));
              this.loadCartFromLocalStorage();
              // toast.success('Qty Change success', {
              //     timeout: 3000 // Optional: Time in milliseconds before the toast auto-closes
              // });
          },
          qtyDn(id){
              let parts = id.split('_');
              var currenValue = document.getElementById('qty'+id).value;
              if(currenValue>1){
                  currenValue--;
              }
              document.getElementById('qty'+id).value = currenValue;
              var cart = this.cart;
              if (cart[parts[0]] && cart[parts[0]][parts[1]]) {
                  cart[parts[0]][parts[1]].quantity = currenValue;
                  cart[parts[0]][parts[1]].totalPrice = cart[parts[0]][parts[1]].size.price * currenValue;
              }
              this.cart = cart;
              localStorage.setItem('cart', JSON.stringify(this.cart));
              this.loadCartFromLocalStorage();
              // toast.success('Qty update success', {
              //     timeout: 3000 // Optional: Time in milliseconds before the toast auto-closes
              // });
          },
          qtyUp(id){
              let parts = id.split('_');
              var currenValue = document.getElementById('qty'+id).value;
              currenValue++;
              document.getElementById('qty'+id).value = currenValue;

              var cart = this.cart;
              if (cart[parts[0]] && cart[parts[0]][parts[1]]) {
                  cart[parts[0]][parts[1]].quantity = currenValue;
                  cart[parts[0]][parts[1]].totalPrice = cart[parts[0]][parts[1]].size.price * currenValue;
              }
              this.cart = cart;
              localStorage.setItem('cart', JSON.stringify(this.cart));
              this.loadCartFromLocalStorage();
              // toast.success('Qty update success', {
              //     timeout: 3000 // Optional: Time in milliseconds before the toast auto-closes
              // });
          },
          removeItem(id){
              let parts = id.split('_');
              var cart = this.cart;
              if (cart[parts[0]] && cart[parts[0]][parts[1]]) {
                  delete cart[parts[0]][parts[1]]
              }
              this.cart = cart;
              localStorage.setItem('cart', JSON.stringify(this.cart));
              this.loadCartFromLocalStorage();
              this.emitMyEvent();
              // toast.success('Remove to cart success', {
              //     timeout: 3000 // Optional: Time in milliseconds before the toast auto-closes
              // });

          },
          emitMyEvent() {
            this.emitter.emit('my-event', {'eventContent': 'form cart'})
          },

          getCoupon () {
              axios.get('get-coupon', {

              })
              .then((res)=>{
                  if (res.data.coupon != null) {
                       this.availableCoupon = res.data;
                  } else {
                    this.availableCoupon = "";
                  }
              })
              .catch((err)=>{
              })
          },
          applyCoupon(){
              var coupon = document.getElementById('coupon').value.trim();
              if(coupon != ""){
                  axios.get('check-coupon', {
                      params: {
                          coupon: coupon,
                      }
                  })
                  .then((res)=>{
                      if(res.data['coupon']){
                          this.coupon = res.data['coupon'];
                          this.isCouponNotMatched = false;
                          this.isDiscount = true;
                      }else{
                          this.coupon = null;
                          this.isCouponNotMatched = true;
                          this.isDiscount = false;
                      }
                      this.loadCartFromLocalStorage();
                  })
                  .catch((err)=>{
                  })
              }

          },
          checkout(){
              var auth = localStorage.getItem('auth');
              auth = auth ? JSON.parse(auth) : null;
              if(auth) this.showDeliveryPlace = true;
              else this.showAuthentication = true;
          },
          async fetchBaseCurrencySymbol() {
              try {
                  this.baseCurrencySymbol = await getBaseCurrencySymbol();
              } catch (error) {
              }
          },
          showMap() {
              if(this.grandTotal>=12){
                  // this.deliveryPlace = false;
                  this.orderType = 1;
                  // this.modalWidth = 80;
                  // this.initMap();
                  var auth = localStorage.getItem('auth');
                  auth = auth ? JSON.parse(auth) : null;
                  if(auth) this.showDeliveryPlace = true;
                  else this.showAuthentication = true;
              }else{
                  this.isVisible = true;
                  this.message = 'Minium Order Amount is 12';
                  this.showToast(this.message,0);
              }
          },
          showSchedule(){
              this.orderType = 2;
              var auth = localStorage.getItem('auth');
              auth = auth ? JSON.parse(auth) : null;
              if(auth) this.showDeliveryPlace = true;
              else this.showAuthentication = true;
          },
          showToast(message,type) {
              if(type){
                  // toast.success(message, {timeout: 2000});
              }else{
                  // toast.warning(message, {timeout: 2000});
              }

                  this.message = message;
                  this.isVisible = true;

              setTimeout(() => {
                  this.isVisible = false;
              }, 2000);
          },
          handleScrollToTeamSection(id) {

              const targetId = 'product_section' + id;
              const teamSection = document.getElementById(targetId);
              if (teamSection) {
                  teamSection.scrollIntoView({ behavior: 'smooth' });
              }
          },

          formatDiscount(value) {
              // Convert value to a number in case it's a string
              value = Number(value);

              // Check if the fractional part is 0
              if (value % 1 === 0) {
                  return value.toFixed(0); // Return without decimal places
              } else {
                  return value.toFixed(2); // Return with two decimal places
              }
          }
      },
      beforeDestroy() {
          this.emitter.off('scrollToTeamSection', this.handleScrollToTeamSection);
       },
      setup() {
          const onSwiper = (swiper) => {
          };
          const onSlideChange = () => {
          };
          return {
              onSwiper,
              onSlideChange,
          };
      },
  }
</script>
