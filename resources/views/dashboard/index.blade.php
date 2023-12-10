@extends('layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> View Products </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('category')}}">Back</a></li>
                    <!-- <li class="breadcrumb-item active" aria-current="page">Basic tables</li> -->
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">View Products</h4>
                        <!-- <p class="card-description"> Add class <code>.table</code> -->
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Category Name</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Price</th>
                                        <th>Start From</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($products as $product) { ?>
                                        <tr>
                                            <td>{{$product->view_products->name}}</td>
                                            <td>{{$product->name}}</td>
                                            <td><img width="80px" src="<?php echo $product['image']; ?>"></td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->start_from}}</td>
                                            <td>{{$product->status}}</td>
                                            <!-- <td><a href="{{url('product/'.$product->id.'/edit')}}"><label class="badge badge-danger">Edit</label></a></td> -->
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
</div>
@endsection