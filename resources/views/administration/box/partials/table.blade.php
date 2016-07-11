<!-- recent activity table -->
<div class="panel">

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> {!! trans('front.form.box.title') !!} </span>
    </div>

    <div class="panel-body pn">

        <br/>

        <div class="table-responsive">

            <table class="table admin-form theme-warning tc-checkbox-1 fs13" id="dynamic-table">

                <thead>
                    <tr class="bg-light">
                        <th class="system">ID</th>
                        <th class="system">{!! trans('front.form.box.table.box') !!}              </th>
                        <th class="system">{!! trans('front.form.box.table.dimensions') !!}       </th>
                        <th class="system">{!! trans('front.form.box.table.maximum_poundage') !!} </th>
                        <th class="system">{!! trans('front.form.box.table.cost_extra_pound') !!} </th>
                        <th class="system">{!! trans('front.form.box.table.cost_standard') !!}    </th>
                        <th class="system">{!! trans('front.form.box.table.cost_express') !!}     </th>
                        <th class="system">{!! trans('front.form.box.table.status') !!}           </th>
                        <th class="system"></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($boxes as $box)

                        <tr>
                            <td class=""> {{ $box->id }}               </td>
                            <td class=""> {{ $box->box }}              </td>
                            <td class=""> {{ $box->dimensions }}       </td>
                            <td class=""> {{ $box->maximum_poundage }} {!! trans('front.form.box.table.measure') !!} </td>
                            <td class=""> {{ $box->coin->symbol }}  {{ $box->cost_extra_pound }} </td>
                            <td class=""> {{ $box->coin->symbol }}  {{ $box->cost_standard }}    </td>
                            <td class=""> {{ $box->coin->symbol }}  {{ $box->cost_express }}     </td>
                            <td class=""> {{ $box->status }}            </td>

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn orange br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        {!! trans('front.form.actions.title') !!}
                                        <span class="caret ml5"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('box_edit',   [$box->id]) }}">{!! trans('front.form.actions.edit') !!}</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="{{ route('box_status',   [$box->id]) }}">{!! trans('front.form.actions.status') !!}</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="{{ route('box_delete', [$box->id]) }}" onclick="return confirm('{!! trans('messages.confirm.delete_register') !!}')">{!! trans('front.form.actions.delete') !!}</a>
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
                    <th class="system">{!! trans('front.form.box.table.box') !!}              </th>
                    <th class="system">{!! trans('front.form.box.table.dimensions') !!}       </th>
                    <th class="system">{!! trans('front.form.box.table.maximum_poundage') !!} </th>
                    <th class="system">{!! trans('front.form.box.table.cost_extra_pound') !!} </th>
                    <th class="system">{!! trans('front.form.box.table.cost_standard') !!}    </th>
                    <th class="system">{!! trans('front.form.box.table.cost_express') !!}     </th>
                    <th class="system">{!! trans('front.form.box.table.status') !!}           </th>
                    <th class="system"></th>
                </tr>
                </tfoot>

            </table>

        </div>

    </div>

</div>