<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    private $categories;
    private $subCategories;
    private $result;
    private $product;

    //category and Sub category
    public function getAllCategory()
    {
        $this->categories = Category::all();
        foreach ($this->categories as $key => $category)
        {
            $this->subCategories = SubCategory::where('category_id',$category->id)->get();
            $this->result [$key]['category'] = $category;
            $this->result [$key]['sub_category'] = $this->subCategories;
        }

        return response()->json($this->result);
    }


    //latest product
    public function getLatestProduct()
    {

        $this->product = Product::latest()->take(8)->get(['id','product_name','selling_price','image']);
        foreach ($this->product as $product)
        {
            $product->image = asset($product->image);
        }
        return response()->json($this->product);

    }

    //product category wise
    public function getProductByCategory($id)
    {

       $this->product = Product::where('category_id',$id)->latest()->take(50)->get(['id','category_id','product_name','selling_price','image']);
        foreach ($this->product as $product)
        {
            $product->image = asset($product->image);
        }
        return response()->json($this->product);
    }

    //products Details ById
    public function getProductById($id)
    {
        $this->product = Product::find($id);
        $this->product->image =asset($this->product->image);
        $this->product->category = Category::find($this->product->category_id)->category_name;
        $this->product->brand = Brand::find($this->product->brand_id)->brand_name;
        return response()->json($this->product);

    }
}
