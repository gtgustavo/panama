@extends('a_templates.templates.admin')

@section('header_menu')

    @can('admin')

        @include('dashboard.admin.partials.header')
    @else

        @include('dashboard.client.partials.header')
    @endcan

@endsection

@section('content')

    <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            <!-- dashboard tiles -->
            @include('system.client.partials.tiles')

            @include('support.partials.filter')

            @include('a_templates.partials.messages')

            @include('support.partials.table')

        </div>
        <!-- end: .tray-center -->

    </section>
    <!-- End: Content -->

@endsection