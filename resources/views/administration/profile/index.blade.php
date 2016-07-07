@extends('a_templates.templates.admin')

@section('header_menu')

    @can('super_admin')

        @include('administration.a_partials.header_super')
    @else

        @include('administration.a_partials.header_employee')
    @endcan

@endsection

@section('content')

    <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            <!-- dashboard tiles -->
            @can('super_admin')

                @include('administration.a_partials.tiles_super')
            @else

                @include('administration.a_partials.tiles_employee')
            @endcan

            @include('a_templates.partials.messages')

            @include('administration.profile.partials.table')

        </div>
        <!-- end: .tray-center -->

    </section>
    <!-- End: Content -->

@endsection