<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CardController extends Controller
{
    private $product;
    //add to card
    public function addToCard(Request $request,$id)
    {

        $this->product = Product::find($id);

        Cart::add([
            'id'         => $this->product->id,
            'name'       => $this->product->product_name,
            'price'      => $this->product->selling_price,
            'quantity'   => $request->qty,
            'attributes' => [
                'image'  => $this->product->image,
            ]
        ]);
        return redirect('/show-card-product');
    }
    // show Card
    public function showCard()
    {
        return view('Frontend.card.show-card',[
            'products' => Cart::getContent(),
        ]);
    }

    //update

    public function updateCard(Request $request ,$id)
    {

        Cart::update($id,[

                 'quantity' => [
                     'relative' => false,
                     'value' => $request->qty,
                 ]

        ]);
        return redirect('/show-card-product')->with('success','Cart Product Info Update Successfully');

    }
    //delete cart
    public function deleteCard($id)
    {
        Cart::remove($id);
        return redirect('/show-card-product')->with('delete','Cart Product Info delete Successfully');

    }

}
