<div class="panel-body bg-light p30">

    <div class="row">

        <div class="col-sm-7 pr30">

            <div class="section">
                {!! Field::email('email',       ['class' => 'gui-input', 'ph' => trans('validation.attributes.email')]) !!}
            </div>

            <div class="section">
                {!! Field::password('password', ['class' => 'gui-input', 'ph' => trans('validation.attributes.password')]) !!}
            </div>

        </div>

        <div class="col-sm-5 br-l br-grey pl30" align="center">

            <img src="/../assets/img/logos/logo.png" title="Logo" class="img-responsive w200">

        </div>

    </div>

</div>