<template>
    <div
      class="modal fade quick-view-product show"
      id="quick-view-modal"
      tabindex="-1"
      aria-modal="true"
      role="dialog"
      style="padding-right: 17px; display: block"
    >

      <div class="modal-dialog modal-dialog-centered" style="max-width: 500px;">
        <div class="modal-content">
          <div class="modal-body" style="padding-top: 0px; padding-right: 13px;">
            <div class="d-flex justify-content-end pt-3">
                <button type="button" class="btn-close" style="height:5px; width:5px; margin-bottom: 15px;" data-bs-dismiss="modal" aria-label="Close" @click="handleButtonClick">

                </button>
            </div>
            <div v-if="signInSection">
                <h4 class="text-center m-0 p-0">Sign In</h4>
                <p class="text-center m-0 p-0"><b>or</b> Create a new account? <a class="text-center m-0 p-0"  href="javascript:void(0)" @click="showSignUp()"><u>Sign Up</u></a> </p>
                <div class="row">
                    <div class="col-12">
                        <p v-if="signInDataError!=''" style="text-align:center; color:white; padding:5px; background:red; opacity: 0.5;" v-html="signInDataError">
                        </p>
                    </div>
                    <div class="col-12">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" style="height: 40px; padding:5px;border: 1px solid #cfcbcb;" class="form-control" id="email" name="email" placeholder="Email">
                    </div>
                    <div class="col-12">
                        <label for="name" class="form-label">Password</label>
                        <input type="password" style="height: 40px; padding:5px;border: 1px solid #cfcbcb;" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <div class="col-12 mt-3">
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary p-2" style="font-size: 12px; width: 15%;" @click="signIn()">Sign In</button>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="signUpSection">
                <h4 class="text-center m-0 p-0">Sign Up</h4>
                <p class="text-center m-0 p-0"><b>or</b> Already have an account? <a class="text-center m-0 p-0" @click="showSignIn()" href="javascript:void(0)"><u>Sign In</u></a> </p>

                <div class="row">
                    <div class="col-12">
                        <p v-if="signUpDataError!=''" style="text-align:center; color:white; padding:5px; background:red; opacity: 0.5;" v-html="signUpDataError">
                        </p>
                    </div>
                    <div class="col-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" style="height: 40px; padding:5px; border: 1px solid #cfcbcb;" class="form-control" id="new_name" name="new_name" placeholder="Name">
                    </div>
                    <div class="col-12">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" style="height: 40px; padding:5px; border: 1px solid #cfcbcb;" class="form-control"  id="new_email" name="new_email" placeholder="Email">
                    </div>
                    <div class="col-12">
                        <label for="name" class="form-label">Password</label>
                        <input type="password" style="height: 40px; padding:5px;border: 1px solid #cfcbcb;" class="form-control" id="new_password" name="new_password" placeholder="Password">
                    </div>
                    <div class="col-12 mt-3">
                        <div class="d-flex justify-content-end">
                            <button @click="signUp()" type="button" class="btn btn-primary p-2" style="font-size: 12px; width: 15%;">Sign Up</button>
                        </div>
                    </div>
                </div>

                <div style="margin-top:60px;">
                    <p style="display:block;text-align:center; margin:0;"><span class="social-label">Or login with</span></p>
                    <div class="social-login d-flex justify-content-center" style="margin-top:20px;">

                        <ul class="socials">
                            <li><a href="#"><i style="margin: 2px; color: white; background: #3b5998; padding: 5px; border-radius: 15%;" class="flaticon-facebook"></i></a></li>
                            <li><a href="#"><i style="margin: 2px; color: white; background: #1da0f2; padding: 5px; border-radius: 15%;" class="flaticon-twitter"></i></a></li>
                            <li><a href="#"><i style="margin: 2px; color: white; background: #31aa52; padding: 5px; border-radius: 15%;" class="flaticon-google"><b>G</b></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div v-if="verificationSection">
                <h4 class="text-center m-0 p-0">Verification</h4>
                <p class="text-center m-0 p-0"> Sent verification code again? <a class="text-center m-0 p-0"  href="javascript:void(0)" @click="sentVerificationMail()"><u>Sent</u></a> </p>
                <div class="row">
                    <div class="col-12">
                        <p v-if="verificationError!=''" style="text-align:center; color:white; padding:5px; background:red; opacity: 0.5;" v-html="verificationError">
                        </p>
                        <p v-if="verificationMessage!=''" style="text-align:center; color:white; padding:5px; background:green; opacity: 0.5;" v-html="verificationMessage">
                        </p>
                    </div>
                    <div class="col-12">
                        <label for="name" class="form-label">Verification Code</label>
                        <input type="text" style="height: 40px; padding:5px;border: 1px solid #cfcbcb;" class="form-control" id="verification_code" name="verification_code" placeholder="Code">
                    </div>
                    <div class="col-12 mt-3">
                        <div class="d-flex justify-content-end">
                            <button @click="verify()" type="button" class="btn btn-primary p-2" style="font-size: 12px; width: 15%;">Verify</button>
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
      name: 'signup',
        props: {

        },
      data(){
          return{
            email:'',
            password:'',
            signInSection:true,
            signUpSection:false,
            verificationSection:false,
            signUpDataError:'',
            signInDataError:'',
            verificationError:'',
            verificationMessage:'',
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
        showSignUp(){
            this.signInSection = false;
            this.signUpSection = true;
            this.verificationSection = false;

        },
        showSignIn(){
            this.signInSection = true;
            this.signUpSection = false;
            this.verificationSection = false;
        },
        signUp(){
            var name = document.getElementById('new_name').value.trim();
            var email = document.getElementById('new_email').value.trim();
            var password = document.getElementById('new_password').value.trim();
            this.signUpDataError = '';

            if(name=='') {this.signUpDataError = 'Name is required';return;}
            if(email=='') {this.signUpDataError = 'Email is required';return;}
            if(password=='') {this.signUpDataError = 'Password is required'; return;}

            axios.post('customer-signUp', {
                name: name,
                email: email,
                password: password,
            })
            .then((res)=>{
                if(res.data.success){
                    this.signInSection = false;
                    this.signUpSection = false;
                    this.verificationSection = true;
                }else{
                    this.signUpDataError = res.data.message;
                }
            })
            .catch((err)=>{
                console.log(err);
            })
        },
        signIn(){
            var email = document.getElementById('email').value.trim();
            var password = document.getElementById('password').value.trim();
            this.signInDataError = '';
            if(email=='') {this.signInDataError = 'Email is required';return;}
            if(password=='') {this.signInDataError = 'Password is required'; return;}
            this.email = email;
            this.password = password;

            axios.post('customer-signIn', {
                email: email,
                password: password,
            })
            .then((res)=>{
                console.log(res.data);
                if(res.data.success){
                    // this.signInSection = false;
                    // this.signUpSection = false;
                    // this.verificationSection = true;
                }else{
                    if(res.data.isVerification){
                        this.verificationError = res.data.message;
                        this.signInSection = false;
                        this.signUpSection = false;
                        this.verificationSection = true;
                    }else{
                        this.signInDataError = res.data.message;
                        this.signInSection = true;
                        this.signUpSection = false;
                        this.verificationSection = false;
                    }
                }
            })
            .catch((err)=>{
                console.log(err);
            })
        },
        sentVerificationMail(){
            axios.post('send-verification-mail', {
                email: this.email,
                password: this.password,
            })
            .then((res)=>{
                console.log(res.data);
                this.signInSection = false;
                this.signUpSection = false;
                this.verificationSection = true;
                this.verificationError = '';
                this.verificationMessage = '';
                if(res.data.success){
                    this.verificationMessage =  res.data.message;
                }else{
                    this.verificationError = res.data.message;
                }
            })
            .catch((err)=>{
                console.log(err);
            })
        },
        verify(){

            var code = document.getElementById('verification_code').value.trim();
            this.verificationError = '';

            if(code=='') {this.verificationError = 'Verification code is required';return;}

            axios.post('verification-account', {
                email: this.email,
                password: this.password,
                code: code,
            })
            .then((res)=>{
                this.signInSection = false;
                this.signUpSection = false;
                this.verificationSection = true;
                this.verificationError = '';
                this.verificationMessage = '';
                if(res.data.success){
                    // this.verificationMessage =  res.data.message;
                    localStorage.setItem('auth', JSON.stringify(res.data.user));
                    this.handleButtonClick();
                }else{
                    this.verificationError = res.data.message;
                }
            })
            .catch((err)=>{
                console.log(err);
            })
        }
      }
  }
  </script>

  <style scoped>

.social-login {
  align-items: center;
  -moz-align-items: center;
  -webkit-align-items: center;
  -o-align-items: center;
  -ms-align-items: center;
  margin-top: 80px;
}
list-type-ulli, .socials {
  list-style-type: none;
  margin: 0;
  padding: 0;
}
.social-login, .socials {
  display: flex;
  display: -webkit-flex;
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
