<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;
protected $guarded = [];
    protected $fillable = [
        'title',
        'favicon',
        'logo',
        'footer_text',
        'facebook',
        'linkedin',
        'github',
        'email',
        'phone',
        'address',
    ];
}
