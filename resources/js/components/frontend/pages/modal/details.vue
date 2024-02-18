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
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="handleButtonClick">
            <i class="far fa-times"></i>
          </button>
        </div>
        <div class="modal-body">
          <div class="single-product-thumb">
            <div class="row">
              <div class="col-lg-7 mb--40">
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



                    <div class="d-flex justify-content-between">
                      <div>
                          <h3 class="product-title">{{productData.name}}</h3>
                      </div>
                      <div>

                      </div>
                      <div>
                        <div class="tooltipr">
                          <i class="fas fa-info-circle"></i>
                          <!-- <div class="tooltipr-text"  v-html="productData.description"></div> -->
                           <p  :class="['tooltipItem', 'tooltipr-text']"  v-html="productData.description" ></p>
                          <template  v-for="(productSize, sizeId) in productSizes" :key="sizeId" >
                            <p  :class="['tooltipItem', 'tooltipr-text', sizeId != 0 ? 'd-none' : 'd-none']"  :id="'tooltipItem'+sizeId" v-html="productSize.description" ></p>
                          </template>
                        </div>
                      </div>
                    </div>
                    <span class="price-amount d-none">$155.00 - $255.00</span>

                    <p v-html="productData.description" class="description"></p>

                    <div class="product-variations-wrapper">
                      <!-- Start Product Variation  -->

                      <!-- End Product Variation  -->

                      <!-- Start Product Variation  -->
                      <div class="product-variation">
                        <h6 class="title">Size:</h6>
                        <ul class="range-variant">
                          <li v-for="(productSize, sizeId) in productSizes" :key="sizeId" @click="clickOnSize(sizeId)">
                            {{productSize.name}}
                          </li>
                        </ul>
                      </div>
                      <!-- End Product Variation  -->
                    </div>

                    <!-- Start Product Action Wrapper  -->
                    <div class="product-action-wrapper d-flex-center">
                      <!-- Start Quentity Action  -->
                      <div class="pro-qty">
                        <span class="dec qtybtn">-</span
                        ><input type="text" value="1" /><span class="inc qtybtn"
                          >+</span
                        >
                      </div>
                      <!-- End Quentity Action  -->

                      <!-- Start Product Action  -->
                      <ul class="product-action d-flex-center mb--0">
                        <li class="add-to-cart">
                          <a href="cart.html" class="axil-btn btn-bg-primary"
                            >Add to Cart</a
                          >
                        </li>
                        <!-- <li class="wishlist">
                          <a href="wishlist.html" class="axil-btn wishlist-btn"
                            ><i class="far fa-heart"></i
                          ></a>
                        </li> -->
                      </ul>
                      <!-- End Product Action  -->
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
export default {
    name: 'details',
      props: {
        productData: Object,
        productSizes: Object,
      },
    data(){
        return{
            catgories:{},
            tooltipVisible: false,
        }
    },
    components: {

    },
    mounted(){
        // console.log(this.productSize);
    },
    methods: {
       handleButtonClick() {
        // Emit a custom event named 'closeModal' when the button is clicked
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

          document.getElementById('tooltipItem'+sizeid).classList.remove('d-none');
          document.getElementById('sizeImages'+sizeid).classList.remove('d-none');

      },

    }
}
</script>

<style scoped>
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
            color: #fff;
            text-align: center;
            border-radius: 4px;
            padding: 5px;
            margin-top: 7px;
            position: absolute;
            z-index: 9;
            top: 100%;
            left: 0%;
            margin-left: -178px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltipr-text:after {
            content: '';
            position: absolute;
            top: -9px; /* Adjust this value to control the distance between the tooltip and the triggering element */
            left: 85%;
            border-width: 5px;
            border-style: solid;
            border-color: transparent transparent #333 transparent;
        }

        .tooltipr:hover .tooltipr-text {
            visibility: visible;
            opacity: 1;
        }
</style>
