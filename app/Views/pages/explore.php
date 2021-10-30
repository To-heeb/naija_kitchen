<?php 
    $request = service("request")->getGet();
    $keyword = $request["keyword"]??"";
    $category = $request["category"]??"all";
    $sortby = $request["sortby"]??"default";
    $order = $request["order"]??"asc";

    


?>

<?php $this->extend("layouts/app")?>
<?php $this->section("content")?>
<div class="page-wrapper">
<div class="d-flex align-items-center justify-content-center" style="height:25vh;background-color:#545252
;background-image:url(<?=base_url("assets/images/foods/hero3.jpg")?>);background-repeat:no-repeat;background-position:center center;background-size:cover;background-blend-mode:multiply">
    <h1 class="display-4 text-white">Explore</h1>
</div>
    <section>
        <div class="container my-5">
            <?php //echo"<pre>"; var_dump($_GET);  echo"</pre>";?>
            <div class="row">
                <div class="col-md-3">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Filters</h5>
                            <a class="btn btn-link" data-toggle="collapse" href="#search" aria-expanded="true">
                                <i class="fa fa-angle-right"></i>
                                <i class="fa fa-angle-down "></i>
                            </a>
                        </div>
                        <form  class="card-body collapse show" id="search">
                            <div class="form-group">
                                <label >Keyword</label>
                                <input class="form-control" name="keyword" type="text" value="<?=$keyword?>" placeholder="eg. Egusi" >
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select  class="form-control" name="category">
                                    <option <?=$category == "all" ? "selected" : ""?> class="text-capitalize" value="all">All</option>
                                    <?php foreach ($categories as $key):?>
                                    <option <?=$category == $key->id ? "selected" : ""?> value="<?=$key->id?>" class="text-capitalize"><?=$key->title?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Sort By</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <select class="form-control" name="sortby">
                                            <option <?=$sortby == "default" ? "selected" : ""?> value="default">Default</option>
                                            <option <?=$sortby == "title" ? "selected" : ""?> value="title">Title</option>
                                            <option <?=$sortby == "price" ? "selected" : ""?> value="price">Price</option>
                                            <option <?=$sortby == "created_at" ? "selected" : ""?> value="created_at">Date Added</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <select class="form-control" name="order">
                                            <option <?=$order == "asc" ? "selected" : ""?> value="asc">Ascending</option>
                                            <option <?=$order == "desc" ? "selected" : ""?> value="desc">Descending</option>
                                        </select>
                                    </div>  
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-end">
                                <button type="submit" class="btn theme-btn-dash ">Search</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row " id="add_to_cart_btn">
                        <?php if(!$products):?>
                            <div class="col-md-12 text-center">

                                <h3 class="">Ooops.. Nothing was found.</h3>
                                <p>Try using a different keyword or category</p>
                            </div>
                        <?php endif?>
                        <?php foreach($products as $product):?>
                        <div class="col-md-4 food-item">
                            <div class="food-item-wrap bg-white border-0 shadow">
                                <div class="figure-wrap bg-image" data-image-src="<?=base_url("uploads/{$product->image}")?>">
                                    <div class="distance"><i class="fa fa-pin"></i><?=$product->category_title?></div>
                                    <div class="d-flex justify-content-between align-items-center"  >
                                        <div class="rating" style="background-color:rgba(0,0,0,0.3)">
                                            <?php for ($i=0; $i < 5; $i++):?>   
                                                <i class="fa fa-star"></i>
                                            <?php endfor?>
                                        </div>
                                        <div class="review" style="background-color:rgba(0,0,0,0.3)"><a href="#"><?=($product->fake_order) ? mt_rand(env("app.fake_order_min"),env("app.fake_order_max")):""?> orders</a> </div>
                                    </div>      
                                </div>         
                                <div class="content">       
                                    <h5><a href="<?=base_url("uploads/{$product->image}")?>" class="pop-up"><?=$product->title?></a></h5>
                                    <div class="product-name"><?=$product->description?></div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <h4 class="price"> <?=currency($product->price)?><span class="badge">/ <?=$product->per?></span></h4> 
                                        <a v-if="!is_in('<?=$product->slug?>')" @click.prevent = "addToCart($event)" href="<?=base_url("cart/add?product={$product->slug}")?>" class="btn theme-btn-dash btn-sm"></span>Add To Cart</a> 
                                        <a v-else @click.prevent = "addToCart($event)" href="<?=base_url("cart/remove?product={$product->slug}")?>" class="btn btn-outline-success btn-sm"> Remove</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach?>
                        <div class="col-12 d-flex justify-content-end">
                            <?= $pager->links() ?> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->endSection()?>