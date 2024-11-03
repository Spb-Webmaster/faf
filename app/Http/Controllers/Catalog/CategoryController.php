<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Domain\Catalog\ViewModels\CatalogViewModel;

class CategoryController extends Controller
{
    /**
     * Вывод каталога, переключение на первую страницу категории
     */
    public function catalog()
    {
        $categories = CatalogViewModel::make()->categories();
        $category = $categories->first->all();
        return redirect(route('category', ['category'=> $category->slug]));
    }

    /**
     * Вывод страницы категорий
     */
    public function category($category)
    {

        $category = CatalogViewModel::make()->category($category);
        $categories = CatalogViewModel::make()->categories();
        $product_category = $category->products;

    return view('pages.catalog.category', [
         'category' => $category,
         'categories' => $categories,
         'product_category' => $product_category
     ]);
    }



}
