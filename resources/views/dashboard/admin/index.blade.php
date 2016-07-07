@extends('a_templates.templates.admin')

@section('header_menu')

    @include('dashboard.admin.partials.header')

@endsection

@section('content')

        <section id="content" class="table-layout animated fadeIn">

            <!-- begin: .tray-center -->
            <div class="tray tray-center">

                <!-- dashboard tiles -->
                @include('dashboard.admin.partials.tiles_packages')

                @include('a_templates.partials.messages')

                @include('dashboard.admin.partials.filter')

                {!! Form::open(['route' => ['package_change_status'], 'method' => 'POST', 'id' => 'form-status']) !!}

                    @include('system.package.partials.table')

                    @include('system.package.partials.status')

                {!! Form::Close() !!}

            </div>
            <!-- end: .tray-center -->

        </section>
        <!-- End: Content -->

@endsection

@section('script')

    {!! Html::script('assets/js/app/select_all.js') !!}

    @include('dashboard.admin.partials.status_change')

@endsection