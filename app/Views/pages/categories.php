<?php $this->extend("layouts/app")?>
<?php $this->section("content")?>

<div class="page-wrapper">
    <div class="d-flex align-items-center justify-content-center"
        style="height:25vh;background-color:#545252
    ;background-image:url(<?=base_url("assets/images/foods/hero3.jpg")?>);background-repeat:no-repeat;background-position:center center;background-size:cover;background-blend-mode:multiply">
        <h1 class="text-white">Manage Categories</h1>
    </div>
    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-4 my-2">
                    <?php if(isset($category_item)):?>
                    <div class="card shadow border-0">
                        <div class="card-header bg-theme d-flex align-items-center justify-content-between">
                            <h4 class="card-title text-white mb-0">Edit <?=$category_item->title?></h4>
                            <a href="<?=base_url("products/categories")?>" class="btn btn-light btn-sm "><i class="fa fa-plus-circle" aria-hidden="true"></i> New</a>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="slug" value="<?=$category_item->slug?>" >
                                <div class="form-group">
                                    <label>Category Title</label>
                                    <input required type="text" name="title" class="form-control" maxlength="50" value="<?=$category_item->title?>" <?=$category_item->title == "Others" ? "disabled readonly" : ""?>>
                                </div>
                                <div class="form-group">
                                    <label>Category Description</label>
                                    <textarea type="text" class="form-control" name="description"><?=$category_item->description?></textarea>
                                </div>
                                <!--<div class="row">-->
                                <!--    <div class="form-group col-md-6">-->
                                <!--        <label>Category Image</label>-->
                                <!--        <input type="file" class="form-control-file small" name="image">-->
                                <!--        <input type="hidden" name="previous_image" value="<?=$category_item->image?>"> -->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success border-0 bg-theme text-white">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php else:?>
                    <div class="card shadow border-0">
                        <div class="card-header bg-theme">
                            <h4 class="card-title text-white mb-0">New Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Category Title</label>
                                    <input required type="text" name="title" class="form-control" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label>Category Description</label>
                                    <textarea type="text" class="form-control" name="description"></textarea>
                                </div>
                                <!--<div class="row">-->
                                <!--    <div class="form-group col-md-6">-->
                                <!--        <label>Category Image</label>-->
                                <!--        <input type="file" class="form-control-file small" name="image">-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="form-group d-flex justify-content-end">
                                    <button class="btn btn-success border-0 bg-theme">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php endif?>
                </div>
                <div class="col-md-8 my-2">
                    <div class="shadow card card-body border-0">
                        <div class="table-responsive">
                            <table class="table dt">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="width:50%">Item</th>
                                        <th></th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach($categories as $key):?>
                                    <tr>
                                        <td><?=$i++?>
                                        </td>
                                        <td>
                                            <div class="media d-flex">
                                                <!--<div class="img-thumbnail mr-2 avatar avatar-lg rounded avatar-4by3">-->
                                                <!--    <img loading="lazy" class="align-self-start avatar-img "-->
                                                <!--        src="<?=base_url("uploads/{$key->image}")?>">-->
                                                <!--</div>-->
                                                <div class="media-body">
                                                    <h6 class="mb-0 text-nowrap"><?=$key->title?></h6>
                                                    <small class="d-none d-lg-block"><?=$key->description?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge badge-pill badge-primary"><?=$key->total_count?></span>
                                        </td>
                                        <td><span class="no-wrap small"> Published<br><?=date("d/m/y",strtotime($key->created_at))?></span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <i class="fa fa-ellipsis-v" data-toggle="dropdown"></i>
                                                <div class="dropdown-menu ">
                                                    <a class="dropdown-item small" href="?action=edit&slug=<?=$key->slug?>">Edit</a>
                                                    <?php if($key->title != "Others"):?>
                                                    <a  class="dropdown-item small" href="?action=delete&slug=<?=$key->slug?>" onclick="return confirm('Are you sure you want to remove product: <?=$key->title?>')">Delete</a>
                                                    <?php endif?>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php $this->endSection();