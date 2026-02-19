<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'title',
        'description',
        'page_content',
        'icon_svg',
        'link',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Scope to get only active services ordered by sort_order.
     */
    public function scopeActiveOrdered($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order')->orderBy('id');
    }

    /**
     * Related services (many-to-many self) – shown on front services list page only.
     */
    public function relatedServices()
    {
        return $this->belongsToMany(
            Service::class,
            'service_related',
            'service_id',
            'related_service_id'
        )->withPivot('sort_order')->orderByPivot('sort_order')->orderByPivot('related_service_id');
    }

    /**
     * Related service pages (each has its own page) – created from dashboard, shown on front services list only.
     */
    public function relatedServicePages()
    {
        return $this->belongsToMany(
            RelatedServicePage::class,
            'service_related_page',
            'service_id',
            'related_service_page_id'
        )->withPivot('sort_order')->orderByPivot('sort_order')->orderByPivot('related_service_page_id');
    }
}
