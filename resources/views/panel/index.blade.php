@extends('a_templates.templates.admin')

@section('header_menu')

    @include('panel.partials.header')

@endsection

@section('content')

    <section id="content" class="animated fadeIn">

        @include('panel.partials.presentation')

        @include('a_templates.partials.messages')

        <div class="row">

            @include('panel.partials.activity')

            <div class="col-md-8">

                <div class="tab-block">

                    <div class="tab-content p30">

                        @include('panel.partials.events')

                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection