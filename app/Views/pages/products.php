<?php $this->extend("layouts/app")?>
<?php $this->section("content")?>

<div class="page-wrapper">
    <div class="d-flex align-items-center justify-content-center"
        style="height:25vh;background-color:#545252
    ;background-image:url(<?=base_url("assets/images/foods/hero3.jpg")?>);background-repeat:no-repeat;background-position:center center;background-size:cover;background-blend-mode:multiply">
        <h1 class="text-white">Manage Products</h1>
    </div>
    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-4 my-2">
                    <?php if(isset($product_item)):?>
                    <div class="card shadow border-0">
                        <div class="card-header bg-theme d-flex align-items-center justify-content-between">
                            <h4 class="card-title text-white mb-0">Edit <?=$product_item->title?></h4>
                            <a href="<?=base_url("products")?>" class="btn btn-light btn-sm "><i class="fa fa-plus-circle" aria-hidden="true"></i> New</a>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="slug" value="<?=$product_item->slug?>">
                                <div class="form-group">
                                    <label>Product Title</label>
                                    <input required type="text" name="title" class="form-control" maxlength="50" value="<?=$product_item->title?>">
                                </div>
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea type="text" class="form-control" name="description"><?=$product_item->description?></textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent border-right-0 pr-0">₦</span>
                                            </div>
                                            <input required type="number" name="price" class="form-control  border-left-0" value="<?=$product_item->price?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Per</label>
                                        <select required class="form-control text-capitalize" name="per">
                                            <?php foreach(["litre","plate"] as $key):?>
                                            <option class="text-capitalize" <?=$product_item->per == $key ? "selected" : ""?>><?=$key?>
                                            </option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Category</label>
                                        <select required class="form-control text-capitalize" name="category">
                                            <?php foreach($categories as $menu):?>
                                            <option
                                                value="<?=$menu->id?>"
                                                class="text-capitalize" <?=$product_item->category == $menu->id ? "selected" : ""?>><?=$menu->title?>
                                            </option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Product Image</label>
                                        <input type="file" class="form-control-file small" name="image">
                                        <input type="hidden" name="previous_image" value="<?=$product_item->image?>"> 
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="custom-control custom-switch" >
                                            <input id="fake_order" class="custom-control-input" type="checkbox" name="fake_order" value="true" <?=$product_item->fake_order? "checked" : ""?>>
                                            <label for="fake_order" class="custom-control-label" >Fake Orders</label>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input id="fake_ratings" class="custom-control-input" type="checkbox" name="fake_ratings" value="true" <?=$product_item->fake_ratings ? "checked" : ""?>>
                                            <label for="fake_ratings" class="custom-control-label">Fake ratings</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group d-flex justify-content-end">
                                    <button type="submit" class="btn btn-success border-0 bg-theme text-white">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php else:?>
                    <div class="card shadow border-0">
                        <div class="card-header bg-theme">
                            <h4 class="card-title text-white mb-0">New Product</h4>
                        </div>
                        <div class="card-body">
                            <form action="<?=base_url("products")?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Product Title</label>
                                    <input required type="text" name="title" class="form-control" maxlength="50">
                                </div>
                                <div class="form-group">
                                    <label>Product Description</label>
                                    <textarea type="text" class="form-control" name="description"></textarea>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Price</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent border-right-0 pr-0">₦</span>
                                            </div>
                                            <input required type="number" name="price" class="form-control  border-left-0">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Per</label>
                                        <select required class="form-control text-capitalize" name="per">
                                            <?php foreach(["litre","plate"] as $key):?>
                                            <option
                                                class="text-capitalize"><?=$key?>
                                            </option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Category</label>
                                        <select required class="form-control text-capitalize" name="category">
                                            <?php foreach($categories as $menu):?>
                                            <option
                                                value="<?=$menu->id?>"
                                                class="text-capitalize"><?=$menu->title?>
                                            </option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label>Product Image</label>
                                        <input type="file" class="form-control-file small" name="image">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="custom-control custom-switch">
                                            <input id="fake_order" class="custom-control-input" type="checkbox" name="fake_order" value="true" checked>
                                            <label for="fake_order" class="custom-control-label">Fake Orders</label>
                                        </div>
                                        <div class="custom-control custom-switch">
                                            <input id="fake_ratings" class="custom-control-input" type="checkbox" name="fake_ratings" value="true" checked>
                                            <label for="fake_ratings" class="custom-control-label">Fake ratings</label>
                                        </div>
                                    </div>
                                </div>
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
                        <div class="">
                            <table class="table dt responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th data-priority="1" style="width:50%">Item</th>
                                        <th>Category</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach($products as $product):?>
                                    <tr>
                                        <td><?=$i++?>
                                        </td>
                                        <td>
                                            <div class="media d-flex align-items-center">
                                                <div class="img-thumbnail mr-2 avatar rounded avatar-4by3">
                                                    <img loading="lazy" class="align-self-start avatar-img "
                                                        src="<?=base_url("uploads/{$product->image}")?>">
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="mb-0 text-nowrap"><?=$product->title?></h6>
                                                    <small class="d-none d-lg-block"><?=$product->description?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge badge-primary badge-pill"><?=$product->category_title?></span></td>
                                        <td><span class="badge"> <?=currency($product->price)?> / <?=$product->per?> </span>
                                        </td>
                                        <td><span class="no-wrap small"> Published<br><?=date("d/m/y",strtotime($product->created_at))?></span>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <i class="fa fa-ellipsis-v" data-toggle="dropdown"></i>
                                                <div class="dropdown-menu ">
                                                    <a class="dropdown-item small" href="?action=edit&slug=<?=$product->slug?>">Edit</a>
                                                    <a class="dropdown-item small" href="?action=soft_delete&slug=<?=$product->slug?>" onclick="return confirm('Are you sure you want to remove product: <?=$product->title?>')">Delete</a>
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