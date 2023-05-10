<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Session;

class CustomerAuthController extends Controller
{
    public $customer;
    public function login()
    {
        return view('customer.auth.login');
    }
    public function loginCheck(Request $request)
    {
        $this->customer = Customer::where('mobile',$request->mobile)->first();

        if ($this->customer)
        {
            if (password_verify($request->password, $this->customer->password))
            {
                Session::put('customer_id' ,$this->customer->id);
                Session::put('customer_name',$this->customer->name);
                return redirect('/customer-dashboard')->with('success','login Successfully');
            }
            else{
                return redirect()->back()->with('message','Your Password is invalid');
            }
        }
        else{
            return redirect()->back()->with('message1','Your Mobile Number is invalid');
        }

    }
    public function register()
    {
        return view('customer.auth.register');

    }
    public function newCustomerRegister(Request $request)
    {
        $this->customer = new Customer();
        $this->customer->name       = $request->name;
        $this->customer->email      = $request->email;
        $this->customer->password   = bcrypt($request->password);
        $this->customer->mobile     = $request->mobile;
        $this->customer->save();

        Session::put('customer_id' ,$this->customer->id);
        Session::put('customer_name',$this->customer->name);
        return redirect('/customer-dashboard')->with('success','Registration Successfully');

    }
    public function logout()
    {
        Session::forget('customer_id');
        Session::forget('customer_name');
        return redirect('/')->with('delete','Logout Successfully');
    }
}
