<?php
namespace Domain\Page\ViewModels;


use App\Models\Page;
use Support\Traits\Makeable;

class PageViewModel
{
    use Makeable;


    public function page($slug) {
        $paage = Page::query()
            ->where('published', true)
            ->where('slug', $slug)
            ->first();

        return $paage;
    }

    public function pages_menu() {

        $pages = Page::query()
            ->where('published', true)
            ->whereNotNull('menu')
            ->orderBy('sorting')
            ->take(10)
            ->get();

        return $pages;
    }



}
