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
                                <div class="col-sm-9 mb-3"><h2>Sub Category <b>Manage</b></h2></div>
                                <div class="col-sm-3">
                                    <a href="{{ route('add-sub-category') }}" type="button" class="btn btn-success text-white  border-3 " ><i class="fa fa-plus me-2 border-3 rounded-pill"></i>Add New  Sub Category</a>
                                    <!-- Modal -->
{{--                                    <div class="modal fade" id="addProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">--}}
{{--                                        <div class="modal-dialog modal-dialog-scrollable modal-xl">--}}
{{--                                            @include('Backend.sub-category.add')--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered" id="datatable">
                            <thead class="text-center ">
                            <tr class="text-dark">
                                <td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
                                </td>
                                <th>#</th>
                                <th>Category_id</th>
                                <th>Category Name</th>
                                <th>Sub Category Name <i class="fa fa-sort"></i></th>
                                <th>Sub Category Description <i class="fa fa-sort"></i></th>
                                <th>Status</th>
                                <th>Image <i class="fa fa-sort"></i></th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="text-center text-dark">
                            @foreach($subcategories as $subcategory)
                                <tr>
                                    <td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subcategory->category_id }}</td>
                                    <td>{{ $subcategory->category->category_name }}</td>
                                    <td>{{ $subcategory->sub_category_name }}</td>
                                    <td>{!! $subcategory->sub_category_description  !!} </td>
                                    <td>{{ $subcategory->status == 1 ? 'Active' : 'Deactive' }}</td>
                                    <td>
                                        <img src="{{ asset( $subcategory->image ) }}" alt="" width="70px;" height="70px;">
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.sub-category',$subcategory->id) }}" ><i class="btn btn-sm btn-success fa fa-edit"></i></a>
                                        {{--delete--}}
                                        <a href="{{ route('delete.sub-category',$subcategory->id) }}" onclick="event.preventDefault();document.getElementById('subCategoryDeleteForm{{$subcategory->id}}').submit();"><i class="btn btn-sm btn-danger fa fa-trash"></i></a>
                                        <form action="{{ route('delete.sub-category',$subcategory->id) }}" method="post" enctype="multipart/form-data" id="subCategoryDeleteForm{{$subcategory->id}}" class="py-1">
                                            @csrf
                                        </form>
                                        <a href=""><i class="btn btn-sm btn-warning fa fa-eye"></i></a>
                                        <a href="{{ route('status.sub-category',$subcategory->id) }}"><i class="btn btn-sm btn-{{$subcategory->status == 1 ? 'primary' : 'Secondary'}}   fa fa-{{ $subcategory->status == 1 ? 'lock-open' : 'lock' }}"></i></a>

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



