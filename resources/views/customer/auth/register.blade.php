@extends('Frontend.master')
@section('title')
    Register Page
@endsection
@section('main-content')


    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Registration</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li>Registration</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="register-form">
                        <div class="title">
                            <h3>No Account? Register</h3>
                            <p>Registration takes less than a minute but gives you full control over your orders.</p>
                        </div>
                        <form class="row" action="{{ route('new-customer-register') }}" method="post">
                            @csrf
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-fn">Full Name</label>
                                    <input class="form-control" type="text" id="reg-fn" name="name" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-ln">E-mail Address</label>
                                    <input class="form-control" type="email" id="reg-ln" name="email" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-phone">Phone Number</label>
                                    <input class="form-control" type="text" id="reg-phone" name="mobile" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-pass">Password</label>
                                    <input class="form-control" type="password" name="password" id="reg-pass" required>
                                </div>
                            </div>
{{--                            <div class="col-sm-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="reg-pass-confirm">Confirm Password</label>--}}
{{--                                    <input class="form-control" type="password" id="reg-pass-confirm" required>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="button">
                                <button class="btn" type="submit">Register</button>
                            </div>
                            <p class="outer-link">Already have an account? <a href="{{ route('customer-login') }}">Login Now</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection
