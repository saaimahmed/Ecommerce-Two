<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderConfirmationMail;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Session;
use Cart;

class CheckoutController extends Controller
{
    //create
    private $products;
    protected $customer;
    protected $customerId;
    protected $order;
    protected $orderDetal;
    protected $cartProducts;
    protected $data;
    public function createCheck()
    {
        return view('Frontend.checkout.checkout',[
            'products' => Cart::getContent(),
        ]);
    }
    // new Order
    public function newOrder(Request $request)
    {
        if (Session::get('customer_id')){

            $this->customer = Customer::find(Session::get('customer_id'));
        }
        else{
            $this->customer             = new Customer();
            $this->customer->name       = $request->name;
            $this->customer->email      = $request->email;
            $this->customer->password   = bcrypt($request->mobile);
            $this->customer->mobile     = $request->mobile;
            $this->customer->address    = $request->delivery_address;
            $this->customer->save();

            Session::put('customer_id',$this->customer->id);
            Session::put('customer_name',$this->customer->name);
        }


        if ($request->payment_method == 1)
        {
            $this->order                    = new Order();
            $this->order->customer_id       = $this->customer->id;
            $this->order->order_total       = Session::get('grand_total');
            $this->order->tax_amount        = Session::get('tax_total');
            $this->order->shipping_cost     = Session::get('shipping_total');
            $this->order->order_date        = date('Y-m-d');
            $this->order->order_timestamp   = strtotime(date('Y-m-d'));
            $this->order->payment_type      = $request->payment_method;
            $this->order->delivery_address  = $request->delivery_address;
            $this->order->save();


            $this->cartProducts = Cart::getContent();
            foreach($this->cartProducts as $cartProduct)
            {
                $this->orderDetal                   = new OrderDetail();
                $this->orderDetal->order_id         = $this->order->id;
                $this->orderDetal->product_id       = $cartProduct->id;
                $this->orderDetal->product_name     = $cartProduct->name;
                $this->orderDetal->product_price    = $cartProduct->price;
                $this->orderDetal->product_quantity = $cartProduct->quantity;
                $this->orderDetal->save();

            }

            foreach ($this->cartProducts as $cartProduct)
            {
                Cart::remove($cartProduct->id);
            }

//
//            //====Email Send ====//
//            $this->data = [
//                'title' => 'This is email Title',
//                'name' => $request->name,
//                'total' => Session::get('grand_total'),
//            ];
//
//           Mail::to($request->email)->send(new OrderConfirmationMail($this->data));
//            //====Email Send ====//


            Alert::alert('success',"Congratlation ".$this->customer->name ." . Please wait. we will contact with you Soon.");
            return redirect('/complete-order');

        }
        else
        {
            return view('api.online-payment');

        }

    }
    public function completeOrder()
    {
        return view('customer.order.complete-order');
    }


    public function emailStatus()
    {
        $email = $_GET['email'];
        $customer = Customer::where('email',$email)->first();
        if ($customer)
        {
            return response()->json([
                'status' => 1,
                'message' => 'Email Already Exist',
            ]);
        }
        else
        {
            return response()->json([
                'status' => 2,
                'message' => 'Email Available',
            ]);
        }

    }
}
