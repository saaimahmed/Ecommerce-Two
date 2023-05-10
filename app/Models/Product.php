<?php

namespace App\Models;

use App\Helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;

class Product extends Model
{
    use HasFactory;

    protected static $product;
    protected static $otherImages;

    public static function createProduct($request)
    {
        self::$product                   = new Product();
        self::$product->category_id      = $request->category_id;
        self::$product->sub_category_id  = $request->sub_category_id;
        self::$product->brand_id         = $request->brand_id;
        self::$product->unit_id          = $request->unit_id;
        self::$product->product_name     = $request->product_name;
        self::$product->product_code     = $request->product_code;
        self::$product->regular_price    = $request->regular_price;
        self::$product->selling_price    = $request->selling_price;
        self::$product->stock_amount     = $request->stock_amount;
        self::$product->product_short_description          = $request->product_short_description;
        self::$product->product_long_description            = $request->product_long_description;
        self::$product->image            = Helper::getImageUrl($request->file('image'),'admin-assets/img/product/');
        self::$product->save();
        return self::$product;
    }
    public static function updateProduct($request ,$id)
    {
        self::$product = Product::find($id);
        self::$product->category_id      = $request->category_id;
        self::$product->sub_category_id  = $request->sub_category_id;
        self::$product->brand_id         = $request->brand_id;
        self::$product->unit_id          = $request->unit_id;
        self::$product->product_name     = $request->product_name;
        self::$product->product_code     = $request->product_code;
        self::$product->regular_price    = $request->regular_price;
        self::$product->selling_price    = $request->selling_price;
        self::$product->stock_amount     = $request->stock_amount;
        self::$product->product_short_description          = $request->product_short_description;
        self::$product->product_long_description            = $request->product_long_description;
        self::$product->image            = Helper::getImageUrl($request->file('image'),'admin-assets/img/product/',isset($id) ? Product::find($id)->image : null);
        self::$product->save();
        return self::$product;

    }
    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);
        if (file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
        self::$otherImages =OtherImage::where('product_id',$id)->get();
        foreach (self::$otherImages as $otherImage)
        {
            if (file_exists($otherImage->image))
            {
                unlink($otherImage->image);
            }
            $otherImage->delete();
        }

    }



    public function category()
    {
        return $this->belongsTo(Category::class);
    }

     public function subCategory()
     {
         return $this->belongsTo(SubCategory::class);
     }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function otherImages()
    {
        return $this->hasMany(OtherImage::class);
    }

}
