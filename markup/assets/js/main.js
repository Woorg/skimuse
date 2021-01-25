import svg4everybody from 'svg4everybody';
import Swiper, {Pagination, Navigation, Controller, EffectFade, Lazy, Scrollbar, Thumbs, Autoplay} from 'swiper';

(function ($) {

  svg4everybody();

  let styles = [
    'padding: 2px 9px',
    'background: #1b1e64',
    'color: #fff',
    'display: inline-block',
    'box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.2) inset, 0 5px 3px -5px rgba(0, 0, 0, 0.5), 0 -13px 5px -10px rgba(255, 255, 255, 0.4) inset',
    'line-height: 1.52',
    'text-align: left',
    'font-size: 14px',
    'font-weight: 400'
  ].join(';');

  console.log('%c developed by igor gorlov gorlov https://igrlv.ru', styles);


  /*
    Lazyload images
  */

  let lazyLoadInstance = new LazyLoad({
    elements_selector: '.lazy',
    load_delay: 50,
    use_native: false
  });

  if (lazyLoadInstance) {
    lazyLoadInstance.update();
  }


  $(function () {

    // Nav

    const $nav = $('.nav');

    const $navTrigger = $('.nav-trigger');
    const wW = $(window).outerWidth();

    $navTrigger.on('click', function (e) {
      e.preventDefault();
      $(this).toggleClass('nav-trigger_active');
      $nav.toggleClass('nav_open');
      $('.header').toggleClass('header_open');

    });

    $(window).on('resize', function () {
      let wW = $(window).outerWidth();
      if (wW >= 1201) {
        $navTrigger.removeClass('nav-trigger_active');
        $nav.removeClass('nav_open');
        $('.header').removeClass('header_open');
      }
    });


    const $headerHeight = $('.header').outerHeight(),
      $header = $('.header');

    $(window).on('scroll', function (event) {
      event.preventDefault();
      if ($(window).scrollTop() >= $headerHeight) {
        // console.log($(window).scrollTop());
        $header.addClass('header_scrolled');
      } else {
        $header.removeClass('header_scrolled');

      }
    });

    if ($(window).scrollTop() >= $headerHeight) {
      // console.log($(window).scrollTop());
      $header.addClass('header_scrolled');
    } else {
      $header.removeClass('header_scrolled');

    }

    // Close nav

    $(document).on('click', function (e) {
      if (!$(e.target).closest('.nav-trigger_active').length) {
        $navTrigger.removeClass('nav-trigger_active');
        $nav.removeClass('nav_open');

      }
    });

    // HeroSlider

    Swiper.use([Pagination, Navigation, Controller, EffectFade, Lazy, Scrollbar, Thumbs, Autoplay]);

    const $heroThumbs = $('.hero__thumbs');

    const $heroSwiper = new Swiper('.hero__slider', {
      direction: 'horizontal',
      effect: 'fade',
      fadeEffect: {
        crossFade: true
      },
      preloadImages: false,
      lazy: true,
      loop: false,
      loopedSlides: 1,

    });


    if ($heroThumbs.length > 0) {

      const $heroSwiperThumbs = new Swiper('.hero__thumbs', {
        setWrapperSize: true,
        initialSlide: 0,
        width: '252',
        slideToClickedSlide: true,
        updateOnWindowResize: true,
        roundLengths: true,

        preloadImages: false,
        lazy: true,
        lazy: {
          loadPrevNext: true,
          loadPrevNextAmount: 4,
        },
        centeredSlides: true,
        touchRatio: 0.2,
        slideToClickedSlide: false,
        loop: false,
        touchRatio: 0.2,

        navigation: {
          nextEl: '.hero__button_next',
          prevEl: '.hero__button_prev',
        },

        scrollbar: {
          el: '.hero__scrollbar',
          draggable: true,
        },

        pagination: {
          el: '.hero__counter',
          type: 'custom',
          renderCustom: function (swiper, current, total) {
            return (current > 9) ? current + '/' + total : '0' + current + '/' + total;
          }
        },

        breakpoints: {
          0: {
          },
          1100: {
          }
        }

      });

      $heroSwiper.controller.control = $heroSwiperThumbs;
      $heroSwiperThumbs.controller.control = $heroSwiper;

    }


    // Feedback slider

    const $countrySwiper = new Swiper('.country__slider', {
      loop: true,
      scrollbar: {
        el: '.country__scrollbar',
        draggable: true,
      },
      navigation: {
        nextEl: '.country__button_next',
        prevEl: '.country__button_prev',
      },
      breakpoints: {
        200: {
          slidesPerView: 3,
        },
        640: {
          slidesPerView: 6,
        },
        800: {
          slidesPerView: 10,
        }

      }

    });


    const $resortSwiper = new Swiper('.resort-slider__slider', {
      direction: 'horizontal',
      loop: true,
      slidesPerView: 3,
      navigation: {
        nextEl: '.resort-slider__button_next',
        prevEl: '.resort-slider__button_prev',
      },

      lazy: true,
      lazy: {
        loadPrevNext: true,
        loadPrevNextAmount: 3,
      },

      breakpoints: {
        0: {
          slidesPerView: 1
        },
        640: {
          slidesPerView: 3
        }
      }

    });

    $(window).on('resize', function (e) {

      if ($(window).outerWidth() <= 640) {
        $('.swiper-wrapper').addClass("disabled");
        $('.swiper-pagination').addClass("disabled");

      }

    });

    if ($(window).outerWidth() <= 640) {
      $('.swiper-wrapper').addClass("disabled");
      $('.swiper-pagination').addClass("disabled");

    }

    const $blogSwiper = new Swiper('.blog-slider__slider', {
      direction: 'horizontal',
      loop: true,
      slidesPerView: 1,
      scrollbar: {
        el: '.blog-slider__scrollbar',
        draggable: true,
      },
      navigation: {
        nextEl: '.blog-slider__button_next',
        prevEl: '.blog-slider__button_prev',
      },

      lazy: true,
      lazy: {
        loadPrevNext: true,
        loadPrevNextAmount: 4,
      },

      breakpoints: {
        0: {
          slidesPerView: 1.3
        },
        320: {
          slidesPerView: 1.3
        },
        375: {
          slidesPerView: 1.4
        },
        640: {
          slidesPerView: 4
        }
      }


    });


    const $relatedSwiper = new Swiper('.related-slider .blog-slider__slider', {
      direction: 'horizontal',
      slidesPerView: 2,
      scrollbar: {
        el: '.related-slider .blog-slider__scrollbar',
        draggable: true,
      },
      navigation: {
        nextEl: '.related-slider .blog-slider__button_next',
        prevEl: '.related-slider .blog-slider__button_prev',
      },

      lazy: true,
      lazy: {
        loadPrevNext: true,
        loadPrevNextAmount: 1
      },

      breakpoints: {
        0: {
          slidesPerView: 1.3
        },
        320: {
          slidesPerView: 1.3
        },
        375: {
          slidesPerView: 1.4
        },
        640: {
          slidesPerView: 2
        }


      }


    });


    const $sideSwiper = new Swiper('.sidebar__slider', {
      direction: 'horizontal',
      preloadImages: false,
      lazy: true,
      loop: false,
      loopedSlides: 1,
      pagination: {
        el: '.sidebar__dots',
        type: 'bullets',
        clickable: true
      },

    });

    // Gallery

    $('.resort__sidebar .sidebar__image').magnificPopup({
      type: 'image',
      gallery: {
        enabled: true
      }
    });

    $('.content__side_mob .sidebar__image').magnificPopup({
      type: 'image',
      gallery: {
        enabled: true
      }
    });

    // List pages

    // function pageWidget(pages) {
    //   var widgetWrap = $('<div class="widget_wrap"><ul class="widget_list"></ul></div>');
    //   widgetWrap.prependTo("body");
    //   for (var i = 0; i < pages.length; i++) {
    //     $('<li class="widget_item"><a class="widget_link" href="' + pages[i] + '.html' + '">' + pages[i] + '</a></li>').appendTo('.widget_list');
    //   }
    //   var widgetStilization = $('<style>body {position:relative} .widget_wrap{position:absolute;top:0;left:0;z-index:9999;padding:10px 20px;background:#222;border-bottom-right-radius:10px;-webkit-transition:all .3s ease;transition:all .3s ease;-webkit-transform:translate(-100%,0);-ms-transform:translate(-100%,0);transform:translate(-100%,0)}.widget_wrap:after{content:" ";position:absolute;top:0;left:100%;width:24px;height:24px;background:#222 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQAgMAAABinRfyAAAABGdBTUEAALGPC/xhBQAAAAxQTFRF////////AAAA////BQBkwgAAAAN0Uk5TxMMAjAd+zwAAACNJREFUCNdjqP///y/DfyBg+LVq1Xoo8W8/CkFYAmwA0Kg/AFcANT5fe7l4AAAAAElFTkSuQmCC) no-repeat 50% 50%;cursor:pointer}.widget_wrap:hover{-webkit-transform:translate(0,0);-ms-transform:translate(0,0);transform:translate(0,0)}.widget_item{padding:0 0 10px}.widget_link{color:#fff;text-decoration:none;font-size:15px;}.widget_link:hover{text-decoration:underline} </style>');
    //   widgetStilization.prependTo(".widget_wrap");
    // }
    //
    // pageWidget([
    //   'index',
    //   'resort',
    //   'article',
    //   'contact-us',
    // ]);


  });


})(jQuery);
