<?php $this->extend("layouts/app")?>
<?php $this->section("content")?>
<div class="page-wrapper">
<div class="d-flex align-items-center justify-content-center" style="height:25vh;background-color:#545252
;background-image:url(<?=base_url("assets/images/foods/hero3.jpg")?>);background-repeat:no-repeat;background-position:center center;background-size:cover;background-blend-mode:multiply">
    <h1 class="display-4 text-white">Create Blog</h1>
</div>
    <section>
        <div class="container my-5">
        <?php //echo"<pre>"; var_dump($category[0]['category_name']); echo"</pre>";?>
        <?=  \Config\Services::validation()->listErrors() ?>
            <form method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="exampleFormControlInput1">Blog title</label>
                <input type="text" name="blog_title" class="form-control" id="exampleFormControlInput1" placeholder="Programmers" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Blog Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="blog_category">
                <option value="">Blog Category</option>
                <?php for ($i=0; $i < count($category) ; $i++) { 
                        echo "<option value='".$category[$i]['category_id']."'>".$category[$i]['category_name']."</option>";
                }?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1" class="font-bold">Blog Text</label>
                <textarea class="form-control" name="blog_body" id="exampleFormControlTextarea1" rows="3" placeholder="I love programming and programmers" ></textarea>
            </div>
            <button type="submit" class="btn btn-primary mb-2" name="upload_blog">Upload Blog</button>
        </form>
        </div>
    </section>
</div>
<?php $this->endSection();