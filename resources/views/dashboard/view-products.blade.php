@extends('layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Products </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('product-create') }}">Add Product</a></li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @if (Session::get('status') == "added")
                                <div class="alert alert-success" role="alert">
                                    Product Added Successfully
                                </div>
                            @endif
                            @if (Session::get('status') == "updated")
                                <div class="alert alert-success" role="alert">
                                    Product Updated Successfully
                                </div>
                            @endif
                            @if (Session::get('status') == "deleted")
                                <div class="alert alert-danger" role="alert">
                                    Product Deleted Successfully
                                </div>
                            @endif
                            <h4 class="card-title">Products</h4>
                            <div class="table-responsive">
                                <table class="table" id="tableId">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr id="dataRow_{{ $product->id }}">
                                                <td>{{$product->name}}</td>
                                                <td>{{ $product->status == 1 ? 'Active' : 'Inactive' }}</td>
                                                <td><a href="{{ url('product/'.$product->id.'/edit') }}"><label
                                                            class="badge badge-danger">Edit</label></a></td>
                                                <td>
                                                <button type="button" onclick="deleteData({{ $product->id }})" class="btn btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i> Remove
                                </button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
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
            url: "{{ url('product') }}" + '/' + productId + '/delete',
            success: function (data) {
                // Log success data to console for debugging
                console.log('Delete success:', data);
                console.log("success")
                    // Log success message to console for debugging
                    console.log('Row deleted successfully.');

                    // Remove the deleted row from the table
                    $("#dataRow_" + productId).remove();

                    // Optional: Redirect to another page
                    window.location.href = '{{ url("products") }}';
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
