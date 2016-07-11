@extends('a_templates.templates.admin')

@section('header_menu')

    @include('dashboard.admin.partials.header')

@endsection

@section('content')

        <section id="content" class="table-layout animated fadeIn">

            <!-- begin: .tray-center -->
            <div class="tray tray-center">

                <!-- dashboard tiles -->
                @include('dashboard.admin.partials.tiles_packages')

                @include('a_templates.partials.messages')

                @include('system.package.partials.table')

            </div>
            <!-- end: .tray-center -->

        </section>
        <!-- End: Content -->

@endsection
