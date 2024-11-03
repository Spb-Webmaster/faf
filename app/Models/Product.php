<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
  protected $table = 'products';

    protected $fillable = [
        'title',
        'slug',
        'subtitle',
        'category_id',
        'img',
        'text',
        'text2',
        'price',
        'gallery',
        'video',
        'file',
        'desc_to',
        'desc_from',
        'poster',
        'property',
        'published',
        'params',
        'metatitle',
        'description',
        'keywords',
        'sorting',
    ];

    protected $casts = [
        'params' => 'collection',
        'gallery' => 'collection',
        'file' => 'collection',
        'property' => 'collection',
    ];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class,  'category_id');
    }

    public function getGalleryVisibleAttribute()
    {

        if($this->gallery) {
            foreach ($this->gallery as $g) {
                if ($g) { // если хоть одно фото, то нужно!
                    return true;
                }

            }
        }
        return false;

    }

    public function getFileVisibleAttribute()
    {

        if($this->file) {
            foreach ($this->file as $g) {
                if ($g) { // если хоть одно фото, то нужно!
                    return true;
                }

            }
        }
        return false;

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
