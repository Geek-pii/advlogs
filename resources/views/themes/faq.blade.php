@extends('master', ['content_class' => 'inner-content-wrapper'])

@section('content')
	<!--banner inner-->
  @if(isset($blocks['FAQ-BANNER']) && isset($blocks['FAQ-BANNER'][0]))
  <div class="inner-slider-banner-wrapper" style="background:url('{{ asset($blocks['FAQ-BANNER'][0]->photo) }}') no-repeat top">
    <div class="container">
      <h1>{{ $blocks['FAQ-BANNER'][0]->name }}</h1>
    </div>
  </div>
  @endif
  <!--banner inner-->

  <!--content started-->
  <div class="inner-content-wrapper" style="margin-bottom:0">
    <div class="faq-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="faqs-navigation-left">
              @foreach($faq_categories as $key => $category)
              <a href="javascript:void(0)" id="menu{{ $key + 1 }}">{{ $category->name }}</a>
              @endforeach
            </div>
          </div>
          <div class="col-md-9">
            @foreach($faq_categories as $key => $category)
            <div class="faqs-wrapper">
              <div class="panel-group menu{{ $key + 1 }}" role="tablist" aria-multiselectable="true">
                <h2>{{ $category->name }}</h2>
                @foreach($category->children as $key1 => $child)
                  <h3>{{ $child->name }}</h3>
                  @foreach($child->faqs as $key2 => $faq)
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="heading3243">
                      <h4 class="panel-title"> <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{ $key }}{{ $key1 }}{{ $key2 }}" aria-expanded="true" aria-controls="collapse{{ $key }}{{ $key1 }}{{ $key2 }}"> <i class="more-less glyphicon glyphicon-plus"></i>
                        {{ $faq->title }} </a> </h4>
                    </div>
                    <div id="collapse{{ $key }}{{ $key1 }}{{ $key2 }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{ $key }}{{ $key1 }}{{ $key2 }}">
                      <div class="panel-body">{!! $faq->description !!}</div>
                    </div>
                  </div>
                  @endforeach
                @endforeach
                <div class="getaquote-button"> <a href="#"> Get a Quote </a> </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>

    @if(isset($blocks['FAQ-CONTACT-US']) && isset($blocks['FAQ-CONTACT-US'][0]))
    <div class="content-bottom-calltoaction-wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="content-text-wrapper">
              <h2>{{ $blocks['FAQ-CONTACT-US'][0]->name }}</h2>
              {!! contentRender($blocks['FAQ-CONTACT-US'][0]->description) !!}
            </div>
          </div>
          <div class="col-md-6">
            <div class="content-bottom-button"><a href="{{ url('contact-us') }}"> Contact Us </a></div>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
  <!--//content ends-->
@endsection

@section('scripts')
  <script>
    function toggleIcon(e) {
      $(e.target)
          .prev('.panel-heading')
          .find(".more-less")
          .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
  </script>
  <style>
    .nav-fixed {
      position: fixed;
      top: 91px;
      width: 260px;
    }

    .faqs-navigation-left a.active {
      font-weight: bold;
    }
  </style>
  <script>
    /*--coloring--*/
    var topof1 = $('.menu1').offset().top - 150;
    var topof2 = $('.menu2').offset().top - 150;
    var topof3 = $('.menu3').offset().top - 150;
    var topof4 = $('.menu4').offset().top - 150;
    var topof5 = $('.menu5').offset().top - 150;
    /*--coloring--*/
    $(window).scroll(function() {
      var distanceFromTop = $(this).scrollTop();
      var fromHeight = parseInt($('.header-slider-main-wraper').height()) + parseInt($('.inner-slider-banner-wrapper').outerHeight());
      if (distanceFromTop >= fromHeight) {
        $('.faqs-navigation-left').addClass('nav-fixed');
      } else {
        $('.faqs-navigation-left').removeClass('nav-fixed');
      }
      if (distanceFromTop < topof1) {
        $('.faqs-navigation-left a').removeClass('active');
      }
      if (distanceFromTop >= topof1 && distanceFromTop < topof2) {
        $('.faqs-navigation-left a').removeClass('active');
        $('#menu1').addClass('active');
      }
      if (distanceFromTop >= topof2 && distanceFromTop < topof3) {
        $('.faqs-navigation-left a').removeClass('active');
        $('#menu2').addClass('active');
      }
      if (distanceFromTop >= topof3 && distanceFromTop < topof4) {
        $('.faqs-navigation-left a').removeClass('active');
        $('#menu3').addClass('active');
      }
      if (distanceFromTop >= topof4 && distanceFromTop < topof5) {
        $('.faqs-navigation-left a').removeClass('active');
        $('#menu4').addClass('active');
      }
      if (distanceFromTop >= topof5) {
        $('.faqs-navigation-left a').removeClass('active');
        $('#menu5').addClass('active');
      }
    });
    $(document).on('click', '.faqs-navigation-left a', function() {
      var id = $(this).attr('id');
      $("html, body").animate({
        scrollTop: $('.' + id).offset().top - 91
      }, 1000);
    });
  </script>
@endsection
