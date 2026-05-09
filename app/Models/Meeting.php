<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Meeting extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'meeting_date',
        'meeting_time',
        'location',
        'meeting_type',
        'status',
        'agenda',
        'meeting_minutes',
        'attendance_percentage',
        'created_by',
    ];

    protected $casts = [
        'meeting_date' => 'date',
        'attendance_percentage' => 'decimal:2',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function messages()
    {
        return $this->hasMany(MeetingMessage::class)->orderBy('created_at');
    }
}
