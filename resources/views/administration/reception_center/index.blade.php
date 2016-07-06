@extends('a_templates.templates.admin')

@section('header_menu')

    @include('administration.a_partials.header_support')

@endsection

@section('content')

    <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            <!-- dashboard tiles -->
            @include('administration.a_partials.tiles_support')

            @include('a_templates.partials.messages')

            @include('administration.reception_center.partials.table')

        </div>
        <!-- end: .tray-center -->

    </section>
    <!-- End: Content -->

@endsection