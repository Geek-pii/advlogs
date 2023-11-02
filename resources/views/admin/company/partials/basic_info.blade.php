<div class="table-responsive">
    <table class="table">
        <tbody>
            <tr>
                <th class="w-25">{!! trans('admin_company.table.company_legal_name') !!}:</th>
                <td>{{ $company->company_legal_name }}</td>
                <td><a href="{{ route('admin.company.edit', ['id' => $company->id]) }}"
                        class="btn bg-gradient-success btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a></td>
            </tr>
            <tr>
                <th>{!! trans('admin_company.table.company_type') !!}:</th>
                <td colspan="2">
                    {{ $company->type == 'business' ? 'Bisiness Client' : 'Carrier' }}
                </td>
            </tr>
            <tr>
                <th>{!! trans('admin_company.table.company_dba') !!}:</th>
                <td colspan="2">
                    {{ $company->company_dba }}
                </td>
            </tr>
            <tr>
                <th>{!! trans('admin_company.table.street_address') !!}:</th>
                <td colspan="2">
                    {{ $company->street_address }}
                </td>
            </tr>
            <tr>
                <th>{!! trans('admin_company.table.city') !!}:</th>
                <td colspan="2">{{ $company->city }}</td>
            </tr>
            <tr>
                <th>{!! trans('admin_company.table.state') !!}:</th>
                <td colspan="2">{{ $company->state }}</td>
            </tr>
            <tr>
                <th>{!! trans('admin_company.table.zip') !!}:</th>
                <td colspan="2">{{ $company->zip }}</td>
            </tr>
            <tr>
                <th>{!! trans('admin_company.table.mailing_street_address') !!}:</th>
                <td colspan="2">{{ $company->mailing_street_address }}</td>
            </tr>
            <tr>
                <th>{!! trans('admin_company.table.mailing_city') !!}:</th>
                <td colspan="2">{{ $company->mailing_city }}</td>
            </tr>
            <tr>
                <th>{!! trans('admin_company.table.mailing_state') !!}:</th>
                <td colspan="2">{{ $company->mailing_state }}</td>
            </tr>
            <tr>
                <th>{!! trans('admin_company.table.mailing_zip') !!}:</th>
                <td colspan="2">{{ $company->mailing_zip }}</td>
            </tr>
            <tr>
                <th>{!! trans('admin_company.table.created_at') !!}:</th>
                <td colspan="2">{{ $company->created_at->toDateTimeString() }}</td>
            </tr>
            <tr>
                <th>{!! trans('admin_company.table.payment_plan') !!}:</th>
                <td colspan="2">
                    <div class="form-group @if ($company->use_factory == 'Y') d-none @endif" id="not_use_factor">
                        @foreach ($paymentPlans['not_use_factor'] as $item)
                            @if ($company->use_factory == 'N')
                                <div value="{{ $item->id }}" @if ($company->carrierPaymentPlans->first() &&  $company->carrierPaymentPlans->first()->id != $item->id) class="d-none" @endif>
                                    Pay me directly in {{ $item->days_paid }}
                                    {{ strtolower($item->day_type) }}
                                    days with a {{ $item->fee }} discount
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="form-group @if ($company->use_factory == 'N') d-none @endif" id="use_factor">
                        @foreach ($paymentPlans['use_factor'] as $item)
                            @if ($company->use_factory == 'Y')
                                @if ($item->pay_to == 'Direct')
                                    <div value="{{ $item->id }}" @if ($company->carrierPaymentPlans->first() &&  $company->carrierPaymentPlans->first()->id != $item->id) class="d-none" @endif>
                                        Skip the factor and pay me directly in {{ $item->days_paid }}
                                        {{ strtolower($item->day_type) }}
                                        days with a {{ $item->fee }} discount
                                    </div>
                                @else
                                    <div value="{{ $item->id }}" @if ($company->carrierPaymentPlans->first() &&  $company->carrierPaymentPlans->first()->id != $item->id) class="d-none" @endif>
                                        Pay my factoring company company in {{ $item->days_paid }}
                                        {{ strtolower($item->day_type) }}
                                        days with a {{ $item->fee }}% discount
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>