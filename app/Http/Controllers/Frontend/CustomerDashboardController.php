<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Session;

class CustomerDashboardController extends Controller
{
    //
    public function customerDashboard()
    {

        return view('customer.dashboard.home',[
            'orders' => Order::where('customer_id',Session::get('customer_id'))->latest()->simplePaginate(5),
        ]);
    }
}
