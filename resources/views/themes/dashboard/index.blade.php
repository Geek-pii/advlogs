@extends('master')
@section('content')
    <div class="business-client-signup-page-wrapper" style="margin-top:180px;min-height: 500px">
        @php
            $authorizedUser = auth('account')->user();
        @endphp
        @if ($authorizedUser->type != 'personal')
            @if ($authorizedUser->active == 'N')
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Your Account Haven't Been Approved By Company Administrator!</strong>
                </div>
            @endif
        @endif
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <h3 class="profile-username text-center">User Dashboard</h3>
                <ul class="list-group list-group-unbordered mb-3 mt-2">
                    <li class="list-group-item">
                        <b>User Name:</b> <a class="float-right">{{ auth('account')->user()->full_name }}</a>
                    </li>
                    @if (auth('account')->user()->company)
                        <li class="list-group-item">
                            <b>Company Name:</b> <a
                                class="float-right">{{ auth('account')->user()->company->company_legal_name }}</a>
                        </li>
                    @endif
                    <li class="list-group-item">
                        <b>Job Title:</b> <a class="float-right">{{ auth('account')->user()->job_title }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Account Type:</b> <a class="float-right">{{ ucfirst(auth('account')->user()->type) }}</a>
                    </li>
                </ul>
                @php
                    if ($authorizedUser->type == 'personal') {
                        $url = route('account.personal.quotes', ['pass_step' => true]);
                    }
                    if ($authorizedUser->type == 'business') {
                        $url = route('account.biz.company-profile', ['pass_step' => true]);
                    }
                    if ($authorizedUser->type == 'carrier') {
                        $url = route('account.carrier.company-profile', ['pass_step' => true]);
                    }
                @endphp
                @if ($authorizedUser->type == 'personal' || $authorizedUser->hasRole('company.creator'))
                    <a href="{{ $url }}" class="btn btn-primary btn-block"><b>Review Account Steps</b></a>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
