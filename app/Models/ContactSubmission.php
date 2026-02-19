<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $table = 'contact_submissions';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'subject',
        'message',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /** Human-readable subject labels (Arabic) */
    public static function subjectLabels(): array
    {
        return [
            'consultation' => 'استشارة مجانية',
            'development' => 'تطوير المواقع',
            'design' => 'تصميم الجرافيك',
            'marketing' => 'التسويق الرقمي',
            'support' => 'دعم فني',
            'other' => 'موضوع آخر',
        ];
    }

    public function getSubjectLabelAttribute(): string
    {
        return self::subjectLabels()[$this->subject] ?? $this->subject;
    }
}
