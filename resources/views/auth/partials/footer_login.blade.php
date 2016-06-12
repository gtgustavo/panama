<div class="panel-footer clearfix p10 ph15">

    <button type="submit" class="button btn-primary mr10 pull-right">

        {{ trans('front.form.button.login') }}

    </button>

    <a href="{{ route('new_client') }}" class="button btn-info mr10 pull-right"> {{ trans('front.form.button.sign_up') }} </a>

    <a href="{{ route('password') }}"   class="mr10 pull-right"> {!! trans('front.form.button.forget') !!} </a>

    @include('a_templates.extras.mini_lang')

</div>