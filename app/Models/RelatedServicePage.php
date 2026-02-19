<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RelatedServicePage extends Model
{
    protected $table = 'related_service_pages';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'page_content',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::creating(function (RelatedServicePage $model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    public function services()
    {
        return $this->belongsToMany(
            Service::class,
            'service_related_page',
            'related_service_page_id',
            'service_id'
        )->withPivot('sort_order');
    }
}
