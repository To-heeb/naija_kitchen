<?php $this->extend("layouts/app")?>
<?php $this->section("content")?>

<div class="page-wrapper">
    <div class="d-flex align-items-center justify-content-center"
        style="height:25vh;background-color:#545252
    ;background-image:url(<?=base_url("assets/images/foods/hero3.jpg")?>);background-repeat:no-repeat;background-position:center center;background-size:cover;background-blend-mode:multiply">
        <h1 class="display-4 text-white">Settings</h1>
    </div>
    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-6">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Site Identity</h5>
                            <a class="btn btn-link" data-toggle="collapse" href="#site_identity" aria-expanded="true">
                                <i class="fa fa-angle-right"></i>
                                <i class="fa fa-angle-down "></i>
                            </a>
                        </div>
                        <form method="post"  class="card-body collapse show" id="site_identity">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Site Name</label>
                                    <input  class="form-control" type="text" name="site_name" value="<?=get_settings("site_name")?>" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Site Email</label>
                                    <input  class="form-control" type="text" name="site_email" value="<?=get_settings("site_email")?>" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Site Description</label>
                                    <textarea required class="form-control" name="site_description"><?=get_settings("site_description")?></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Addresses</label>
                                    <div class="address_container">
                                    <?php 
                                        $addresses = get_settings("addresses");
                                        if($addresses){
                                            $addresses = unserialize($addresses);
                                        }
                                        foreach ($addresses as $key):?>
                                        <div class="d-flex align-items-center mb-2">
                                            <input  class="form-control" type="text" name="addresses[]" value="<?=$key?>" required>
                                            <i onclick="removeField(this)" class="fa fa-minus-circle text-danger ml-2"></i>
                                        </div>
                                        <?php endforeach?>
                                    </div>
                                    <button onclick="addField(this,'addresses')" class="btn btn-link mx-0" type="button"><i class="fa fa-plus-circle"></i> Add</button>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Phones</label>
                                    <div class="phone_container">
                                         <?php 
                                        $phones = get_settings("phones");
                                        if($phones){
                                            $phones = unserialize($phones);
                                        }
                                        foreach ($phones as $key):?>
                                        <div class="d-flex align-items-center mb-2">
                                            <input  class="form-control" type="text" name="phones[]" value="<?=$key?>" required>
                                            <i onclick="removeField(this)" class="fa fa-minus-circle text-danger ml-2"></i>
                                        </div>
                                        <?php endforeach?>
                                    </div>
                                    <button onclick="addField(this,'phones')" class="btn btn-link mx-0" type="button"><i class="fa fa-plus-circle"></i> Add</button>
                                </div>

                                <div class="form-group d-flex col-md-12 justify-content-end">
                                    <button type="submit" class="btn theme-btn-dash">Save</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12">
                            <div class="card border-0 shadow">
                                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">Update Password</h5>
                                    <a class="btn btn-link" data-toggle="collapse" href="#site_password" aria-expanded="true">
                                        <i class="fa fa-angle-right"></i>
                                        <i class="fa fa-angle-down "></i>
                                    </a>
                                </div>
                                <form method="post" action="<?=base_url("settings/update-password")?>" class="card-body collapse show" id="site_password">
                                    <div class="row align-items-center">
                                        <div class="form-group col-lg-5">
                                            <input  class="form-control" type="password" name="old_password" placeholder="Old Password"  required>
                                        </div>
                                        <div class="form-group col-lg-5">
                                            <input  class="form-control" type="password" name="new_password" placeholder="New Password" required>
                                        </div>
                                        <div class="form-group d-flex col-lg-2 justify-content-end">
                                            <button type="submit" class="btn theme-btn-dash">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php foreach ($email_templates as $temp) :?>
                        <div class="col-12 mt-3">
                            <div class="card border-0 shadow">
                                <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0"><?=$temp->title?> Template</h5>
                                    <a class="btn btn-link" data-toggle="collapse" href="#email_template<?=$temp->id?>" aria-expanded="true">
                                        <i class="fa fa-angle-right"></i>
                                        <i class="fa fa-angle-down "></i>
                                    </a>
                                </div>
                                <form method="post" action="<?=base_url("settings/save-email-template")?>" class="card-body collapse show" id="email_template<?=$temp->id?>">
                                    <input type="hidden" name="id" value="<?=$temp->id?>">
                                    <div class="form-group">
                                        <input value="<?=$temp->subject?>" type="text" class="form-control" required name="subject" placeholder="Subject..." >
                                    </div>
                                    <textarea name="email_body" required class="form-control summernote"><?=$temp->email_body?></textarea>
                                    <span class="text-primary">You may use these template tags inside subject,body and those will be replaced by original values: 
                                        <strong class="small font-weight-bolder">{fullname}, {address}, {email}, {method}, {order_id}, {total}, {phone}, {orders}</strong>
                                    </span>
                                    <div class="form-group d-flex mt-3 mb-0 justify-content-end">
                                        <button type="submit" class="btn theme-btn-dash">Save</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <?php endforeach?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    addField = (ev,name) => {
        let div = document.createElement("div");
        div.className = "d-flex align-items-center my-2";
        div.innerHTML = `
            <input  class="form-control" type="text" name="${name}[]">
            <i onclick="removeField(this)" class="fa fa-minus-circle text-danger ml-2"></i>
        `;
        let container = ev.previousElementSibling;
        container.append(div);
    }
    removeField = (ev) => {
        ev.parentElement.remove();
    }
</script>
<?php $this->endSection();