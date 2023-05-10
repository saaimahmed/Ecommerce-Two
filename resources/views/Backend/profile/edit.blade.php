
@include('sweetalert::alert')
<div class="modal-content">
    <div class="modal-header ">
        <h2 class="modal-title text-center">Edit Profile</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body text-dark">
        <form action="{{ route('profiles.update',$profile->id) }}" method="POST" class="text-dark" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <div class="row">
                {{--Image--}}
                <div class="row mb-3">
                    <label for="" class="col-form-label fw-bolder mb-3">Upload Profile Image</label>
                    <div class="col-md-4">
                        <label for="images" class="drop-container">
                            <span class="drop-title">Drop files here</span>
                            or
                            <input type="file" name="image" value="" class="btn btn-success form-control text-dark" id="images" >
                        </label>
                    </div>
                    <div class="col-md-4">
                        <img src="{{ asset($profile->image) }}" alt="" style="height: 200px; width: 200px;">
                    </div>
                </div>
                {{--                About Text--}}
                <div class="col-md-12">
                    <div class="row mb-3">
                        <label for="about" class=" col-form-label fw-bolder">About Myself</label>
                        <div class="col-md-12">
                            <textarea name="about" id="summernote" cols="100" rows="6" style="min-width: 100%">{!! $profile->about !!}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
{{--                    <div class="row mb-3">--}}
{{--                        <label for="fullName" class="col-md-4 col-lg-12 col-form-label fw-bolder">Full Name</label>--}}
{{--                        <div class="col-md-8 col-lg-9">--}}
{{--                            <input name="Name" type="text" class="form-control" id="fullName" value="{{ Auth::User()->name }}">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row mb-3">--}}
{{--                        <label for="Email" class="col-md-4 col-lg-12 col-form-label fw-bolder">Email</label>--}}
{{--                        <div class="col-md-8 col-lg-9">--}}
{{--                            <input name="email" type="email" class="form-control" id="Email" value="{{ Auth::User()->email }}" >--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="row mb-3">
                        <label for="title" class="col-md-4 col-lg-12 col-form-label fw-bolder">Title</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="title" type="text" value="{{ $profile->title }}" class="form-control text-dark" id="title" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-12 col-form-label fw-bolder">Phone</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="phone" type="number" value="{{ $profile->phone }}" class="form-control text-dark" id="Phone" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Phone" class="col-md-4 col-lg-12 col-form-label fw-bolder">Birthday date</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="age" type="date" value="{{ $profile->age }}" class="form-control text-dark"  >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-12 col-form-label fw-bolder">School Name</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="school" type="text" value="{{ $profile->school }}" class="form-control text-dark" id="Email" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-12 col-form-label fw-bolder">College Name</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="college" type="text" value="{{ $profile->school }}" class="form-control text-dark" id="Email" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-12 col-form-label fw-bolder">University Name</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="university" type="text" value="{{ $profile->university }}" class="form-control text-dark" id="Email" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-12 col-form-label fw-bolder">Present Address</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="present_address" type="text" value="{{ $profile->present_address }}" class="form-control text-dark" id="Address" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Address" class="col-md-4 col-lg-12 col-form-label fw-bolder">Permanent Address</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="permanent_address" type="text" value="{{ $profile->permanent_address }}" class="form-control text-dark" id="Address" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="father" class="col-md-4 col-lg-12 col-form-label fw-bolder">Father's Name</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="father_name" type="text" value="{{ $profile->father_name }}" class="form-control text-dark"  />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="mother" class="col-md-4 col-lg-12 col-form-label fw-bolder">Mother's Name</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="mother_name" type="text" value="{{ $profile->mother_name }}" class="form-control text-dark" />
                        </div>
                    </div>
                </div>
                <div class="col-md-6">

                    <div class="row mb-3">
                        <label for="" class="col-md-4 col-lg-12 col-form-label fw-bolder">Married Status</label>
                        <div class="col-md-8 col-lg-9 for">
                            <label for=""><input type="radio" name="married_status" value="single" {{ $profile->married_status == 'single' ? 'checked': ' ' }}> Single</label>
                            <label for="" class="px-2"><input type="radio" name="married_status" value="Married" {{ $profile->married_status == 'Married' ? 'checked': ' ' }}> Married</label>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-md-4 col-lg-12 col-form-label fw-bolder">Religion</label>
                        <div class="col-md-8 col-lg-9 for">
                            <select name="religion" id="" class="form-control text-center text-capitalize text-dark">
                                <option value="" selected ><--Select One--></option>
                                <option value="islam" {{ $profile->religion == 'islam' ? 'selected' : ' ' }}>Muslim</option>
                                <option value="hindu" {{ $profile->religion == 'hindu' ? 'selected' : ' ' }}>Hindu</option>
                            </select>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-md-4 col-lg-12 fw-bolder col-form-label">Occupation</label>
                        <div class="col-md-8 col-lg-9 for">
                            <select name="occupation" id="" class="form-control text-center text-capitalize text-dark">
                                <option value="" selected ><--Select One--></option>
                                <option value="student" {{ $profile->occupation == 'student' ? 'selected' : ' ' }}>Student</option>
                                <option value="job" {{ $profile->occupation == 'job' ? 'selected' : ' ' }}>Job</option>
                                <option value="freelancer" {{ $profile->occupation == 'freelancer' ? 'selected' : ' ' }}>Freelancer</option>
                            </select>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <label for="Twitter" class="col-md-4 col-lg-12 fw-bolder col-form-label">Twitter Profile</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="twitter" type="text" class="form-control text-dark" value="{{ $profile->twitter }}" id="Twitter" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Facebook" class="col-md-4 col-lg-12 fw-bolder col-form-label">Facebook Profile</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="facebook" type="text" value="{{ $profile->facebook }}" class="form-control text-dark" id="Facebook" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Instagram" class="col-md-4 col-lg-12 fw-bolder col-form-label">Instagram Profile</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="instagram" type="text" value="{{ $profile->instagram }}" class="form-control text-dark" id="Instagram" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="Linkedin" class="col-md-4 col-lg-12 fw-bolder col-form-label">Linkedin Profile</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="linkedin" type="text" class="form-control text-dark" value="{{ $profile->linkedin }}" id="Linkedin" >
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="github" class="col-md-4 col-lg-12 fw-bolder col-form-label">Github Profile</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="github" type="text" class="form-control text-dark" value="{{ $profile->github }}" >
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center py-5">
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
        </form>
    </div>
</div>
@push('styles')
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

