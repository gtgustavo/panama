@extends('a_templates.templates.admin')

@section('header_menu')

    @can('admin')

        @include('system.consigning.partials.header')
    @else

        @include('dashboard.client.partials.header')
    @endcan

@endsection

@section('content')

    <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            @can('client')
                @include('dashboard.client.partials.tiles')
                <br>
            @endcan

            <!-- dashboard tiles -->
            @include('a_templates.partials.messages')

            <div class="panel mb25 mt5">

                <div class="panel-heading">
                    <span class="panel-title hidden-xs"> {!! trans('front.form.consigning.events.edit') !!} -- {{ $client->people->full_name }} </span>
                </div>

                <div class="panel-body p25 pb5">

                    <div class="tab-content pn br-n admin-form">

                        {!! Form::model($client->toArray() + $consigning->toArray(), ['route' => ['consigning_update', $client, $consigning], 'method' => 'PUT']) !!}

                        @include('system.consigning.partials.fields', ['button' => trans('front.form.actions.edit')])

                        {!! Form::Close() !!}

                    </div>

                </div>

            </div>

        </div>
        <!-- end: .tray-center -->

    </section>
    <!-- End: Content -->

@endsection