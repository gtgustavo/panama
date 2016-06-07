<div class="panel-body bg-light p30">

    <div class="row">

        <div class="col-sm-7 pr30">

            <div class="section">
                {!! Field::email('email', ['class' => 'gui-input', 'i' => 'field-icon', 'ph' => trans('validation.attributes.email')]) !!}
            </div>

            <div class="section">
                {!! Field::password('password', ['class' => 'gui-input',  'ph' => trans('validation.attributes.password')]) !!}
            </div>

        </div>

        <div class="col-sm-5 br-l br-grey pl30">
            <h3 class="mb25"> You'll Have Access To Your:</h3>
            <p class="mb15">
                <span class="fa fa-check text-success pr5"></span> Unlimited Email Storage</p>
            <p class="mb15">
                <span class="fa fa-check text-success pr5"></span> Unlimited Photo Sharing/Storage</p>
            <p class="mb15">
                <span class="fa fa-check text-success pr5"></span> Unlimited Downloads</p>
            <p class="mb15">
                <span class="fa fa-check text-success pr5"></span> Unlimited Service Tickets</p>
        </div>

    </div>

</div>