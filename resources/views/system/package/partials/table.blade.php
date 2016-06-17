<!-- recent activity table -->
<div class="panel">

    <div class="panel-heading">

        <span class="panel-title hidden-xs"> {!! trans('front.form.package.title') !!} </span>   --

        {!! trans('front.form.paginate.page') !!} {{ $packages->currentPage() }} {!! trans('front.form.paginate.of') !!} {{ $packages->lastPage() }}.

    </div>

    <div class="panel-body pn">

        <div class="table-responsive">

            <table class="table admin-form theme-warning tc-checkbox-1 fs13">

                <thead>
                    <tr class="bg-light">
                        <th class="">ID</th>
                        <th class="">{!! trans('front.form.package.table.wr') !!}         </th>
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

                        @foreach($package->client as $client)@endforeach

                        @foreach($client->people as $people)@endforeach

                        @foreach($package->consigning as $consigning)@endforeach

                        @foreach($package->latestStatus->status as $status)@endforeach

                        <tr>
                            <td class=""> {{ $package->id }}         </td>
                            <td class=""> {{ $package->wr }}         </td>
                            <td class=""> {{ $consigning->country }} </td>
                            <td class=""> {{ $client->full_name }}   </td>
                            <td class=""> {{ $people->dni }}         </td>
                            <td class=""> {{ $consigning->name }}    </td>
                            <td class=""> {{ $status->name }}        </td>

                            <td class="text-right">

                                <div class="btn-group text-right">

                                    <button type="button" class="btn btn-success br2 btn-xs fs12 dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        {!! trans('front.form.actions.title') !!}
                                        <span class="caret ml5"></span>
                                    </button>

                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('package_edit',   [$package->id]) }}">{!! trans('front.form.actions.edit') !!}</a>
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

        {!! $packages->appends(Request::only(['name', 'type']))->render() !!}

    </div>

</div>