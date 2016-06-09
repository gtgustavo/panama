@extends('a_templates.templates.admin')

@section('header_menu')

    @include('dashboard.partials.header')

@endsection

@section('content')

        <section id="content" class="table-layout animated fadeIn">

            <!-- begin: .tray-center -->
            <div class="tray tray-center">

                <!-- dashboard tiles -->
                @include('dashboard.partials.tiles')

                @include('a_templates.partials.messages')

                @include('dashboard.partials.table')

            </div>
            <!-- end: .tray-center -->

        </section>
        <!-- End: Content -->

@endsection