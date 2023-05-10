@extends('Backend.master')
@section('title')
    Manage Unit
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
                                <div class="col-sm-9 mb-3"><h2>Brand<b> Unit</b></h2></div>
                                <div class="col-sm-3">
                                    <button type="button" class="btn btn-success text-white  border-3 " data-bs-toggle="modal" data-bs-target="#addProfile"><i class="fa fa-plus me-2 border-3 rounded-pill"></i>Add New Brand</button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="addProfile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-xl">
                                            @include('Backend.unit.add')
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
                                <th>Unit Name <i class="fa fa-sort"></i></th>
                                <th>Unit Description <i class="fa fa-sort"></i></th>
                                <th>Status</th>

                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody class="text-center text-dark">
                            @foreach($units as $unit)
                                <tr>
                                    <td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
                                    </td>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $unit->unit_name }}</td>
                                    <td>{!!$unit->unit_description  !!} </td>
                                    <td>{{ $unit->status == 1 ? 'Active' : 'Deactive' }}</td>

                                    <td>
                                        <a href="{{ route('units.edit',$unit->id) }}" ><i class="btn btn-sm btn-success fa fa-edit"></i></a>
                                        <a href=""><i class="btn btn-sm btn-warning fa fa-eye"></i></a>
                                        <a href="{{ route('units.show',$unit->id) }}"><i class="btn btn-sm btn-{{$unit->status == 1 ? 'primary' : 'Secondary'}}   fa fa-{{ $unit->status == 1 ? 'lock-open' : 'lock' }}"></i></a>
                                        <form action="{{ route('units.destroy',$unit->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('units.destroy',$unit->id) }}" onclick="return confirm('Are You Sure Delete ?')"><button type="submit" class="btn btn-sm btn-danger mt-1"><i class="fa fa-trash"></i></button></a>
                                        </form>
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


