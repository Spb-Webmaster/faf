<div class="_catalog">
    <div class="block block_1090">
        <div class="trapezoid__wrap">
            <h3>Каталог продукции</h3>
            <div class="trapezoid"></div>
        </div>

        <div class="c_flex">

            @if(isset($categories))
                @foreach($categories as $category)
                    <a href="{{ asset(route('category', ['category'=> $category->slug])) }}" class="c_item">
                        <div class="im_catalog"><img loading="lazy" width="238" height="220" src="{{Storage::url($category->img) }}" alt="" /></div>
                        <div class="title_catalog"><p><span>{{ $category->title }}</span></p></div>
                    </a>
                @endforeach
            @endif


        </div>

    </div>

</div>
