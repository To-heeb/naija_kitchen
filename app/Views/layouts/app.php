<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Online Shopping For Quality Home Made Food | NaijaKitchen01">
        <meta name="author" content="Uleval Technology">
        <link rel="shortcut icon" href="logo_.png" type="image/png">
        <link rel="icon" href="/logo_.png" type="image/png">
        <title><?=$title?> - Online Shopping For Quality Home Made Food | NaijaKitchen01</title>
        <!-- Bootstrap core CSS -->
        <link
            href="<?=base_url("assets/css/bootstrap.min.css")?>"
            rel="stylesheet">
        <link
            href="<?=base_url("assets/css/font-awesome.min.css")?>"
            rel="stylesheet">
        <link
            href="<?=base_url("assets/css/animsition.min.css")?>"
            rel="stylesheet">
        <link
            href="<?=base_url("assets/css/animate.min.css")?>"
            rel="stylesheet">
        <!-- Custom styles for this template -->
        <link
            href="<?=base_url("assets/css/style.css")?>"
            rel="stylesheet">
        <link rel="stylesheet" href="<?=base_url("assets/datatable/datatables.min.css")?>"/>
        <link href="<?=base_url("assets/css/magnific-popup.css")?>" rel="stylesheet">
        <link href="<?=base_url("assets/slick/slick.css")?>" rel="stylesheet">
        <link href="<?=base_url("assets/slick/slick-theme.css")?>" rel="stylesheet">
        <link rel="stylesheet" href="<?=base_url("assets/summernote/summernote-bs4.css")?>">
        <style>
            .bg-theme{
                background-color:var(--bg-theme)
            }
            .text-theme{
                color:var(--bg-theme)
            }
                .avatar {
                    flex-shrink: 0;
                    font-size: 1rem;
                    display: inline-block;
                    width: 3rem;
                    height: 3rem;
                    position: relative;
                    z-index: 0;
                }

            .avatar-img {
                    width: 100%;
                    height: 100%;
                    -o-object-fit: cover;
                    object-fit: cover;
                }
            .avatar-xl, .avatar-xxl {
            font-size: 1.70833rem;
            width: 5.125rem;
            height: 5.125rem;
            }
            .avatar-lg {
            font-size: 1.33333rem;
            width: 4rem;
            height: 4rem;
            }

            .avatar.avatar-4by3 {
            width: 4rem;
            }
            .avatar-xl.avatar-4by3 {
            width: 6.83333rem;
            }
            .avatar-lg.avatar-4by3 {
            width: 5.33333rem;
            }
            .table td {
            vertical-align:baseline;
            }

        </style>
        <script
            src="<?=base_url("assets/js/jquery.min.js")?>">
        </script>

        <script src="<?=base_url("assets/js/vue.js")?>"></script>
        <script src="<?=base_url("assets/js/sweetalert.min.js")?>"></script>

        <script>
            window.base_url = "<?=base_url()?>";
            var simpleAlert = (type="success", title="", text="") => {
                swal(title, text, type);
            }
            var simpleConfirm = (type="success", title="", text="", callback=null) => {
                swal(title, text, type,{
                    buttons: true,
                    dangerMode: true
                }).then(res=>{
                    if(res && callback ){
                        callback();
                    }
                });
            }
            $(document).ready(function() {
                $('.dt').DataTable();
                $('.pop-up').magnificPopup({ type:'image'});
                $('.slick-slider').slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    centerMode: true,
                    autoplay: true,
                    autoplaySpeed: 4000,
                    focusOnSelect:true,
                    dots:true,
                    responsive: [
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                                centerMode: false,
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                centerMode: false,
                            }
                        }
                    ]
                });
                $('.categories-slides').slick({
                    infinite: true,
                    slidesToShow: 5,
                    slidesToScroll: 5,
                    centerMode: true,
                    autoplay: false,
                    autoplaySpeed: 2000,
                    focusOnSelect:true,
                    dots:true,
                    responsive: [
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2,
                                centerMode: false,
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                centerMode: false,
                            }
                        }
                    ]
                });
                $(".animsition").animsition({
                    inClass: "fade-in",
                    outClass: "fade-out",
                    inDuration: 300,
                    outDuration: 300,
                    linkElement: ".animsition-link",
                    loading: !0,
                    loadingParentElement: "body",
                    loadingClass: "animsition-loading",
                    unSupportCss: [
                        "animation-duration",
                        "-webkit-animation-duration",
                        "-o-animation-duration",
                    ],
                    overlay: !1,
                    overlayClass: "animsition-overlay-slide",
                    overlayParentElement: "body",
                });
                $(".bg-image").css("background", function () {
                    var a =
                        "#00000055 url(" +
                        $(this).data("image-src") +
                        ") repeat-x top center";
                    return a;
                }).css("background-blend-mode", "overlay").css("background-size", "contain");
                $('.summernote').summernote({
                    dialogsInBody:true,
                    dialogsFade:true,
                    toolbar:[
                        ['style'],
                        ['fontname',['bold','italic','underline','para','ul','ol','paragraph']],
                        ['color'],
                        ['view',['link','codeview']],
                    ]
                });
            });
            var mixin = {
                filters:{
                    humanize_time(value){
                        if(!value || value == "0000-00-00") return " --- ";
                        return moment(value,"YYYY-MM-DD HH:mm:ss").fromNow()
                    }
                }
            };
        </script>
        
    </head>

    <body class="home">
        <div class="site-wrapper animsition" data-animsition-in="fade-in" data-animsition-out="fade-out" id="app">
            <header id="header" class="header-scroll top-header">
                <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                    <div class="container">
                        <a class="navbar-brand font-weight-bolder" href="<?=base_url()?>">
                          <img loading="lazy" src="<?=base_url("logo.png")?>" alt="" style="height:45px">
                        </a>
                        <button class="navbar-toggler d-lg-none ml-auto" type="button" data-toggle="collapse"
                            data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="collapsibleNavId">
                            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url()?>">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url("explore")?>">Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?=base_url("blog")?>">Blog</a>
                                </li>
                                <?php if(is_logged_in()):?>
                                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admin</a>
                                    <div class="dropdown-menu"> 
                                        <a class="dropdown-item" href="<?=base_url("products")?>">Products</a> 
                                        <a class="dropdown-item" href="<?=base_url("products/categories")?>">Categories</a> 
                                        <a class="dropdown-item" href="<?=base_url("orders")?>">Orders</a> 
                                        <a class="dropdown-item" href="<?=base_url("settings")?>">Settings</a>
                                        <div class="dropdown-divider"></div> 
                                        <a class="dropdown-item" href="<?=base_url("logout")?>" onclick="return confirm('Are you sure you want to logout?')">Logout</a> 
                                    </div>
                                </li>
                                <?php else:?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                                </li>
                                <?php endif?>
                                
                            </ul>
                        </div>
                        <ul class="navbar-nav">
                            <li  class="nav-item">
                                <a class="nav-link" href="<?=base_url("cart/my-carts")?>"> <i class="fa fa-shopping-basket" aria-hidden="true"></i><span class="badge badge-pill bg-info" id="cart_counter" v-if="cart_data.length > 0">{{cart_data.length}}</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <?php $this->renderSection("content")?>
            <footer class="footer">
                <div class="container">
                    <div class="bottom-footer">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <h5>Payment Options</h5>
                                <p>Payments are made on delivery via direct cash or bank transfer</p>
                            </div>
                            <div class="col-12 col-md-4">
                                <h5>Address</h5>
                                <ul class="list-unstyled">
                                    <?php 
                                    $addresses = get_settings("addresses");
                                    if($addresses){
                                        $addresses = unserialize($addresses);
                                    }
                                    foreach ($addresses as $key):?>
                                        <li><?=$key?></li>
                                    <?php endforeach?>
                                    <li><?=get_settings("site_email")?></li>
                                </ul>
                            </div>
                            <div class="col-12 col-md-3">
                                <h5>Phone</h5>
                                <ul class="list-unstyled">
                                    <?php 
                                    $phones = get_settings("phones");
                                    if($phones){
                                        $phones = unserialize($phones);
                                    }
                                    foreach ($phones as $key):?>
                                        <li><?=$key?></li>
                                    <?php endforeach?>
                                </ul>
                            </div>
                            
                            <div class="col-12 col-md-3">
                                <h5>Additional Information</h5>
                                <p><?=get_settings("site_description")?></p>
                            </div>
                        </div>
                    </div>
                    <!-- bottom footer ends -->
                </div>
            </footer>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered " role="document">
                <div class="modal-content ">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                    <form action="<?=base_url("handle-login")?>" method="post" class="modal-body shadow border-0">
                        <h4 class="lead text-center">Administrative Only</h4>
                        <hr>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label >Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group clearfix mt-4">
                            <button type="submit" class="btn theme-btn float-right">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script
            src="<?=base_url("assets/js/bootstrap.min.js")?>">
        </script>
        <script
            src="<?=base_url("assets/js/animsition.min.js")?>">
        </script>
        <script src="<?=base_url("assets/js/jquery.magnific-popup.min.js")?>"></script>
        <script src="<?=base_url("assets/datatable/datatables.min.js")?>"></script>
        <script src="<?=base_url("assets/slick/slick.min.js")?>"></script>
        <script src="<?=base_url("assets/summernote/summernote-bs4.min.js")?>"></script>

        <?= session("notification")?>
        <script>
            const cart_counter_component = new Vue({
                el:"#cart_counter",
                data:{
                    cart_data:[]
                },
                mounted(){
                    fetch("<?=base_url("cart")?>")
                        .then(response => response.json())
                        .then(result => {
                                if(result.status){
                                    this.cart_data = result.data;
                                }
                            })
                            .catch(error => console.log('error', error))
                }
            });
        
        </script>
        <script>
            if(window.add_to_cart_btn){
                let add_to_cart_component = new Vue({
                    el:"#add_to_cart_btn",
                    methods:{
                         is_in(needle){
                             let dd = JSON.parse(JSON.stringify(cart_counter_component.$data.cart_data));
                            //console.log(dd)
                            return dd.includes(needle);
                        },
                        addToCart(ev){
                            let btn_text = ev.target.innerHTML;
                            let span = document.createElement("span");
                            span.className = "spinner-border spinner-border-sm ml-2";
                            ev.target.append(span);
                            if(Notification.permission !== "granted"){
                                Notification.requestPermission().then(res=>{
                                    if(res !== "fulfilled"){
                                        return false;
                                    }
                                })
                            }
                            fetch(ev.target.href)
                            .then(response => response.json())
                            .then(result => {
                                    if(result.status){
                                        setTimeout(() => {
                                            ev.target.href.includes("/add") ? new Notification("Item removed from cart") : new Notification("Item added to cart")
                                        });
                                        cart_counter_component.$data.cart_data = result.data;
                                    }
                                })
                                .catch(error => console.log('error', error))
                                .then(e=>document.querySelector(".spinner-border").remove())
                            
                        }
                    }
                });
            }
        </script>
    </body>

</html>