@extends('Frontend.master')
@section('title')
   show Card Page
@endsection


@section('main-content')



    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Cart</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Shop</a></li>
                        <li>Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="shopping-cart section">
        <div class="container">
            <div class="cart-list-head">

                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-1 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Unit Price</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Subtotal</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove</p>
                        </div>
                    </div>
                </div>

                @php($total = 0)
                @foreach($products as $product)
                <div class="cart-single-list">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-md-1 col-12">
                            <a href=""><img src="{{ asset( $product->attributes->image) }}" alt="#"></a>
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <h5 class="product-name"><a href="">{{ $product->name }}</a></h5>
                            <p class="product-des">
                                <span><em>Type:</em> Mirrorless</span>
                                <span><em>Color:</em> Black</span>
                            </p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <div class="count-input">

                                    <form action="{{ route('update-cart-product',$product->id) }}" method="post">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" name="qty" value="{{ $product->quantity }}" min="1" />
                                            <button class="btn btn-outline-secondary" id="button-addon2" type="submit">Update</button>
                                        </div>
                                    </form>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{ number_format($product->price) }}</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>{{ number_format($product->quantity * $product->price) }}</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <a class="remove-item" href="{{ route('delete-card-product',$product->id) }}" onclick="return confirm('Are You Sure to Delete this..')"><i class="lni lni-close"></i></a>
                        </div>
                    </div>
                </div>
                    @php($total = $total + ($product->quantity * $product->price))
                @endforeach

            </div>
            <div class="row"  >
                <div class="col-12">

                    <div class="total-amount">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 col-12">
                                <div class="left">
                                    <div class="coupon">
                                        <form action="#" target="_blank">
                                            <input name="Coupon" placeholder="Enter Your Coupon">
                                            <div class="button">
                                                <button class="btn">Apply Coupon</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="right">
                                    <ul>
                                        <li>Cart Subtotal<span>{{number_format($total)}}</span></li>
                                        <li>Tax Amount<span>{{ number_format($tax = round((($total*15)/100))) }}</span></li>

                                        @php($shipping = 0)
                                        <li>Shipping<span>{{ $shipping = 100 }}</span></li>
                                        @php($grandTotal = $total + $tax + $shipping)
                                        <li class="last">Total Payable<span>{{ number_format($grandTotal) }}</span></li>
                                    </ul>
                                    <div class="button">
                                        <a href="{{ route('checkout') }}" class="btn">Checkout</a>
                                        <a href="{{ route('home') }}" class="btn btn-alt">Continue shopping</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
