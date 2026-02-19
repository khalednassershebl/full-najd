<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceRelatedLink extends Model
{
    protected $table = 'service_related_links';

    protected $fillable = [
        'service_id',
        'title',
        'link',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
