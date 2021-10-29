<script type="text/x-template" id="landing-page">
<div>
    <section class="hero bg-image" style="background-image:url(<?=base_url("assets/images/foods/hero3.jpg")?>);background-color:#00000055;background-blend-mode:overlay;background-size:contain;background-position:center;background-repeat:repeat">
        <div class="hero-inner">
            <div class="container text-center hero-text font-white">
                <h1>Order Delivery & Take-Out </h1>
                <h5 class="font-white space-xs">Find Rich, Quality & Healthy Meal Made Just For You</h5>
                <div class="row">
                    <div class="col-md-8 mx-auto">
                        <div class="banner-form">
                            <form action="<?=base_url("explore")?>">
                                <input type="hidden" name="category" value="all">
                                <input type="hidden" name="sortby" value="default">
                                <input type="hidden" name="order" value="asc">
                                <div class="form-group">
                                    <div class="input-group input-group-lg bg-white rounded">
                                        <input class="form-control border-0 bg-transparent" type="text" name="keyword" placeholder="What would you like to eat?....." >
                                        <div class="input-group-append">
                                            <button class="text-white input-group-text bg-theme border-0 d-flex align-items-center"><span class="d-none d-lg-inline">Search</span> <i class="fa fa-search ml-2 "></i></button>
                                        </div>
                                        
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>
                </div>
                <div class="steps d-md-block d-none">
                    <div class="step-item step1">
                        <img class="" loading="lazy" src="<?=base_url("assets/images/search_more_100px.png")?>" alt="">
                        <h4 ><span>1. </span>Search Choice</h4> 
                    </div>
                    <div class="step-item step2">
                        <img loading="lazy" src="<?=base_url("assets/images/service_bell_100px.png")?>" alt="">
                        <h4><span>2. </span>Order Food</h4> 
                    </div>
                    <div class="step-item step3">
                        <img loading="lazy" src="<?=base_url("assets/images/deliver_food_100px_2.png")?>" alt="">
                        <h4><span>3. </span>Delivery or take out</h4> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-3 py-lg-4 text-white mb-3" style="background-image:url(<?=base_url("assets/images/city-2.png")?>);background-color:var(--bg-theme);background-blend-mode:darken;background-size:cover;background-position:bottom">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-9 ">
                    <h2 class="text-white font-weight-lighter">Having an upcoming event?</h2> 
                    <p class="lead text-white-50">Let's handle the catering of the event based on your financial capabilities and budget and all...</p>
                </div>
                
                <div class="col-lg-3 text-center text-lg-right "><a href="mailto:<?=get_settings("site_email")?>" class="btn btn-dark btn-lg">Tell Us About It</a> 
                </div>
                    
            </div>
        </div>
    </section>
    
    <section class="how-it-works">
        <div class="container">
            <div class="text-xs-center text-center text-left-sm">
                <h2>Easy 3 Step Order</h2>
                <!-- 3 block sections starts -->
                <div class="row how-it-works-solution">
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col1">
                        <div class="how-it-works-wrap">
                            <div class="step step-1">
                                <div class="icon" data-step="1">
                                    <i class="fas fa-search fa-2x text-white"></i>
                                </div>
                                <h3>Search Choice</h3>
                                <p>Browse through our food categories and add whatever interests you to your cart. You could also use the search form at the top of the page to find items quickly </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col2">
                        <div class="step step-2">
                            <div class="icon" data-step="2">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewbox="0 0 380.721 380.721">
                                    <g fill="#FFF">
                                        <path d="M58.727 281.236c.32-5.217.657-10.457 1.319-15.709 1.261-12.525 3.974-25.05 6.733-37.296a543.51 543.51 0 0 1 5.449-17.997c2.463-5.729 4.868-11.433 7.25-17.01 5.438-10.898 11.491-21.07 18.724-29.593 1.737-2.19 3.427-4.328 5.095-6.46 1.912-1.894 3.805-3.747 5.676-5.588 3.863-3.509 7.221-7.273 11.107-10.091 7.686-5.711 14.529-11.137 21.477-14.506 6.698-3.724 12.455-6.982 17.631-8.812 10.125-4.084 15.883-6.141 15.883-6.141s-4.915 3.893-13.502 10.207c-4.449 2.917-9.114 7.488-14.721 12.147-5.803 4.461-11.107 10.84-17.358 16.992-3.149 3.114-5.588 7.064-8.551 10.684-1.452 1.83-2.928 3.712-4.427 5.6a1225.858 1225.858 0 0 1-3.84 6.286c-5.537 8.208-9.673 17.858-13.995 27.664-1.748 5.1-3.566 10.283-5.391 15.534a371.593 371.593 0 0 1-4.16 16.476c-2.266 11.271-4.502 22.761-5.438 34.612-.68 4.287-1.022 8.633-1.383 12.979 94 .023 166.775.069 268.589.069.337-4.462.534-8.97.534-13.536 0-85.746-62.509-156.352-142.875-165.705 5.17-4.869 8.436-11.758 8.436-19.433-.023-14.692-11.921-26.612-26.631-26.612-14.715 0-26.652 11.92-26.652 26.642 0 7.668 3.265 14.558 8.464 19.426-80.396 9.353-142.869 79.96-142.869 165.706 0 4.543.168 9.027.5 13.467 9.935-.002 19.526-.002 28.926-.002zM0 291.135h380.721v33.59H0z" /> </g>
                                </svg> -->
                            </div>
                            <h3>Order & Check Out</h3>
                            <p>After choosing your choice / choices, You should see your cart (an iconic shopping basket with a number beside it on the navbar menu) with the total numbers of items you've selected. Once you are done with the shopping, fill the customer identity form and click the checkout button. Either a sales rep calls you or a number would be generated for you to call and confirm your order and the estimated time of delivery</p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 how-it-works-steps white-txt col3">
                        <div class="step step-3">
                            <!-- <div class="icon" data-step="3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512" viewbox="0 0 612.001 612">
                                    <path d="M604.131 440.17h-19.12V333.237c0-12.512-3.776-24.787-10.78-35.173l-47.92-70.975a62.99 62.99 0 0 0-52.169-27.698h-74.28c-8.734 0-15.737 7.082-15.737 15.738v225.043h-121.65c11.567 9.992 19.514 23.92 21.796 39.658H412.53c4.563-31.238 31.475-55.396 63.972-55.396 32.498 0 59.33 24.158 63.895 55.396h63.735c4.328 0 7.869-3.541 7.869-7.869V448.04c-.001-4.327-3.541-7.87-7.87-7.87zM525.76 312.227h-98.044a7.842 7.842 0 0 1-7.868-7.869v-54.372c0-4.328 3.541-7.869 7.868-7.869h59.724c2.597 0 4.957 1.259 6.452 3.305l38.32 54.451c3.619 5.194-.079 12.354-6.452 12.354zM476.502 440.17c-27.068 0-48.943 21.953-48.943 49.021 0 26.99 21.875 48.943 48.943 48.943 26.989 0 48.943-21.953 48.943-48.943 0-27.066-21.954-49.021-48.943-49.021zm0 73.495c-13.535 0-24.472-11.016-24.472-24.471 0-13.535 10.937-24.473 24.472-24.473 13.533 0 24.472 10.938 24.472 24.473 0 13.455-10.938 24.471-24.472 24.471zM68.434 440.17c-4.328 0-7.869 3.543-7.869 7.869v23.922c0 4.328 3.541 7.869 7.869 7.869h87.971c2.282-15.738 10.229-29.666 21.718-39.658H68.434v-.002zm151.864 0c-26.989 0-48.943 21.953-48.943 49.021 0 26.99 21.954 48.943 48.943 48.943 27.068 0 48.943-21.953 48.943-48.943.001-27.066-21.874-49.021-48.943-49.021zm0 73.495c-13.534 0-24.471-11.016-24.471-24.471 0-13.535 10.937-24.473 24.471-24.473s24.472 10.938 24.472 24.473c0 13.455-10.938 24.471-24.472 24.471zm117.716-363.06h-91.198c4.485 13.298 6.846 27.54 6.846 42.255 0 74.28-60.431 134.711-134.711 134.711-13.535 0-26.675-2.045-39.029-5.744v86.949c0 4.328 3.541 7.869 7.869 7.869h265.96c4.329 0 7.869-3.541 7.869-7.869V174.211c-.001-13.062-10.545-23.606-23.606-23.606zM118.969 73.866C53.264 73.866 0 127.129 0 192.834s53.264 118.969 118.969 118.969 118.97-53.264 118.97-118.969-53.265-118.968-118.97-118.968zm0 210.864c-50.752 0-91.896-41.143-91.896-91.896s41.144-91.896 91.896-91.896c50.753 0 91.896 41.144 91.896 91.896 0 50.753-41.143 91.896-91.896 91.896zm35.097-72.488c-1.014 0-2.052-.131-3.082-.407L112.641 201.5a11.808 11.808 0 0 1-8.729-11.396v-59.015c0-6.516 5.287-11.803 11.803-11.803 6.516 0 11.803 5.287 11.803 11.803v49.971l29.614 7.983c6.294 1.698 10.02 8.177 8.322 14.469-1.421 5.264-6.185 8.73-11.388 8.73z" fill="#FFF" /> </svg>
                            </div> -->
                            <h3>Pick up or Delivery</h3>
                            <p>In a case of delivery,your order would be sent via a dispatch rider to the location you entered on the customer identity form and payment would be made once you are in custody of your order. For Pickup, you are to come over to the Restaurant branch you called with a proof of your order and then make payment</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 3 block sections ends -->
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="pay-info">You can always pay with cash, POS or transfer</p>
                </div>
            </div>
        </div>
    </section>
</div>
</script>

<script>
    const LandingPage = Vue.component("landing-page", {
        template: "#landing-page",
        data(){
            return {
                products:[],
                isLoading:false,
            }
        },
        created(){
            this.getMostOrder();
        },
        methods:{
            getMostOrder(){
                this.isLoading = true;
                Helper.fetchData("/api/get-random-products")
                    .then(result => {
                        this.products = result;
                        this.isLoading = false
                    });
            }
        }
    });
</script>