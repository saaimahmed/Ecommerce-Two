
@extends('Backend.master')
@section('title')
    Manage Details Page
@endsection
@section('body')
    @include('sweetalert::alert')


    <div class="container my-5">
        <div class="row pb-5">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0 font-size-18 text-danger">Product Detail</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Product</a></li>
                            <li class="breadcrumb-item active">Product Detail</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="main-img">
                    <img class="img-fluid" src="{{ asset($product->image)  }}" alt="" height="250px;" width="300px;">
                    <div class="row my-3 previews">
                        <div class="">
                            @foreach($product->otherImages as $otherImage)
                                <img src="{{asset($otherImage->image)}}" alt="" height="100" width="100"/>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="main-description text-dark px-2">
                    <div class=" py-1  text-bold">Product ID:<strong> &nbsp;{{$product->id}}</strong></div>
                    <div class=" py-1  text-bold">Product Name: <strong> &nbsp; {{$product->product_name}}</strong></div>
                    <div class=" py-1  text-bold">Product Code: <strong> &nbsp; {{$product->product_code}}</strong></div>
                    <div class=" py-1  text-bold">Product Category: <strong> &nbsp; {{$product->category->category_name}}</strong></div>
                    <div class=" py-1  text-bold">Product sub Category: <strong> &nbsp; {{$product->subCategory->sub_category_name}}</strong></div>
                    <div class=" py-1  text-bold">Product Brand: <strong> &nbsp; {{$product->brand->brand_name}}</strong></div>
                    <div class=" py-1  text-bold">Product Unit: <strong> &nbsp; {{$product->unit->unit_name}}</strong></div>
                    <div class=" py-1  text-bold">Product Stock Amount: <strong> &nbsp; {{$product->stock_amount}}</strong></div>
                    <div class=" py-1  text-bold">Product Status: <strong> &nbsp; {{$product->status == 1 ? 'Active' : 'Deactive'}}</strong></div>

                    <div class="py-2">
                        <h6 class=" mb-1">Regular Price</h6>
                        <h4 class=" text-bol">{{ $product->regular_price }} Tk</h4>
                        <h6 class=" text-danger mb-1">Selling Price</h6>
                        <h4 class=" text-bold ">{{ $product->selling_price }} Tk</h4>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="">
                <h6 class="">Product Short Description</h6>
                <p class="text-dark">{!! $product->product_short_description !!}</p>
            </div>
            <div class="">
                <h6 class="">Product Long Description</h6>
                <p class="text-dark">{!! $product->product_long_description !!}</p>
            </div>
        </div>
    </div>




@endsection



