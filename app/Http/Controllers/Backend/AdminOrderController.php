<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderCancel;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class AdminOrderController extends Controller
{
    protected $order;
    protected $orderDetails;
    protected $product;
    protected $orderCancel;
    protected $productString;

    public function orderManage()
    {
        return view('Backend.order.manage',[
            'orders' => Order::latest()->get(),
        ]);
    }
    public function orderDetail($id)
    {
        return view('Backend.order.order-detail',[
            'order' => Order::find($id),
        ]);
    }
    public function orderInvoice($id)
    {
        return view('Backend.order.order-invoice',[
            'order' => Order::find($id),
        ]);
    }
    public function orderPrint($id)
    {


        $pdf = PDF::loadView('Backend.order.order-print',['order' => Order::find($id)]);
        return $pdf->stream('invoice#'.$id.'.pdf');

    }


    public function orderEdit($id)
    {
        return view('Backend.order.order-edit',[
            'order' => Order::find($id),
        ]);
    }
    public function orderUpdate(Request $request,$id)
    {
        $this->order = Order::find($id);
        $this->order->order_status = $request->order_status;
        $this->order->payment_status = $request->payment_status;
        $this->order->delivery_address = $request->delivery_address;
        $this->order->save();
        if ($request->order_status == 'complete')
        {
            $this->order->payment_amount = $request->payment_amount;
            $this->order->payment_date = date('Y-m-d');
            $this->order->payment_timestamp = strtotime(date('Y-m-d'));
            $this->order->delivery_date = date('Y-m-d');;
            $this->order->delivery_timestamp = strtotime(date('Y-m-d'));
            $this->order->save();

             $this->orderDetails =  OrderDetail::where('order_id',$id)->get();
             foreach ($this->orderDetails as $orderDetail)
             {
                 $this->product = Product::find($orderDetail->product_id);
                 $this->product->stock_amount = $this->product->stock_amount - $orderDetail->product_quantity;
                 $this->product->save();
             }

        }

        return redirect('/admin-order-manage')->with('success','Admin Order Update Successfully');


    }

    public function orderDelete($id)
    {
        $this->order = Order::find($id);
        $this->orderDetails = OrderDetail::where('order_id',$id)->get();
        foreach ($this->orderDetails as $orderDetail)
        {
           $this->productString .= '{'.$orderDetail->product_id.','.$orderDetail->product_name.','.$orderDetail->product_price.','.$orderDetail->product_quantity.'}';
        }

        $this->orderCancel                   = new OrderCancel();

        $this->orderCancel->order_id         = $this->order->id;
        $this->orderCancel->customer_id      = $this->order->customer_id;
        $this->orderCancel->order_total      = $this->order->order_total;
        $this->orderCancel->tax_total        = $this->order->tax_amount;
        $this->orderCancel->shipping_total   = $this->order->shipping_cost;
        $this->orderCancel->order_date       = $this->order->order_date;
        $this->orderCancel->cancel_date      = date('Y-m-d');
        $this->orderCancel->payment_type     = $this->order->payment_type;
        $this->orderCancel->product_info     = $this->productString;
        $this->orderCancel->save();

        $this->order->delete();

        foreach ($this->orderDetails as $orderDetail)
        {
            $orderDetail->delete();
        }
        return redirect('/admin-order-manage')->with('delete','Admin Order delete Successfully');
    }

}
