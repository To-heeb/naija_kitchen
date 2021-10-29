
<script type="text/x-template" id="product-card">
    <div class="col-md-3 col-sm-6 food-item ">
        <div class="food-item-wrap bg-white border-0 shadow">
            <div class="figure-wrap bg-image" :data-image-src="product">
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
                <h5><a  href="<?=base_url("uploads/{$product->image}")?>" class="pop-up"><?=$product->title?></a></h5>
                <div class="product-name"><?=$product->description?></div>
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="price">  <?=currency($product->price)?><span class="badge">/ <?=$product->per?></span></h4> 
                    <a v-if="!is_in('<?=$product->slug?>')" @click.prevent = "addToCart($event)" href="<?=base_url("cart/add?product={$product->slug}")?>" class="btn theme-btn-dash btn-sm"></span>Add To Cart</a> 
                    <a v-else @click.prevent = "addToCart($event)" href="<?=base_url("cart/remove?product={$product->slug}")?>" class="btn btn-outline-success btn-sm"> Remove</a> 
                </div>
            </div>
        </div>
    </div>
</script>


<script>
    Vue.component("product-card", {
        template: "#product-card",
        props:["product"]
    });
</script>