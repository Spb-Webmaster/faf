@extends('layouts.layout')
@section('title', ($seo_title)??null)
@section('description', ($seo_description)??null)
@section('keywords', ($seo_keywords)??null)
@section('content')
    <main>

        <section class="mod_slider_page">
            @include('modules.mod_slider_page')
        </section>

        <section class="_contacts">
            <div class="block">
                <div class="_contact_flex">
                    <div class="_contact_left">
                        <h1 class="_h1"><span>Контакты для связи</span></h1>

                        <div class="_Ymap">

                            <div style="background:#e8f0fe" id="loader_wrapper" class="loader_wrapper active ">
                                <div style="color:#d22c2c" class="loader_map">Loading...</div>
                            </div>

                            <div class="JFormFieldMap_wrapper">
                                <div id="JFormFieldMap" class="JFormFieldMap" style="width: 100%; height: 450px"></div>
                            </div>
                            <script>
                                var myMap;

                                function getYaMap() {
                                    var myMap = new ymaps.Map("JFormFieldMap", {
                                        center: [{{ config2('moonshine.setting.ymap_point') }}],
                                        zoom: 16,
                                        controls: ['zoomControl', 'typeSelector', 'fullscreenControl']
                                    }, {searchControlProvider: 'yandex#search'});


                                    myPlacemark = new ymaps.Placemark([{{ config2('moonshine.setting.ymap_point') }}], {balloonContent: '<h5>FAF-RF.RU</h5><p class="jt_ph"><b>Наш адрес:</b> {!!  config2('moonshine.setting.contact_address') !!}</p><p class="jt_ph"><b>Контктный телефон:</b> {!!  config2('moonshine.setting.phone1') !!}</p><p class="jt_ph"><b>Электронный адрес:</b> {!!  config2('moonshine.setting.email') !!}</p>'}, {
                                        iconLayout: 'default#image',
                                        iconImageHref: '{{ asset('/storage/contacts/myIcon.svg') }}',
                                        iconImageSize: [58, 55],
                                        iconImageOffset: [-28, -48]
                                    });


                                    myMap.geoObjects.add(myPlacemark);
                                }


                            </script>
                        </div>


                    </div>
                    <div class="_contact_right">
                        <div class="c_doc_text">
                        <h2 class="_h2"><span>Наши реквизиты</span></h2>
                            <div class="recvis">
                                {!!  config2('moonshine.setting.contact_text_company') !!}
                            </div>
                        </div>

                    </div>
                </div>
                <div class="address desc pad_t40">
                    <p><strong>Наш адрес:</strong>   {!!  config2('moonshine.setting.contact_address') !!}</p>
                    <p><strong>Контактный телефон:</strong> <a href="tel:{!!  config2('moonshine.setting.phone1') !!}">{!!  config2('moonshine.setting.phone1') !!}</a></p>
                    <p><strong>Электронный адрес:</strong>   {!!  config2('moonshine.setting.email') !!}</p>

                </div>

            </div>
        </section>


    </main>
@endsection

