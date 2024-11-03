@extends('layouts.layout')
<x-seo.meta
    title="{{($item->metatitle)?:$item->title}}"
    description="{{$item->description}}"
    keywords="{{$item->keywords}}"
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
                <li><span>{{ $item->title }}</span></li>
            </ul>

        </div>
        </div>
        <section class="re_section">
            <div class="block">
                <div class="page_title">
                <h1 class="_h1">{{ $item->title }}</h1>
                @if($item->subtitle)
                    <div class="page__subtitle">
                    {{ $item->subtitle  }}
                    </div>
                @endif
                </div>

                @if($item->text)
                    <div class="desc page__desc">
                        {!!  $item->text  !!}
                    </div>
                @endif

                @if($item->img2)
                    <div class="page__img">
                        <img src="{{ asset(Storage::disk('moonshine')->url($item->img2)) }}" alt="Img" style="width: 100%; height: auto" loading="lazy" />
                    </div>
                @endif

            </div>


        </section>

    </main>

@endsection




