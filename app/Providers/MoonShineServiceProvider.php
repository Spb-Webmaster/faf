<?php

declare(strict_types=1);

namespace App\Providers;

use App\MoonShine\Pages\IndexPage;
use App\MoonShine\Pages\SettingPage;
use App\MoonShine\Resources\CategoryResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\SeoResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;
use MoonShine\MoonShine;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuItem;
use MoonShine\Resources\MoonShineUserResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Menu\MenuElement;
use MoonShine\Pages\Page;
use Closure;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ]),

            MenuGroup::make(static fn() => __('Каталог'), [

               MenuItem::make(
                    static fn() => __('Категории'),
                    new CategoryResource()
                )->icon('heroicons.outline.flag'),
                MenuItem::make(
                    static fn() => __('Продукты'),
                    new ProductResource()
                )->icon('heroicons.outline.list-bullet'),

            ]),

            MenuGroup::make(static fn() => __('Страницы'), [

                MenuItem::make(
                    static fn() => __('Главная'),
                    new IndexPage()
                )->icon('heroicons.outline.bug-ant'),
                MenuItem::make(
                    static fn() => __('Материалы'),
                    new PageResource()
                )->icon('heroicons.outline.bars-3'),

            ]),

            MenuGroup::make(static fn() => __('Настройки'), [

                MenuItem::make(
                    static fn() => __('SEO'),
                    new SeoResource()
                )->icon('heroicons.outline.bug-ant'),
                MenuItem::make(
                    static fn() => __('Фронт'),
                    new SettingPage()
                )->icon('heroicons.outline.cog'),


            ]),
        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
