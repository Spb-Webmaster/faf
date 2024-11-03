@extends('layouts.layout')
@section('title', ($seo_title)??null)
@section('description', ($seo_description)??null)
@section('keywords', ($seo_keywords)??null)
@section('content')
    <main>

        <section class="home_section__slider h_sl" style="background-image: url('/storage/images/index/back2.jpg'); background-position: center">
            @include('modules.mod_slider')
        </section>

        <section class="home_section__video v_sl">
            @include('modules.mod_video')
        </section>


        <section class="home_section__privilege p_sl">
            @include('modules.mod_privilege')
        </section>

        <section class="home_section__about a_sl">
            @include('modules.mod_about')
        </section>

        <section class="home_section__catalog c_sl">
            @include('modules.mod_catalog')
        </section>
    </main>
@endsection
