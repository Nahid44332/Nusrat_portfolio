<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
protected $guarded = [];
         protected $fillable = ['name','slug','description'];

    public static function boot()
    {
        parent::boot();
        static::creating(function($model){
            if(empty($model->slug)){
                $model->slug = Str::slug($model->name);
            }
        });
    }

      public function portfolios()
    {
        return $this->hasMany(Protfolio::class, 'category_id', 'id');
    }

}
