@extends('auth', ['content_class' => 'login-main-wrapper'])

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!--signup-->
            @if (isset($blocks['FORGOT-PASSWORD-CONTENT']) && isset($blocks['FORGOT-PASSWORD-CONTENT'][0]))
                <div class="col-md-7">
                    <div class="signup-wrapper"
                        style="background:url('{{ asset($blocks['FORGOT-PASSWORD-CONTENT'][0]->photo) }}') no-repeat top;">
                        <div class="signup-wrapper-text">
                            <h3>{!! $blocks['FORGOT-PASSWORD-CONTENT'][0]->name !!}</h3>
                            {!! contentRender($blocks['FORGOT-PASSWORD-CONTENT'][0]->content) !!}
                            <div class="signup-button-wrp">
                                <a href="{{ $blocks['FORGOT-PASSWORD-CONTENT'][0]->url }}">Login to Your Account</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!--//signup-->

            <!--login-->
            <div class="col-md-5">
                <div class="login-wrapper p-5" id="step_1">
                    <div class="login-logo"><a href="{{ route('page.home') }}"> <img
                                src="{{ $composer_system['logo'] ?? asset('assets/images/logo.png') }}"
                                alt="{{ config('app.name') }}"> </a></div>
                    <form>
                        <h1>{{ $page->title }}</h1>
                        <div class="form-group">
                            <label> Enter Email </label>
                            <input type="email" name="email" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="signin-button-wrapper">
                            <button><img src="{{ asset('assets/images/button-icon1.png') }}" alt="icon">Send</button>
                        </div>
                        <div class="dont-have-account already-account-wrapper"> Already have an account? <a
                                href="/login">Login to
                                Your Account</a></div>
                    </form>
                </div>
            </div>
            <!--//login-->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var step1Validator = $('#step_1').find('form').validate({
            onfocusout: function(element) {
                $(element).valid();
            },
            rules: {
                email: {
                    email: true,
                    remote: {
                        url: "{{ route('user.account.exist') }}",
                        type: "get",
                        data: {
                            email: function() {
                                return $('#step_1').find('input[name="email"]')
                                    .val();
                            }
                        },
                    }
                }
            },
            messages: {
                email: {
                    remote: "the email and phone number already in use"
                }
            },
            errorPlacement: function(error, element) {
                error.appendTo(element.closest(".form-group"));
            },
            invalidHandler: function(f, v) {
                console.log(v);
            },
            submitHandler: function(form, event) {
                event.preventDefault();
                $.ajax({
                    method: "GET",
                    url: "{{ route('account.reset-password.email') }}",
                    data: {
                        email: $('#step_1').find('input[name="email"]').val()
                    },
                    success: function(response) {
                        window.location.href = "{{ route('user.dashboard') }}"
                    },
                    error: function(data) {
                        if (data.status == 422) {
                            let responseText = $.parseJSON(data.responseText);
                            let message = "";
                            $.each(responseText.errors, function(key, value) {
                                message += "<li>- " + value[0] + "</li>";
                            });
                            $('#error-message').removeClass('hidden').find('ul').html(
                                message);
                        }
                    }

                });
            }
        });
    </script>
@endsection
