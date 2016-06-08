<li class="dropdown">

    <a class="dropdown-toggle" data-toggle="dropdown" href="">
        <span class="flag-xs flag-us"></span> {!! trans('front.header.top.language.language') !!}
    </a>

    <ul class="dropdown-menu pv5 animated animated-short flipInX" role="menu">

        <li>
            <a href="{{ url('language/en') }}"> <span class="flag-xs flag-us mr10"></span> {!! trans('front.header.top.language.en') !!} </a>
        </li>

        <li>
            <a href="{{ url('language/es') }}"> <span class="flag-xs flag-es mr10"></span> {!! trans('front.header.top.language.es') !!} </a>
        </li>

    </ul>

</li>