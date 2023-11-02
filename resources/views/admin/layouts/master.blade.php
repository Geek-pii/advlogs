<!DOCTYPE html>
<html lang="{{ $composer_locale }}">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Admin | {{ config('app.name') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('meta')

    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet"
        href="{{ asset('assets/AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}" />
    <link rel="stylesheet"
        href="{{ asset('assets/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/AdminLTE/dist/css/adminlte.min.css') }}">



    @include('admin.layouts.partials.define')

    @yield('style')
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        @include('admin.layouts.parts.navbar')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('admin.layouts.parts.left_sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('admin.layouts.parts.content_header')
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content" id="app">
                <div class="container-fluid">
                    @yield('content')
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        @include('admin.layouts.parts.footer')
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('assets/AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/AdminLTE/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/AdminLTE/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <script src="{{ asset('assets/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/AdminLTE/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/AdminLTE/dist/js/adminlte.min.js') }}"></script>

    <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('assets/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('assets/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('assets/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"
        type="text/javascript"></script>
    <script src="{{ asset('assets/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"
        type="text/javascript"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <script>
        function initMap() {

        }
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.map_key') }}&libraries=places&&callback=initMap">
    </script>
    <script type="text/javascript">
        $.validator.addMethod(
            "phone_us_or_email",
            function(value, element, regexp) {
                let valid = false;
                if (this.optional(element)) {
                    valid = true;
                }
                if (
                    new RegExp(
                        /^(\+?1-?)?(\([2-9]([02-9]\d|1[02-9])\)|[2-9]([02-9]\d|1[02-9]))-?[2-9]\d{2}-?\d{4}$/
                    ).test(value)
                ) {
                    valid = true;
                }
                if (
                    new RegExp(
                        /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/
                    ).test(value)
                ) {
                    valid = true;
                }
                return valid;
            },
            "Please enter a email or US phone number"
        );
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json'
            }
        });

        const DATATABLE_LANGUAGE =
            '{{ asset('assets/plugins/jquery-datatable/languages/' . $composer_locale . '.json') }}';
        $(document).ready(function() {
            $('.select2').select2();
            $.each($('.street_address').get(), function(index, item) {
                let autocomplete = new google.maps.places.Autocomplete(item, {
                    componentRestrictions: {
                        country: ["us"]
                    },
                    fields: ["address_components", "geometry"],
                    types: ["address"],
                });
                autocomplete.addListener("place_changed", () => {
                    const place = autocomplete.getPlace();
                    let street_address = "";
                    let postcode = "";
                    for (const component of place.address_components) {
                        const componentType = component.types[0];
                        switch (componentType) {
                            case "street_number": {
                                street_address = `${component.long_name} ${street_address}`;
                                break;
                            }

                            case "route": {
                                street_address += component.short_name;
                                break;
                            }

                            case "postal_code": {
                                postcode = `${component.long_name}${postcode}`;
                                break;
                            }

                            case "postal_code_suffix": {
                                postcode = `${postcode}-${component.long_name}`;
                                break;
                            }

                            case "locality": {
                                $('.city').eq(index).val(component.long_name);
                                break;
                            }


                            case "administrative_area_level_1": {
                                $('.state').eq(index).val(component.short_name);
                                break;
                            }

                            case "country":
                                $('.country').eq(index).val(component.long_name);
                                break;
                        }
                    }
                    $('.zip_code').eq(index).val(postcode);
                    $(item).parent().closest('form').valid();
                });
            });
            // $(document).delegate('.city_address', 'focus', function(e) {
            //     let index = $('.city_address').index($(this));
            //     let autocomplete = new google.maps.places.Autocomplete(e.target, {
            //         types: ['(cities)'],
            //         componentRestrictions: {
            //             country: "us"
            //         }
            //     });
            //     autocomplete.addListener("place_changed", () => {
            //         const place = autocomplete.getPlace();
            //         console.log(place);
            //         let street_address = "";
            //         let postcode = "";
            //         const event = new Event('input', { bubbles: true });
            //         for (const component of place.address_components) {
            //             const componentType = component.types[0];
            //             switch (componentType) {
            //                 case "street_number": {
            //                     street_address = `${component.long_name} ${street_address}`;
            //                     break;
            //                 }

            //                 case "route": {
            //                     street_address += component.short_name;
            //                     break;
            //                 }

            //                 case "postal_code": {
            //                     postcode = `${component.long_name}${postcode}`;
            //                     break;
            //                 }

            //                 case "postal_code_suffix": {
            //                     postcode = `${postcode}-${component.long_name}`;
            //                     break;
            //                 }

            //                 case "locality": {
                                
            //                     break;
            //                 }


            //                 case "administrative_area_level_1": {
            //                     const stateInput = $('.state').eq(index);
            //                     stateInput.val(component.short_name);
            //                     stateInput.get(0).dispatchEvent(event);
            //                     break;
            //                 }

            //                 // case "country":
            //                 //     const countryInput = $('.country').eq(index);
            //                 //     countryInput.val(component.long_name);
            //                 //     countryInput.get(0).dispatchEvent(event);
            //                 //     break;
            //             }
            //         }
            //         //city address
            //         const cityInput = $('.city_address').eq(index);
            //         // cityInput.val(place.formatted_address);
            //         cityInput.get(0).dispatchEvent(event);
            //         //zip code
            //         const zipCodeInput = $('.zip_code').eq(index);
            //         zipCodeInput.val(postcode);
            //         zipCodeInput.get(0).dispatchEvent(event);
            //         $(this).parent().closest('form').valid();
            //     });
            // });
            $(".phone_us").mask("(000) 000-0000");
            $(".phone_us").mask("(999)-999-9999");
            $(".zip_code").mask("00000-0000");
        });
    </script>
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/admin.js') }}"></script>
    @stack('add_script')
    @yield('script')
</body>

</html>
