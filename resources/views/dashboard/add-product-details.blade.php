@extends('layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Product Details Form </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('product-details')}}">View Product Details</a></li>
                    <!-- <li class="breadcrumb-item active" aria-current="page">Form elements</li> -->
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Product Details</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" method="post" enctype="multipart/form-data" action="{{url('product-details-store')}}"id="productForm">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="exampleSelectGender">Select Product</label>
                                <select class="form-control" required value="{{old('categoryId')}}" name="product_id">
                                    @foreach($allCategories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <span class="help-block">
                                        <small style="color: red;">{{ $errors->first('categoryId') }}</small>
                                    </span>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control file-upload-info" value="{{old('image')}}" name="image" >
                                    @if ($errors->has('image'))
                                    <span class="help-block">
                                        <small style="color: red;">{{ $errors->first('image') }}</small>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{old('price')}}" name="price" placeholder="Price">
                                    @if ($errors->has('price'))
                                    <span class="help-block">
                                        <small style="color: red;">{{ $errors->first('price') }}</small>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Quantity</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{old('quantity')}}" name="quantity" placeholder="quantity">
                                    @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <small style="color: red;">{{ $errors->first('quantity') }}</small>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <button type="button" onclick="submitForm()" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/latest/jquery.validate.min.js"></script>
    <script>
    function submitForm() {
    var form = $('#productForm');
    var formData = new FormData(form[0]);
    
    // Append the CSRF token to the FormData object
    formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

    $.ajax({
        type: 'POST',
        url: '{{url('product-details-store')}}',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            if(response == 1){
                window.location.href = '{{ url("product-details") }}';
            }
        },
        error: function(xhr, status, error) {
            var errors = xhr.responseJSON && xhr.responseJSON.errors;

            if (errors) {
                console.log(errors);
                $('#categoryIdError').text(errors.categoryId ? errors.categoryId[0] : '');
                // Add similar lines for other form fields...
            }
        }
    });
}



</script>
    @endsection