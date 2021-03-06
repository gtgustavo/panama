@extends('a_templates.templates.admin')

@section('header_menu')

    @can('employee')

        @include('system.consigning.partials.header')
    @else

        @include('dashboard.client.partials.header')
    @endcan

@endsection

@section('content')

    <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            <!-- dashboard tiles -->
            @can('client')

                @include('dashboard.client.partials.tiles_2')
                <br>
            @else

                @include('dashboard.admin.partials.tiles_admin')
            @endcan

            @include('a_templates.partials.messages')

            @include('system.consigning.partials.table')

        </div>
        <!-- end: .tray-center -->

    </section>
    <!-- End: Content -->

@endsection

@section('script')

    <!-- Slider Client -->
    {!! Html::script('assets/js/app/slider_client/init.js') !!}

@endsection