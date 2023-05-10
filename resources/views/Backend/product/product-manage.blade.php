
@extends('Backend.master')
@section('title')
    Manage Product Page
@endsection
@section('body')
    @include('sweetalert::alert')
    <section class="section  py-5">
        <div class="container">
            <div class="container">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-9 mb-3"><h2>Product <b>Manage Page</b></h2></div>
                                <div class="col-sm-3">
                                    <a href="{{ route('products.create') }}" type="button" class="btn btn-success text-white  border-3 " ><i class="fa fa-plus me-2 border-3 rounded-pill"></i>Add New Product</a>
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered">
                            <thead class="text-center ">
                            <tr class="text-dark">
                                <td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
                                </td>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Product Name</th>
                                <th>Selling Price <i class="fa fa-sort"></i></th>
                                <th>Stock Amount <i class="fa fa-sort"></i></th>
                                <th>Status</th>
                                <th>Image <i class="fa fa-sort"></i></th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="text-center text-dark">
                            @foreach($products as $product)
                                <tr>
                                    <td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->category->category_name }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->stock_amount }}  </td>
                                    <td>{{ $product->status == 1 ? 'Active' : 'Deactive' }}</td>
                                    <td>
                                        <img src="{{ asset( $product->image ) }}" alt="" width="70px;" height="70px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('product-edit',$product->id) }}" ><i class="btn btn-sm btn-success fa fa-edit"></i></a>
{{--                                        delete--}}
                                        <a href="{{ route('product.delete',$product->id) }}" onclick="event.preventDefault();document.getElementById('productDeleteForm{{$product->id}}').submit();"><i class="btn btn-sm btn-danger fa fa-trash"></i></a>
                                        <form action="{{ route('product.delete',$product->id) }}" method="post" enctype="multipart/form-data" onclick="return confirm('Are You Sure Confirm?')" id="productDeleteForm{{$product->id}}" class="py-1">
                                            @csrf
                                        </form>
                                        <a href="{{ route('products.view',$product->id) }}" class=""><i class="text-white btn btn-sm btn-warning fa fa-book-open"></i></a>
                                        <a href="{{ route('products.status',$product->id) }}"><i class="btn btn-sm btn-{{$product->status == 1 ? 'primary' : 'Secondary'}}   fa fa-{{ $product->status == 1 ? 'lock-open' : 'lock' }}"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </section>


@endsection



