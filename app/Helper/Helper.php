<?php


namespace App\Helper;


class Helper
{
    protected static $imageName;
    protected static $imageUrl;
    protected static $status;

    public static function getImageUrl($image,$directory,$modelImage = null){

        if ($image)
        {
            if (isset($modelImage))
            {
                if (file_exists($modelImage))
                {
                    unlink($modelImage);
                }
            }
            self::$imageName = time().rand(10,1000).'.'.$image->getClientOriginalExtension();
            $image->move($directory,self::$imageName);
            self::$imageUrl = $directory.self::$imageName;
        }
        else
        {
            self::$imageUrl = $modelImage;
        }
        return self::$imageUrl;

    }

}
