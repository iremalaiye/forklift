<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable=[

        'image',
        'name',
        'content',
    ];

    //seo
    public function images()
    {
        return $this->hasOne(ImageMedia::class,'table_id','id')->where('model_name','About');
    }

}
