<!-- Start: Topbar -->
<header id="topbar" class="ph10">

    <div class="topbar-left">

        <ul class="nav nav-list nav-list-topbar pull-left">

            <li class="active">
                <a href="{{ route('home') }}"> {!! trans('front.sidebar.title.board') !!} </a>
            </li>

            <li>
                <a href="http://allucanship.com/" target="_blank"> {{ trans('front.form.other.go_web') }}  </a>
            </li>

            <!--
            <li>
                <a href="{{ route('consigning_home', Auth::user()->id) }}"> {{ trans('front.sidebar.sub_title.diary') }}  </a>
            </li>
            -->

        </ul>

    </div>

    <!--
    <div class="topbar-right hidden-xs hidden-sm">

        <a href="{{ route('my_package_create') }}" class="btn btn-danger btn-sm light fw600 ml10">
            <span class="fa fa-plus pr5"></span> {!! trans('front.form.other.wed') !!} </a>

        <a href="{{ route('consigning_create', Auth::user()->id) }}"  class="btn btn-danger btn-sm light fw600 ml10">
            <span class="fa fa-user pr5"></span> {!! trans('front.form.consigning.create') !!}  </a>

    </div>
    -->

</header>
<!-- End: Topbar -->