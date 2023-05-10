<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    //
    protected $product;
    protected $categoryId;
    protected $subCategories;


    //manage
    public function index()
    {
        return view('Backend.product.product-manage',[
            'products' => Product::latest()->get()
        ]);
    }
//create
    public function create()
    {
        return view('Backend.product.add',[
            'categories'    => Category::where('status',1)->get(),
            'subcategories' => SubCategory::where('status',1)->get(),
            'brands'        => Brand::where('status', 1)->get(),
            'units'         => Unit::where('status', 1)->get(),
        ]);
    }

    public function getSubCategory()
    {
        $this->categoryId       = $_GET['id'];
        $this->subCategories    = SubCategory::where('category_id', $this->categoryId)->get();
        return response()->json($this->subCategories);
    }

    //store
    public function store(Request $request)
    {
        $this->products = Product::createProduct($request);
        OtherImage::newOtherImage($request,$this->products->id);
        Alert::alert()->success('Product Created Successfully','We have Added Product to the All Products');
        return redirect()->route('products.index');
    }
    //details
    public function details($id)
    {
        return view('Backend.product.details',[
            'product' => Product::find($id),
        ]);
    }
    // Edit
    public function editProduct($id)
    {
        return view('Backend.product.edit',[
            'categories'    => Category::where('status',1)->get(),
            'subcategories' => SubCategory::where('status',1)->get(),
            'brands'        => Brand::where('status', 1)->get(),
            'units'         => Unit::where('status', 1)->get(),
            'product' => Product::find($id),
        ]);
    }
    //update
    public function updateProduct(Request $request, $id)
    {
        Product::updateProduct($request ,$id);
        if ($request->file('other_image'))
        {
            OtherImage::updateOtherImage($request,$id);
        }
        Alert::alert()->success('Product Update Successfully','We have Update Product to the All Products');
        return redirect()->route('products.index');

    }
    //delete
    public function deleteProduct(Request $request,$id)
    {
        Product::deleteProduct($id);
        Alert::alert()->error('Sub product Delete Successfully','We have Delete product to the All products');
        return redirect()->back();
    }
    //status
    public function statusProduct($id)
    {
        $this->product = Product::find($id);
        $this->product->status = $this->product->status == 1 ? 0 : 1 ;
        $this->product->save();

        if ($this->product->status == 1)
        {
            Alert::info('Active','Brand Status Active');
            return redirect()->back();
        }
        else
        {
            Alert::warning('Deactive','Brand Status Deactive');
            return redirect()->back();
        }

    }

}
