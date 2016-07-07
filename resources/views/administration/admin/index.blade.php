@extends('a_templates.templates.admin')

@section('header_menu')

    @include('administration.a_partials.header_super')

@endsection

@section('content')

    <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            <!-- dashboard tiles -->
            @include('administration.a_partials.tiles_employee')

            @include('a_templates.partials.messages')

            @include('administration.admin.partials.table')

        </div>
        <!-- end: .tray-center -->

    </section>
    <!-- End: Content -->

@endsection