@extends('Backend.master')
@section('title')
    Manage Category
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
                            <div class="col-sm-9 mb-3"><h2>Category <b>Manage</b></h2></div>
                            <div class="col-sm-3">
                                <button type="button" class="btn btn-success text-white  border-3 " data-bs-toggle="modal" data-bs-target="#addProfile"><i class="fa fa-plus me-2 border-3 rounded-pill"></i>Add New Category</button>
                                <!-- Modal -->
                                <div class="modal fade" id="addProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                        @include('Backend.category.add')
                                    </div>
                                </div>
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
                            <th>Category Name <i class="fa fa-sort"></i></th>
                            <th>Category Description <i class="fa fa-sort"></i></th>
                            <th>Status</th>
                            <th>Image <i class="fa fa-sort"></i></th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody class="text-center text-dark">
                        @foreach($Categories as $category)
                        <tr>
                            <td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{!! $category->category_description  !!} </td>
                            <td>{{ $category->status == 1 ? 'Active' : 'Deactive' }}</td>
                            <td>
                                <img src="{{ asset( $category->image ) }}" alt="" width="70px;" height="70px;">
                            </td>
                            <td>
                                <a href="{{ route('edit.category',$category->id) }}" ><i class="btn btn-sm btn-success fa fa-edit"></i></a>
                              {{--delete--}}
{{--                                    <form action="{{ route('delete.category',$category->id) }}" method="post" enctype="multipart/form-data" class="py-1">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
                                        <a href="{{ route('delete.category',$category->id) }}" onclick="confirmation(event)"><i class="btn btn-sm btn-danger fa fa-trash"></i></a>
{{--                                    </form>--}}
                                <a href=""><i class="btn btn-sm btn-warning fa fa-eye"></i></a>
                                <a href="{{ route('status.category',$category->id) }}"><i class="btn btn-sm btn-{{$category->status == 1 ? 'primary' : 'Secondary'}}   fa fa-{{ $category->status == 1 ? 'lock-open' : 'lock' }}"></i></a>

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

