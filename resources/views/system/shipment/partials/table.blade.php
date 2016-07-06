<!-- recent activity table -->
<div class="panel">

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> {!! trans('front.form.shipment.title') !!} </span>
    </div>

    <div class="panel-body pn">

        <br/>

        <div class="table-responsive">

            <table class="table admin-form theme-warning tc-checkbox-1 fs13" id="dynamic-table">

                <thead>
                    <tr class="bg-light">
                        <th class="system"> ID </th>
                        <th class="system">{!! trans('front.form.shipment.table.wb') !!}         </th>
                        <th class="system">{!! trans('front.form.shipment.table.status') !!}     </th>
                        <th class="system">{!! trans('front.form.shipment.table.date_s') !!}     </th>
                        <th class="system">{!! trans('front.form.shipment.table.packages') !!}   </th>
                        <th class="system"></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($shipments as $shipment)

                        <tr>
                            <td class=""> {{ $shipment->id }}                                   </td>
                            <td class=""> {{ $shipment->wb }}                                   </td>
                            <td class=""> {{ $shipment->status }}                               </td>
                            <td class=""> {{ $shipment->departure_date->format('d / m / Y') }}  </td>
                            <td class=""> <strong> {{ $shipment->packages->count() }} </strong> </td>

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        {!! trans('front.form.actions.title') !!}
                                        <span class="caret ml5"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('shipment_edit',   [$shipment->id]) }}">{!! trans('front.form.actions.edit') !!}</a>
                                        </li>
                                    </ul>

                                </div>

                            </td>
                        </tr>

                    @endforeach

                </tbody>

                <tfoot>
                    <tr class="bg-light">
                        <th class="system"> ID </th>
                        <th class="system">{!! trans('front.form.shipment.table.wb') !!}         </th>
                        <th class="system">{!! trans('front.form.shipment.table.status') !!}     </th>
                        <th class="system">{!! trans('front.form.shipment.table.date_s') !!}     </th>
                        <th class="system">{!! trans('front.form.shipment.table.packages') !!}   </th>
                        <th class="system"></th>
                    </tr>
                </tfoot>

            </table>

        </div>

    </div>

</div>