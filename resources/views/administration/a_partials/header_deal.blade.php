<!-- Start: Topbar -->
<header id="topbar" class="ph10">

    <div class="topbar-left">

        <ul class="nav nav-list nav-list-topbar pull-left">
            <li class="active">
                <a href="{{ route('home') }}">      {!! trans('front.sidebar.title.board') !!}   </a>
            </li>

            <li>
                <a href="{{ route('road_home') }}"> {{ trans('front.sidebar.sub_title.roads') }} </a>
            </li>

            <li>
                <a href="{{ route('box_home') }}">  {{ trans('front.sidebar.sub_title.box') }}   </a>
            </li>
        </ul>

    </div>

    <div class="topbar-right hidden-xs hidden-sm">

        <a href="{{ route('road_create') }}" class="btn btn-default btn-sm light fw600 ml10">
            <span class="fa fa-road pr5"></span> {!! trans('front.form.road.create') !!} </a>

        <a href="{{ route('box_create') }}" class="btn btn-default btn-sm light fw600 ml10">
            <span class="fa fa-cube pr5"></span> {!! trans('front.form.box.create') !!} </a>

    </div>

</header>
<!-- End: Topbar -->