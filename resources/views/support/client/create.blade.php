@extends('a_templates.templates.admin')

@section('header_menu')

    @include('dashboard.client.partials.header')

@endsection

@section('content')

    <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            <!-- dashboard tiles -->
            @include('dashboard.client.partials.tiles')

            <br>

            @include('a_templates.partials.messages')

            <div class="panel mb25 mt5">

                <div class="panel-heading">
                    <span class="panel-title hidden-xs"> {!! trans('front.form.support.events.create') !!} </span>
                </div>

                <div class="panel-body p25 pb5">

                    <div class="tab-content pn br-n admin-form">

                        {!! Form::open(['route' => 'support_create', 'method' => 'POST']) !!}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        @include('support.partials.fields', ['theme' => $theme, 'button' => trans('front.form.support.create')])

                        {!! Form::Close() !!}

                    </div>

                </div>

            </div>

        </div>
        <!-- end: .tray-center -->

    </section>
    <!-- End: Content -->

@endsection

@section('script')
    <script>
        // slider panel clients
        jssor_1_slider_init();
    </script>
@endsection