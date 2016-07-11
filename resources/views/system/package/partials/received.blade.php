@extends('a_templates.templates.admin')

@section('header_menu')

    @include('dashboard.admin.partials.header')

@endsection

@section('content')

    <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            <!-- dashboard tiles -->
            @include('a_templates.partials.messages')

            <div class="panel mb25 mt5">

                <div class="panel-heading">
                    <span class="panel-title hidden-xs"> {!! trans('front.form.package.events.create') !!} </span>
                </div>

                <div class="panel-body p25 pb5">

                    <div class="tab-content pn br-n admin-form">

                        {!! Form::open(['route' => 'package_create', 'method' => 'POST']) !!}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <input type="hidden" name="wr" value="{{ $wr_code }}">

                        @include('system.package.partials.fields', ['button' => trans('front.form.package.create')])

                        {!! Form::Close() !!}

                    </div>

                </div>

            </div>

        </div>
        <!-- end: .tray-center -->

    </section>
    <!-- End: Content -->

@endsection