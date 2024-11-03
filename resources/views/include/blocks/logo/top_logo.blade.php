<div class="top_logo logo">
    @if(route_name()=='home')
        <div class="logo__img">
            <img width="154" height="74" alt="гаваж" src="/storage/images/logo.svg"/>
        </div>
    @else
        <a href="{{ route('home') }}" class="logo__img">
            <img width="154" height="74" alt="гаваж" src="/storage/images/logo.svg"/>
        </a>
    @endif

</div>
