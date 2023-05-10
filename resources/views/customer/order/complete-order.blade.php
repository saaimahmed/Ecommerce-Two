@extends('Frontend.master')
@section('title')
    Checkout Page
@endsection

@section('main-content')

    @include('sweetalert::alert')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Complete Order</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">order</a></li>
                        <li>Complete Order</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <section class="checkout-wrapper section">
        <div class="container">
            <div class="row text-dark justify-content-center">
               <div class="col-md-12">
                    <h1 class="text-center">Your order Successfully</h1>
               </div>
            </div>
        </div>
    </section>


@endsection

