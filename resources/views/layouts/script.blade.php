<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/lodash.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/plugins/momentjs/moment.js') }}"></script>
<script src="{{ asset('assets/js/aos.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script src="{{ asset('assets/plugins/wait-me/waitMe.min.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script
    src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.map_key') }}&libraries=places&&callback=initMap">
</script>
<script>
    var noAjaxLoading = {!! json_encode(config('data.no_ajax_loading_routes')) !!}
    AOS.init({
        easing: 'ease-in-quad',
    });
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            Accept: "application/json",
        },
        beforeSend: function(jqXHR, settings) {
            const siteUrl = new URL(settings.url);
            if (!_.some(noAjaxLoading, {
                    method: settings.type,
                    pathname: siteUrl.pathname
                })) {

                    $('.content-wrapper').waitMe({
                                effect: 'bounce',
                                text: 'Processing',
                                bg: 'rgba(255, 255, 255, 0.7)',
                                color: '#000',
                                maxSize : '',
                                waitTime : -1,
                                textPos : 'vertical',
                                fontSize : '',
                                source : '',
                                onClose : function() {}
                        });
            }

        },
        complete: function(jqXHR, settings) {
            $('.content-wrapper').waitMe("hide");
        },
        statusCode: {
            419: function() {
                window.location.href = "/login";
            },
            500: function() {
                $('.content-wrapper').waitMe("hide");
                alert('Something went wrong, please contact system administrator')
            }
        }

    });
    $(document).ready(function() {
        $('#i_agree').click(function() {
            if ($(this).is(':checked')) {
                $('.must-agree').addClass('hidden');
                $('.signed').removeClass('hidden');
                $('.not-sign-yet').addClass('hidden');
                let dateTime = moment().format("MM/DD/YYYY HH:mm:ss a");
                $('.date_input').val(dateTime);
            } else {
                $('.signed').addClass('hidden');
                $('.not-sign-yet').removeClass('hidden');
                $('.date_input').val('');
            }
        });
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
                $('.street_address').eq(index).val(street_address);
                $('.zip_code').eq(index).val(postcode);
                $(item).parent().closest('form').valid();
            });
        });

        $(document).delegate('.city_address', 'focus', function(e) {
            let index = $('.city_address').index($(this));
            let autocomplete = new google.maps.places.Autocomplete(e.target, {
                types: ['(cities)'],
                componentRestrictions: {
                    country: "us"
                }
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
                $(this).parent().closest('form').valid();
            });
        });

        // $(document).delegate('.zip_code', 'keyup', function(e) {
        //     let index = $('.zip_code').index($(this));
        //     $.get('https://maps.googleapis.com/maps/api/geocode/json?address=' + $(this).val() + ',US',
        //         function(data) {
        //             if (data.status == 'OK') {
        //                 let street_address = "";
        //                 let postcode = "";
        //                 for (const component of data.results[0].address_components) {
        //                     const componentType = component.types[0];
        //                     switch (componentType) {
        //                         case "street_number": {
        //                             street_address = `${component.long_name} ${street_address}`;
        //                             break;
        //                         }

        //                         case "route": {
        //                             street_address += component.short_name;
        //                             break;
        //                         }

        //                         case "postal_code": {
        //                             postcode = `${component.long_name}${postcode}`;
        //                             break;
        //                         }

        //                         case "postal_code_suffix": {
        //                             postcode = `${postcode}-${component.long_name}`;
        //                             break;
        //                         }

        //                         case "locality": {
        //                             $('.city').eq(index).val(component.long_name);
        //                             break;
        //                         }
        //                     }
        //                 }
        //             }

        //             $('.zip_code').eq(index).val(postcode);
        //             $(this).parent().closest('form').valid();
        //         });
        // });

        $(document).on("keyup", ".password-field", function(e) {
            if (e.originalEvent != undefined) {
                if (e.originalEvent.getModifierState('CapsLock')) {
                    $(this).parent('div').closest(".form-group").find('.caps-lock').removeClass(
                        'hidden');
                } else {
                    $(this).parent('div').closest(".form-group").find('.caps-lock').addClass('hidden');
                }
            }
        });
    });
</script>
