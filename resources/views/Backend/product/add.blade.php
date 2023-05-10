@extends('Backend.master')
@section('title')
    Add Product Page
@endsection
@section('body')
    @include('sweetalert::alert')
    <div class="modal-content">
        <div class="modal-header ">
            <h2 class="modal-title text-center">Add Product</h2>
            <button type="button" class="btn-close btn-danger" data-bs-dismiss="modal"  aria-label="Close"></button>
        </div>
        <div class="modal-body text-dark">
            <form action="{{ route('products.store') }}" method="POST" class="text-dark" enctype="multipart/form-data" >
                @csrf
                <div class="row">
                    {{--                About Text--}}
                    <div class="col-md-10 mx-auto">
                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-form-label fw-bolder">Category Name</label>
                            <div class="col-md-8  ">
                                <select name="category_id" onchange="getProductSubcategory(this.value)" class="form-control text-dark text-center">
                                    <option value="">--- Select Product Category--</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-form-label fw-bolder">Sub Category Name</label>
                            <div class="col-md-8  ">
                                <select name="sub_category_id" id="subCategoryId" class="form-control text-dark text-center">
                                    <option value="">--- Select Product Sub Category--</option>
                                    @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->sub_category_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-form-label fw-bolder">Brand Name</label>
                            <div class="col-md-8  ">
                                <select name="brand_id" id="" class="form-control text-dark text-center">
                                    <option value="">--- Select Product Brand Name--</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-form-label fw-bolder">Unit Name</label>
                            <div class="col-md-8  ">
                                <select name="unit_id" id="" class="form-control text-dark text-center">
                                    <option value="">--- Select Product Unit Name--</option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="about" class="col-md-4 form-label fw-bolder">Product Name</label>
                            <div class="col-md-8">
                                <input type="text" name="product_name" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="about" class="col-md-4 form-label fw-bolder">Product Code</label>
                            <div class="col-md-8">
                                <input type="text" name="product_code" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="about" class="col-md-4 form-label fw-bolder">Regular Price</label>
                            <div class="col-md-8">
                                <input type="number" name="regular_price" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="about" class="col-md-4 form-label fw-bolder">Selling Price</label>
                            <div class="col-md-8">
                                <input type="number" name="selling_price" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="about" class="col-md-4 form-label fw-bolder">Stock Amount</label>
                            <div class="col-md-8">
                                <input type="number" name="stock_amount" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="about" class="col-md-4 form-label fw-bolder">Product Short Description</label>
                            <div class="col-md-8">
                                <textarea name="product_short_description" id="summernote" cols="100" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="about" class=" form-label fw-bolder">Product Long Description</label>
                            <div class="col-md-12">
                                <textarea name="product_long_description" id="summernote1" cols="100" rows="2"></textarea>
                            </div>
                        </div>
                        {{--                Image--}}
                        <div class="row mb-3">
                            <label for="" class="col-md-4 form-label fw-bolder mb-3">Product Image</label>
                            <div class="col-md-6 ">
                                <label for="images" class="drop-container">
                                    <span class="drop-title">Drop files here</span>
                                    or
                                    <input type="file" name="image" class="btn btn-success form-control text-dark" id="images">
                                </label>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 form-label fw-bolder">Product Other Image</label>
                            <div class="col-md-8">
                                <input type="file" class="btn btn-success form-control" name="other_image[]" multiple>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="text-center py-5">
                    <button type="submit" class="btn btn-lg btn-success">Create New Product</button>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('js')
{{-- Category To Subcategory Selected --}}
    <script>
        function getProductSubcategory(id)
        {
            $.ajax({
                method: "GET",
                url: "{{url('/get-sub-category-by-category-id')}}",
                data: {id: id},
                dataType: "JSON",
                success: function (response) {
                    // console.log(response);

                    var subCategoryId = $('#subCategoryId');
                    subCategoryId.empty();

                    var option = '';
                    option += '<option value=""> -- Select Product Sub Category -- </option>';
                    $.each(response, function (key, value) {
                        option += '<option value=" '+ value.id +' "> ' + value.sub_category_name+ ' </option>';
                    });

                    subCategoryId.append(option);
                }
            });
        }
    </script>
@endpush
@push('style')
    {{--    Custom Image Upload Style--}}
    <style>
        .drop-container {
            position: relative;
            display: flex;
            gap: 10px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 200px;
            padding: 20px;
            border-radius: 10px;
            border: 2px dashed #555;
            color: #444;
            cursor: pointer;
            transition: background .2s ease-in-out, border .2s ease-in-out;
        }

        .drop-container:hover {
            background: #eee;
            border-color: #111;
        }

        .drop-container:hover .drop-title {
            color: #222;
        }

        .drop-title {
            color: #444;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
            transition: color .2s ease-in-out;
        }
    </style>
@endpush


