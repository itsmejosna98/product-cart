@extends('layouts.app')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title"> Product Form  </h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('products')}}">View Products</a></li>
                    <!-- <li class="breadcrumb-item active" aria-current="page">Form elements</li> -->
                </ol>
            </nav>
        </div>
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add Product</h4>
                        <!-- <p class="card-description"> Horizontal form layout </p> -->
                        <form class="forms-sample" id="productForm" method="post" enctype="multipart/form-data" action="{{url('category')}}">
                        {{csrf_field()}}    
                        <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Product Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{old('product')}}" name="product" placeholder="Add product">
                                    @if ($errors->has('product'))
                                    <span class="help-block">
                                        <small style="color: red;">{{ $errors->first('product') }}</small>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <button type="button" onclick="submitForm()" class="btn btn-primary mr-2">Submit</button>
                            <!-- <button class="btn btn-dark">Cancel</button> -->
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
        url: '{{url('product-store')}}',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            if(response == 1){
                window.location.href = '{{ url("products") }}';
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
