<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //report
    public function reportOrder()
    {
        return view('Backend.report.monthlt-order');
    }

    public function reportOrderShow(Request $request)
    {
        $startTimestamp = strtotime($request->start_date);
        $endTimestamp = strtotime($request->end_date);

       $orders = Order::where('order_timestamp','>=', $startTimestamp)
                 ->where('order_timestamp','<=',$endTimestamp)
                  ->orderBy('id','DESC')->get();
       return $orders;

    }
}
