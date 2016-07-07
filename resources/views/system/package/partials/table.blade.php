<!-- recent activity table -->
<div class="panel">

    <div class="panel-heading">
        <span class="panel-title hidden-xs"> {!! trans('front.form.package.title') !!} </span>
    </div>

    <div class="panel-body pn">

        <br/>

        <div class="table-responsive">

            <table class="table admin-form theme-warning tc-checkbox-1 fs13" id="dynamic-table">

                <thead>
                    <tr class="bg-light">
                        @can('employee')
                            <th class="system">
                                {!! Form::checkbox('select_all', null, null, ['id' => 'select_all', 'class' => 'checkbox', 'title' => 'select all']) !!}
                            </th>
                        @endcan

                        <th class="system">{!! trans('front.form.package.table.wr') !!}         </th>
                        @can('employee')
                            <th class="system">{!! trans('front.form.package.table.wb') !!}         </th>
                        @endcan
                        <th class="system">{!! trans('front.form.package.table.consigning') !!} </th>
                        <th class="system">{!! trans('front.form.package.table.name_e') !!}     </th>
                        <th class="system">{!! trans('front.form.package.table.dni') !!}        </th>
                        <th class="system">{!! trans('front.form.package.table.name_r') !!}     </th>
                        <th class="system">{!! trans('front.form.package.table.status') !!}     </th>
                        @can('client')
                            <th class="system">{!! trans('front.form.package.table.date') !!}     </th>                 </td>
                        @endcan
                        <th class="system"></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($packages as $package)

                        <tr>
                            @can('employee')
                                <td class="">
                                    {!! Form::checkbox('package_id[]', $package->id, null, ['class' => 'checkbox', 'title' => $package->id]) !!}
                                </td>
                            @endcan
                            <td class=""> {{ $package->wr }}                                  </td>
                            @can('employee')
                                <td class=""> {{ $package->shipment['wb'] }}                      </td>
                            @endcan
                            <td class=""> {{ $package->consigning->province->country->name }} </td>
                            <td class=""> {{ $package->client->people->full_name }}           </td>
                            <td class=""> {{ $package->client->people->dni }}                 </td>
                            <td class=""> {{ $package->consigning->name }}                    </td>
                            <td class=""> {{ $package->status }}                              </td>
                            @can('client')
                                <td class=""> {{ $package->updated_at->format('d / m / Y') }}                      </td>
                            @endcan

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn btn-danger br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        {!! trans('front.form.actions.title') !!}
                                        <span class="caret ml5"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">

                                        @can('admin')
                                            <li>
                                                <a href="{{ route('package_edit',    [$package->id]) }}"> {!! trans('front.form.actions.edit') !!}</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{ route('my_package_edit', [$package->id]) }}"> {!! trans('front.form.actions.edit') !!}</a>
                                            </li>

                                            <li>
                                                <a href="{{ route('my_package_delete', [$package->id]) }}" onclick="return confirm('{!! trans('messages.confirm.annular_package') !!}')"> {!! trans('front.form.actions.annular') !!}</a>
                                            </li>
                                        @endcan

                                    </ul>

                                </div>

                            </td>
                        </tr>

                    @endforeach

                </tbody>

                <tfoot>
                    <tr class="bg-light">
                        @can('employee')
                            <th class="system"></th>
                        @endcan

                        <th class="system">{!! trans('front.form.package.table.wr') !!}         </th>
                        @can('employee')
                            <th class="system">{!! trans('front.form.package.table.wb') !!}         </th>
                        @endcan
                        <th class="system">{!! trans('front.form.package.table.consigning') !!} </th>
                        <th class="system">{!! trans('front.form.package.table.name_e') !!}     </th>
                        <th class="system">{!! trans('front.form.package.table.dni') !!}        </th>
                        <th class="system">{!! trans('front.form.package.table.name_r') !!}     </th>
                        <th class="system">{!! trans('front.form.package.table.status') !!}     </th>
                        @can('client')
                            <th class="system">{!! trans('front.form.package.table.date') !!}     </th>                 </td>
                        @endcan
                        <th class="system"></th>
                    </tr>
                </tfoot>

            </table>

        </div>

    </div>

</div>