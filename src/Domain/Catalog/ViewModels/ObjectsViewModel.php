<?php
namespace Domain\Catalog\ViewModels;


use App\Models\Category;
use App\Models\Product;
use Support\Traits\Makeable;

class ObjectsViewModel
{
    use Makeable;

    public function product($slug) {

        $category = Product::query()
            ->where('published', true)
            ->where('slug', $slug)
            ->first();

        return $category;
    }
}
