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
        'description',
        'image',
        'status',

    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'model'
            ]
        ];
    }


}
