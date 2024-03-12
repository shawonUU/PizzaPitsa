<template>
    <div>
        <main class="main-wrapper">
        <!-- Start My Account Area  -->
        <div class="axil-dashboard-area axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-warp">
                    <div class="axil-dashboard-author">
                        <div class="media">
                            <!-- <div class="thumbnail">
                                <img src="assets/images/product/author1.png" alt="Hello Annie">
                            </div> -->
                            <div class="media-body">
                                <h5 class="title mb-0">{{ isAuth.name }}</h5>                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <div class="nav nav-tabs" role="tablist">
                                        <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard" role="tab" aria-selected="false" tabindex="-1"><i class="fas fa-th-large"></i>Dashboard</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="false" tabindex="-1"><i class="fas fa-shopping-basket"></i>Orders</a>
                                        <!-- <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-downloads" role="tab" aria-selected="false" tabindex="-1"><i class="fas fa-file-download"></i>Downloads</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-address" role="tab" aria-selected="false" tabindex="-1"><i class="fas fa-home"></i>Addresses</a> -->
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-account" role="tab" aria-selected="true"><i class="fas fa-user"></i>Account Details</a>
                                        <a class="nav-item nav-link" style="cursor:pointer" @click="logout" aria-selected="false" tabindex="-1" role="tab"><i class="fal fa-sign-out"></i>Logout</a>
                                    </div>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="nav-dashboard" role="tabpanel">
                                    <div class="axil-dashboard-overview">
                                        <div class="welcome-text">{{ isAuth.name }} (not <span>{{ isAuth.name }}?</span> <a style="cursor:pointer" @click="logout">Log Out</a>)</div>
                                        <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-orders" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">SL</th>
                                                        <th scope="col">Order</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Total Amount</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr v-for="(order,index) in orders" :key="index">
                                                        <th scope="row">{{index+1}}</th>
                                                        <th scope="row">#{{order.order_number}}</th>
                                                        <td>{{ formatCreatedAt(order.created_at) }}</td>                                                       
                                                        <td>
                                                            <select name="" id="" disabled>
                                                                <option  v-for="(status,index) in orderStatuses" :key="index" :selected="index==order.order_status">
                                                                    {{ status }}
                                                                </option>
                                                            </select>
                                                        </td>
                                                        <td>{{order.total_amount}}</td>
                                                        <td><a href="javascript:void(0)" @click="handleModalOpen(order.order_number)" class="axil-btn view-btn">View</a></td>
                                                    </tr>
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>                               
                               
                                <div class="tab-pane fade active" id="nav-account" role="tabpanel">
                                    <div class="col-lg-9">
                                    <div class="axil-dashboard-account">
                                        <div v-if="errorMessage" class="alert alert-danger" role="alert">
                                            {{ errorMessage }}
                                        </div>
                                        <form class="account-details-form" @submit.prevent="submitForm">
                                        <div class="row">
                                            <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" v-model="formData.name">
                                            </div>
                                            </div>
                                            <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" class="form-control" v-model="formData.email">
                                            </div>
                                            </div>
                                            <div class="col-12">
                                            <h5 class="title">Password Change</h5>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" v-model="password">
                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input type="password" class="form-control" v-model="newPassword">
                                            </div>
                                            <div class="form-group">
                                                <label>Confirm New Password</label>
                                                <input type="password" class="form-control" v-model="confirmNewPassword">
                                            </div>
                                            <div class="form-group mb--0">
                                                <input type="submit" class="axil-btn" value="Save Changes">
                                            </div>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </main>
    </div>
    <div>
      <div data-v-05123fd1="" :class="{ 'modal fade quick-view-product': true, 'show': isModalOpen }" class=" " id="quick-view-modal" tabindex="-1" aria-modal="true" role="dialog" :style="{ 'padding-right': '17px', 'display': dynamicDisplay }">
  <div data-v-05123fd1="" class="modal-dialog modal-dialog-centered" style="max-width: 80%;">
    <div data-v-05123fd1="" class="modal-content">
      <div data-v-05123fd1="" class="modal-body" style="padding-top: 0px; padding-right: 13px;">
        <div data-v-05123fd1="" class="d-flex justify-content-end pt-3">
          <button data-v-05123fd1="" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="height: 5px; width: 5px; margin-bottom: 15px;" @click="handleModalClose"></button>
        </div>
        <!--v-if-->
        <!--v-if-->
        <!--v-if-->
        <div data-v-05123fd1="">
          <div data-v-05123fd1="" class="row">
            <div data-v-05123fd1="" class="col-12">
              <h3 data-v-05123fd1="">Order Details</h3>
              <div data-v-05123fd1="" class="page-content">
                <div data-v-05123fd1="" class="container-fluid">
                  <div data-v-05123fd1="" class="aiz-main-content">
                    <div data-v-05123fd1="" class="">
                      <div data-v-05123fd1="" class="card">
                        <div data-v-05123fd1="" class="card-body">
                          <div data-v-05123fd1="" class="row gutters-5">
                            <div data-v-05123fd1="" class="col-6">
                              <strong data-v-05123fd1="">Delivery Address Info</strong>
                              <hr data-v-05123fd1="">
                              <address data-v-05123fd1="">
                                <div data-v-05123fd1="" class="d-flex justify-content-between">
                                  <div data-v-05123fd1="">
                                    <strong data-v-05123fd1="" class="text-main"> Name: {{productDetails.name}}</strong>
                                  </div>
                                </div>
                                <br data-v-05123fd1=""> Email: {{productDetails.email}} <br data-v-05123fd1=""> Selected Address: {{productDetails.selectedAddress}}  <br data-v-05123fd1=""> Entrance:  {{productDetails.entrance}} <br data-v-05123fd1=""> Door Code:  {{productDetails.door_code}}  <br data-v-05123fd1=""> Floor: {{productDetails.floor}} <br data-v-05123fd1=""> Apartment: {{productDetails.apartment}} <br data-v-05123fd1=""> Comment: {{productDetails.comment}} <br data-v-05123fd1="">
                              </address>
                            </div>
                            <div data-v-05123fd1="" class="col-md-6">
                              <strong data-v-05123fd1="">Order Info</strong>
                              <hr data-v-05123fd1="">
                              <table data-v-05123fd1="">
                                <tbody data-v-05123fd1="">
                                  <tr data-v-05123fd1="">
                                    <td data-v-05123fd1="" class="text-main text-bold">Order Type</td>
                                    <td data-v-05123fd1="" class="text-main text-bold">
                                        <span v-if="productDetails.type === '1'">Home Delivery</span>
                                        <span v-else>Dine in or Pickup</span>
                                      </td>
                                  </tr>
                                  <tr data-v-05123fd1="">
                                    <td data-v-05123fd1="" class="text-main text-bold">Order date </td>
                                    <td data-v-05123fd1="" class="text-right">{{ formatCreatedAt(productDetails.created_at) }}</td>
                                  </tr>
                                  <tr data-v-05123fd1="">
                                    <td data-v-05123fd1="" class="text-main text-bold"> Total amount </td>
                                    <td data-v-05123fd1="" class="text-right">{{productDetails.total_amount}}€</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <hr data-v-05123fd1="" class="new-section-sm bord-no">
                          <div data-v-05123fd1="" class="row">
                            <div data-v-05123fd1="" class="col-lg-12 table-responsive">
                              <table data-v-05123fd1="" class="table-bordered aiz-table invoice-summary table footable footable-1 breakpoint-xl">
                                <thead data-v-05123fd1="">
                                  <tr data-v-05123fd1="" class="bg-trans-dark footable-header">
                                    <th data-v-05123fd1="" data-breakpoints="lg" class="min-col footable-first-visible" style="display: table-cell;">#</th>
                                    <th data-v-05123fd1="" width="10%" style="display: table-cell;">Photo</th>
                                    <th data-v-05123fd1="" class="text-uppercase" style="display: table-cell;">Name</th>
                                    <th data-v-05123fd1="" data-breakpoints="lg" class="min-col text-uppercase text-center" style="display: table-cell;">Qty</th>
                                    <th data-v-05123fd1="" data-breakpoints="lg" class="min-col text-uppercase text-center" style="display: table-cell;">Price</th>
                                    <th data-v-05123fd1="" data-breakpoints="lg" class="min-col text-uppercase text-center footable-last-visible" style="display: table-cell;">Total</th>
                                  </tr>
                                </thead>
                                <tbody data-v-05123fd1="">
                                  <tr v-for="(product,index) in products" :key="index" data-v-05123fd1="">
                                    <td data-v-05123fd1="" class="footable-first-visible" style="display: table-cell;">1</td>
                                    <td data-v-05123fd1="" style="display: table-cell;">
                                      <img data-v-05123fd1="" height="50" :src="'/frontend/product_images/' + product.image">
                                    </td>
                                    <td data-v-05123fd1="" style="display: table-cell;">
                                      <strong data-v-05123fd1="">{{product.proName}}</strong>
                                      <br data-v-05123fd1="">
                                      <small data-v-05123fd1="">Size: {{ product.sizeName }}</small>
                                      <br data-v-05123fd1="">
                                      <small data-v-05123fd1="">Toppings: {{ product.topingNames }} </small>
                                      <br data-v-05123fd1="">
                                    </td>
                                    <td data-v-05123fd1="" class="text-center" style="display: table-cell;">{{product.quantity}}</td>
                                    <td data-v-05123fd1="" class="text-center" style="display: table-cell;">{{product.price}}</td>
                                    <td data-v-05123fd1="" class="text-center footable-last-visible" style="display: table-cell;">{{product.total_price}}</td>
                                  </tr>
                                </tbody>
                              </table>
                            </div>
                          </div>
                          <div data-v-05123fd1="" class="clearfix float-right" style="width: 300px; float: right;">
                            <table data-v-05123fd1="" class="table">
                              <tbody data-v-05123fd1="">
                                <tr data-v-05123fd1="">
                                  <td data-v-05123fd1="">
                                    <strong data-v-05123fd1="" class="text-muted">Sub Total :</strong>
                                  </td>
                                  <td data-v-05123fd1="">175210 </td>
                                </tr>
                                <tr data-v-05123fd1="">
                                  <td data-v-05123fd1="">
                                    <strong data-v-05123fd1="" class="text-muted">Shipping :</strong>
                                  </td>
                                  <td data-v-05123fd1=""> 0.000€ </td>
                                </tr>
                                <!--v-if-->
                                <tr data-v-05123fd1="">
                                  <td data-v-05123fd1="">
                                    <strong data-v-05123fd1="" class="text-muted">Total :</strong>
                                  </td>
                                  <td data-v-05123fd1="" class="text-muted h5">175210 </td>
                                </tr>
                              </tbody>
                            </table>
                            <div data-v-05123fd1="" class="no-print text-right">
                              <a data-v-05123fd1="" href="" type="button" class="btn btn-icon btn-light">
                                <i data-v-05123fd1="" class="las la-print"></i>
                              </a>
                            </div>
                          </div>
                        </div>                       
                      </div>
                    </div>
                  </div>
                </div>
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
import 'swiper/css';
import { getBaseCurrencySymbol } from '../helpers.js';
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
export default {
    name: 'home',
    components: {

    },
     data(){
        return{
            isAuth:'',
            baseCurrencySymbol: '',
            formData: {
                name: '',
                email: ''
            },
            password: '',
            newPassword: '',
            confirmNewPassword: '',
            errorMessage: '',
            orderStatuses:'',
            orders:'',
            isModalOpen:false,
            dynamicDisplay:'none',
            auth:true,
            orderDetails:false,
            products:'',
            productDetails:'',
            user:''
        }
    },
    created (){


    },
    mounted(){
        var auth = localStorage.getItem('auth');
        if(auth != null) {
            this.isAuth = JSON.parse(auth);
        }

        this.formData.name = this.isAuth.name;
        this.formData.email = this.isAuth.email;
        this.myOrders();
        this.getOrderStatus();
    },
    methods: {
        logout() {                    
            localStorage.setItem('auth', null);         
            this.$router.push({ name: 'home' }); 
            this.updateHeaderAfterLogout();
        },
        updateHeaderAfterLogout() {
          this.emitter.emit('updateHeaderAfterLogout', {'updateHeaderAfterLogout': '1'})
        },
        submitForm() {
            axios.post('admin/update-customer-data', {
                name: this.formData.name,
                email: this.formData.email,
                password: this.password,
                newPassword: this.newPassword,
                confirmNewPassword: this.confirmNewPassword,
                })
                .then(response => {
                  console.log(response.data);
                  localStorage.setItem('auth', JSON.stringify(response.data.user));
                  toast.success('Update Success', {
                        timeout: 3000 // Optional: Time in milliseconds before the toast auto-closes
                   });
                })
                .catch(error => {
                    console.log(error.response);
                // Handle validation errors
                if (error.response && error.response.data && error.response.data.errors) {
                    const errors = error.response.data.errors;
                    this.errorMessage = Object.values(errors)[0][0]; // Set error message to the first error
                } else {
                    this.errorMessage = 'An error occurred while updating user data.';
                }
            });
            },
             getOrderStatus() {            
                axios.get('get-order-status')
                .then((res)=>{               
                    this.orderStatuses = res.data;
                })
                .catch((err)=>{
                    console.log(err);
                })
                
            } ,
            myOrders() {            
                axios.get('get-my-orders')
                .then((res)=>{      
                  // console.log(res.data)                          
                   this.orders = res.data;
                })
                .catch((err)=>{
                    console.log(err);
                })
                
            },
              formatCreatedAt(dateString) {
                const date = new Date(dateString);
                const options = {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    second: 'numeric',
                    timeZoneName: 'short',
                };

                return date.toLocaleDateString('en-US', options);
            },   
            handleModalOpen(orderNumber) {   
               axios.get('order-info', {
                    params: {
                        orderNumber: orderNumber
                    }
                })
                .then((res)=>{      
                  if(res.data.message == 'success') {
                    this.isModalOpen = true;
                    this.dynamicDisplay = 'block';
                      this.products = res.data.products;
                      this.productDetails = res.data.orderDetails;
                      this.user = res.data.user;
                  }
                  console.log(res.data)                                           
                })
                .catch((err)=>{
                    console.log(err);
                })                                    
            },
            handleModalClose() {
                this.isModalOpen = false;
                this.dynamicDisplay = 'none';
            },
            orderDetailsInfo() {                
              var auth = localStorage.getItem('auth');
              this.auth = auth ? JSON.parse(auth) : null;
              this.orderDetails = true;
            }           
        }

};
</script>
