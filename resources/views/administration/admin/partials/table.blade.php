<!-- recent activity table -->
<div class="panel">

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> {!! trans('front.form.administrator.title') !!} </span>
    </div>

    <div class="panel-body pn">

        <br/>

        <div class="table-responsive">

            <table class="table admin-form theme-warning tc-checkbox-1 fs13" id="dynamic-table">

                <thead>
                    <tr class="bg-light">
                        <th class="system">ID</th>
                        <th class="system">{!! trans('front.form.employee.table.name') !!}             </th>
                        <th class="system">{!! trans('front.form.employee.table.dni') !!}              </th>
                        <th class="system">{!! trans('front.form.employee.table.email') !!}            </th>
                        <th class="system">{!! trans('front.form.employee.table.profile') !!}          </th>
                        <th class="system">{!! trans('front.form.employee.table.reception_center') !!} </th>
                        <th class="system"></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($employees as $employee)

                        <tr>
                            <td class=""> {{ $employee->id }}                </td>
                            <td class=""> {{ $employee->people->full_name }} </td>
                            <td class=""> {{ $employee->people->dni }}       </td>
                            <td class=""> {{ $employee->email }}             </td>
                            <td class=""> {{ $employee->profile->name }}     </td>
                            <td class=""> {{ $employee->reception->name }}   </td>

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn orange br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        {!! trans('front.form.actions.title') !!}
                                        <span class="caret ml5"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('administrator_edit',   [$employee->id, $employee->people_id]) }}">{!! trans('front.form.actions.edit') !!}</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="{{ route('administrator_delete', [$employee->id, $employee->people_id]) }}" onclick="return confirm('{!! trans('messages.confirm.delete_register') !!}')">{!! trans('front.form.actions.delete') !!}</a>
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
                        <th class="system">{!! trans('front.form.employee.table.name') !!}             </th>
                        <th class="system">{!! trans('front.form.employee.table.dni') !!}              </th>
                        <th class="system">{!! trans('front.form.employee.table.email') !!}            </th>
                        <th class="system">{!! trans('front.form.employee.table.profile') !!}          </th>
                        <th class="system">{!! trans('front.form.employee.table.reception_center') !!} </th>
                        <th class="system"></th>
                    </tr>
                </tfoot>

            </table>

        </div>

    </div>

</div>