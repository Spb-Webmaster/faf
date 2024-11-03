<?php

namespace App\View\Composers;


use App\Models\Page;
use Domain\Catalog\ViewModels\CatalogViewModel;
use Domain\Page\ViewModels\PageViewModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class CatalogMenuComposer
{
    public function compose(View $view): void
    {
        $top_menu = PageViewModel::make()->pages_menu();

        $categories = CatalogViewModel::make()->categories();


        $view->with([
            'top_menu' => $top_menu,
            'categories' => $categories,
        ]);


    }
}
