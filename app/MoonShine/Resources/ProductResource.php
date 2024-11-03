<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Enums\ClickAction;
use MoonShine\Fields\Date;
use MoonShine\Fields\File;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Number;
use MoonShine\Fields\Relationships\BelongsTo;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use MoonShine\Decorations\Block;
use MoonShine\Fields\ID;
use MoonShine\Fields\Field;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Product>
 */
class ProductResource extends ModelResource
{
    protected string $model = Product::class;


    protected string $title = 'Продукция';

    protected string $column = 'sorting';

    protected string $sortColumn = 'sorting';

    protected ?ClickAction $clickAction = ClickAction::EDIT;

    /**
     * @return //array, выводим teaser
     */

    public function indexFields(): array
    {
        return [
            ID::make()
                ->sortable(),

            Image::make(__('Изображение'), 'img'),

            Text::make(__('Заголовок'), 'title'),
            Slug::make(__('Алиас'), 'slug'),
            Date::make(__('Дата создания'), 'created_at')->format("d.m.Y"),
            Switcher::make('Публикация', 'published')->updateOnPreview(),
            Switcher::make('Title', 'metatitle'),
            Switcher::make('Desc', 'description'),
            Switcher::make('Key', 'keywords'),
            Number::make('Сорт.', 'sorting')->sortable(),
            BelongsTo::make('Кат.', 'category', resource: new CategoryResource())->hideOnForm(),


        ];
    }


    /**
     * @return //array, выводим full
     */
    public function formFields(): array
    {
        return [
            Block::make([
                Tabs::make([

                    Tab::make(__('Общие настройки'), [
                        Grid::make([
                            Column::make([
                                Collapse::make('Заголовок/Алиас', [
                                    Text::make('Заголовок', 'title')->required(),
                                    Slug::make('Алиас', 'slug')
                                        ->from('title')->unique()
                                ]),


                                Text::make(__('Подзаголовок'), 'subtitle'),


                            ])
                                ->columnSpan(6),
                            Column::make([

                                Collapse::make('Метотеги', [
                                    Text::make('Мета тэг (title) ', 'metatitle'),
                                    Text::make('Мета тэг (description) ', 'description'),
                                    Text::make('Мета тэг (keywords) ', 'keywords'),
                                    Switcher::make('Публикация', 'published')->default(1),
                                    Number::make('Сортировка', 'sorting')->buttons()->default(999),
                                    BelongsTo::make('Категория', 'category', resource: new CategoryResource())->searchable(),


                                ]),


                            ])
                                ->columnSpan(6)

                        ]),

                        Divider::make(),
                        Grid::make([

                            Column::make([
                                Collapse::make('Фото товара', [
                                    Image::make(__('Изображение'), 'img')
                                        ->showOnExport()
                                        ->disk(config('moonshine.disk', 'moonshine'))
                                        ->dir('product')
                                        ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                        ->removable(),
                                    Text::make('Цена', 'price'),


                                ])
                            ])->columnSpan(6),

                            Column::make([


                                Collapse::make('Характеристики', [

                                    Textarea::make('', 'desc_to')->hint('Описание до'),

                                    Json::make('Опции', 'property')->fields([

                                        Text::make('', 'json_property_label')->hint('Название'),
                                        Textarea::make('', 'json_property_text')->hint('Описание'),

                                    ])->vertical()->creatable(limit: 30)
                                        ->removable(),

                                    Textarea::make('', 'desc_from')->hint('Описание после'),

                                ]),


                            ])->columnSpan(6),
                        ]),

                        Divider::make(),

                        Column::make([
                            TinyMce::make('Описание', 'text'),
                            File::make('Видео', 'video')
                                ->dir('video')
                                ->disk('moonshine') // Filesystems disk
                                ->allowedExtensions(['mp4', 'avi']) // Допустимые расширения
                                ->removable(),

                            Image::make(__('Постер'), 'poster')
                                ->showOnExport()
                                ->disk(config('moonshine.disk', 'moonshine'))
                                ->dir('product')
                                ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                ->removable(),

                            Divider::make('Фотогалерея'),


                            Image::make('Галерея', 'gallery')
                                ->dir('video')
                                ->disk('moonshine') // Filesystems disk
                                ->allowedExtensions(['jpg', 'png', 'jpeg', 'gif', 'svg'])
                                ->multiple()
                                ->removable(),

                            Divider::make('Фaйлы (Документы)'),

                            Json::make('Опции', 'file')->fields([

                                Text::make('', 'json_file_label')->hint('Название'),
                                File::make('Документ', 'json_file_file')
                                    ->dir('doc')
                                    ->disk('moonshine') // Filesystems disk
                                    ->removable()

                            ])->vertical()->creatable(limit: 30)
                                ->removable(),


                        ])->columnSpan(12),
                    ]),


                ]),


            ]),
        ];


    }


    public function rules(Model $item): array
    {
        return [
            'metatitle' => 'max:255',
            'description' => 'max:512',
            'keywords' => 'max:512',
        ];
    }

    public function import(): ?ImportHandler
    {
        return null;
    }


    public function export(): ?ExportHandler
    {
        return null;
    }

    public function getActiveActions(): array
    {
        return ['create', /*'view',*/ 'update', 'delete', 'massDelete'];
    }

}
