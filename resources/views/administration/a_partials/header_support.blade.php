<!-- Start: Topbar -->
<header id="topbar" class="ph10">

    <div class="topbar-left">

        <ul class="nav nav-list nav-list-topbar pull-left">
            <li class="active">
                <a href="{{ route('home') }}">                  {!! trans('front.sidebar.title.board') !!}       </a>
            </li>

            <li>
                <a href="{{ route('reception_center_home') }}"> {{ trans('front.sidebar.sub_title.reception_centers') }}  </a>
            </li>

            <li>
                <a href="{{ route('ticket_home') }}">           {{ trans('front.sidebar.sub_title.tickets') }} </a>
            </li>
        </ul>

    </div>

    <div class="topbar-right hidden-xs hidden-sm">

        <a href="{{ route('reception_center_create') }}" class="btn btn-default btn-sm light fw600 ml10">
            <span class="fa fa-university pr5"></span> {!! trans('front.form.reception_center.create') !!} </a>

        <a href="{{ route('ticket_create') }}" class="btn btn-default btn-sm light fw600 ml10">
            <span class="fa fa-ticket pr5"></span> {!! trans('front.form.ticket.create') !!} </a>

    </div>

</header>
<!-- End: Topbar -->