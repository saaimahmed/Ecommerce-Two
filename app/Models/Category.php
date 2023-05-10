<?php

namespace App\Models;

use App\Helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name','category_description','image',
    ];

   public static function CreateAndUpdateCategory($request , $id=null)
   {
       Category::updateOrCreate(['id' => $id],[
           'category_name' => $request->category_name,
           'category_description' => $request->category_description,
           'image' => Helper::getImageUrl($request->file('image'),'admin-assets/img/category/',isset($id) ? Category::find($id)->image : ''),
       ]);
   }

   public function subCategory()
   {
       return $this->hasMany(SubCategory::class);
   }
}
