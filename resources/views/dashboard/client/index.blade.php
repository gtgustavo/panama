@extends('a_templates.templates.admin')

@section('header_menu')

    @include('dashboard.client.partials.header')

@endsection

@section('content')

        <section id="content" class="table-layout animated fadeIn">

            <!-- begin: .tray-center -->
            <div class="tray tray-center">

                <!-- dashboard tiles -->
                @include('dashboard.client.partials.tiles')
                <br>

                @include('a_templates.partials.messages')

                @include('dashboard.client.partials.filter')

                @include('system.package.partials.table')

            </div>
            <!-- end: .tray-center -->

        </section>
        <!-- End: Content -->

@endsection

@section('script')

    <script>

        $(document).ready(function(){
            $('.bxslider').bxSlider({
                auto:true,
                pause: 5000,
                slideWidth:1600,
                adaptiveHeight: true,

            });
        });

    </script>

@endsection