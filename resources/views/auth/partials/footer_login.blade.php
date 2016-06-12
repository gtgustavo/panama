<div class="panel-footer clearfix p10 ph15">

    <button type="submit" class="button btn-primary mr10 pull-right">

        {{ trans('front.form.button.login') }}

    </button>

    <a href="" class="button btn-info mr10 pull-right"> {{ trans('front.form.button.sign_up') }} </a>

    <a href="{{ route('password') }}" class="mr10 pull-right"> {!! trans('front.form.button.forget') !!} </a>

    <label class="switch ib switch-primary pull-left input-align mt10">
        <a href="{{ url('lang', ['en']) }}"> <span class="flag-xs flag-us mr10"></span></a>
        <a href="{{ url('lang', ['es']) }}"> <span class="flag-xs flag-es mr10"></span></a>
    </label>

</div>