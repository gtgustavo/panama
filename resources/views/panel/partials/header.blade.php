<!-- Start: Topbar -->
<header id="topbar" class="ph10">

    <div class="topbar-left">

        <ul class="nav nav-list nav-list-topbar pull-left">

            <li class="active">
                <a href="{{ route('home') }}"> {!! trans('front.sidebar.title.board') !!}       </a>
            </li>

        </ul>

    </div>

    <div class="topbar-right hidden-xs hidden-sm">

        <a href="{{ route('panel_password') }}" class="btn btn-default btn-sm light fw600 ml10">
            <span class="fa fa-unlock-alt pr5"></span> {!! trans('front.form.profile_panel.change_password') !!} </a>

        <a href="{{ route('panel_personal') }}" class="btn btn-default btn-sm light fw600 ml10">
            <span class="fa fa-pencil pr5"></span> {!! trans('front.form.profile_panel.update_information') !!} </a>

    </div>

</header>
<!-- End: Topbar -->