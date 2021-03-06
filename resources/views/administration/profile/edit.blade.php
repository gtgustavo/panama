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
                    <span class="panel-title hidden-xs"> {!! trans('front.form.profile.events.edit') !!} - {{ $profile->name }}</span>
                </div>

                <div class="panel-body p25 pb5">

                    <div class="tab-content pn br-n admin-form">

                        {!! Form::model($profile, ['route' => ['profile_update', $profile], 'method' => 'PUT']) !!}

                        @include('administration.profile.partials.fields', ['button' => trans('front.form.actions.edit')])

                        {!! Form::Close() !!}

                    </div>

                </div>

            </div>

        </div>
        <!-- end: .tray-center -->

    </section>
    <!-- End: Content -->

@endsection