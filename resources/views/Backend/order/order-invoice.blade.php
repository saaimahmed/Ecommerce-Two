




@extends('Backend.master')
@section('title')
   Order Invoice Page
@endsection
@section('body')
    @include('sweetalert::alert')

 <section class="py-5">
     <style>
         body {
             font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
             text-align: center;
             color: #777;
         }

         body h1 {
             font-weight: 300;
             margin-bottom: 0px;
             padding-bottom: 0px;
             color: #000;
         }

         body h3 {
             font-weight: 300;
             margin-top: 10px;
             margin-bottom: 20px;
             font-style: italic;
             color: #555;
         }

         body a {
             color: #06f;
         }

         .invoice-box {
             max-width: 800px;
             margin: auto;
             padding: 30px;
             border: 1px solid #eee;
             box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
             font-size: 16px;
             line-height: 24px;
             font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
             color: #555;
         }

         .invoice-box table {
             width: 100%;
             line-height: inherit;
             text-align: left;
             border-collapse: collapse;
         }

         .invoice-box table td {
             padding: 5px;
             vertical-align: top;
         }

         .invoice-box table tr td:nth-child(2) {
             text-align: right;
         }

         .invoice-box table tr.top table td {
             padding-bottom: 20px;
         }

         .invoice-box table tr.top table td.title {
             font-size: 45px;
             line-height: 45px;
             color: #333;
         }

         .invoice-box table tr.information table td {
             padding-bottom: 40px;
         }

         .invoice-box table tr.heading td {
             background: #eee;
             border-bottom: 1px solid #ddd;
             font-weight: bold;
         }

         .invoice-box table tr.details td {
             padding-bottom: 20px;
         }

         .invoice-box table tr.item td {
             border-bottom: 1px solid #eee;
         }

         .invoice-box table tr.item.last td {
             border-bottom: none;
         }

         .invoice-box table tr.total td:nth-child(2) {
             border-top: 2px solid #eee;
             font-weight: bold;
         }

         @media only screen and (max-width: 600px) {
             .invoice-box table tr.top table td {
                 width: 100%;
                 display: block;
                 text-align: center;
             }

             .invoice-box table tr.information table td {
                 width: 100%;
                 display: block;
                 text-align: center;
             }
         }
     </style>
         <div class="row">
             <div class="col-12">
                 <div class="card">
                     <h4 class="card-title">Order Invoice info</h4>
                     <hr />
                     <div class="invoice-box">
                         <table cellpadding="0" cellspacing="0">
                             <tr class="top">
                                 <td colspan="5">
                                     <table>
                                         <tr>
                                             <td class="title">
                                                 <img src="{{ asset('/') }}admin-assets/img/black-and-white.jpg" alt="logo" style="width: 70%; max-width: 100px" />
                                             </td>
                                             <td>
                                                 Invoice #: {{ $order->id }}<br />
                                                 Order date: {{ $order->order_date }}<br />
                                                 Invoice date: {{ date('Y-m-d') }}
                                             </td>
                                         </tr>
                                     </table>
                                 </td>
                             </tr>

                             <tr class="information">
                                 <td colspan="5">
                                     <table>
                                         <tr>
                                             <td>
                                                 <h4>Billing info</h4>
                                                 {{ $order->customer->name }}<br />
                                                 {{ $order->customer->email }}<br />
                                                 {{ $order->customer->mobile }}<br />
                                                 {{ $order->customer->address }}
                                             </td>

                                             <td>
                                                 <h4>Shipping Info</h4>
                                                 {{ $order->delivery_address }}<br />
                                             </td>
                                         </tr>
                                     </table>
                                 </td>
                             </tr>

                             <tr class="heading">
                                 <td colspan="4">Payment Method</td>

                                 <td >Total Payable</td>
                             </tr>

                             <tr class="details">
                                 <td colspan="4">{{ $order->payment_type == 1 ? 'Cash on Delivery' : ' Online Payment Gateway' }}</td>

                                 <td>{{ number_format($order->order_total) }}</td>
                             </tr>

                             <tr class="heading">
                                 <td>#</td>
                                 <td>Item</td>
                                 <td>Quantity</td>
                                 <td style="text-align: right">Unit Price</td>
                                 <td style="text-align: right">Total Price</td>
                             </tr>

                             <tr class="item">
                                 @php($total = 0)
                                 @foreach($order->orderDetails as $orderDetail)
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $orderDetail->product_name }}</td>
                                 <td style="text-align: center">{{ $orderDetail->product_quantity }}</td>
                                 <td style="text-align: right">{{ number_format($orderDetail->product_price) }}</td>
                                 <td style="text-align: right">{{  number_format($subtotal = $orderDetail->product_quantity * $orderDetail->product_price) }}</td>
                                 @php( $total = $total + $subtotal)
                                 @endforeach
                             </tr>

                             <tr class="total">
                                 <td colspan="4"></td>
                                 <td>Sub Total: Tk. {{number_format($total)}}</td>
                             </tr>
                             <tr class="total">
                                 <td colspan="4"></td>
                                 @php($tax = round($total*15/100))
                                 <td>Tax Total (15%): Tk. {{number_format($tax)}}</td>
                             </tr>
                             <tr class="total">
                                 <td colspan="4"></td>
                                 @php($shipping = 100)
                                 <td>Shipping Cost: Tk. {{ $shipping }}</td>
                             </tr>
                             <tr class="total">
                                 <td colspan="4"></td>
                                 @php( $grandTotal = ( $total + $tax + $shipping))
                                 <td>Total Payable :Tk.  {{ number_format($grandTotal )}}</td>
                             </tr>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
 </section>


@endsection





