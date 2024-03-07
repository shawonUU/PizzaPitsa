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
                                                        <td><a href="#" @click="orderDetailsInfo" class="axil-btn view-btn">View</a></td>
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
    <div v-if="orderDetails">                
                <div class="row">
                    <div class="col-12">
                        <h3>Order Details</h3>
                        <div class="page-content">
                          <div class="container-fluid">          
                            <div class="aiz-main-content">
                                <div class="">
                                <div class="card">
                                  <div class="card-body">         
                                    <div class="row gutters-5">
                                      <div class="col-6">
                                        <strong>Delivery Address Info</strong>
                                        <hr>
                                        <address>                                 
                                            <div class="d-flex justify-content-between">
                                              <div>
                                                <strong class="text-main"> Name: {{auth.name}}</strong>
                                              </div>
                                            </div>                
                                          <!-- <br> Email: {{auth.email}}<br> 
                                          Selected Address: {{selectedAddress}}<br> 
                                          Entrance: {{entrance}}<br> 
                                          Door Code: {{doorCode}}<br> 
                                          Floor: {{floor}}<br> 
                                          Apartment: {{apartment}}<br> 
                                          Comment: {{addressComment}}<br>  -->
                                        </address>
                                      </div>
                                      <div class="col-md-6">
                                        <strong>Order Info</strong>
                                        <hr>
                                        <table>
                                          <tbody>
                                            <tr>
                                              <td class="text-main text-bold">Order Type</td>
                                              <td class="text-main text-bold">
                                                {{ orderType==1 ? 'Delivery' : 'Dine in or Pickup' }}                          
                                              </td>                    
                                            </tr>
                                            
                                            <tr>
                                              <td class="text-main text-bold">Order date </td>
                                              <td class="text-right">March 3, 2024 at 5:32 PM</td>
                                            </tr>
                                            <tr>
                                              <td class="text-main text-bold"> Total amount </td>
                                              <td class="text-right">48.450€</td>
                                            </tr>          
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    <hr class="new-section-sm bord-no">
                                    

                                    <div class="row">
                                      <div class="col-lg-12 table-responsive">
                                        <table class="table-bordered aiz-table invoice-summary table footable footable-1 breakpoint-xl" style="">
                                          <thead>
                                            <tr class="bg-trans-dark footable-header">
                                              <th data-breakpoints="lg" class="min-col footable-first-visible" style="display: table-cell;">#</th>
                                              <th width="10%" style="display: table-cell;">Photo</th>
                                              <th class="text-uppercase" style="display: table-cell;">Name</th>                  
                                              <th data-breakpoints="lg" class="min-col text-uppercase text-center" style="display: table-cell;">Qty</th>
                                              <th data-breakpoints="lg" class="min-col text-uppercase text-center" style="display: table-cell;">Price</th>
                                              <th data-breakpoints="lg" class="min-col text-uppercase text-center footable-last-visible" style="display: table-cell;">Total</th>
                                            </tr>
                                          </thead>
                                          <tbody>
                                            <template v-for="(productSizes, productId) in cart" :key="productId">
                                              <template v-if="cart.hasOwnProperty(productId)">
                                                  <template v-for="(item, sizeId) in productSizes" :key="sizeId">
                                                    <tr>
                                                      <td class="footable-first-visible" style="display: table-cell;">1</td>
                                                      <td style="display: table-cell;">                     
                                                          <img height="50" :src="'/frontend/product_images/' + item.product.image">                     
                                                      </td>
                                                      <td style="display: table-cell;">
                                                        <strong> {{ item.product.name }}</strong>
                                                        <br>
                                                        <small>Size:  {{ item.size.name }} </small>
                                                        <br>
                                                        <small>Toppings: 
                                                          <template  v-for="(toping, topingId) in item.topings" :key="topingId">
                                                            <template v-if="toping">
                                                                {{ toping.name }}({{ toping.price }}),
                                                            </template>
                                                          </template>
                                                        </small>
                                                        <br>                  
                                                      </td>                   
                                                      <td class="text-center" style="display: table-cell;"> {{ item.quantity }} </td>
                                                      <td class="text-center" style="display: table-cell;"> {{ item.size.price }}{{ baseCurrencySymbol }}</td>
                                                      <td class="text-center footable-last-visible" style="display: table-cell;"> {{ item.totalPrice }}{{ baseCurrencySymbol }} </td>
                                                    </tr>    
                                                  </template>
                                                </template>
                                            </template>       
                                          </tbody>
                                        </table>
                                      </div>
                                    </div>
                                    <div class="clearfix float-right" style="width: 300px; float:right">
                                      <table class="table">
                                        <tbody>
                                          <tr>
                                            <td>
                                              <strong class="text-muted">Sub Total :</strong>
                                            </td>
                                            <td>{{ subTotal }} {{ baseCurrencySymbol }} </td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <strong class="text-muted">Shipping :</strong>
                                            </td>
                                            <td> 0.000€ </td>
                                          </tr>
                                          <tr v-if="discount">
                                            <td>
                                              <strong class="text-muted">Coupon :</strong>
                                            </td>
                                            <td>{{discount}} {{baseCurrencySymbol}}</td>
                                          </tr>
                                          <tr>
                                            <td>
                                              <strong class="text-muted">Total :</strong>
                                            </td>
                                            <td class="text-muted h5">{{ grandTotal }} {{baseCurrencySymbol}} </td>
                                          </tr>
                                        </tbody>
                                      </table>
                                    
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
            auth:true,
            orderDetails:false,
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
            localStorage.removeItem('auth');          
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
                confirmNewPassword: this.confirmNewPassword
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
                console.log(res.data)
                    this.orderStatuses = res.data;
                })
                .catch((err)=>{
                    console.log(err);
                })
                
            } ,
            myOrders() {            
                axios.get('get-my-orders')
                .then((res)=>{
                console.log(res.data)
                    this.orders = res.data;
                })
                .catch((err)=>{
                    console.log(err);
                })
                
            } ,
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
            orderDetailsInfo() {                
              var auth = localStorage.getItem('auth');
              this.auth = auth ? JSON.parse(auth) : null;
                this.orderDetails = true;
            }           
        }

};
</script>
