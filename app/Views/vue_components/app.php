<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Online Shopping For Quality Home Made Food | NaijaKitchen01">
        <meta name="author" content="Uleval Technology">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <title><?=$title?> - Online Shopping For Quality Home Made Food | NaijaKitchen01</title>
        <!-- Bootstrap core CSS -->
        <link
            href="<?=base_url("assets/css/bootstrap.min.css")?>"
            rel="stylesheet">
        <link
            href="<?=base_url("assets/css/font-awesome.min.css")?>"
            rel="stylesheet">
        <!-- <link
            href="<?=base_url("assets/css/animsition.min.css")?>"
            rel="stylesheet"> -->
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



        <link rel="stylesheet" href="//localhost/cdn/vue/bootstrap-vue.min.css">
        <script src="//localhost/cdn/vue/vue.js"></script>
        <script src="//localhost/cdn/vue/bootstrap-vue.min.js"></script>
        <script src="//localhost/cdn/vue/vue-router.js"></script>
        <script src="//localhost/cdn/vue/vuex.min.js"></script>
        <style>
            .bg-theme{
                background-color:var(--bg-theme)
            }
            .text-theme{
                color:var(--bg-theme)
            }
        </style>
        <script
            src="<?=base_url("assets/js/jquery.min.js")?>">
        </script>
    </head>

    <body>
        <?php foreach(["landing_page"] as $component):?>
            <?=$this->include("vue_components/$component")?>
        <?php endforeach?>
        <div class="site-wrapper" id="app">
            <header id="header" class="header-scroll top-header">
                <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                    <div class="container">
                        <a class="navbar-brand font-weight-bolder" href="<?=base_url()?>" style="font-family:cursive">
                          <!-- <span class="text-success">Naija</span><span class="text-theme">Kitchen</span> -->
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
                    </div>
                </nav>
            </header>

            <router-view></router-view>

            <footer class="footer">
                <div class="container">
                    <!-- bottom footer statrs -->
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

        <script>
            class Helper {
                static base_url = "<?=base_url()?>";

                static fetchData(url) {
                    return fetch(Helper.base_url + url)
                        .then(response => response.json())
                        .catch(error => console.log(error))
                }
                static deleteData(id, url) {
                    let formdata = new FormData();
                    formdata.append("id", id);
                    formdata.append("_method", "DELETE")
                    let requestOptions = {
                        method: 'POST',
                        body: formdata,
                    };
                    return fetch(Helper.base_url + url, requestOptions)
                        .then(response => response.json())
                        .catch(error => console.log(error))
                }
                static saveData(url, data) {
                    let requestOptions = {
                        method: 'POST',
                        body: data,
                    };
                    return fetch(url, requestOptions)
                        .then(response => response.json())
                        .catch(error => console.log('error', error))
                }
            }
        </script>

        <script>
            const router = new VueRouter({
                routes : [
                    { path: '/', component: LandingPage},
                ] 
            })
            const vm = new Vue({
                router:router,
                el:"#app"
            });
        </script>
    </body>
</html>