

<?php $this->extend("layouts/app")?>
<?php $this->section("content")?>
<div class="page-wrapper">
    <div class="d-flex align-items-center justify-content-center"
        style="height:25vh;background-color:#545252
    ;background-image:url(<?=base_url("assets/images/foods/hero3.jpg")?>);background-repeat:no-repeat;background-position:center center;background-size:cover;background-blend-mode:multiply">
        <h1 class="display-4 text-white">All Orders</h1>
    </div>
    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-md-12 my-2">
                    <div class="card shadow card card-body border-0">
                        <div class="table-responsive ">
                            <table class="table dt">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>OrderID</th>
                                        <th>Items</th>
                                        <th>Client</th>
                                        <th>Address</th>
                                        <th>Status</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $i = 1;
                                    foreach ($orders as $key):?>
                                    <tr>
                                        <td><?=$i ++?></td>
                                        <td class="">
                                            <span class="badge text-uppercase">#<?=$key->order_id?></span> 
                                            <?php if ($key->payment == "payment-on-delivery"):?>
                                                <span class="badge badge-light">Via Payment On Delivery</span>
                                            <?php else:?>
                                            <span class="badge badge-light">Via Online Channel</span><br>
                                            <button class="btn btn-light btn-sm" @click.prevent = "paymentDetails(<?=$key->id?>)" class="small"><?=$key->payment_status == "success"?"<i class='fa fa-check-circle text-success'></i>":"<i class='fa fa-times-circle text-danger'></i>"?> View Details</button>
                                            <?php endif?>
                                        </td>
                                        <td>
                                            <?php foreach($key->request as $r):?>
                                                <span class="badge mt-0 d-block text-left font-weight-normal">
                                                    <?=$r["qty"]?>x. <?="items"?> of <?=$r["name"]?>
                                                </span>
                                            <?php endforeach?>
                                        </td>
                                        <td>
                                            <span class="badge font-weight-normal mt-0 d-block text-left"><i class="fa fa-user-alt text-muted mr-1"></i> <?=$key->fullname?> - <a href="tel:<?=$key->phone?>"><?=$key->phone?></a></span>
                                            <?php if($key->email):?>
                                            <span class="badge font-weight-normal mt-0 d-block text-left"><i class="fa fa-envelope text-muted mr-1"></i> <a href="mailto:<?=$key->email?>"><?=$key->email?></a></span>
                                            <?php endif?>
                                        </td>
                                        <td>
                                            <small class="text-wrap"><?=$key->address?></small>
                                        </td>
                                        <td>
                                            <?php if($key->status == "active"):?>
                                                <span class="badge badge-warning py-2">active </span>
                                            <?php elseif($key->status == "completed"):?>
                                                <span class="badge badge-success py-2"><i class="fa fa-check mr-1"></i>completed </span>
                                            <?php else:?>
                                                <span class="badge badge-danger py-2"><i class="fa fa-times mr-1"></i> cancelled </span>
                                             <?php endif?>   
                                        </td>
                                        <td><span class="badge text-muted"><?=currency($key->total)?></span></td>
                                        <td><span class="badge text-muted"><?=date("d/m/y h:i a",strtotime($key->created_at))?></span></td>
                                        <td>
                                            <div class="dropdown">
                                                <i class="fa fa-ellipsis-v" data-toggle="dropdown"></i>
                                                <div class="dropdown-menu">
                                                    <?php if($key->status == "active"):?>
                                                    <a class="dropdown-item " href="?action=cancelled&order=<?=$key->id?>">Cancel</a>
                                                    <a class="dropdown-item" href="?action=completed&order=<?=$key->id?>">Completed</a>
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
    <div v-if='showModal' class="modal fade show" style="display: block;background:#6b666687
    ">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header py-0  border-0">
                    <h5 class="modal-title text-center">Payment Details</h5>
                </div>
                <div class="modal-body ">
                    <div v-if="isLoading" class="d-flex justify-content-center align-items-center">
                        <i  class="fa fa-spinner fa-2x fa-spin "></i>
                    </div>
                    <ul v-if="!isLoading" class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Status</span>
                            <span  class="badge">{{api_data.data?.status}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Amount</span>
                            <span class="badge">&#8358; {{api_data.data?.amount/100}}</span>
                        </li> 
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Channel</span>
                            <span class="badge">{{api_data.data?.channel}}</span>
                        </li>  
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Gateway Response</span>
                            <span class="badge">{{api_data.data?.gateway_response}}</span>
                        </li> 
                        <li class="list-group-item d-flex justify-content-between">
                            <span>IP Address</span>
                            <span class="badge">{{api_data.data?.ip_address}}</span>
                        </li>                                    
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Reference</span>
                            <span class="badge">{{api_data.data?.reference}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Paid At</span>
                            <span class="badge">{{api_data.data?.paidAt}}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Attempts</span>
                            <span class="badge">{{api_data.data?.log.attempts}}</span>
                        </li> 
                    </ul>
                </div>
                <div class="modal-footer py-1">
                    <button type="button" class="btn btn-secondary" @click.prevent = "showModal = false">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    new Vue({
        el:'.page-wrapper',
        data:{
            showModal:false,
            isLoading:false,
            api_data:{},
        },
        methods:{
            paymentDetails(order_id){
                this.showModal = true;
                this.isLoading = true;
                fetch(`<?=base_url('orders/api-gateway-details?order=')?>${order_id}`)
                .then(response => response.json())
                .then(result => {
                    this.api_data = result.data;
                    this.isLoading = false;
                })
                .catch(error => console.log(error))
            },
            
        }
    })
</script>
<?php $this->endSection()?>