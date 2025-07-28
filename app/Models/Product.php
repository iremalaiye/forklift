<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Product extends Model
{
    use Sluggable;
    protected $fillable=[
        'model',
        'slug',
        'capacity',
        'content',
        'image',
        'status',
        'title',
        'description',
        'keywords',

    ];

    //seo
    public function images()
    {
        return $this->hasOne(ImageMedia::class,'table_id','id')->where('model_name','Product');
    }


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'model'
            ]
        ];
    }


}
