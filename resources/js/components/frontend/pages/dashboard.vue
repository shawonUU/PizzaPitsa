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
                      <a
                        :class="
                          'nav-item nav-link ' + (tab == null ? 'active' : '')
                        "
                        data-bs-toggle="tab"
                        href="#nav-dashboard"
                        role="tab"
                        aria-selected="false"
                        tabindex="-1"
                        ><i class="fas fa-th-large"></i>Dashboard</a
                      >
                      <a
                        :class="
                          'nav-item nav-link ' +
                          (tab == 'orders' ? 'active' : '')
                        "
                        data-bs-toggle="tab"
                        href="#nav-orders"
                        role="tab"
                        aria-selected="false"
                        tabindex="-1"
                        ><i class="fas fa-shopping-basket"></i>Orders</a
                      >
                      <!-- <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-downloads" role="tab" aria-selected="false" tabindex="-1"><i class="fas fa-file-download"></i>Downloads</a>
                                        <a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-address" role="tab" aria-selected="false" tabindex="-1"><i class="fas fa-home"></i>Addresses</a> -->
                      <a
                        class="nav-item nav-link"
                        data-bs-toggle="tab"
                        href="#nav-account"
                        role="tab"
                        aria-selected="true"
                        ><i class="fas fa-user"></i>Account Details</a
                      >
                      <a
                        class="nav-item nav-link"
                        data-bs-toggle="tab"
                        href="#nav-password"
                        role="tab"
                        aria-selected="true"
                        ><i class="fa fa-key"></i>Password</a
                      >
                      <a
                        class="nav-item nav-link"
                        style="cursor: pointer"
                        @click="logout"
                        aria-selected="false"
                        tabindex="-1"
                        role="tab"
                        ><i class="fal fa-sign-out"></i>Logout</a
                      >
                    </div>
                  </nav>
                </aside>
              </div>
              <div class="col-xl-9 col-md-8">
                <div class="tab-content">
                  <div
                    :class="
                      'tab-pane fade ' + (tab == null ? 'show active' : '')
                    "
                    id="nav-dashboard"
                    role="tabpanel"
                  >
                    <div class="axil-dashboard-overview">
                      <div class="welcome-text">
                        {{ isAuth.name }} (not <span>{{ isAuth.name }}?</span>
                        <a style="cursor: pointer" @click="logout">Log Out</a>)
                      </div>
                      <p>
                        From your account dashboard you can view your recent
                        orders, manage your shipping and billing addresses, and
                        edit your password and account details.
                      </p>
                    </div>
                  </div>

                  <div
                    :class="
                      'tab-pane fade ' + (tab == 'orders' ? 'show active' : '')
                    "
                    id="nav-orders"
                    role="tabpanel"
                  >
                    <div class="axil-dashboard-order">
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Order</th>
                              <th>Date&Time</th>
                              <th>Payment Status</th>
                              <th style="width: 10px">Status</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(order, index) in orders" :key="index">
                              <th scope="row">#{{ order.order_number }}</th>
                              <td>{{ formatCreatedAt(order.created_at) }}</td>
                              <td>
                                {{ order.is_paid == 0 ? "Unpaid" : "Paid" }}
                              </td>
                              <td style="width: 10px">
                                {{
                                  order.order_status == "1"
                                    ? "Pending"
                                    : order.order_status == "2"
                                    ? "Processing"
                                    : order.order_status == "3"
                                    ? "Shipped"
                                    : order.order_status == "4"
                                    ? "Out for Delivery"
                                    : order.order_status == "5"
                                    ? "Delivered"
                                    : order.order_status == "6"
                                    ? "Canceled"
                                    : order.order_status == "7"
                                    ? "Refunded"
                                    : order.order_status == "8"
                                    ? "On Hold"
                                    : order.order_status == "9"
                                    ? "Backordered"
                                    : order.order_status == "10"
                                    ? "Returned"
                                    : "Unknown"
                                }}
                              </td>
                              <td style="width: 10px">
                                <a
                                  href="javascript:void(0)"
                                  @click="handleModalOpen(order.order_number)"
                                  class="axil-btn view-btn"
                                  >View</a
                                >
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="nav-account" role="tabpanel">
                    <div class="col-lg-9">
                      <div class="axil-dashboard-account">
                        <div
                          v-if="errorMessage"
                          class="alert alert-danger"
                          role="alert"
                        >
                          {{ errorMessage }}
                        </div>
                        <form
                          class="account-details-form"
                          @submit.prevent="submitForm"
                        >
                          <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label>Name</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  v-model="formData.name"
                                  placeholder="Name"
                                />
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label>Email</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  v-model="formData.email"
                                  placeholder="Email"
                                />
                              </div>
                              <div class="form-group">
                                <label>Phone</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  v-model="formData.phone"
                                  placeholder="Phone"
                                />
                              </div>
                              <div class="form-group">
                                <label>Address</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  v-model="formData.address"
                                  placeholder="Address"
                                />
                              </div>
                            </div>
                            <div class="col-12">
                              <!-- <h5 class="title">Password Change</h5>
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
                                            </div> -->
                              <div class="form-group mb--0">
                                <input
                                  type="submit"
                                  class="axil-btn"
                                  value="Save Changes"
                                />
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div
                    class="tab-pane fade active"
                    id="nav-password"
                    role="tabpanel"
                  >
                    <div class="col-lg-9">
                      <div class="axil-dashboard-password">
                        <div
                          v-if="errorMessage"
                          class="alert alert-danger"
                          role="alert"
                        >
                          {{ errorMessage }}
                        </div>
                        <form
                          class="password-form"
                          @submit.prevent="submitFormPassword"
                        >
                          <div class="row">
                            <div class="col-12">
                              <h5 class="title">Password Change</h5>
                              <div class="form-group">
                                <label>Password</label>
                                <input
                                  type="password"
                                  class="form-control"
                                  v-model="password"
                                  placeholder="Old Password"
                                />
                              </div>
                              <div class="form-group">
                                <label>New Password</label>
                                <input
                                  type="password"
                                  class="form-control"
                                  v-model="newPassword"
                                  placeholder="New Password"
                                />
                              </div>
                              <div class="form-group">
                                <label>Confirm New Password</label>
                                <input
                                  type="password"
                                  class="form-control"
                                  v-model="confirmNewPassword"
                                  placeholder="Confirm Password"
                                />
                              </div>
                              <div class="form-group mb--0">
                                <input
                                  type="submit"
                                  class="axil-btn"
                                  value="Save Changes"
                                />
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
    <div
      :class="{ 'modal fade quick-view-product': true, show: isModalOpen }"
      class=" "
      id="quick-view-modal"
      tabindex="-1"
      aria-modal="true"
      role="dialog"
      :style="{ 'padding-right': '17px', display: dynamicDisplay }"
    >
      <div class="modal-dialog modal-dialog-centered" style="max-width: 80%">
        <div class="modal-content">
          <div class="modal-body" style="padding-top: 0px; padding-right: 13px">
            <div class="d-flex justify-content-end pt-3">
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
                style="height: 5px; width: 5px; margin-bottom: 15px"
                @click="handleModalClose"
              ></button>
            </div>
            <!--v-if-->
            <!--v-if-->
            <!--v-if-->
            <div>
              <div class="row">
                <h3>
                  Order Details of #
                  <span style="color: #e76458">{{
                    productDetails.order_number
                  }}</span>
                </h3>
                <div class="row">
                  <div class="col-lg-6 col-sm-12 col-xsm-12">
                    <strong style="color: #000">Delivery Address Info</strong>
                    <hr />
                    <address>
                      <div class="d-flex justify-content-between">
                        <div>
                          <strong class="text-main">
                            Name: {{ productDetails.name }}</strong
                          >
                        </div>
                      </div>
                      <br />
                      Email: {{ productDetails.email }} <br />
                      Selected Address: {{ productDetails.selectedAddress }}
                      <br />
                      Entrance: {{ productDetails.entrance }} <br />
                      Door Code: {{ productDetails.door_code }} <br />
                      Floor: {{ productDetails.floor }} <br />
                      Apartment: {{ productDetails.apartment }} <br />
                      Comment: {{ productDetails.comment }} <br />
                    </address>
                  </div>
                  <div class="col-lg-6 col-sm-12 col-xsm-12">
                    <strong style="color: #000">Order Info</strong>
                    <hr />
                    <table>
                      <tbody>
                        <tr>
                          <td class="text-main text-bold">Order Type</td>
                          <td class="text-main text-bold">
                            <span v-if="productDetails.type === '1'"
                              >Home Delivery</span
                            >
                            <span v-else>Dine in or Pickup</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-main text-bold">Order Status</td>
                          <td class="text-main text-bold">
                            <span>{{
                              orderStatuses[productDetails.order_status]
                            }}</span>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-main text-bold">Order date</td>
                          <td class="text-right">
                            {{ formatCreatedAt(productDetails.created_at) }}
                          </td>
                        </tr>
                        <tr>
                          <td class="text-main text-bold">Total amount</td>
                          <td class="text-right">
                            {{ productDetails.total_amount }}€
                          </td>
                        </tr>
                        <tr>
                          <td class="text-main text-bold">Paid Amount</td>
                          <td class="text-right">
                            {{ productDetails.paid_amount }}€
                          </td>
                        </tr>
                        <tr>
                          <td class="text-main text-bold">Payment Status</td>
                          <td class="text-right">
                            {{
                              productDetails.is_paid == 0 ? "Unpaid" : "Paid"
                            }}
                          </td>
                        </tr>
                        <tr>
                          <td class="text-main text-bold">Payment Type</td>
                          <td class="text-right">
                            {{
                              productDetails.payment_type == 1
                                ? "Cash on delivery"
                                : "Online Payment"
                            }}
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 table-responsive">
                    <table
                      class="table-bordered aiz-table invoice-summary table footable footable-1 breakpoint-xl"
                    >
                      <thead>
                        <tr class="bg-trans-dark footable-header">
                          <th
                            data-breakpoints="lg"
                            class="min-col footable-first-visible"
                            style="display: table-cell"
                          >
                            #
                          </th>
                          <th width="10%" style="display: table-cell">Photo</th>
                          <th
                            class="text-uppercase"
                            style="display: table-cell"
                          >
                            Name
                          </th>
                          <th
                            data-breakpoints="lg"
                            class="min-col text-uppercase text-center"
                            style="display: table-cell"
                          >
                            Qty
                          </th>
                          <th
                            data-breakpoints="lg"
                            class="min-col text-uppercase text-center"
                            style="display: table-cell"
                          >
                            P.Price
                          </th>
                          <th
                            data-breakpoints="lg"
                            class="min-col text-uppercase text-center"
                            style="display: table-cell"
                          >
                            T.P Price
                          </th>
                          <th
                            data-breakpoints="lg"
                            class="min-col text-uppercase text-center"
                            style="display: none;"
                          >
                            T.O Price
                          </th>
                          <th
                            data-breakpoints="lg"
                            class="min-col text-uppercase text-center"
                            style="display: table-cell"
                          >
                            T.T Price
                          </th>
                          <th
                            data-breakpoints="lg"
                            class="min-col text-uppercase text-center footable-last-visible"
                            style="display: table-cell"
                          >
                            Total Price
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr v-for="(product, index) in products" :key="index">
                          <td
                            class="footable-first-visible"
                            style="display: table-cell"
                          >
                            1
                          </td>
                          <td style="display: table-cell">
                            <img
                              height="50"
                              :src="'/frontend/product_images/' + product.image"
                            />
                          </td>
                          <td style="display: table-cell">
                            <strong>{{ product.proName }}</strong>
                            <br />
                            <small>Size: {{ product.sizeName }}</small>
                            <br />
                            <small>Options: {{ product.optionNames }} </small
                            ><br />
                            <small>Toppings: {{ product.topingNames }} </small
                            ><br />
                            <small
                              >Remove Tags: (-){{ product.tagNames }}
                            </small>
                            <br />
                          </td>
                          <td
                            class="text-center"
                            style="display: table-cell; text-align: right"
                          >
                            {{ product.quantity }}
                          </td>
                          <td
                            class="text-center"
                            style="display: table-cell; text-align: right"
                          >
                            {{ product.price }}{{ baseCurrencySymbol }}
                          </td>
                          <td
                            class="text-center"
                            style="display: table-cell; text-align: right"
                          >
                            {{ product.price * product.quantity
                            }}{{ baseCurrencySymbol }}
                          </td>
                          <td
                            class="text-center"
                            style="display: none; text-align: right"
                          >
                            {{ product.option_price * 1
                            }}{{ baseCurrencySymbol }}
                          </td>
                          <td
                            class="text-center"
                            style="display: table-cell; text-align: right"
                          >
                            {{ (product.toping_price * 1) + (product.option_price * 1)
                            }}{{ baseCurrencySymbol }}
                          </td>
                          <td
                            class="text-center footable-last-visible"
                            style="display: table-cell; text-align: right"
                          >
                            {{
                              product.price * product.quantity +
                              product.toping_price * 1 +
                              product.option_price * 1
                            }}{{ baseCurrencySymbol }}
                          </td>
                        </tr>
                        <tr
                          v-if="
                            productDetails.delivery_charge * 1 > 0 ||
                            productDetails.discount * 1 > 0
                          "
                        >
                          <td colspan="8" style="text-align: right">
                            Sub Total :
                          </td>
                          <td style="text-align: center">
                            {{ productDetails.sub_total }}{{ baseCurrencySymbol }}
                          </td>
                        </tr>
                        <tr v-if="productDetails.delivery_charge * 1 > 0">
                          <td colspan="8" style="text-align: right">
                            Shipping :
                          </td>
                          <td style="text-align: center">
                            {{ productDetails.delivery_charge
                            }}{{ baseCurrencySymbol }}
                          </td>
                        </tr>
                        <tr v-if="productDetails.discount * 1 > 0">
                          <td colspan="8" style="text-align: right">
                            Discount :
                          </td>
                          <td style="text-align: center">
                            {{ productDetails.discount
                            }}{{ baseCurrencySymbol }}
                          </td>
                        </tr>
                        <tr v-if="productDetails.paid_amount * 1 ">
                          <td colspan="8" style="text-align: right">Total :</td>
                          <td style="text-align: center">
                            {{ productDetails.paid_amount
                            }}{{ baseCurrencySymbol }}
                          </td>
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
  <div
    class="modal fade quick-view-product show"
    id="quick-view-modal"
    tabindex="-1"
    aria-modal="true"
    role="dialog"
    style="display: block"
    v-if="showVerificationModal"
  >
    <div class="modal-dialog modal-dialog-centered" style="max-width: 500px">
      <div class="modal-content">
        <div class="modal-body" style="padding-top: 0px; padding-right: 13px">
          <div class="d-flex justify-content-end pt-3">
            <button
              type="button"
              class="btn-close"
              style="height: 5px; width: 5px; margin-bottom: 15px"
              data-bs-dismiss="modal"
              aria-label="Close"
              @click="handleButtonClick"
            ></button>
          </div>
          <div>
            <h4 class="text-center m-0 p-0">Verification</h4>
            <p class="text-center m-0 p-0">
              Sent verification code again?
              <a
                class="text-center m-0 p-0"
                href="javascript:void(0)"
                @click="sentVerificationMail()"
                ><u>Sent</u></a
              >
            </p>
            <div class="row">
              <div class="col-12">
                <p
                  v-if="verificationError != ''"
                  style="
                    text-align: center;
                    color: white;
                    padding: 5px;
                    background: red;
                    opacity: 0.5;
                  "
                  v-html="verificationError"
                ></p>
                <p
                  v-if="verificationMessage != ''"
                  style="
                    text-align: center;
                    color: white;
                    padding: 5px;
                    background: green;
                    opacity: 0.5;
                  "
                  v-html="verificationMessage"
                ></p>
              </div>
              <div class="col-12">
                <label for="name" class="form-label">Verification Code</label>
                <input
                  type="text"
                  style="height: 40px; padding: 5px; border: 1px solid #cfcbcb"
                  class="form-control"
                  id="verification_code"
                  name="verification_code"
                  placeholder="Code"
                />
              </div>
              <div class="col-12 mt-3">
                <div class="d-flex justify-content-end">
                  <button
                    @click="verifyAndUpdateMail()"
                    type="button"
                    class="btn btn-primary p-2"
                    style="font-size: 12px; width: 15%"
                  >
                    Verify
                  </button>
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
import axios from "axios";
import "swiper/css";
import { getBaseCurrencySymbol } from "../helpers.js";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";
export default {
  name: "home",
  components: {},
  data() {
    return {
      isAuth: "",
      baseCurrencySymbol: "",
      formData: {
        name: "",
        email: "",
        phone: "",
        address: "",
      },
      password: "",
      newPassword: "",
      confirmNewPassword: "",
      errorMessage: "",
      orderStatuses: "",
      orders: "",
      isModalOpen: false,
      dynamicDisplay: "none",
      auth: true,
      orderDetails: false,
      products: "",
      productDetails: "",
      user: "",
      loading: true,
      shippingCostAmount: 0,
      verificationError: "",
      verificationMessage: "",
      showVerificationModal: false,
      tab: null,
    };
  },
  created() {
    this.tab = this.$route.query.tab;
  },
  mounted() {
    var auth = localStorage.getItem("auth");
    if (auth != null) {
      this.isAuth = JSON.parse(auth);
    }
    this.formData.name = this.isAuth.name;
    this.formData.email = this.isAuth.email;
    this.formData.phone = this.isAuth.phone;
    this.formData.address = this.isAuth.address;
    this.myOrders();
    this.getOrderStatus();
    this.fetchBaseCurrencySymbol();
    this.fetchShippingCost();
  },
  methods: {
    handleButtonClick() {
      this.showVerificationModal = false;
    },
    logout() {
      localStorage.setItem("auth", null);
      this.$router.push({ name: "home" });
      this.updateHeaderAfterLogout();
    },
    updateHeaderAfterLogout() {
      this.emitter.emit("updateHeaderAfterLogout", {
        updateHeaderAfterLogout: "1",
      });
    },
    submitForm() {
      axios
        .post("frontend/update-customer-data", {
          name: this.formData.name,
          email: this.formData.email,
          phone: this.formData.phone,
          address: this.formData.address,
          // password: this.password,
          // newPassword: this.newPassword,
          // confirmNewPassword: this.confirmNewPassword,
        })
        .then((response) => {
          console.log(response.data);
          if (response.data.updateStatus == "email") {
            this.showVerificationModal = true;
          } else {
            localStorage.setItem("auth", JSON.stringify(response.data.user));
            toast.success("Update Success", {
              timeout: 3000, // Optional: Time in milliseconds before the toast auto-closes
            });
          }
        })
        .catch((error) => {
          // console.log(error.response);
          // Handle validation errors
          if (
            error.response &&
            error.response.data &&
            error.response.data.errors
          ) {
            const errors = error.response.data.errors;
            this.errorMessage = Object.values(errors)[0][0]; // Set error message to the first error
          } else {
            this.errorMessage = "An error occurred while updating user data.";
          }
        });
    },
    verifyAndUpdateMail() {
      var code = document.getElementById("verification_code").value.trim();
      this.verificationError = "";
      if (code == "") {
        this.verificationError = "Verification code is required";
        return;
      }
      axios
        .post("frontend/verify-and-update-mail", {
          name: this.formData.name,
          email: this.formData.email,
          code: code,
        })
        .then((res) => {
          this.verificationError = "";
          this.verificationMessage = "";
          if (res.data.success) {
            // this.verificationMessage =  res.data.message;
            localStorage.setItem("auth", JSON.stringify(res.data.user));
            this.handleButtonClick();
            //Toaster
            toast.success("Update Success", {
              timeout: 3000, // Optional: Time in milliseconds before the toast auto-closes
            });
          } else {
            this.verificationError = res.data.message;
          }
        })
        .catch((err) => {
          console.log(err);
        });
    },
    submitFormPassword() {
      axios
        .post("frontend/update-customer-password", {
          password: this.password,
          newPassword: this.newPassword,
          confirmNewPassword: this.confirmNewPassword,
        })
        .then((response) => {
          console.log(response.data);
          localStorage.setItem("auth", JSON.stringify(response.data.user));
          toast.success("Password update success", {
            timeout: 3000,
          });
          this.password = "";
          this.newPassword = "";
          this.confirmNewPassword = "";
        })
        .catch((error) => {
          if (
            error.response &&
            error.response.data &&
            error.response.data.errors
          ) {
            const errors = error.response.data.errors;
            this.errorMessage = Object.values(errors)[0][0]; // Set error message to the first error
          } else {
            this.errorMessage = "An error occurred while updating user data.";
          }
        });
    },
    getOrderStatus() {
      axios
        .get("get-order-status")
        .then((res) => {
          this.orderStatuses = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    myOrders() {
      axios
        .get("get-my-orders")
        .then((res) => {
          console.log(res.data);
          this.orders = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    formatCreatedAt(dateString) {
      const date = new Date(dateString);
      const options = {
        year: "numeric",
        month: "long",
        day: "numeric",
        hour: "numeric",
        minute: "numeric",
        second: "numeric",
        timeZoneName: "short",
      };

      return date.toLocaleDateString("en-US", options);
    },
    handleModalOpen(orderNumber) {
      document.body.classList.add("modal-open");
      axios
        .get("order-info", {
          params: {
            orderNumber: orderNumber,
          },
        })
        .then((res) => {
          if (res.data.message == "success") {
            console.log(res.data);
            this.isModalOpen = true;
            this.dynamicDisplay = "block";
            this.products = res.data.products;
            this.productDetails = res.data.orderDetails;
            this.user = res.data.user;
            this.loading = false;

            this.productDetails.paid_amount = this.productDetails.paid_amount.toFixed(2);
            this.productDetails.delivery_charge = this.productDetails.delivery_charge.toFixed(2);
            this.productDetails.discount = this.productDetails.discount.toFixed(2);
            this.productDetails.sub_total = ((this.productDetails.paid_amount * 1) + (this.productDetails.discount * 1) - (this.productDetails.delivery_charge * 1)).toFixed(2);
          }
          console.log(res.data);
        })
        .catch((err) => {
          console.log(err);
        });
    },
    handleModalClose() {
      this.isModalOpen = false;
      this.dynamicDisplay = "none";
      document.body.classList.remove("modal-open");
    },
    orderDetailsInfo() {
      var auth = localStorage.getItem("auth");
      this.auth = auth ? JSON.parse(auth) : null;
      this.orderDetails = true;
    },
    async fetchBaseCurrencySymbol() {
      try {
        this.baseCurrencySymbol = await getBaseCurrencySymbol();
      } catch (error) {
        // Handle error (e.g., show an error message)
        console.error(
          "Error fetching base currency symbol in component:",
          error
        );
      }
    },
    fetchShippingCost() {
      axios
        .get("get-delivery-charge")
        .then((res) => {
          this.shippingCostAmount = res.data.amount;
        })
        .catch((err) => {
          console.log(err);
        });
    },
  },
  computed: {
    subtotal() {
      if (this.loading) return 0;
      const subtotal = this.products.reduce((total, product) => {
        return (
          total +
          product.price * product.quantity +
          product.toping_price * product.quantity
        );
      }, 0);

      // Parse the subtotal as a float
      const parsedSubtotal = parseFloat(subtotal);

      // Check if parsedSubtotal is a valid number
      if (!isNaN(parsedSubtotal) && isFinite(parsedSubtotal)) {
        // If valid number, return the parsed value
        return parsedSubtotal;
      } else {
        // If not a valid number, return 0 or handle accordingly
        return 0; // or any other fallback value
      }
    },

    total() {
      return this.subtotal + this.shippingCostAmount;
    },
  },
};
</script>
<style scoped>
@media only screen and (max-width: 768px) {
  .modal-dialog {
    max-width: 100% !important;
  }
}
.axil-dashboard-order .table thead th {
  padding: 0px 0px !important;
}
.modal {
  display: none;
  position: fixed;
  z-index: 1000; /* Ensure modal appears on top of overlay */
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  background-color: #0000009e;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

.modal-content {
  position: relative;
}

.close {
  position: absolute;
  top: 0;
  right: 0;
  cursor: pointer;
  padding: 5px;
}

.modal-overlay {
  position: fixed;
  z-index: 999; /* Ensure overlay appears behind modal */
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
}
.axil-dashboard-order .table tbody .view-btn {
  padding: 0px 20px;
}
body {
  overflow-y: scroll;
}

body.modal-open {
  overflow: hidden !important;
}
td,
.wp-block-calendar tfoot td {
  border: 1px solid var(--color-border);
  padding: 1px 3px;
}
</style>