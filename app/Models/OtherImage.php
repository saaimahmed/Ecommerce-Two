<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherImage extends Model
{
    use HasFactory;
    protected static $otherImage;
    protected static $otherImages;
//    image
    protected static $image;
    protected static $imageName;
    protected static $imageUrl;
    protected static $Directory;

    public static function getImageUrl($otherImage)
    {
        self::$imageName =time().rand(10,1000).'.'.$otherImage->getClientOriginalExtension();
        self::$Directory = 'admin-assets/img/other-images/';
        $otherImage->move(self::$Directory, self::$imageName);
        self::$imageUrl = self::$Directory.self::$imageName;
        return self::$imageUrl;

    }
    public static function newOtherImage($request ,$id)
    {
        self::$otherImages = $request->file('other_image');
        foreach (self::$otherImages as $otherImage)
        {
            self::$otherImage             = new OtherImage();
            self::$otherImage->product_id = $id;
            self::$otherImage->image      = self::getImageUrl($otherImage);
            self::$otherImage->save();
        }
    }
    public static function updateOtherImage($request,$id)
    {
       self::$otherImages = OtherImage::where('product_id',$id)->get();
       foreach (self::$otherImages as $otherImage)
       {
           if (file_exists($otherImage->image))
           {
               unlink($otherImage->image);
           }
           $otherImage->delete();
       }
       self::newOtherImage($request,$id);
    }
}
