
@extends('Backend.master')
@section('title')
    Manage Order Page
@endsection
@section('body')
    @include('sweetalert::alert')

    <section class="section  py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title text-center"> All Order Info</h4>
                            <table class="table table-bordered table-responsive">
                               <thead class="text-center">
                                 <tr>
                                     <th>#</th>
                                     <th>Order Id</th>
                                     <th>Customer Info</th>
                                     <th>Order Total</th>
                                     <th>Order Date</th>
                                     <th>Order status</th>
                                     <th>Payment status</th>
                                     <th>Action</th>
                                 </tr>
                               </thead>
                                <tbody class="text-center">
                                @foreach($orders as $order)
                                   <tr>
                                       <td>{{ $loop->iteration }}</td>
                                       <td>{{ $order->id }}</td>
                                       <td>{{ $order->customer->name }} ({{ $order->customer->mobile }})</td>
                                       <td>{{ $order->order_total }}</td>
                                       <td>{{ $order->order_date }}</td>
                                       <td>{{ $order->order_status }}</td>
                                       <td>{{ $order->payment_status }}</td>
                                       <td>
                                           <a href="{{ route('admin-order-detail',$order->id) }}" class="text-white btn  btn-warning btn-sm"><i class=" fa fa-book-open"></i></a>
                                           <a href="{{ route('admin-order-invoice',$order->id) }}" class="text-white btn  btn-info btn-sm "><i class="fa fa-file-invoice"></i></a>
                                           <a href="{{ route('admin-order-print',$order->id) }}" class="text-white btn btn-primary btn-sm " target="_blank" ><i class="fa fa-print"></i></a>
                                           <a href="{{ route('admin-order-edit',$order->id) }}" class="btn btn-success btn-sm {{ $order->order_status == 'complete' ? 'disabled' : '' }}" ><i class="fa fa-edit"></i></a>
                                           <a href="{{ route('admin-order-delete',$order->id) }}" class="btn btn-danger btn-sm {{ $order->order_status == 'cancel' ? '' : 'disabled' }}" onclick="return confirm('Are You Sure To Delete..')"><i class=" fa fa-trash"></i></a>

                                       </td>
                                   </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection




