{{--
  Title: Resorts
  Description: Resorts
  Category: layout
  Icon: editor-alignleft
  Keywords: Resorts
  Mode: edit
  Align: full
  PostTypes: page
  SupportsAlign: left right full
  SupportsMode: false
  SupportsMultiple: true
--}}

@php
  $title = get_field('title');
@endphp

<section class="resort-slider">
  <div class="resort-slider__container container">
    <div class="resort-slider__top flex">
      <h2 class="resort-slider__title title">{{ $title }}</h2>
      <div class="resort-slider__buttons flex">
        <button class="resort-slider__button resort-slider__button_prev">
          <svg class="resort-slider__button-icon" width="20px" height="14px">
            <use xlink:href="{{ svg_sprite_path() }}#arrow-slider"></use>
          </svg>
        </button>

        <button class="resort-slider__button resort-slider__button_next">
          <svg class="resort-slider__button-icon" width="20px" height="14px">
            <use xlink:href="{{ svg_sprite_path() }}#arrow-slider"></use>
          </svg>
        </button>
      </div>

    </div>


    @if ( have_rows('slider') )
      <div class="resort-slider__slider swiper-container">
        <div class="swiper-wrapper">

          @while ( have_rows('slider') ) @php the_row() @endphp
          @php
            $image       = get_sub_field('image');
            $link        = get_sub_field('link');
            $slide_title = get_sub_field('slide_title');
          @endphp

          <div class="resort-slider__slide swiper-slide">
            <a class="resort-slider__link" href="{{ $link }}">
              {!! wp_get_attachment_image( $image, 'full', false, [ 'class' => 'resort-slider__image swiper-lazy' ] ) !!}

              <span class="resort-slider__name">{{ $slide_title }}</span>
            </a>
          </div>
          @endwhile

        </div>
      </div>

    @endif


    <button class="resort-slider__more button button_invert loadmore">Show more</button>


  </div>
</section>


