<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //home page

    private $categories;
    private $products;
    protected $brand;
    public function index()
    {

        return view('Frontend.home.home',[

            //Sob page er modde dite hobe dekhe AppServiceProvider Diye Full project er Modde Pass Kore disi
            // 'categories' => Category::where('status',1)->get(),

            'products' => Product::where('status',1)->orderBy('id','DESC')->take(12)->get(),
            'brands' => Brand::where('status',1)->get(),
        ]);
    }
    // Product Category page
    public function categoryProduct($id)
    {

        return view('Frontend.category.category-product',[
            'products' => Product::where('category_id',$id)->orderBy('id','DESC')->get(),

            //Sob page er modde dite hobe dekhe AppServiceProvider Diye Full project er Modde Pass Kore disi
            // 'categories' => Category::where('status',1)->get(),
       ]);
    }
    //product sub category
    public function subCategoryProduct($id)
    {


        return view('Frontend.category.sub-category-product',[
            'products' => Product::where('sub_category_id',$id)->orderBy('id','DESC')->get(),

             //Sob page er modde dite hobe dekhe AppServiceProvider Diye Full project er Modde Pass Kore disi
            // 'categories' => Category::where('status',1)->get(),

        ]);
    }

    //product details page
    public function productDetail($id)
    {
        return view('Frontend.product.detail',[
            'product' => Product::find($id),
        ]);
    }

}
