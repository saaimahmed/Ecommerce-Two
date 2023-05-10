@extends('Frontend.master')
@section('title')
    Checkout Page
@endsection

@section('main-content')



    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">checkout</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href=""><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="">Shop</a></li>
                        <li>checkout</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row text-dark justify-content-center">
                <div class="col-lg-8">
                    <div class="checkout-steps-form-style-1 ">
                        <form action="{{ route('new-order') }}" method="post">
                            @csrf
                            <h6 class="title">Please Give Your Order checkout information</h6>
                            <section class="">
                                <div class="row ">
{{--if customer login then oredr Product this field  customer data show and hidden cz otherwise confile double cutomer data  --}}
                                    @if(!Session::get('customer_id'))
                                        <div class="col-md-12">
                                            <div class="single-form form-default">
                                                <label>Full Name</label>
                                                <div class="form-input form">
                                                    <input type="text" name="name" placeholder="Full Name">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Email Address</label>
                                                <div class="form-input form">
                                                    <input type="text" name="email" id="email" placeholder="Email Address">
                                                    <span class="" id="emailCheckSpan"></span>
{{--                                                    <span class="text-success" id="emailCheckSpan2"></span>--}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="single-form form-default">
                                                <label>Phone Number</label>
                                                <div class="form-input form">
                                                    <input type="text" name="mobile" placeholder="Phone Number">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Delivery Address</label>
                                            <div class="form-input form">
                                                <textarea name="delivery_address" id="" cols="30" rows="10" class="text-center " placeholder="Delivery Address"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <label>Select Payment Method</label>
                                            <div class="">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="payment_method" id="inlineRadio1" value="1">
                                                    <label class="form-check-label" for="inlineRadio1">Cash On Delivery</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="payment_method" id="inlineRadio2" value="2">
                                                    <label class="form-check-label" for="inlineRadio2">Online Payment</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="single-form form-default">
                                            <div class="form-input form">
                                                <input type="submit" class="btn btn-outline-success" id="confirmOrderBtn" value="Confirm Order">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </form>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout-sidebar">
                        <div class="checkout-sidebar-coupon">
                            <p>Appy Coupon to get discount!</p>
                            <form action="#">
                                <div class="single-form form-default">
                                    <div class="form-input form">
                                        <input type="text" placeholder="Coupon Code">
                                    </div>
                                    <div class="button">
                                        <button class="btn">apply</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="checkout-sidebar-price-table mt-30">
                            <h5 class="title">Your Cart Summery</h5>
                            @php($total = 0)
                            @foreach($cartProduct as $product)
                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">{{ $product->name }} - ({{ $product->price }} * {{ $product->quantity }})</p>
                                    <p class="price">Tk. {{ $product->price * $product->quantity }}</p>
                                </div>
                            </div>
                                @php($total = $total + ($product->price * $product->quantity))
                            @endforeach
                            <div class="total-payable">
                                <div class="payable-price">
                                    <p class="value">Total Price:</p>
                                    <p class="price">Tk.{{ number_format($total) }}</p>
                                </div>
                                <div class="payable-price">
                                    <p class="value">Tax Amount(15%):</p>
                                    @php($tax = round($total*15)/100 )
                                    <p class="price">Tk. {{ number_format($tax) }}</p>
                                </div>
                                <div class="payable-price">
                                    @php( $shipping = 100)
                                    <p class="value">Shipping Cost</p>
                                    <p class="price">Tk. {{ number_format($shipping) }}</p>
                                </div>
                            </div>
                            <div class="sub-total-price">
                                <div class="total-price">
                                    <p class="value">Sub Total Price</p>
                                    @php($GrandTotal = $total+ $tax+ $shipping)
                                    <p class="price">Tk. {{ number_format($GrandTotal) }}</p>
                                    <?php
                                    Session::put('grand_total',$GrandTotal);
                                    Session::put('tax_total',$tax);
                                    Session::put('shipping_total',$shipping);
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="checkout-sidebar-banner mt-30">
                            <a href="product-grids.html">
                                <img src="{{ asset('/') }}front-assets/assets/images/banner/banner.jpg" alt="#">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')

@endpush
