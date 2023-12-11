@extends('../layouts-site.app')
@section('content')

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">Our Products</h3>
                </div>
            </div>
            <!-- /section title -->
            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div id="updateDiv">
                    @php $total = 0; @endphp
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <form method="post" enctype="multipart/form-data" action="{{url('place-order')}}">
                                    {{csrf_field()}}
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <!-- <th>Product Image</th> -->
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Total price</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        @php $count=1; @endphp
                                        <tbody>
                                            <?php
                                            foreach ($carts as $cart) { ?>
                                                <input type="hidden" id="productId<?php echo $count ?>" name="productId[]" value="{{$cart->view_products->id}}">
                                                <input type="hidden" id="price<?php echo $count ?>" name="price[]" value="{{$cart->price}}">
                                                @php $totalPrice = $cart->price * $cart->quantity @endphp
                                                <tr id="dataRow_{{ $cart->view_products->id }}" data-pid="{{$cart->view_products->id}}" data-price="{{$cart->price}}">
                                                    <!-- <td><img width="80px" src="<?php echo $cart->view_products['image']; ?>"></td> -->
                                                    <td>{{$cart->view_products->name}}</td>
                                                    <td>{{$cart->price}}</td>
                                                    <td><input class="qtyInput" style="width:50px;" id="quantity<?php echo $count ?>" name="quantity[]" value="{{$cart->quantity}}" min="1" type="number"></td>
                                                    <td>{{$totalPrice}}</td>
                                                    <td><button type="button" onclick="deleteData({{ $cart->id }})" style="background-color: red;">Remove</button></td>
                                                    <!-- <td><a href="{{url('cart/'.$cart->id)}}"><button style="background-color: red;">Remove</button></a></td> -->
                                                </tr>
                                                <input type="hidden" value="{{$count}}" name="count">
                                                @php $count++; @endphp
                                                <!-- @php $total += $cart->price * $cart->quantity; @endphp -->
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <!-- <h6>Total Price:{{$total}}</h6> -->
                                    <button type="submit" class="add-to-cart-btn" style="background-color: red;">Place Order</button>
                                    <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>

                            <!-- /tab -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $(document).ready(function() {
        $(document).on('change', '.qtyInput', function() {
            var qty = $(this).val();
            var pprice = $(this).closest('tr').data('price');
            //alert(qty*pprice);
            $(this).closest('tr').find('td:eq(3)').html(qty * pprice);
            //   var upPrice = qty*pprice;
            // alert(upPrice);
        });
        //    $('#upQuantity').val(upPrice);
    });
    function deleteData(cartId) {
        $.ajax({
            type: 'GET',
            url: "{{ url('cart-product') }}" + '/' + cartId + '/delete',
            success: function (data) {
                console.log('Delete success:', data);
                console.log("success")
                    console.log('Row deleted successfully.');
                    $("#dataRow_" + cartId).remove();
                    window.location.href = '{{ url("cart-create") }}';
            },
            error: function (error) {
                console.log("eroorosky")
                // Log error to console for debugging
                console.log('Delete error:', error);
            }
        });
    }
</script>

<!-- HOT DEAL SECTION -->

<!-- /HOT DEAL SECTION -->
@endsection