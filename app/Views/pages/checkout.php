<?php $this->extend("layouts/app")?>
<?php $this->section("content")?>

<div class="page-wrapper"
    data-href="<?=base_url("cart/info")?>">
    <div class="d-flex align-items-center justify-content-center"
        style="height:25vh;background-color:#545252
    ;background-image:url(<?=base_url("assets/images/foods/hero3.jpg")?>);background-repeat:no-repeat;background-position:center center;background-size:cover;background-blend-mode:multiply">
        <h1 class="text-white">Purchase Summary</h1>
    </div>
    <section>
        <div class="container my-5">
            <div class="widget clearfix shadow bg-white">
                <!-- /widget heading -->
                <div class="widget-heading">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class=""></h3>
                        <button @click.prevent = "removeItem($event)" :data-href="base_url('cart/clear')" class="btn btn-outline-success">Clear Cart</button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="widget-body">
                    <form @submit.prevent="handlePayment" method="post" action="<?=base_url("cart/checkout")?>"> 
                        <div class="row">
                            <div class="col-md-4 my-2  ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Fullname*</label>
                                            <input type="text" required class="form-control" name="fullname">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Delivery Address*</label>
                                            <textarea name="address" required style="resize:none" class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Email Address *</label>
                                            <input type="email" required name="email" class="form-control" v-model="email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Phone*</label>
                                            <input type="tel" name="phone" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 my-2">
                                <h4>Cart Informations</h4>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Item</th>
                                                <th>Qty</th>
                                                <th>Amount</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-if="cart_data.length === 0">
                                                <th  class="text-center" colspan="5">Nothing on your cart yet...</th>
                                            </tr>
                                            <tr v-for="(info,index) in cart_data" :key="info.slug">
                                                <input  type="hidden" name="item[]" :value="info.title">
                                                <td>{{index + 1}}</td>
                                                <td>
                                                    <div class="media d-flex align-items-center">
                                                        <div class="img-thumbnail mr-2 avatar rounded avatar-4by3">
                                                            <img loading="lazy" class="align-self-start avatar-img " :src="base_url('uploads/'+info.image)">
                                                        </div>
                                                        <div class="media-body">
                                                            <h6 class="mb-0 text-nowrap">{{info.title}}</h6>
                                                            <small
                                                                class="d-none d-lg-block">{{info.description}}</small>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><span class="badge"><input type="number" v-model="info.qty" min="1" class="bg-transparent" name="qty[]"
                                                        style="width:40px"> / {{info.per}}{{info.qty > 1 ? "s":""}}</span></span>
                                                </td>
                                                <td><span class="badge">₦ <input type="text" style="width:50px" class="border-0 bg-transparent" name="amount[]" readonly :value="info.price * info.qty"></span></td>

                                                <td>
                                                    <i @click.prevent = "removeItem($event)" :data-href="base_url('cart/remove?product='+info.slug)" class="fa fa-minus-circle text-danger"></i>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr v-if="cart_data.length !== 0">
                                                <th colspan="4" class="text-center">Total</th>
                                                <th><span class="badge">₦ 
                                                        <input type="text" style="width:50px" class="border-0 bg-transparent" readonly :value="total" name="total">
                                                    </span>
                                                </th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <ul>
                                    <li>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input v-model="payment" class="form-check-input" type="radio" name="payment" value="payment-on-delivery" checked>Payment on delivery
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input v-model="payment" class="form-check-input" type="radio" name="payment" value="online-payment">Payment Online
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                                <button :disabled="!can_order || isLoading"  type="submit" class="btn text-white bg-theme btn-block border-0"><i class="fa fa-spinner fa-spin" v-show="isLoading"></i> Order Now</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://js.paystack.co/v1/inline.js"></script> 

<script>
   const vm =  new Vue({
        el: ".page-wrapper",
        data: {
            cart_data: [],
            payment:"payment-on-delivery",
            email:"",
            isLoading:false
        },
        computed:{
            total(){
                let t = 0;
                this.cart_data.forEach((e)=>{
                    t += Number(e.price*e.qty);
                })
                return t;
            },
            can_order(){
                return  this.cart_data.length > 0;
            }
        },
        mounted() {
            this.fetchCart();
        },
        methods: {
            fetchCart() {
                fetch(this.$el.dataset.href)
                    .then(response => response.json())
                    .then(result => {
                        if (result.status) {
                            this.cart_data = JSON.parse(JSON.stringify(result.data));
                        }
                    })
                    .catch(error => console.log('error', error))
            },
            base_url(url){
                return window.base_url + "/" + url;
            },
            removeItem(ev){
                if(Notification.permission !== "granted"){
                    Notification.requestPermission().then(res=>{
                        if(res !== "fulfilled"){
                            return false;
                        }
                    })
                }
                fetch(ev.target.dataset.href)
                .then(response => response.json())
                .then(result => {
                        if(result.status){
                            cart_counter_component.$data.cart_data = result.data;
                            this.fetchCart();
                        }
                    })
                    .catch(error => console.log('error', error))
                
            },
            handlePayment(ev){
                let formdata = new FormData(ev.target);
                if(this.payment == 'online-payment'){
                    var handler = PaystackPop.setup({
                        key: '<?=env("paystack_public_key")?>',
                        email: this.email,
                        amount: this.total * 100, 
                        currency: 'NGN',
                        callback: function(response) {
                             formdata.append("payment_reference",response.reference);
                              vm.handleFetch(formdata);
                        }
                    })
                    handler.openIframe()
                    
                }else{
                    return this.handleFetch(formdata);
                }
            },
            handleFetch(formdata){
                this.isLoading = true;
                let requestOptions = {method: 'POST',body: formdata};
                return fetch("<?=base_url("cart/checkout")?>", requestOptions)
                        .then(response => response.json())
                        .then(result => {
                            swal(result.status?'Successful':'Error', result.message, result.status?'success':'error')
                            .then(e=>location.reload())
                            this.isLoading = false;
                        })
                        .catch(error => console.log(error))
            }
        }
    });
</script>
<?php $this->endSection();