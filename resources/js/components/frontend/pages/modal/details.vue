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
                            <img
                             :src="'/frontend/product_images/' + productData.image"
                              alt="Product Images"
                            />
                            <!-- <div class="label-block label-right">
                              <div class="product-badget">20% OFF</div>
                            </div> -->
                            <div class="product-quick-view position-view">
                              <a
                                href="assets/images/product/product-big-01.png"
                                class="popup-zoom"
                                tabindex="0"
                              >
                                <i class="far fa-search-plus"></i>
                              </a>
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
                    <h3 class="product-title">{{productData.name}}</h3>
                    <span class="price-amount">$155.00 - $255.00</span>
                    <ul class="product-meta">
                      <li><i class="fal fa-check"></i>In stock</li>
                      <li>
                        <i class="fal fa-check"></i>Free delivery available
                      </li>
                      <li>
                        <i class="fal fa-check"></i>Sales 30% Off Use Code:
                        MOTIVE30
                      </li>
                    </ul>
                    <p v-html="productData.description" class="description"></p>

                    <div class="product-variations-wrapper">
                      <!-- Start Product Variation  -->
                   
                      <!-- End Product Variation  -->

                      <!-- Start Product Variation  -->
                      <div class="product-variation">
                        <h6 class="title">Size:</h6>
                        <ul class="range-variant">
                          <li>xs</li>
                          <li>s</li>
                          <li>m</li>
                          <li>l</li>
                          <li>xl</li>
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
        productData: Object
      },
    data(){
        return{
            catgories:{},
        }
    },
    components: {

    },
    mounted(){
        
    },
    methods: {
       handleButtonClick() {
        // Emit a custom event named 'closeModal' when the button is clicked
        this.$emit('closeModal');
      }
    }
}
</script>

<style scoped>
.modal {
  background-color: #000000ab;
}
</style>
