@extends('../layouts-site.app')
@section('content')
<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">{{$product->product_name}}</h3>

                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">

                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <div class="product">
                                    <div class="product-img">
                                        <img width="100px" height="150px" src="http://127.0.0.1:8000{{$product->image}}">
                                    </div>
                                    <div class="product-body">
                                        <h3 class="product-name"><a href="#">{{$product->product_name}}</a></h3>
                                    </div>
                                    <form method="POST" action="{{url('add-cart')}}">
                                    {{csrf_field()}} 
                                    <input type="hidden" value="{{$product->quantity}}" id="available_quantity" name="available_quantity">

                                     <input class="form-control" type="number" value="1" min="1" id="purchase_quantity" name="purchase_quantity">
                                     <input type="hidden" value="{{$product->id}}" name="product_id" />
                                     <input type="hidden" value="{{$product->price}}" name="price" />
                                    <div class="add-to-cart">
                                    <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                    </div>
                                    </form>
                                </div>

                                <div>
                                    <h3 class="product-name"><a href="#">{{$product->product_name}}</a></h3>
                                    <h4 class="product-price">{{$product->price}} ₹</h4>
                                </div>

                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        /* 1. Visualizing things on Hover - See next part for action on click */
        $('#stars li').on('mouseover', function() {
            var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

            // Now highlight all the stars that's not after the current hovered star
            $(this).parent().children('li.star').each(function(e) {
                if (e < onStar) {
                    $(this).addClass('hover');
                } else {
                    $(this).removeClass('hover');
                }
            });

        }).on('mouseout', function() {
            $(this).parent().children('li.star').each(function(e) {
                $(this).removeClass('hover');
            });
        });


        /* 2. Action to perform on click */
        $('#stars li').on('click', function() {
            var onStar = parseInt($(this).data('value'), 10); // The star currently selected
            var stars = $(this).parent().children('li.star');

            for (i = 0; i < stars.length; i++) {
                $(stars[i]).removeClass('selected');
            }

            for (i = 0; i < onStar; i++) {
                $(stars[i]).addClass('selected');
            }

            // JUST RESPONSE (Not needed)
            var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
            $('#star').val(ratingValue);
            // var msg = "";
            // if (ratingValue > 1) {
            //     msg = "Thanks! You rated this " + ratingValue + " stars.";
            // } else {
            //     msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
            // }
            // responseMessage(msg);

        });


    });


    function responseMessage(msg) {
        $('.success-box').fadeIn(200);
        $('.success-box div.text-message').html("<span>" + msg + "</span>");
    }
</script>

@endsection