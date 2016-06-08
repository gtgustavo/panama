@extends('a_templates.templates.admin')

@section('header_menu')

    @include('administration.a_partials.header')

@endsection

@section('content')

    <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            <!-- dashboard tiles -->
            @include('administration.profile.partials.tiles')

            @include('administration.profile.partials.table')

        </div>
        <!-- end: .tray-center -->

    </section>
    <!-- End: Content -->

@endsection


@section('script')

    {!! Html::script('assets/js/app/init.js') !!}

@endsection