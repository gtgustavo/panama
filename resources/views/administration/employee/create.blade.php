@extends('a_templates.templates.admin')

@section('header_menu')

    @can('super_admin')

    @include('administration.a_partials.header_super')
    @else

        @include('administration.a_partials.header_employee')
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
                    <span class="panel-title hidden-xs"> {!! trans('front.form.employee.events.create') !!} </span>
                </div>

                <div class="panel-body p25 pb5">

                    <div class="tab-content pn br-n admin-form">

                        {!! Form::open(['route' => 'employee_create', 'method' => 'POST']) !!}

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        @include('administration.employee.partials.fields', ['profile' => $profile, 'reception_center' => $reception_center, 'button' => trans('front.form.employee.create')])

                        {!! Form::Close() !!}

                    </div>

                </div>

            </div>

        </div>
        <!-- end: .tray-center -->

    </section>
    <!-- End: Content -->

@endsection