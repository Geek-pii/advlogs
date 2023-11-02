@extends('admin.layouts.master')

@section('style')
@endsection

@section('content')
    <div class="row">
        @if (in_array('admin.page.index', $composer_auth_permissions))
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $count_page }}</h3>
                        <p>{!! trans('admin_menu.pages') !!}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{!! route('admin.page.index') !!}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endif
        @if (in_array('admin.user.index', $composer_auth_permissions))
        @endif
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $count_user }}</h3>
                    <p>{!! trans('admin_menu.users') !!}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{!! route('admin.user.index') !!}" class="small-box-footer">More info <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
