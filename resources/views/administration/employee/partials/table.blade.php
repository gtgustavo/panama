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
                        <th class="">{!! trans('front.form.employee.table.name') !!}    </th>
                        <th class="">{!! trans('front.form.employee.table.dni') !!}     </th>
                        <th class="">{!! trans('front.form.employee.table.email') !!}   </th>
                        <th class="">{!! trans('front.form.employee.table.profile') !!} </th>
                        <th class="">{!! trans('front.form.employee.table.phone_c') !!} </th>
                        <th class="">{!! trans('front.form.employee.table.phone_h') !!} </th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($employees as $employee)

                        <tr>
                            <td class=""> {{ $employee->id }}            </td>
                            <td class=""> {{ $employee->full_name }}     </td>
                            <td class=""> {{ $employee->dni }}           </td>
                            <td class=""> {{ $employee->email }}         </td>
                            <td class="">
                                @foreach($employee->profile as $profile)
                                    {{ $profile->name }}
                                @endforeach
                            </td>
                            <td class=""> {{ $employee->phone_c }}        </td>
                            <td class=""> {{ $employee->phone_h }}        </td>

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        {!! trans('front.form.actions.title') !!}
                                        <span class="caret ml5"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('employee_edit',   [$employee->id]) }}">{!! trans('front.form.actions.edit') !!}</a>
                                        </li>

                                        <li class="divider"></li>

                                        <li>
                                            <a href="{{ route('employee_delete', [$employee->id]) }}" onclick="return confirm('{!! trans('messages.confirm.delete_register') !!}')">{!! trans('front.form.actions.delete') !!}</a>
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