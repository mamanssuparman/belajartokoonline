<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Category_product extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable= [
        'nama_category',
        'slug'
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
