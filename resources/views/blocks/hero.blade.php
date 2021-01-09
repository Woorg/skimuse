{{--
  Title: First screen
  Description: First screen
  Category: layout
  Icon: editor-alignleft
  Keywords: First screen
  Mode: edit
  Align: full
  PostTypes: page
  SupportsAlign: left right full
  SupportsMode: false
  SupportsMultiple: true
--}}


@php
  $title       = get_field('title');
  $text        = get_field('text');
  $button_text = get_field('button_text');
  $button_link = get_field('button_link');

@endphp


<section class="hero">
  @if ( have_rows('slider') )
  <div class="hero__slider swiper-container">

    <div class="swiper-wrapper">

      @while ( have_rows('slider') ) @php the_row() @endphp
      <div class="hero__slide swiper-slide">
        @php
          $image = get_sub_field('image');
        @endphp

        {!! wp_get_attachment_image( $image, 'full', false , ['class' => 'hero__image swiper-lazy' ] ) !!}

        <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
      </div>
      @endwhile

    </div>

  </div>

  @endif

  <div class="hero__w">
    <div class="hero__container container">
      <div class="hero__content">

        @if ($title)
        <h1 class="hero__title">{{ $title }}</h1>
        @endif

        @if ($text)
        <div class="hero__text">
          {!! $text !!}
        </div>
        @endif

        @if ($button_text)
        <a class="hero__call-to-action open-popup button" href="{{ $button_link }}">{{ $button_text }}</a>
        @endif


      </div>

    </div>
  </div>


  @if ( have_rows('slider') )
  <div class="hero__thumbs-w">
    <div class="hero__thumbs swiper-container">
      <div class="swiper-wrapper">

        @while ( have_rows('slider') ) @php the_row() @endphp
          @php
            $image        = get_sub_field('image');
            $slider_title = get_sub_field('slider_title');
          @endphp

        <div class="hero__thumb swiper-slide">
          <a class="hero__thumb-w" href="">
            {!! wp_get_attachment_image( $image, 'medium', false , ['class' => 'hero__thumb-image swiper-lazy' ] ) !!}
            <span class="hero__thumb-title">{{ $slider_title }}</span>
            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
          </a>

        </div>
        @endwhile

      </div>
    </div>


    <div class="hero__controls flex">

      <div class="hero__buttons flex">
        <button class="hero__button hero__button_prev"><svg class="hero__button-icon" width="12px" height="9px"><use xlink:href="{{ svg_sprite_path() }}#arrow-hero"></use></svg>
        </button>

        <button class="hero__button hero__button_next"><svg class="hero__button-icon" width="12px" height="9px"><use xlink:href="{{ svg_sprite_path() }}#arrow-hero"></use></svg>
        </button>

      </div>

      <div class="hero__scrollbar"></div>
      <div class="hero__counter"></div>
    </div>

  </div>
  @endif

</section>