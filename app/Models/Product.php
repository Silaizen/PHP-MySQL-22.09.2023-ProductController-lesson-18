<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $with = ['category'];

    protected $fillable = ['name', 'description', 'price', 'category_id', 'image'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
            ];
    }

    function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function reviews()
{
    return $this->hasMany(ProductReview::class);
}


protected function image(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value ? $value : asset('images/No_images_avaible.webp'),
        );
    }

   

}