@extends('a_templates.templates.admin')

@section('header_menu')

    @include('dashboard.client.partials.header')

@endsection

@section('content')

    <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            <!-- dashboard tiles -->
            @include('dashboard.client.partials.tiles_2')

            <br>

            @include('a_templates.partials.messages')

            @include('support.partials.table')

        </div>
        <!-- end: .tray-center -->

    </section>
    <!-- End: Content -->

@endsection

@section('script')
    {!! Html::script('assets/js/app/slider_client/init.js') !!}
@endsection