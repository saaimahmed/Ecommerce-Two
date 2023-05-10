
@extends('Backend.master')
@section('title')
    Edit Order Page
@endsection
@section('body')
    @include('sweetalert::alert')

    <section class="section  py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center"> Edit Order Info</h4>
                            <form action="{{ route('admin-order-update',$order->id) }}" method="post" enctype="multipart/form-data" class="py-2">
                                @csrf
                                <div class="row">
                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-form-label fw-bolder">Order Total</label>
                                            <div class="col-md-8">
                                                <input name="order_total" readonly type="text" value="{{ number_format($order->order_total) }}" class="form-control" id="" />
                                            </div>
                                        </div>
                                    <div class="row mb-3">
                                        <label for="about" class="col-md-4 form-label fw-bolder">Delivery Address</label>
                                        <div class="col-md-8">
                                            <textarea name="delivery_address" id="summernote1" cols="100" rows="" >{!! $order->delivery_address !!}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-form-label fw-bolder">Order Status</label>
                                        <div class="col-md-8">
                                            <select name="order_status" id="" class="form-control text-center" required>
                                                <option value="" disabled selected> -- Select Order Status --</option>
                                                <option value="pending" {{ $order->order_status == 'pending' ? 'Selected' : '' }}> Pending</option>
                                                <option value="processing" {{ $order->order_status == 'processing' ? 'Selected' : '' }}> Processing</option>
                                                <option value="complete" {{ $order->order_status == 'complete' ? 'Selected' : '' }}> Complete</option>
                                                <option value="cancel" {{ $order->order_status == 'cancel' ? 'Selected' : '' }}> Cancel</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-form-label fw-bolder">Payment Amount</label>
                                        <div class="col-md-8">
                                            <input name="payment_amount" type="text" value="{{ number_format($order->order_total) }}" class="form-control" id="" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-form-label fw-bolder">Payment Status</label>
                                        <div class="col-md-8">
                                            <select name="payment_status" id="" class="form-control text-center" required>
                                                <option value="" disabled selected> -- Select Payment Status --</option>
                                                <option value="pending" {{ $order->payment_status == 'pending' ? 'Selected' : '' }}> Pending</option>
                                                <option value="processing" {{ $order->payment_status == 'processing' ? 'Selected' : '' }}> Processing</option>
                                                <option value="complete" {{ $order->payment_status == 'complete' ? 'Selected' : '' }}> Complete</option>
                                                <option value="cancel" {{ $order->payment_status == 'cancel' ? 'Selected' : '' }}> Cancel</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="text-center py-5">
                                    <button type="submit" class="btn btn-lg btn-success">Update Order Info</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection




