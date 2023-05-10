@extends('Backend.master')
@section('title')
    Monthly Order Report Page
@endsection
@section('body')
    @include('sweetalert::alert')

    <section class="section  py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-5"> Monthly Order Info</h4>
                            <form action="{{ route('order-report-monthly-show') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group ">
                                            <label for="" class="">Start Date</label>
                                            <input type="date" class="form-control" name="start_date" />
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group ">
                                            <label for="" class="">End Date</label>
                                            <input type="date" class="form-control" name="end_date" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success mt-4" value="Find" />
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center mb-5"> Monthly Order Show</h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection





