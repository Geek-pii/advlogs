function ui() { // Range UI
  $('.range-ui').each(function (key) {
    var el = $(this);
    el.attr({
      'id': 'range-ui-' + key
    }).queue(function (next) {
      $('#range-ui-' + key).ionRangeSlider();
      next()
    })
  }); // Scroll
  $('.scroll-ui').each(function (key) {
    var el = $(this);
    el.attr({
      'id': 'scroll-ui-' + key
    }).queue(function (next) {
      new SimpleBar($('#' + el.attr('id'))[0]);
      next()
    })
  }); // File Browse UI
  $('.file-ui .file-ui-input').change(function (e) {
    if (typeof e.target.files[0] !== 'undefined') {
      var fileName = e.target.files[0].name;
      $(this).siblings('.file-ui-label').text(fileName)
    }
  });
  $('.datepicker').datetimepicker({
    format: 'DD/MM/YYYY'
  });
  $('#datepicker2').datetimepicker(); // Parallax
  $('[data-paroller-factor]').paroller()
} // Image svg
function imgSVG() {
  $('img.svg').each(function () {
    var $img = $(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');
    $.get(imgURL, function (data) { // Get the SVG tag, ignore the rest
      var $svg = $(data).find('svg'); // Add replaced image's ID to the new SVG
      if (typeof imgID !== 'undefined') {
        $svg = $svg.attr('id', imgID)
      } // Add replaced image's classes to the new SVG
      if (typeof imgClass !== 'undefined') {
        $svg = $svg.attr('class', imgClass + ' replaced-svg')
      } // Remove any invalid XML tags as per http://validator.w3.org
      $svg = $svg.removeAttr('xmlns:a'); // Replace image with new SVG
      $img.replaceWith($svg)
    }, 'xml')
  })
}

function fixHeight() {
  var header = $('header').innerHeight(),
    hW = $(window).innerHeight(),
    hTitle = $('.page-header').innerHeight();
  $('.fixHeight.sMain').css({
    'minHeight': hW - 60
  });
  $('.fixHeight.sMain-2').css({
    'minHeight': hW - 60
  });
  $('.fixHeight.sMain-3').css({
    'minHeight': hW - 60
  });
  $('.fixHeight.sMain-4').css({
    'minHeight': hW - 60
  });
  $('.fixHeight.sMain-5').css({
    'minHeight': hW - 60
  });
  $('.fixHeight.sMain-6').css({
    'minHeight': hW - 60
  });
  $('.fixHeight.s404Page').css({
    'minHeight': hW - 125
  });
  $('.fixHeight .sIntroheader').css({
    'minHeight': hW
  });
  $('.fixHeight.sLandingNewItem .bgImg.bgImgpc').css({
    'minHeight': hW - 50
  });
  $('.fixHeight.sLandingNewItem .bgImgsp .container').css({
    'minHeight': hW - 50
  });
  $('.fixHeight.sContactImg .bgImg').css({
    'minHeight': hW - 60
  });
  $('.sAbout-1.fixHeight .bgImg').css({
    'minHeight': hW - 125
  });
  $('.sAbout-2.fixHeight .bgImg').css({
    'minHeight': hW - 50
  });
  $('.sAbout-3.fixHeight .bgImg').css({
    'minHeight': hW - 50
  });
  $('.sPartner-1 .fixHeight').css({
    'minHeight': hW - 125
  });
  $('.sPartner-2.fixHeight').css({
    'minHeight': hW - 50
  });
  $('.fixHeightNews').css({
    'minHeight': hW - 125
  })
}

function gotoTop() {
  var topTop = $('.toTop');
  $(window).scroll(function () {
    if ($(this).scrollTop() > 200) {
      topTop.addClass('active')
    } else {
      topTop.removeClass('active')
    }
  });
  topTop.click(function () {
    $('body,html').animate({
      scrollTop: 0
    }, 500);
    return false
  });
  $('.scroll-down').click(function () {
    if (window.innerWidth <= 750) {
      var headerHight = 65
    } else {
      var headerHight = 130
    }
    var speed = 600;
    var href = $(this).attr('href');
    var target = $(href == '#' || href == '' ? 'html' : href);
    var position = target.offset().top - headerHight;
    $('body,html').animate({
      scrollTop: position
    }, speed, 'swing');
    return false
  })
};

function btnFB() {
  var btn = $('.btn-fb'),
    sForm = $('.divWrapFb');
  btn.click(function (e) {
    e.preventDefault();
    e.stopPropagation();
    $(this).next().toggleClass('active')
  });
  sForm.bind('click', function (e) {
    e.stopPropagation()
  });
  $(document).click(function () {
    if (sForm.hasClass('active')) {
      sForm.removeClass('active');
      sButton.removeClass('active')
    }
  })
}
var hHeader = 0; // function scrollClick() {
//active menu + scroll
var menuItems = $('.sQuickLink a'),
  lastId, scrollItems = menuItems.map(function () {
    var item = $($(this).attr('href'));
    if (item.length) {
      return item
    }
  }); // if (window.innerWidth <= 767) {
//    var hHeader = 48;
// } else {
//     var hHeader = 65;
// }
menuItems.click(function (e) {
  var href = $(this).attr('href'),
    offsetTop = href === '#' ? 0 : $(href).offset().top - hHeader;
  $('html, body').stop().animate({
    scrollTop: offsetTop
  }, 300);
  e.preventDefault(); //console.log(hHeader);
  console.log(hHeader)
});
$(window).scroll(function () {
  var fromTop = $(this).scrollTop() + hHeader + 1;
  var cur = scrollItems.map(function () {
    if ($(this).offset().top < fromTop) return this
  });
  cur = cur[cur.length - 1];
  var id = cur && cur.length ? cur[0].id : '';
  if (lastId !== id) {
    lastId = id;
    menuItems.parent().removeClass('active').end().filter('[href=\'#' + id + '\']').parent().addClass('active')
  }
}); // }
function slider() {
  $('.homeSlider').on('init', function(event, slick, currentSlide, nextSlide){
    var iframe = $('div.homeSlider__image.slick-slide.slick-current.slick-active iframe');
    if (iframe.length) {
      setTimeout(function(){
        iframe.attr('src', iframe.attr('src') + '&autoplay=1');
        iframe.show();
        $('div.homeSlider__image.slick-slide.slick-current.slick-active img').hide();
        $('.homeSlider__image .icon-video').hide();
        $('.homeSlider').slick('slickPause');
      }, 2000);
    }
  });

  $('.homeSlider').slick({
    infinite: true,
    slidesToShow: 1,
    prevArrow: '<a href=\'#\' class=\'icon-arr icon-left\'></a>',
    nextArrow: '<a href=\'#\' class=\'icon-arr icon-right\'></a>',
    dots: true,
    autoplay: true,
    arrows: true,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    slidesToScroll: 1
  });
}

function sHomeProduct() {
  $('.sHomeProductSliderInner').slick({
    lazyLoad: 'ondemand',
    infinite: true,
    arrows: true,
    prevArrow: '<a href=\'#\' class=\'icon-arr icon-arr-small icon-left\'></a>',
    nextArrow: '<a href=\'#\' class=\'icon-arr icon-arr-small icon-right\'></a>',
    speed: 1000,
    autoplay: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        infinite: true
      }
    }, {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  })
}

function sHomeNews() {
    $('.sNewsSliderInner').slick({
        infinite: true,
        arrows: true,
        prevArrow: "<a href='#' class='icon-arr icon-arr-small icon-left'></a>",
        nextArrow: "<a href='#' class='icon-arr icon-arr-small icon-right'></a>",
        speed: 1000,
        autoplay: true,
        lazyLoad: "ondemand",
        slidesToShow: 3,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    infinite: true
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }

        ]
    });
}
var optionsMobile = {
  infinite: true,
  arrows: true,
  prevArrow: '<a href=\'#\' class=\'icon-arr icon-arr-small icon-left\'></a>',
  nextArrow: '<a href=\'#\' class=\'icon-arr icon-arr-small icon-right\'></a>',
  speed: 1000
};

function sProduct() {
  var tipsTrend = $('.sGridProduct');
  if (Modernizr.mq('(max-width: 1024px)')) {
    tipsTrend.not('.slick-initialized').slick(optionsMobile)
  } else {
    if (tipsTrend.is('.slick-initialized')) {
      tipsTrend.slick('unslick')
    }
  }
}

function sProductSlider() {
  var el = $('.sProductSliderInner');
  el.slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-left\'></a>',
    nextArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-right\'></a>',
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true
      }
    }, {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });
  $('.sProductSliderInner .itemWrap').matchHeight()
}

function sProductSlider2() {
  var el = $('.sProductSlider2');
  el.slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-left\'></a>',
    nextArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-right\'></a>',
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true
      }
    }, {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  })
}

function sFileSlider() {
  var el = $('.sFileSlider');
  el.slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    prevArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-left\'></a>',
    nextArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-right\'></a>',
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        infinite: true
      }
    }, {
      breakpoint: 768,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  })
}

function sliderPartner() {
  $('.sSliderParInner').slick({
    infinite: true,
    arrows: true,
    prevArrow: '<a href=\'#\' class=\'btn-arrow-left arrow1\'><i class=\'arrow_left\'></i></a>',
    nextArrow: '<a href=\'#\' class=\'btn-arrow-right arrow1\'><i class=\'arrow_right\'></i></a>',
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    lazyLoad: 'ondemand',
    focusOnSelect: true,
    asNavFor: '.sSliderParContentInner',
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    }, {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });
  $('.sSliderParContentInner').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false, //fade: true,
    asNavFor: '.sSliderParInner'
  })
}

function sliderEvent() {
  $('.sSliderEventInner').slick({
    infinite: true,
    arrows: true,
    prevArrow: '<a href=\'#\' class=\'btn-arrow-left arrow1\'><i class=\'arrow_left\'></i></a>',
    nextArrow: '<a href=\'#\' class=\'btn-arrow-right arrow1\'><i class=\'arrow_right\'></i></a>',
    speed: 300,
    lazyLoad: 'ondemand',
    slidesToShow: 3,
    slidesToScroll: 3,
    focusOnSelect: true,
    responsive: [{
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    }, {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  });
  $('.sEventNewsSliderInner').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '<a href=\'#\' class=\'btn-arrow-left arrow1\'><i class=\'arrow_left\'></i></a>',
    nextArrow: '<a href=\'#\' class=\'btn-arrow-right arrow1\'><i class=\'arrow_right\'></i></a>'
  })
}

function searchBox() {
  var sButton = $('.navbar-search-btn'),
    sForm = $('.navbar-search');
  sButton.bind('click', function (e) {
    e.preventDefault();
    e.stopPropagation();
    if (sForm.hasClass('active')) {
      sForm.removeClass('active');
      sButton.removeClass('active')
    } else {
      sForm.addClass('active');
      sButton.addClass('active')
    }
  });
  $(document).click(function () {
    if (sForm.hasClass('active')) {
      sForm.removeClass('active');
      sButton.removeClass('active')
    }
  });
  sForm.bind('click', function (e) {
    e.stopPropagation()
  })
}

function sAboutStory() {
  $('.des[data-readmore]').readmore({
    speed: 75,
    lessLink: '<a href="#" class="less"><i class="icon-down-link"></i></a>',
    moreLink: '<a href="#"><i class="icon-down-link"></i></a>'
  })
}

function sNew() {
  $('.sSliderNew').slick({
    infinite: true,
    arrows: true,
    prevArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-left\'></a>',
    nextArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-right\'></a>',
    lazyLoad: 'ondemand',
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 3,
    focusOnSelect: true,
    responsive: [{
      breakpoint: 800,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }]
  })
}
$(function ($) {
  $toggleMenu = $('.header__toggle');
  $toggleMenu.bind('click', function (e) {
    var el = $(this);
    el.toggleClass('active');
    $('.wrapMenu').toggleClass('active');
    e.preventDefault()
  });
  $expand = $('.expand');
  $expand.click(function () {
    el = $(this);
    elUl = $(this).next();
    if (el.hasClass('active')) {
      el.removeClass('active');
      elUl.stop().slideUp(200)
    } else {
      el.addClass('active');
      elUl.stop().slideDown(200)
    }
  })
});

function stick() { // sticky
  var wind = $(window);
  var sticky = $('.header');
  wind.on('scroll', function () {
    var scroll = wind.scrollTop();
    if (scroll < 100) {
      sticky.removeClass('sticky')
    } else {
      sticky.addClass('sticky')
    }
  })
}

function stickMenu() {
  $('#stickMenu').sticky({
    topSpacing: 0,
    zIndex: 9
  });
  $('#stickMenu-2').sticky({
    topSpacing: 0,
    zIndex: 9
  });
  $('#stickMenu').on('sticky-start', function () {
    hHeader = 50
  });
  $('#stickMenu').on('sticky-end', function () {
    if (window.innerWidth <= 767) {
      hHeader = 48
    } else {
      hHeader = 63
    }
  });
  $('#stickMenu-2').on('sticky-start', function () {
    hHeader = 60;
    console.log('start')
  });
  $('#stickMenu-2').on('sticky-end', function () {
    hHeader = 149;
    console.log('end')
  })
}

function waypointEl() {
  var way = $('[data-waypoint]');
  way.each(function () {
    var _el = $(this),
      _ofset = _el.data('waypoint'),
      _up = _el.data('waypointup');
    _el.waypoint(function (direction) {
      if (direction == 'down') {
        _el.addClass('active')
      } else {
        if (_up) {
          _el.removeClass('active')
        }
      }
    }, {
      offset: _ofset
    })
  })
}

function sPartner() {
  $('.sSlideLogo').owlCarousel({
    margin: 0,
    nav: true,
    loop: true,
    dots: false,
    center: true,
    items: 3,
    navText: ['<a href=\'#\' class=\'icon-arr-2 icon-arr-small icon-left\'></a>', '<a href=\'#\' class=\'icon-arr-2 icon-arr-small icon-right\'></a>'],
    responsive: {
      768: {
        items: 3
      }
    }
  })
}

function sSlidethumbLogo() {
  $('.sSlidethumb-logo').slick({
    infinite: true,
    arrows: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    centerPadding: '0px',
    prevArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-left\'></a>',
    nextArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-right\'></a>',
    lazyLoad: 'ondemand',
    focusOnSelect: true,
    responsive: [{
      breakpoint: 992,
      settings: {
        slidesToShow: 2
      }
    }, {
      breakpoint: 480,
      settings: {
        slidesToShow: 1
      }
    }]
  })
}

function sSlidethumb() {
  $('.sSlidethumb-text').slick({
    infinite: true,
    arrows: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    centerPadding: '0px',
    prevArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-left\'></a>',
    nextArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-right\'></a>',
    lazyLoad: 'ondemand',
    focusOnSelect: true,
    asNavFor: '.sSlidethumb-text-content',
    responsive: [{
      breakpoint: 768,
      settings: {
        slidesToShow: 1
      }
    }]
  });
  $('.sSlidethumb-text-content').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false, //fade: true,
    asNavFor: '.sSlidethumb-text'
  })
}

function sSliderbigImage() {
  $('.bigImageEventSlider').slick({
    infinite: true,
    arrows: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerMode: true,
    centerPadding: '0px',
    prevArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-left\'></a>',
    nextArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-right\'></a>',
    lazyLoad: 'ondemand',
    focusOnSelect: true
  })
}

function sSlidepersonSlider() {
  $('.sSlidepersonSlider').slick({
    infinite: true,
    arrows: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerPadding: '0px',
    prevArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-left\'></a>',
    nextArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-right\'></a>',
    lazyLoad: 'ondemand',
    responsive: [{
      breakpoint: 1200,
      settings: {
        slidesToShow: 2
      }
    }, {
      breakpoint: 768,
      settings: {
        slidesToShow: 1
      }
    }]
  })
}

function sBoxProductSlidder() {
  $('.sBoxProductSlidder').slick({
    infinite: true,
    arrows: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1,
    centerPadding: '0px',
    prevArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-left\'></a>',
    nextArrow: '<a href=\'#\' class=\'icon-arr icon-arr-3 icon-arr-small icon-right\'></a>',
    lazyLoad: 'ondemand',
    responsive: [{
      breakpoint: 1200,
      settings: {
        slidesToShow: 2
      }
    }, {
      breakpoint: 768,
      settings: {
        slidesToShow: 1
      }
    }]
  })
}

function sInfoSlider() {
  $('.infoSliderProduct').slick({
    infinite: true,
    arrows: false,
    speed: 300,
    dots: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    centerPadding: '0px'
  })
}

function showAsk() {
  var el = $('.showAsk');
  el.click(function () {
    var elType = $(this).attr('data-id');
    $('.data-hide').removeClass('active');
    $('.showAsk').removeClass('active');
    $(this).addClass('active');
    $('.' + elType).addClass('active')
  })
}

function showInfo() {
  var el = $('.btn-nav-tab');
  el.click(function (e) {
    e.preventDefault();
    $(this).toggleClass('active');
    $(this).next().toggleClass('active')
  })
}

function playVideoHomePage()
{
  $('.homeSlider__image .icon-video').click(function() {
    $('.homeSlider').slick('slickPause');
    $(this).nextAll('.image').children('img').hide();
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
      let iframe = $(this).nextAll('.sp').children('iframe');
      iframe.attr('src', iframe.attr('src') + '&autoplay=1');
      iframe.show();
    } else {
      let iframe = $(this).nextAll('.pc').children('iframe');
      iframe.attr('src', iframe.attr('src') + '&autoplay=1');
      iframe.show();
    }
    $(this).hide();
  });

  // slick_arrow.click(function() {
  //   $('.homeSlider__image .icon-video').show();
  //   $('iframe.youtube').each(function(){
  //     let video_url = $(this).attr('src').replace('&autoplay=1', '');
  //     $(this).attr('src','');
  //     $(this).attr('src',video_url);
  //   });

  //   if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
  //     $('.homeSlider__image .sp img.banner').each(function(){
  //       $(this).show();
  //     });
  //     $('.homeSlider__image .sp iframe.youtube').each(function(){
  //       $(this).hide();
  //     });
  //   } else {
  //     $('.homeSlider__image .pc img.banner').each(function(){
  //       $(this).show();
  //     });
  //     $('.homeSlider__image .pc iframe.youtube').each(function(){
  //       $(this).hide();
  //     });
  //   }
  // });
}

$('#personModalCenter').on('shown.bs.modal', function () {
  document.body.classList.add('modal-open')
});
$('#fromModalCenter').on('shown.bs.modal', function () {
  document.body.classList.add('modal-open')
});
if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
  $('select.form-control').selectpicker('destroy');
  $('.bs-title-option').each(function () {
    var elP = $(this).parent().attr('title');
    $(this).text(elP)
  })
}
sBoxProductSlidder();
sProductSlider();
sProductSlider2();
showAsk();
waypointEl(); // Base
ui(); // Image SVG
imgSVG(); // Go to top
gotoTop(); //waypointEl();
slider();
sHomeProduct();
$('.lazy').lazy();
sHomeNews();
searchBox();
stick();
stickMenu();
sProduct();
sNew();
fixHeight();
sAboutStory();
sPartner();
sSlidethumb();
sSliderbigImage();
sSlidepersonSlider();
sInfoSlider();
sFileSlider();
sSlidethumbLogo();
showInfo();
playVideoHomePage();
btnFB();

function init() {
  $(window).on('debouncedresize', function (event) {})
}
$(window).resize(function () {
  sProduct();
  fixHeight();
  sProductSlider()
});
$(window).on('load ', function () {
  $.ajax({
    type: 'get',
    url: '/assets/images/sprite.svg'
  }).done(function (data) {
    var svg = $(data).find('svg');
    $('body').prepend(svg)
  })
}); // $('body').imagesLoaded( function() {
//     init();
//     $('body').addClass('loaded');
//     $('.pageLoad').fadeOut();
// })