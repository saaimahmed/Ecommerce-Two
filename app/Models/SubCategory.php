<?php

namespace App\Models;

use App\Helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected static $subcategory;
    protected $fillable = [
        'category_id','sub_category_name','sub_category_description','image',
    ];

    public static function CreateAndUpdateCategory($request , $id=null)
    {
        SubCategory::updateOrCreate(['id' => $id],[
            'category_id' => $request->category_id,
            'sub_category_name' => $request->sub_category_name,
            'sub_category_description' => $request->sub_category_description,
            'image' => Helper::getImageUrl($request->file('image'),'admin-assets/img/sub-category/',isset($id) ? SubCategory::find($id)->image : ''),
        ]);
    }
    public static function deleteSubCategory($id)
    {
        self::$subcategory = SubCategory::find($id);

        if (file_exists(self::$subcategory->image))
        {
            unlink(self::$subcategory->image);
        }
        self::$subcategory->delete();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
