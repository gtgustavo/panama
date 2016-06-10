<header class="navbar navbar-fixed-top">

    <div class="navbar-branding">
        <a class="navbar-brand" href="{{ route('home') }}">
            <b>Admin</b>Designs
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
    </div>

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

    <form class="navbar-form navbar-left navbar-search" role="search">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Search..." value="Search...">
        </div>
    </form>

    <ul class="nav navbar-nav navbar-right">

        @include('a_templates.extras.notifications')

        @include('a_templates.extras.lang')

        <li class="menu-divider hidden-xs">
            <i class="fa fa-circle"></i>
        </li>

        @include('a_templates.extras.profile')

    </ul>

</header>