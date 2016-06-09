@extends('a_templates.templates.admin')

@section('header_menu')

    @include('administration.a_partials.header')

@endsection

@section('content')

    <section id="content" class="table-layout animated fadeIn">

        <!-- begin: .tray-center -->
        <div class="tray tray-center">

            <!-- dashboard tiles -->
            @include('a_templates.partials.messages')

            <div class="panel mb25 mt5">

                <div class="panel-heading">
                    <span class="panel-title hidden-xs"> {!! trans('front.form.employee.events.edit') !!} - {{ $employee->full_name }}</span>
                </div>

                <div class="panel-body p25 pb5">

                    <div class="tab-content pn br-n admin-form">

                        {!! Form::model($employee, ['route' => ['employee_update', $employee], 'method' => 'PUT']) !!}

                        @include('administration.employee.partials.fields', ['profile' => $profile, 'button' => trans('front.form.actions.edit')])

                        {!! Form::Close() !!}

                    </div>

                </div>

            </div>

        </div>
        <!-- end: .tray-center -->

    </section>
    <!-- End: Content -->

@endsection