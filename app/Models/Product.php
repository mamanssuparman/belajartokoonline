<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'name',
        'price',
        'description',
        'slug',
        'category_id'
    ];
    public function gallery_products()
    {
        return $this->hasMany(Gallery_product::class, 'uses_id', 'id');
    }
    public function categories()
    {
        return $this->belongsTo(Category_product::class,'category_id','id');
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
