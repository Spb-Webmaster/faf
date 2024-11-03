<nav class="menu_nav z-index100">
    <ul id="top_menu" class="top_menu">

        <li class="{{ active_linkMenu(asset(route('home')) ) }}"><a class="add__mobile_menu"
                                                                    href="{{ asset(route('home')) }}"><span>Главная</span></a>
        </li>
        <li class="{{ active_linkMenu(asset(route('catalog')), 'find' ) }}"><a class="add__mobile_menu" href="{{ asset(route('catalog')) }}"><span>Каталог</span></a>
            @if(isset($categories))
                <ul class="submenu">

                    @foreach($categories as $category)

                        <li class="{{ active_linkMenu(asset(route('category', ['category'=> $category->slug])), 'find' ) }}">
                            <a class="add__mobile_menu" href="{{ asset(route('category', ['category'=> $category->slug])) }}"><span>{{ $category->title }}</span></a>
                        </li>

                    @endforeach
                </ul>
            @endif
        </li>

        @if(isset($top_menu))

            @foreach($top_menu as $menu)
                <li class="{{ active_linkMenu(asset(asset($menu->slug) ) ) }}"><a class="add__mobile_menu"
                                                                                  href="{{ asset($menu->slug) }}"><span>{{ $menu->menu }}</span></a>
                </li>

            @endforeach

        @endif
        <li class="{{ active_linkMenu(asset(route('contacts')) ) }}"><a class="add__mobile_menu"
                                                                        href="{{ asset(route('contacts')) }}"><span>Контакты</span></a>
        </li>

    </ul>
</nav>

