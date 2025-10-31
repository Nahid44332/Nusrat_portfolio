<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protfolio extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'name',
        'category',
        'tools',
        'description',
        'live_link',
        'github_link',
        'image',
        'client',
        'date',
        'duration',
        'overview',
        'key_highlights',
    ];

    protected $casts = [
        'key_highlights' => 'array', 
    ];

      public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
