<?php

declare(strict_types=1);

namespace App\MoonShine\Pages;


use Illuminate\Support\Facades\Storage;
use MoonShine\Components\Card;
use MoonShine\Components\FormBuilder;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Divider;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\File;
use MoonShine\Fields\Hidden;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Select;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\MoonShine;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;

class IndexPage extends Page
{
    /**
     * @return array<string, string>
     */
    public function breadcrumbs(): array
    {
        return [
            '#' => $this->title()
        ];
    }

    public function title(): string
    {
        return $this->title ?: 'Настройки сайта';
    }


    public function setting()
    {

        if (Storage::disk('config')->exists('moonshine/index.php')) {
            $result = include(storage_path('app/public/config/moonshine/index.php'));
        } else {
            $result = null;
        }

        return (is_array($result)) ? $result : null;

    }


    /**
     * @return list<MoonShineComponent>
     */
    public function components(): array
    {

        if (!is_null($this->setting())) {
            extract($this->setting());
        }


        return [

            FormBuilder::make('/moonshine/index', 'POST')
                ->fields([

                    Tabs::make([
                        Tab::make(__('Настройки'), [


                            Grid::make([


                                Column::make([
                                    Divider::make('Заголовок'),

                                    Block::make([
                                        Text::make('Название', 'index_title')->default((isset($index_title)) ? $index_title : ''),
                                    ]),

                                ])->columnSpan(12),
                            ]),


                            Grid::make([


                                Column::make([
                                    Divider::make('Левая часть'),

                                    Block::make([
                                        TinyMce::make('Текст', 'index_left_text')->default((isset($index_left_text)) ? $index_left_text : ''),

                                    ]),


                                ])->columnSpan(6),


                                Column::make([
                                    Divider::make('Правая часть'),

                                    Block::make([

                                        TinyMce::make('Текст', 'index_right_text')->default((isset($index_right_text)) ? $index_right_text : ''),


                                    ]),


                                ])->columnSpan(6),
                            ]),
                        ]),

                    ]),


                ])->submit(label: 'Сохранить', attributes: ['class' => 'btn-primary'])

        ];
    }
}
