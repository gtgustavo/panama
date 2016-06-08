<div class="row mb15 table-layout">

    <div class="col-xs-6 va-m pln">
        <a href="{{ route('auth') }}" title="Return to Dashboard">
            <img src="assets/img/logos/logo_white.png" title="Logo" class="img-responsive w250">
        </a>
    </div>

    <div class="col-xs-6 text-right va-b pr5">
        <div class="login-links">
            <a href="{{ route('auth') }}" class="active" title="{{ trans('front.form.button.login') }}"> {{ trans('front.form.button.login') }} </a>
            <span class="text-white"> | </span>
            <a href="{{ route('home') }}" class="" title="{{ trans('front.form.button.sign_up') }}"> {{ trans('front.form.button.sign_up') }} </a>
        </div>

    </div>

</div>