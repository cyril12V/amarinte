<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'hero_image',
        'description',
        'middle_image',
        'format_title',
        'format_content',
        'status',
        'order'
    ];

    protected $casts = [
        'status' => 'string',
        'order' => 'integer'
    ];

    protected $translatable = [
        'title',
        'description',
        'format_title',
        'format_content'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($prestation) {
            if (is_null($prestation->order)) {
                $prestation->order = Prestation::max('order') + 1;
            }
        });
    }

    public function memoryCards()
    {
        return $this->hasMany(MemoryCard::class);
    }
}
