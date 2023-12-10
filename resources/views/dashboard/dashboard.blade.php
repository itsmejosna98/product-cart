@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="row mt-5">
        <div class="col-xl-3 mt-5 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                <div class="row">
                <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{$total_orders}}</h3>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Orders</h6>
                </div>
            </div>
        </div>
        <div class="col-xl-3 mt-5 col-sm-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                                <h3 class="mb-0">{{$total_products}}</h3>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-muted font-weight-normal">Total Products</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row ">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Orders Table</h4>
                    <div class="table-responsive">
                    <table class="table">
                                <thead>
                                    <tr>
                                    
                                        <th>Customer Name</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                         <th>Order Date</th>
                                        <!--<th>Delivery Address</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($orders as $order) { ?>
                                        <tr>
                                            <td>{{$order->view_users->first_name}}</td>
                                            <td>{{$order->view_products->name}}</td>
                                            <td>{{$order->price}}</td>
                                            <td>{{$order->quantity}}</td>
                                            <td>{{$order->order_date}}</td> 
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>






</div>
@endsection