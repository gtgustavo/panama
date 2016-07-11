<!-- recent activity table -->
<div class="panel">

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> {!! trans('front.form.reception_center.title') !!} </span>
    </div>

    <div class="panel-body pn">

        <br/>

        <div class="table-responsive">

            <table class="table admin-form theme-warning tc-checkbox-1 fs13" id="dynamic-table">

                <thead>
                    <tr class="bg-light">
                        <th class="system">ID</th>
                        <th class="system">{!! trans('front.form.reception_center.table.name') !!}     </th>
                        <th class="system">{!! trans('front.form.reception_center.table.country') !!}  </th>
                        <th class="system">{!! trans('front.form.reception_center.table.province') !!} </th>
                        <th class="system">{!! trans('front.form.reception_center.table.city') !!}     </th>
                        <th class="system">{!! trans('front.form.reception_center.table.employee') !!} </th>
                        <th class="system">{!! trans('front.form.reception_center.table.client') !!}   </th>
                        <th class="system">{!! trans('front.form.reception_center.table.package') !!}  </th>
                        <th class="system"></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($reception_center as $reception)

                        <tr>
                            <td class=""> {{ $reception->id }}                                  </td>
                            <td class=""> {{ $reception->name }}                                </td>
                            <td class=""> {{ $reception->province->country->name }}             </td>
                            <td class=""> {{ $reception->province->name }}                      </td>
                            <td class=""> {{ $reception->city }}                                </td>
                            <td class=""> {{ $reception->employeeCount->first()['aggregate'] }} </td>
                            <td class=""> {{ $reception->clientCount->first()['aggregate'] }}   </td>
                            <td class=""> {{ $reception->packageCount->first()['aggregate'] }}  </td>

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn orange br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        {!! trans('front.form.actions.title') !!}
                                        <span class="caret ml5"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('reception_center_edit',   [$reception->id]) }}">{!! trans('front.form.actions.edit') !!}</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="{{ route('reception_center_delete', [$reception->id]) }}" onclick="return confirm('{!! trans('messages.confirm.delete_register') !!}')">{!! trans('front.form.actions.delete') !!}</a>
                                        </li>
                                    </ul>

                                </div>

                            </td>
                        </tr>

                    @endforeach

                </tbody>

                <tfoot>
                <tr class="bg-light">
                    <th class="system">ID</th>
                    <th class="system">{!! trans('front.form.reception_center.table.name') !!}     </th>
                    <th class="system">{!! trans('front.form.reception_center.table.country') !!}  </th>
                    <th class="system">{!! trans('front.form.reception_center.table.province') !!} </th>
                    <th class="system">{!! trans('front.form.reception_center.table.city') !!}     </th>
                    <th class="system">{!! trans('front.form.reception_center.table.employee') !!} </th>
                    <th class="system">{!! trans('front.form.reception_center.table.client') !!}   </th>
                    <th class="system">{!! trans('front.form.reception_center.table.package') !!}  </th>
                    <th class="system"></th>
                </tr>
                </tfoot>

            </table>

        </div>

    </div>

</div>