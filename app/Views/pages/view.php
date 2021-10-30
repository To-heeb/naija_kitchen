<?php $this->extend("layouts/app")?>
<?php $this->section("content")?>
<div class="page-wrapper">
<div class="d-flex align-items-center justify-content-center" style="height:25vh;background-color:#545252
;background-image:url(<?=base_url("assets/images/foods/hero3.jpg")?>);background-repeat:no-repeat;background-position:center center;background-size:cover;background-blend-mode:multiply">
    <h1 class="display-4 text-white"><?=$blog->blog_title?></h1>
</div>
    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col">
                    <h3><?=$blog->blog_title?></h3>
                    <p class="text-fade">Uploaded on <?php $time = strtotime($blog->created_at); echo date("l", $time)." ".$blog->created_at?></p>
                    <p class="mt-4"><?= $blog->blog_body?></p>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->endSection()?>