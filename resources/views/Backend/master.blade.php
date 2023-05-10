<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>E-commerce Vue |@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

   @include('Backend.includes.style')
</head>

<body class="">
{{--{{ $theme == 'dark' ? 'bg-dark' : 'bg-light' }}--}}
<div class="container-xxl position-relative bg-white d-flex p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Sidebar Start -->
    @include('Backend.includes.sidebar')
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        @include('Backend.includes.header')
        <!-- Navbar End -->


      @yield('body')


      @include('Backend.includes.footer')
    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

@include('Backend.includes.script')
</body>

</html>

