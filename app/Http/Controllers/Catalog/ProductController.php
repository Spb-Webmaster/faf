<?php

namespace App\Http\Controllers\Catalog;

use App\Http\Controllers\Controller;
use Domain\Catalog\ViewModels\CatalogViewModel;
use Domain\Catalog\ViewModels\ObjectsViewModel;

class ProductController extends Controller
{



    /**
     * Вывод страницы категорий
     */
    public function product($category, $product)
    {

        $product = ObjectsViewModel::make()->product($product);
        $category = CatalogViewModel::make()->category($category);

        $categories = CatalogViewModel::make()->categories();
        $product_category = $category->products;

    return view('pages.catalog.product', [
         'category' => $category,
         'categories' => $categories,
         'product_category' => $product_category,
         'product' => $product
     ]);
    }



}
