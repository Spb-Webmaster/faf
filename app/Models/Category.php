<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'img',
        'text',
        'published',
        'params',
        'metatitle',
        'description',
        'keywords',
        'sorting',
    ];


    public function products():HasMany
    {
        return $this->hasMany(Product::class);
    }


    protected static function boot()
    {
        parent::boot();

        # Проверка данных  перед сохранением
        #  static::saving(function ($Moonshine) {   });


        static::created(function () {
            cache_clear();
        });

        static::updated(function () {
            cache_clear();
        });

        static::deleted(function () {
            cache_clear();
        });


    }
}
