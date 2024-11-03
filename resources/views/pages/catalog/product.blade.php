@extends('layouts.layout')
{{--
$product - app/Http/Controllers/Catalog/ProductController.php
$category - app/Http/Controllers/Catalog/ProductController.php
$categories - app/Http/Controllers/Catalog/ProductController.php
$product_category - app/Http/Controllers/Catalog/ProductController.php
--}}
<x-seo.meta
    title="{{($product->metatitle)?:$product->title}}"
    description="{{$product->description}}"
    keywords="{{$product->keywords}}"
/>
@section('content')

    <main class="page_section">

        <section class="mod_slider_page">
            @include('modules.mod_slider_page')
        </section>

        <div class="block">
            <div class="brod pad_b1_important">
                <ul>
                    <li><a href="{{route('home')}}">{{__('Главная')}}</a> •</li>
                    <li><a href="{{route('category', ['category' => $category->slug])}}">{{$category->title}}</a> •</li>
                    <li><span>{{ $product->title }}</span></li>
                </ul>

            </div>
        </div>
        <section class="re_section">
            <div class="block">
                <div class="page_title">
                    <h1 class="_h1">{{ $product->title }}</h1>
                    @if($product->subtitle)
                        <div class="page__subtitle">
                            {{ $product->subtitle  }}
                        </div>
                    @endif
                </div>

            </div>


        </section>
        <section class="teaser_section">
            <div class="block">

                <div class="cat_flex">
                    <div class="categories_list">
                        <div class="lockfixed lockfixed__js">
                            <div class="_h2"><span>Продукция</span></div>
                            <div class="_categories_list">
                                @if(isset($categories))
                                    <ul>
                                        @foreach($categories as $cat)
                                            <li class="{{ active_linkMenu(asset(route('category', ['category'=> $cat->slug])), 'find' ) }}">
                                                <a href="{{ asset(route('category', ['category' => $cat->slug])) }}"><span>{{ $cat->title }}</span></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="products_list">

                        <div class="_teaser">
                            <div class="_t_flex">
                                <div class="_t_left">
                                    <div class="_t_img">
                                        <a href="{{ Storage::disk('moonshine')->url($product->img)}}" data-fancybox="gallery" data-caption="{{$product->title}}" >
                                            <img width="250" height="250" loading="lazy"
                                                 src="{{ asset(intervention('250x250', $product->img, 'product')) }}"
                                                 alt="{{$product->title}}"
                                            class="img__js">
                                        </a>
                                    </div>
                                    <div class="_t_price">
                                        <div class="price_teaser_label">
                                            <div class="__t_css">
                                                <span>Цена</span>
                                            </div>
                                        </div><!--.price_teaser_label-->
                                        @if(isset($product->price))
                                            <div class="price_teaser">
                                                <div class="__t_css __t_css__js">

                                                    <span class="price_price">{{ price($product->price) }}</span>
                                                    <span class="price_euro">€</span>
                                                </div>
                                            </div><!--.price_teaser-->
                                        @endif

                                        <div class="clear"></div>

                                    </div>
                                    <div class="reserve">
                                    <a href="#reserve" data-fancybox="" class="button button_big reserve_button__js" >Отправить заявку</a>
                                    </div>
                                </div>
                                <div class="_t_right">

                                    <h1 class="_t_title _t_title__js">{{ $product->title }}</h1>

                                    @if(isset($product->desc_to))
                                    <div class="desc_to desc">{{ $product->desc_to }}</div>
                                    @endif
                                    <div class="_t_desc desc">
                                        @if(isset($product->property))
                                            <ul>
                                                @foreach($product->property as $property)
                                                    <li>
                                                        <span
                                                            class="_label">{{ $property['json_property_label'] }} - </span>
                                                        <span class="_text">{{ $property['json_property_text'] }}</span>

                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div><!--.shdesc_teaser-->
                                    @if(isset($product->desc_from))
                                        <div class="desc_from desc">{{ $product->desc_from }}</div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="_product">
                            @if(isset($product->text))

                                <article>
                                    <div class="desc">
                                        {!! $product->text !!}
                                    </div>
                                </article>
                            @endif

                            @if(isset($product->video))
                                <article class="_p_video">

                                    <video controls width="840" height="473"
                                           @if($product->poster) poster="{{ asset(intervention('840x473', $product->poster, 'videos')) }}" @endif>
                                        <source src="{{ asset('/storage/' .$product->video)  }}"
                                                type="video/mp4">
                                    </video>
                                </article>
                            @endif

                            @if($product->gallery_visible)
                                <article class="_p_gallery">

                                    @foreach($product->gallery as $k => $img)
                                        <div class="mItem">
                                            <a href="{{ asset(Storage::disk('moonshine')->url($img)) }}"
                                               data-fancybox="gallery" data-caption="{{$product->title}}">


                                                <img class="pc_category_img"
                                                     style="width: auto; height: auto"

                                                     loading="lazy"
                                                     src="{{ asset(intervention('250x250', $img, 'product', 'scaleDown')) }}"
                                                     alt="photo_{{ $k }}">

                                            </a>
                                        </div>

                                    @endforeach

                                </article>
                            @endif


                            @if($product->file_visible)
                                <article class="_p_downloads">

                                    @foreach($product->file as $k => $file)

                                        <div class="">
                                            <a class="axeldzl2" download target="_blank" title="{{ $file['json_file_label'] }}"
                                               href="{{ asset(Storage::disk('moonshine')->url($file['json_file_file'])) }}">
                                               <span class="d_img"></span>
                                               <span class="d_title">{{ $file['json_file_label'] }}</span>
                                            </a>
                                        </div>

                                    @endforeach

                                </article>

                            @endif
                        </div>

                    </div>
                </div>
            </div>


        </section>

    </main>

@endsection





