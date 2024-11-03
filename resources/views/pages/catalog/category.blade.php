@extends('layouts.layout')
{{--
$category - app/Http/Controllers/Catalog/CategoryController.php
$categories - app/Http/Controllers/Catalog/CategoryController.php
$product_category - app/Http/Controllers/Catalog/CategoryController.php
--}}
<x-seo.meta
    title="{{($category->metatitle)?:$category->title}}"
    description="{{$category->description}}"
    keywords="{{$category->keywords}}"
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
                    <li><span>{{ $category->title }}</span></li>
                </ul>

            </div>
        </div>
        <section class="re_section">
            <div class="block">
                <div class="page_title">
                    <h1 class="_h1">{{ $category->title }}</h1>
                    @if($category->subtitle)
                        <div class="page__subtitle">
                            {{ $category->subtitle  }}
                        </div>
                    @endif
                </div>

                @if($category->text)
                    <div class="desc page__desc">
                        {!!  $category->text  !!}
                    </div>
                @endif


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


                        @if(isset($product_category))
                            @foreach($product_category as $product)
                                <div class="_teaser">
                                    <div class="_t_flex">
                                        <div class="_t_left">
                                            <div class="_t_img">
                                                <a href="{{ asset(route('product', ['category' => $category->slug,'product' => $product->slug])) }}">

                                                        <img width="250" height="250" loading="lazy"
                                                             src="{{ asset(intervention('250x250', $product->img, 'product')) }}"
                                                             alt="">

                                                </a>
                                            </div>
                                            <div class="_t_price">
                                                <div class="price_teaser_label">
                                                    <div class="__t_css">
                                                        <span>Цена</span>
                                                    </div>
                                                </div><!--.price_teaser_label-->
                                                <div class="price_teaser">
                                                    <div class="__t_css">

                                                        <span class="price_price">780</span>
                                                        <span class="price_euro">€</span>
                                                    </div>
                                                </div><!--.price_teaser-->
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                        <div class="_t_right">

                                            <h2 class="_t_title"><a href="#">{{ $product->title }}</a></h2>
                                            <div class="_t_desc desc">
                                                @if(isset($product->property))
                                                    <ul>
                                                        @foreach($product->property as $property)
                                                            <li>
                                                                <span class="_label">{{ $property['json_property_label'] }} - </span>
                                                                <span class="_text">{{ $property['json_property_text'] }}</span>

                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div><!--.shdesc_teaser-->

                                        </div>
                                    </div>
                                    <div class="_t_more">
                                        <a href="{{ asset(route('product', ['category' => $category->slug,'product' => $product->slug])) }}">

                                            <span class="_t_button"><span>Подробнее о товаре</span></span>
                                            <span class="_t_border"></span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>
                </div>
            </div>


        </section>

    </main>

@endsection





