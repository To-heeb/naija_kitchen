<?php $this->extend("layouts/app")?>
<?php $this->section("content")?>
<div class="page-wrapper">
<div class="d-flex align-items-center justify-content-center" style="height:25vh;background-color:#545252
;background-image:url(<?=base_url("assets/images/foods/hero3.jpg")?>);background-repeat:no-repeat;background-position:center center;background-size:cover;background-blend-mode:multiply">
    <h1 class="display-4 text-white">Blog</h1>
</div>
    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-3">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Latest News</h5>
                            <a class="btn btn-link" data-toggle="collapse" href="#latest" aria-expanded="true">
                                <i class="fa fa-angle-right"></i>
                                <i class="fa fa-angle-down "></i>
                            </a>
                        </div>
                        <div  class="card-body collapse show" id="latest">

                            <?php foreach ($latestBlog as $blog):?>
                                <p><a href="blog/<?=esc($blog->blog_slug  , 'url')?>"><?= $blog->blog_title?></a></p>
                            <?php endforeach?>
                        </div>
                    </div>
                    <a href="createBlog" class="shadow btn btn-light m-3 mr-auto">Create Blog</a>
                </div>
                <div class="col-md-9">
                    <div class="row " id="add_to_cart_btn">
                        <?php //echo"<pre>"; var_dump($latestBlog);  echo"</pre>";?>
                        <?php if(!$blogs):?>
                            <div class="col-md-12 text-center">

                                <h3 class="">Ooops.. Nothing was found.</h3>
                                <p>Try using a different keyword or category</p>
                            </div>
                        <?php endif?>
                        <?php foreach($blogs as $blog):?>
                        <div class="col-md-4 food-item">
                            <div class="food-item-wrap bg-white border-0 shadow">
                                <div class="figure-wrap bg-image" data-image-src="<?=base_url("uploads/{}")?>">
                                    <div class="distance"><i class="fa fa-pin"></i><?=$blog->category_name?></div>
                                    <div class="d-flex justify-content-between align-items-center"  >
                                        <div class="rating" style="background-color:rgba(0,0,0,0.3)">
                                            <!-- <?php for ($i=0; $i < 5; $i++):?>
                                                <i
                                                 class="fa fa-star"></i>
                                            <?php endfor?> -->
                                        </div>
                                        <div class="review" style="background-color:rgba(0,0,0,0.3)"><a href="#"><?=($blog) ? mt_rand(env("app.fake_order_min"),env("app.fake_order_max")):"0"?> views</a> </div>
                                    </div>
                                </div>
                                <div class="content">
                                    <h5><a href="<?=base_url("uploads/{}")?>" class="pop-up"><?=$blog->blog_title?></a></h5>
                                    <div class="product-name"></div>
                                    <div class="d-flex justify-content-between align-items-center"> 
                                    <a  href="blog/<?=esc($blog->blog_slug  , 'url')?>" class="btn theme-btn-dash btn-sm">Read More</a> 
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