@extends('auth', ['content_class' => 'login-main-wrapper'])

@section('styles')
    <style>
        label.error {
            color: red !important;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!--signup-->
            @if (isset($blocks['SIGNUP-CONTENT']) && isset($blocks['SIGNUP-CONTENT'][0]))
                <div class="col-md-7">
                    <div class="signup-wrapper"
                        style="background:url('{{ asset($blocks['SIGNUP-CONTENT'][0]->photo) }}') no-repeat top;">
                        <div class="signup-wrapper-text">
                            <h3>{!! $blocks['SIGNUP-CONTENT'][0]->name !!}</h3>
                            {!! contentRender($blocks['SIGNUP-CONTENT'][0]->content) !!}
                            <div class="signup-button-wrp">
                                <a href="{{ url('login') }}">Login to Your Account</a>
                                {{-- <a href="{{ $blocks['SIGNUP-CONTENT'][0]->url }}">Login to Your Account</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <!--//signup-->

            <!--login-->
            <div class="col-md-5">
                <div class="login-wrapper p-3">
                    <div class="login-logo">
                        <a href="{{ route('page.home') }}">
                            <img src="{{ $composer_system['logo'] ?? asset('assets/images/logo.png') }}"
                                alt="{{ config('app.name') }}">
                        </a>
                    </div>
                    <h1 class="mt-2">Sign Up</h1>
                    <h1 class="mt-2 hidden">Sign Up Confirmation</h1>

                    <div id="step_1">
                        <form class="w-100">
                            @include('themes.sign_up.step_1')
                        </form>
                    </div>
                    <div id="step_2" class="hidden">
                        <form class="w-100">
                            @include('themes.sign_up.step_2')
                        </form>
                    </div>
                </div>
            </div>
            <!--//login-->
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.urlParam = function(name) {
                var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
                if (results) {
                    return results[1] || 0;
                } else {
                    return '';
                }
            }
            let originalType = $.urlParam('type');
            if (originalType === 'personal') {
                $('.personal-fields').show();
                $('.business-fields').hide();
            } else {
                $('.personal-fields').hide();
                $('.business-fields').show();
            }
            $(document).on("change", "select[name=type]", function() {
                var type = $(this).val();
                if (type === 'personal') {
                    $('.personal-fields').show();
                    $('.business-fields').hide();
                } else {
                    $('.personal-fields').hide();
                    $('.business-fields').show();
                }
                $('.account-type-message').each(function() {
                    if ($(this).data('type') == type) {
                        $(this).removeClass('hidden');
                    } else {
                        $(this).addClass('hidden');
                    }
                });
                $(this).valid();
                $("select[name=type]").val(type);
            });

            var step1Validator = $('#step_1').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid();
                },
                onkeyup: false,
                rules: {
                    type: {
                        required: true
                    },
                    mobile_number: {
                        required: true,
                        phone_us: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number') }}",
                            type: "get"
                        }
                    },
                    confirm_email: {
                        email: true
                    },
                    email: {
                        email: true,
                        remote: {
                            url: "{{ route('user.account.exist') }}",
                            type: "get",
                            data: {
                                email: function() {
                                    return $('#step_1').find('input[name="email"]')
                                        .val();
                                },
                                mobile_number: function() {
                                    return $('#step_1').find(
                                            'input[name="mobile_number"]')
                                        .val()
                                }
                            },
                        }
                    },
                    password: {
                        strong_password: true
                    }
                },
                messages: {
                    email: {
                        remote: "This email / phone # combination is already in use.  Do you need to login instead?"
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
                    $('#step_2').removeClass('hidden');
                    $('#step_1').addClass('hidden');
                    $.ajax({
                        method: "GET",
                        url: "{{ route('user.retrieve-verification-code.post') }}",
                        data: {
                            mobile: $('#step_1').find('input[name="mobile_number"]').val()
                        }
                    });
                }
            });

            var step2Validator = $('#step_2').find('form').validate({
                onfocusout: function(element) {
                    $(element).valid();
                },
                onkeyup: false,
                rules: {
                    type: {
                        required: true
                    },
                    first_name: {
                        required: true
                    },
                    last_name: {
                        required: true
                    },
                    primary_contact_number: {
                        required: true,
                        phone_us: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number') }}",
                            type: "get"
                        }
                    },
                    job_title: {
                        required: true
                    },
                    business_phone_number: {
                        required: true,
                        remote: {
                            url: "{{ route('user.validate-phone-number') }}",
                            type: "get"
                        }
                    },
                    security_code: {
                        required: true
                    }
                },
                invalidHandler: function(f, v) {
                    console.log(v);
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    var data = _.concat($('#step_1').find('form').serializeArray(), $('#step_2').find(
                        'form').serializeArray());
                    $.ajax({
                        method: "POST",
                        url: "{{ route('account.signup.post') }}",
                        data: data,
                        success: function(response) {
                            window.location.href = "{{ route('user.dashboard') }}"
                        },
                        error: function(data) {
                            if (data.status == 422) {
                                let message = {};
                                console.log(data.responseJSON.errors)
                                $.each(data.responseJSON.errors, function(key, value) {
                                    message[key] = value[0]
                                });
                                step2Validator.showErrors(message);
                            }
                        }
                    });
                }
            });

            $('#resend_btn').click(function() {
                if ($('#resend_btn').text() == 'Re-send') {
                    var timeleft = 60;
                    $('#resend_btn').text(timeleft + ' s')
                    var downloadTimer = setInterval(function() {
                        timeleft--;
                        $('#resend_btn').text(timeleft + ' s')
                        if (timeleft <= 0) {
                            clearInterval(downloadTimer);
                            $('#resend_btn').text('Re-send')
                        }
                    }, 1000);
                    $.ajax({
                        method: "GET",
                        url: "{{ route('user.retrieve-verification-code.post') }}",
                        data: {
                            mobile: $('#step_1').find('input[name="mobile_number"]').val()
                        }
                    });
                }

            })

            $('#continue_step_1').click(function() {
                $('#step_1').find('form').submit();
            });
            $('#confirm').click(function() {
                $('#step_2').find('form').submit();
            });
            $('#go_back').click(function() {
                $('#step_1').removeClass('hidden');
                $('#step_2').addClass('hidden');
            });
        });
    </script>
@endsection
