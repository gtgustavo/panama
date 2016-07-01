<!-- jQuery -->
{!! Html::script('vendor/jquery/jquery-2.2.3.min.js') !!}
{!! Html::script('vendor/jquery/jquery_ui/jquery-ui.min.js') !!}

<!-- CanvasBG Plugin(creates mousehover effect) -->
{!! Html::script('vendor/plugins/canvasbg/canvasbg.js') !!}

<!-- HighCharts Plugin -->
{!! Html::script('vendor/plugins/highcharts/highcharts.js') !!}

<!-- Calendar date picker -->
{!! Html::script('assets/admin-tools/admin-forms/js/jquery-ui-datepicker.min.js') !!}
{!! Html::script('assets/admin-tools/admin-forms/js/i18n/datepicker-es.js') !!}

<!-- Theme Javascript -->
{!! Html::script('assets/js/utility/utility.js') !!}
{!! Html::script('assets/js/demo/demo.js') !!}
{!! Html::script('assets/js/main.js') !!}

<!-- Init style and effects -->
{!! Html::script('assets/js/app/init.js') !!}

<!-- Select Multiple -->
{!! Html::script('assets/select-multiple/jquery.multi-select.js') !!}

<!-- Tables Dynamic -->
{!! Html::script('assets/js/app/dynamic_table/dataTables.min.js') !!}
{!! Html::script('assets/js/app/dynamic_table/dataTables.bootstrap.min.js') !!}
{!! Html::script('assets/js/app/dynamic_table/init_dynamic_table.js') !!}

<!-- Slider -->
{!! Html::script('assets/js/app/slider/jssor.slider.min.js') !!}
{!! Html::script('assets/js/app/slider/slider.js') !!}

@yield('script')