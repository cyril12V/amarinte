<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoryCard extends Model
{
    use HasFactory;

    protected $fillable = [
        'prestation_id',
        'image',
        'continent',
        'sector',
        'description',
        'content',
        'order'
    ];

    protected $casts = [
        'order' => 'integer'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($memoryCard) {
            if (is_null($memoryCard->order)) {
                $memoryCard->order = MemoryCard::max('order') + 1;
            }
        });
    }

    public function prestation()
    {
        return $this->belongsTo(Prestation::class);
    }
}
