@extends('Backend.master')
@section('title')
    Manage Brand
@endsection
@section('body')
    @include('sweetalert::alert')
    <section class="section">
        <div class="container">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title">
                            <div class="row">
                                <div class="col-sm-9 mb-3"><h2>Brand<b> Manage</b></h2></div>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-success text-white  border-3 " data-bs-toggle="modal" data-bs-target="#addProfile"><i class="fa fa-plus me-2 border-3 rounded-pill"></i>Add New Brand</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="addProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                            @include('Backend.Brand.add')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered" id="datatable">
                            <thead class="text-center">
                            <tr class="text-dark">
                                <td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
                                </td>
                                <th>#</th>
                                <th>Brand Name <i class="fa fa-sort"></i></th>
                                <th>Brand Description <i class="fa fa-sort"></i></th>
                                <th>Status</th>
                                <th>Image <i class="fa fa-sort"></i></th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="text-center text-dark ">
                            @foreach($brands as $brand)
                                <tr>
                                    <td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td>{!! $brand->brand_description  !!} </td>
                                    <td>{{ $brand->status == 1 ? 'Active' : 'Deactive' }}</td>
                                    <td>
                                        <img src="{{ asset( $brand->image ) }}" alt="" width="50px;" height="50px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('brands.edit',$brand->id) }}" ><i class="btn btn-sm btn-success fa fa-edit"></i></a>

                                        <a href="{{ route('brands.view',$brand->id) }}"><i class="btn btn-sm btn-warning fa fa-eye"></i></a>

                                        <a href="{{ route('brands.show',$brand->id) }}"><i class=" btn btn-sm btn-{{$brand->status == 1 ? 'primary' : 'Secondary'}}   fa fa-{{ $brand->status == 1 ? 'lock-open' : 'lock' }}"></i></a>
                                        <form action="{{ route('brands.destroy',$brand->id) }}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('brands.destroy',$brand->id) }}" onclick="return confirm('Are Sure Delete This data?')"><button type="submit" class="btn btn-sm btn-danger mt-1 mb-1"><i class=" fa fa-trash"></i></button></a></li>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </section>


@endsection


