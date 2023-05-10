@extends('Backend.master')
@section('title')
    Edit Unit
@endsection
@section('body')
    @include('sweetalert::alert')
    <div class="modal-content">
        <div class="modal-header ">
            <h2 class="modal-title text-center">Edit Unit</h2>
            <button type="button" class="btn-close btn-danger" onclick="history.back();" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-dark">
            <form action="{{ route('units.update',$unit->id) }}" method="POST" class="text-dark" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="row">
                    {{--                About Text--}}
                    <div class="col-md-10 mx-auto">
                        <div class="row mb-3">
                            <label for="fullName" class="col-md-4 col-form-label fw-bolder">Unit Name</label>
                            <div class="col-md-8">
                                <input name="unit_name" type="text" value="{{ $unit->unit_name }}" class="form-control" id="" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="about" class="col-md-4 form-label fw-bolder">Category Description</label>
                            <div class="col-md-8">
                                <textarea name="unit_description" id="summernote1" cols="100" rows="" >{!! $unit->unit_description !!}</textarea>
                            </div>
                        </div>
                        {{--                Image--}}
                    </div>

                </div>
                <div class="text-center py-5">
                    <button type="submit" class="btn btn-lg btn-success">Update Unit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
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

