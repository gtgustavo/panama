<!-- recent activity table -->
<div class="panel">

    <div class="panel-heading">

        <span class="panel-title hidden-xs"> {!! trans('front.form.employee.title') !!} </span>   --

        {!! trans('front.form.paginate.page') !!} {{ $employees->currentPage() }} {!! trans('front.form.paginate.of') !!} {{ $employees->lastPage() }}.

    </div>

    <div class="panel-body pn">

        <div class="table-responsive">

            <table class="table admin-form theme-warning tc-checkbox-1 fs13">

                <thead>
                    <tr class="bg-light">
                        <th class="">ID</th>
                        <th class="">{!! trans('front.form.employee.table.name') !!}             </th>
                        <th class="">{!! trans('front.form.employee.table.dni') !!}              </th>
                        <th class="">{!! trans('front.form.employee.table.email') !!}            </th>
                        <th class="">{!! trans('front.form.employee.table.profile') !!}          </th>
                        <th class="">{!! trans('front.form.employee.table.reception_center') !!} </th>
                        <th class=""></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($employees as $employee)

                        @foreach($employee->people as $people)@endforeach

                        @foreach($employee->profile as $profile)@endforeach

                        @foreach($employee->reception as $reception)@endforeach

                        <tr>
                            <td class=""> {{ $employee->id }}        </td>
                            <td class=""> {{ $employee->full_name }} </td>
                            <td class=""> {{ $people->dni }}         </td>
                            <td class=""> {{ $employee->email }}     </td>
                            <td class=""> {{ $profile->name }}       </td>
                            <td class=""> {{ $reception->name }}     </td>

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        {!! trans('front.form.actions.title') !!}
                                        <span class="caret ml5"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('employee_edit',   [$employee->id, $employee->people_id]) }}">{!! trans('front.form.actions.edit') !!}</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="{{ route('employee_delete', [$employee->id, $employee->people_id]) }}" onclick="return confirm('{!! trans('messages.confirm.delete_register') !!}')">{!! trans('front.form.actions.delete') !!}</a>
                                        </li>
                                    </ul>

                                </div>

                            </td>
                        </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

    <div align="center">

        {!! $employees->appends(Request::only(['name', 'type']))->render() !!}

    </div>

</div>