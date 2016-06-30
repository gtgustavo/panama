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
                        @can('admin')
                            <th class="">
                                {!! Form::checkbox('select_all', null, null, ['id' => 'select_all', 'class' => 'checkbox', 'title' => 'select all']) !!}
                            </th>
                        @endcan

                        <th class="">{!! trans('front.form.package.table.wr') !!}         </th>
                        <th class="">{!! trans('front.form.package.table.wb') !!}         </th>
                        <th class="">{!! trans('front.form.package.table.consigning') !!} </th>
                        <th class="">{!! trans('front.form.package.table.name_e') !!}     </th>
                        <th class="">{!! trans('front.form.package.table.dni') !!}        </th>
                        <th class="">{!! trans('front.form.package.table.name_r') !!}     </th>
                        <th class="">{!! trans('front.form.package.table.status') !!}     </th>
                        <th class=""></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($packages as $package)

                        <tr>
                            @can('admin')
                                <th class="">
                                    {!! Form::checkbox('package_id[]', $package->id, null, ['class' => 'checkbox', 'title' => $package->id]) !!}
                                </th>
                            @endcan
                            <td class=""> {{ $package->wr }}                        </td>
                            <td class=""> {{ $package->shipment['wb'] }}            </td>
                            <td class=""> {{ $package->consigning->country }}       </td>
                            <td class=""> {{ $package->client->people->full_name }} </td>
                            <td class=""> {{ $package->client->people->dni }}       </td>
                            <td class=""> {{ $package->consigning->name }}          </td>
                            <td class=""> {{ $package->status }}                    </td>

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
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

            </table>

        </div>

    </div>

</div>