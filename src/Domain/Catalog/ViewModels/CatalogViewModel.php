<?php
namespace Domain\Catalog\ViewModels;


use App\Models\Category;
use Support\Traits\Makeable;

class CatalogViewModel
{
    use Makeable;


    public function category($slug) {
        $category = Category::query()
            ->where('published', true)
            ->where('slug', $slug)
            ->first();

        return $category;
    }

    public function categories() {

        $categories = Category::query()
            ->where('published', true)
            ->orderBy('sorting')
            ->get();

        return $categories;
    }



}
