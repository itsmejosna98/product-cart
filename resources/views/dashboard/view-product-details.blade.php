@extends('layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">  Product Details </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('product-details-create')}}">Add Product Details</a></li>
                    <!-- <li class="breadcrumb-item active" aria-current="page">Basic tables</li> -->
                </ol>
            </nav>
        </div>
        <div class="row">
            <!-- @include('sweetalert::alert') -->
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        @if (Session ::get('status')=="added")
                        <div class="alert alert-success" role="alert">
                            Product Details Added Successfully
                        </div>
                        @endif
                        @if (Session ::get('status')=="updated")
                        <div class="alert alert-success" role="alert">
                            Product Details Updated Successfully
                        </div>
                        @endif
                        @if (Session ::get('status')=="exists")
                        <div class="alert alert-danger" role="alert">
                            This product already exists
                        </div>
                        @endif
                        <h4 class="card-title"> Product Details</h4>
                        <!-- <p class="card-description"> Add class <code>.table</code> -->
                        </p>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($products as $product) { ?>
                                        <tr>
                                            <td>{{$product->view_products->name}}</td>
                                            <td><img width="80px" src="<?php echo $product['image']; ?>"></td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{ $product->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td><a href="{{url('product-details/'.$product->id.'/edit')}}"><label class="badge badge-danger">Edit</label></a></td>
                                            <td>
                                                <button type="button" onclick="deleteData({{ $product->id }})" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Remove
                                </button>
                                                    </a>
                                                </td>
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
<!-- Include jQuery and DataTables -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
    // Handle click event on the delete button
    function deleteData(productId) {
        // Log productId to console for debugging
        console.log('Deleting product with ID:', productId);

        // Make an Ajax request to the delete endpoint
        $.ajax({
            type: 'GET',
            url: "{{ url('product-details') }}" + '/' + productId + '/delete',
            success: function (data) {
                // Log success data to console for debugging
                console.log('Delete success:', data);
                console.log("success")
                    // Log success message to console for debugging
                    console.log('Row deleted successfully.');

                    // Remove the deleted row from the table
                    $("#dataRow_" + productId).remove();

                    // Optional: Redirect to another page
                    window.location.href = '{{ url("product-details") }}';
            },
            error: function (error) {
                console.log("eroorosky")
                // Log error to console for debugging
                console.log('Delete error:', error);
            }
        });
    }
</script>
@endsection