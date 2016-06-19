@extends('a_templates.templates.admin')

@section('header_menu')

    @include('dashboard.admin.partials.header')

@endsection

@section('content')

        <section id="content" class="table-layout animated fadeIn">

            <!-- begin: .tray-center -->
            <div class="tray tray-center">

                <!-- dashboard tiles -->
                @include('dashboard.admin.partials.tiles')

                @include('a_templates.partials.messages')

                @include('dashboard.admin.partials.filter')

                @include('system.package.partials.table')

                @include('system.package.partials.status')

            </div>
            <!-- end: .tray-center -->

        </section>
        <!-- End: Content -->

@endsection

@section('script')

    {!! Html::script('assets/js/app/select_all.js') !!}

    <script>

        $(document).ready(function(){

            $('.btn-status').click(function(){

                var form = $('#form-status');

                var url = form.attr('action');

                var data = form.serialize();

                var resp = window.confirm("¿cambiar estatus?");

                if (resp)
                {
                    $.post(url, data, function(result){

                        alert(result);

                        location.reload();

                    }).fail(function(){

                        alert('Seleccione los paqutes !!!');

                    });
                }

            });

        });

    </script>

@endsection