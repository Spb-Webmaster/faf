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
use MoonShine\MoonShine;
use MoonShine\Pages\Page;
use MoonShine\Components\MoonShineComponent;

class SettingPage extends Page
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

        if (Storage::disk('config')->exists('moonshine/setting.php')) {
            $result = include(storage_path('app/public/config/moonshine/setting.php'));
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

        if(!is_null($this->setting())) {
            extract($this->setting());
        }


        return [

            FormBuilder::make('/moonshine/setting', 'POST')
                ->fields([

                    Tabs::make([
                        Tab::make(__('Настройки'), [


                            Grid::make([


                                Column::make([
                                    Divider::make('Константы'),

                                    Block::make([
                                        Textarea::make('Название на главной', 'slogan1')->default((isset($slogan1))? $slogan1 :''),
                                        Textarea::make('Слоган на верху', 'slogan_top')->default((isset($slogan_top))? $slogan_top :''),
                                        Textarea::make('Слоган внизу', 'slogan_bottom')->default((isset($slogan_bottom))? $slogan_bottom :''),

                                    ]),
                                    Divider::make('Соц.сети'),

                                    Block::make([
                                        Text::make('FaceBook', 'facebook')->default((isset($facebook))? $facebook :''),
                                        Text::make('YouTube', 'youtube')->default((isset($youtube))? $youtube :''),
                                        Text::make('Instagram', 'instagram')->default((isset($instagram))? $instagram :''),
                                        Text::make('WhatsApp', 'whatsapp')->default((isset($whatsapp))? $whatsapp :''),
                                        Text::make('Telegram', 'telegram')->default((isset($telegram))? $telegram :''),
                                    ]),


                                ])->columnSpan(6),


                                Column::make([
                                    Divider::make('Контакты'),

                                    Block::make([

                                        Text::make('Адрес', 'contact_address')->default((isset($contact_address))? $contact_address :''),
                                        Text::make(__('Телефон'), 'phone1')->default((isset($phone1))? $phone1 :''),
                                        Text::make(__('Телефон 2'), 'phone2')->default((isset($phone2))? $phone2 :''),
                                        Text::make(__('Email'), 'email')->default((isset($email))? $email :''),
                                        Text::make('Copyright', 'contact_copy')->default((isset($contact_copy))? $contact_copy :''),

                                    ]),
                                    Divider::make(''),
                                    Block::make([
                                        Textarea::make('Описание контактов компании', 'contact_text_company')->default((isset($contact_text_company))? $contact_text_company :''),

                                    ]),
                                    Divider::make(''),
                                    Block::make([
                                        Text::make('Координаты карты', 'ymap_point')->default((isset($ymap_point))? $ymap_point :''),

                                    ]),


                                ])->columnSpan(6),
                            ]),
                        ]),

                    ]),


                ])->submit(label: 'Сохранить', attributes: ['class' => 'btn-primary'])

        ];
    }
}
