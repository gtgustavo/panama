<header class="navbar navbar-fixed-top">

    <div class="navbar-branding">
        <a class="navbar-brand" href="{{ route('home') }}">
            <b> {!! trans('front.head.title') !!} </b>
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
    </div>

    <!--
    <ul class="nav navbar-nav navbar-left">
        <li>
            <a class="sidebar-menu-toggle" href="#">
                <span class="ad ad-ruby fs18"></span>
            </a>
        </li>
        <li>
            <a class="topbar-menu-toggle" href="#">
                <span class="ad ad-wand fs16"></span>
            </a>
        </li>
        <li class="hidden-xs">
            <a class="request-fullscreen toggle-active" href="#">
                <span class="ad ad-screen-full fs18"></span>
            </a>
        </li>
    </ul>
    -->

    <ul class="nav navbar-nav navbar-right">

        <!--
        @include('a_templates.extras.lang')
        -->

        <li class="menu-divider hidden-xs">
            @if(Auth::check())

                <i class="fa fa-circle up"></i>
            @else

                <i class="fa fa-circle"></i>
            @endif
        </li>

        @include('a_templates.extras.profile')

    </ul>

</header>