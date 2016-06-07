<!-- jQuery -->
{!! Html::script('vendor/jquery/jquery-1.11.1.min.js') !!}
{!! Html::script('vendor/jquery/jquery_ui/jquery-ui.min.js') !!}

<!-- CanvasBG Plugin(creates mousehover effect) -->
{!! Html::script('vendor/plugins/canvasbg/canvasbg.js') !!}

<!-- HighCharts Plugin -->
{!! Html::script('vendor/plugins/highcharts/highcharts.js') !!}

<!-- Theme Javascript -->
{!! Html::script('assets/js/utility/utility.js') !!}
{!! Html::script('assets/js/demo/demo.js') !!}
{!! Html::script('assets/js/main.js') !!}

@yield('script')