@extends('a_templates.templates.admin')

@section('header_menu')

    @can('admin')

        @include('dashboard.admin.partials.header')
    @else

        @include('dashboard.client.partials.header')
    @endcan

@endsection

@section('content')

    <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            <!-- dashboard tiles -->
            @include('a_templates.partials.messages')

            <div class="panel mb25 mt5">

                <div class="panel-heading">
                    <span class="panel-title hidden-xs"> {!! trans('front.form.support.events.answer') !!} -- {{ $support->ticket->theme }} -- {{ $support->client->people->full_name }} DNI {{ $support->client->people->dni }}</span>
                </div>

                <div class="panel-body p25 pb5">

                    <div class="tab-content pn br-n admin-form">

                        {!! Form::model($support, ['route' => ['answer_create', $support], 'method' => 'POST']) !!}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        @include('support.partials.fields', ['button' => trans('front.form.support.answer')])

                        {!! Form::Close() !!}

                    </div>

                </div>

            </div>

        </div>
        <!-- end: .tray-center -->

    </section>
    <!-- End: Content -->

@endsection