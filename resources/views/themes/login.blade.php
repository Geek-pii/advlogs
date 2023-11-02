@extends('auth', ['content_class' => 'login-main-wrapper'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!--signup-->
            @if (isset($blocks['LOGIN-CONTENT']) && isset($blocks['LOGIN-CONTENT'][0]))
                <div class="col-md-7">
                    <div class="signup-wrapper"
                        style="background:url('{{ asset($blocks['LOGIN-CONTENT'][0]->photo) }}') no-repeat top;">
                        <div class="signup-wrapper-text">
                            <h3>{!! $blocks['LOGIN-CONTENT'][0]->name !!}</h3>
                            {!! contentRender($blocks['LOGIN-CONTENT'][0]->content) !!}
                            <div class="signup-button-wrp">
                                <a href="{{ $blocks['LOGIN-CONTENT'][0]->url }}">Sign Up Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!--//signup-->

            <!--login-->
            <div class="col-md-5">
                <div class="login-wrapper p-5">
                    <div class="login-logo"><a href="{{ route('page.home') }}"> <img
                                src="{{ $composer_system['logo'] ?? asset('assets/images/logo.png') }}"
                                alt="{{ config('app.name') }}"> </a></div>
                    <h1 class="mt-2">{{ $page->title }}</h1>
                    <form method="post" action="{{ route('account.login.post') }}" class="w-100">
                        @csrf

                        @include('admin.layouts.parts.message')
                        <div class="form-group">
                            <label>Enter Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <label>Enter Mobile # <span class="text-danger">*</span></label>
                            <input type="text" name="mobile_number" value="{{ old('mobile_number') }}"
                                class="form-control phone_us" placeholder="Enter Mobile #">
                        </div>
                        <div class="form-group">
                            <label>Enter Password <span class="text-danger">*</span>&nbsp;<span
                                    class="text-danger hidden caps-lock">(Caps lock is ON)</span></label>
                            <div class="d-flex">
                                <input type="password" name="password" id="password" class="form-control password-field"
                                    placeholder="Enter Password" minlength="8" required>
                                <div class="input-group-addon">
                                    <i class="fa fa-eye text-secondary password-icon" aria-hidden="true" role="button"></i>
                                </div>
                            </div>
                        </div>
                        <div class="boxes">
                            <input type="checkbox" id="box-1">
                            <label for="box-1">Remember Me</label>
                        </div>
                        <div class="signin-button-wrapper">
                            <button><img src="{{ asset('assets/images/button-icon1.png') }}" alt="icon"> Login</button>
                        </div>
                        <div class="forget-password-wrp">
                            <a href="/forgot-password">Forgot Password?</a>
                        </div>
                        <div class="dont-have-account">Don't have an account? <a href="/sign-up"> Sign Up </a></div>
                    </form>
                </div>
            </div>
            <!--//login-->
        </div>
    </div>
@endsection