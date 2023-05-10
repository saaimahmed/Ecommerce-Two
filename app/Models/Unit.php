<?php

namespace App\Models;

use App\Helper\Helper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = [
        'unit_name','unit_description',
    ];

    public static function CreateAndUpdateCategory($request , $id=null)
    {
        Unit::updateOrCreate(['id' => $id],[
            'unit_name' => $request->unit_name,
            'unit_description' => $request->unit_description,
        ]);
    }
}
