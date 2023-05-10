<?php

namespace App\Models;

use App\Helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'brand_name','brand_description','image',
    ];

    public static function CreateAndUpdateCategory($request , $id=null)
    {
        Brand::updateOrCreate(['id' => $id],[
            'brand_name' => $request->brand_name,
            'brand_description' => $request->brand_description,
            'image' => Helper::getImageUrl($request->file('image'),'admin-assets/img/brand/',isset($id) ? Brand::find($id)->image : ''),
        ]);
    }
}
