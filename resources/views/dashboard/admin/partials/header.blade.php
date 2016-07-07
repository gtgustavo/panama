<!-- Start: Topbar -->
<header id="topbar" class="ph10">

    <div class="topbar-left">

        <ul class="nav nav-list nav-list-topbar pull-left">

            <li class="active">
                <a href="{{ route('home') }}">          {!! trans('front.sidebar.title.board') !!}       </a>
            </li>

            <li>
                <a href="{{ route('client_home') }}">   {{ trans('front.sidebar.sub_title.clients') }}  </a>
            </li>

            <li>
                <a href="{{ route('answer_home') }}">   {{ trans('front.sidebar.sub_title.support') }}  </a>
            </li>

            <li>
                <a href="{{ route('shipment_home') }}"> {{ trans('front.sidebar.sub_title.shipment') }}  </a>
            </li>

        </ul>

    </div>

    <div class="topbar-right hidden-xs hidden-sm">

        <a href="{{ route('package_create') }}" class="btn btn-danger btn-sm light fw600 ml10">
            <span class="fa fa-cube pr5"></span> {!! trans('front.form.package.create') !!} </a>

        <a href="{{ route('client_create') }}"  class="btn btn-danger btn-sm light fw600 ml10">
            <span class="fa fa-user pr5"></span> {!! trans('front.form.client.create') !!}  </a>

        <a href="{{ route('shipment_create') }}"  class="btn btn-danger btn-sm light fw600 ml10">
            <span class="fa fa-ship pr5"></span> {!! trans('front.form.shipment.create') !!}  </a>

    </div>

</header>
<!-- End: Topbar -->