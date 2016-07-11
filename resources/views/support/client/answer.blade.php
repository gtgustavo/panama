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

            <div class="panel mb25 mt5">

                <div class="panel-heading">
                    <span class="panel-title hidden-xs"> {!! trans('front.form.support.events.answer') !!} -- {{ $support->ticket->theme }} </span>
                </div>

                <div class="panel-body p25 pb5">

                    <div class="tab-content pn br-n admin-form">

                        {!! Form::model($support, ['route' => ['answer_create', $support], 'method' => 'POST']) !!}

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

@section('script')
    {!! Html::script('assets/js/app/slider_client/init.js') !!}
@endsection