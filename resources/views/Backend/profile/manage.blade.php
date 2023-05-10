@extends('admin.master')
@section('title')
    Manage Profile
@endsection
@section('body')
    @include('sweetalert::alert')
    <section class="section profile py-5">
        <div class="col-md-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4 text-center">Profile Information</h3>
{{--                //Add Profile Modal--}}
                <!-- Button trigger modal -->

                <button type="button" class="btn btn-outline-primary text-dark  border-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#addProfile"><i class="fa fa-plus me-2"></i>Add Profile</button>

                    <!-- Modal -->
                <div class="modal fade" id="addProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-xl">
                        @include('admin.profile.add')
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3">
            <a href="" class="btn btn-outline-warning border-3 rounded-pill" data-bs-toggle="modal" data-bs-target="#editProfile"><i class="fa fa-edit me-2"></i>Edit Profile</a>
            <div class="modal fade" id="editProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable modal-xl">
                    @include('admin.profile.edit')
                </div>
            </div>
        </div>
    </section>
@endsection
