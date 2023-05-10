@extends('Backend.master')
@section('title')
    Edit user Role Management
@endsection
@section('body')
    <section class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="text-lg">
                        <div class="mx-auto">
                            <div class="overflow-hidden shadow-xl">
                                <div class="container mx-auto py-5">
                                    <h1 class="text-2xl font-bold text-center"> User Role Manage</h1>
                                    <div class="div">
                                        <div class="">
                                            <form action="{{ route('update-user-role',$user->id) }}" method="post">
                                                @csrf

                                                <div class="row">
                                                    <div class="col-md-10 mx-auto">
                                                        <div class="form-group">
                                                            <label for="" class="py-1 fw-bolder text-2xl text-dark">User Role</label>
                                                            <select name="role" id="" class="form-control text-dark">
                                                                <option value="admin" {{ $user->role == 'Backend' ? 'selected' : ' ' }}>Admin</option>
                                                                <option value="user" {{ $user->role == 'user' ? 'selected' : ' ' }}>User</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group py-2">
                                                            <button type="submit" class="btn btn-success" >Update User Role</button>
                                                        </div>
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

