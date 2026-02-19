<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'excerpt',
        'content',
        'image',
        'demo_url',
        'is_published',
        'sort_order',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'sort_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Product $product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->title);
            }
        });

        static::updating(function (Product $product) {
            if ($product->isDirty('title') && !$product->isDirty('slug')) {
                $product->slug = Str::slug($product->title);
            }
        });
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
            ->orderBy('sort_order')
            ->orderBy('id');
    }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }
}
