@extends('Frontend.master')
@section('title')
    Dashboard Page
@endsection
@section('main-content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Customer Dashboard</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                        <li>Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body">
                        <div class="list-group list-group-flush">
                            <a class="list-group-item">Dashboard</a>
                            <a class="list-group-item">My Profile</a>
                            <a class="list-group-item">My All Order</a>
                            <a class="list-group-item">My Payment</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                      <div class="card card-body">
                          <table class="table table-bordered">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Order ID</th>
                                      <th>Order Total</th>
                                      <th>Order Date</th>
                                      <th>Order Status</th>
                                  </tr>
                              </thead>
                              <tbody>
                              @foreach($orders as $order)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->order_total }}</td>
                                    <td>{{ $order->order_date }}</td>
                                    <td>{{ $order->order_status }}</td>
                                </tr>
                              @endforeach
                              </tbody>
                          </table>
                          {{ $orders->links() }}
                      </div>
                </div>
            </div>
        </div>
    </section>
@endsection
