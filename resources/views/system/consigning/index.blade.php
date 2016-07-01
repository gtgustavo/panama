@extends('a_templates.templates.admin')

@section('header_menu')

    @can('admin')

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

                @include('dashboard.client.partials.tiles')
                <br>
            @else

                @include('system.consigning.partials.tiles')
            @endcan

            @include('a_templates.partials.messages')

            @include('system.consigning.partials.table')

        </div>
        <!-- end: .tray-center -->

    </section>
    <!-- End: Content -->

@endsection