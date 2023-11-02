<!-- Css -->
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
<link href="{{ asset('assets/css/aos.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/radio_style.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/animation.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/css/owl.carousel.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/wait-me/waitMe.min.css') }}">

<style>
    .button-service-readmore a {
        font-size: 16px;
    }

    .call-to-action-wrapper ul li a {
        font-size: 18px;
    }

    /* .service-wrapper {
    background-image: url('{{ asset('assets/images/bg-service.jpg') }}'), url('{{ asset('assets/images/fallback/bg-service.webp') }}');
} */

    /* background:url(../images/bg-service.jpg) no-repeat top; */

    .service-wrapper {
        background-image: url('{{ asset('assets/images/bg-service.jpg') }}');
    }

    @supports (background-image: -webkit-image-set(url('{{ asset('assets/images/fallback/bg-service.webp') }}') 1x)) {
        .service-wrapper {
            background-image: -webkit-image-set(url('{{ asset('assets/images/fallback/bg-service.webp') }}') 1x)
        }
    }

    /* .webp .service-wrapper {
    background-image: url('{{ asset('assets/images/fallback/bg-service.webp') }}');
}

.no-webp .service-wrapper {
    background-image: url('{{ asset('assets/images/bg-service.jpg') }}');
} */

    .close-menu {
        cursor: url(https://theorthodoxworks.com/demo/images/cross.svg), auto;
    }

    @media screen and (max-width: 1169px) {
        .listing-contact-footer ul li span {
            font-size: 15px;
        }

        .basic-service-listing-wrp .clickable-btn,
        .basic-service-listing-wrp .view-more-button {
            font-size: 16px;
        }
    }

    @media screen and (max-width: 520px) {
        .footer-navigaiton-wrapper ul li a {
            font-size: 15px;
        }
    }

    [v-cloak]>* {
        display: none;
    }
</style>

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&amp;display=swap" rel="stylesheet">
