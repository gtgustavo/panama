<aside id="sidebar_left" class="nano nano-primary affix">

    <!-- Start: Sidebar Left Content -->
    <div class="sidebar-left-content nano-content">

        <!-- Start: Sidebar Header -->
        <header class="sidebar-header">

            <!-- Sidebar Widget - Menu (Slidedown) -->
            <div class="sidebar-widget menu-widget">
                <div class="row text-center mbn">
                    <div class="col-xs-4">
                        <a href="{{ route('home') }}" class="text-primary" data-toggle="tooltip" data-placement="top" title="Dashboard">
                            <span class="glyphicon glyphicon-home"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="{{ route('home') }}" class="text-info" data-toggle="tooltip" data-placement="top" title="Messages">
                            <span class="glyphicon glyphicon-inbox"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="{{ route('home') }}" class="text-alert" data-toggle="tooltip" data-placement="top" title="Tasks">
                            <span class="glyphicon glyphicon-bell"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="{{ route('home') }}" class="text-system" data-toggle="tooltip" data-placement="top" title="Activity">
                            <span class="fa fa-desktop"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="{{ route('home') }}" class="text-danger" data-toggle="tooltip" data-placement="top" title="Settings">
                            <span class="fa fa-gears"></span>
                        </a>
                    </div>
                    <div class="col-xs-4">
                        <a href="{{ route('home') }}" class="text-warning" data-toggle="tooltip" data-placement="top" title="Cron Jobs">
                            <span class="fa fa-flask"></span>
                        </a>
                    </div>
                </div>
            </div>

        </header>
        <!-- End: Sidebar Header -->

        <!-- Start: Sidebar Menu -->
        <ul class="nav sidebar-menu">

            <li class="sidebar-label pt20"> {!! trans('front.sidebar.label.menu') !!} </li>

            <li class="active">
                <a href="{{ route('home') }}">
                    <span class="glyphicon glyphicon-home"></span>
                    <span class="sidebar-title"> {!! trans('front.sidebar.title.board') !!} </span>
                </a>
            </li>
            
            @can('super_admin')

                <li class="sidebar-label pt20"> {!! trans('front.sidebar.label.security') !!} </li>

                <li>
                    <a class="accordion-toggle" href="#">
                        <span class="fa fa-unlock-alt"></span>
                        <span class="sidebar-title"> {!! trans('front.sidebar.title.administration') !!} </span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">

                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa-university"></span>
                                {{ trans('front.sidebar.sub_title.reception_centers') }}
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="{{ route('reception_center_create') }}">
                                        {!! trans('front.form.reception_center.create') !!}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('reception_center_home') }}">
                                        {{ trans('front.sidebar.sub_sub_title.list_reception_center') }}
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa fa-users"></span>
                                {{ trans('front.sidebar.sub_title.employees') }}
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="{{ route('employee_create') }}">
                                        {!! trans('front.form.employee.create') !!}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('employee_home') }}">
                                        {{ trans('front.sidebar.sub_sub_title.list_employee') }}
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="accordion-toggle" href="#">
                                <span class="fa fa-code-fork"></span>
                                {{ trans('front.sidebar.sub_title.profiles') }}
                                <span class="caret"></span>
                            </a>
                            <ul class="nav sub-nav">
                                <li>
                                    <a href="{{ route('profile_create') }}">
                                        {!! trans('front.form.profile.create') !!}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('profile_home') }}">
                                        {{ trans('front.sidebar.sub_sub_title.list_profile') }}
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </li>

            @endcan

            @can('admin')

                <li class="sidebar-label pt20"> {!! trans('front.sidebar.label.warehouse') !!} </li>

                <li>
                    <a class="accordion-toggle" href="#">
                        <span class="fa fa-cubes"></span>
                        <span class="sidebar-title"> {{ trans('front.sidebar.sub_title.packages') }} </span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="{{ route('package_create') }}">
                                <span class="fa fa-cube"></span> {!! trans('front.form.package.create') !!}
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a class="accordion-toggle" href="#">
                        <span class="fa fa-users"></span>
                        <span class="sidebar-title"> {{ trans('front.sidebar.sub_title.clients') }} </span>
                        <span class="caret"></span>
                    </a>
                    <ul class="nav sub-nav">
                        <li>
                            <a href="{{ route('client_create') }}">
                                <span class="fa fa-user-plus"></span> {!! trans('front.form.client.create') !!}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('client_home') }}">
                                <span class="fa fa-users"></span>     {{ trans('front.sidebar.sub_sub_title.list_client') }}
                            </a>
                        </li>
                    </ul>
                </li>

            @endcan

        </ul>
        <!-- End: Sidebar Menu -->

        <!-- Start: Sidebar Collapse Button -->
        <div class="sidebar-toggle-mini">
            <a href="#">
                <span class="fa fa-sign-out"></span>
            </a>
        </div>
        <!-- End: Sidebar Collapse Button -->

    </div>
    <!-- End: Sidebar Left Content -->

</aside>