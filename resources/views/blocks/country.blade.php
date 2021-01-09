{{--
  Title: Browse by country
  Description: Browse by country
  Category: layout
  Icon: editor-alignleft
  Keywords: Browse by country
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


<section class="country">
  <div class="country__container container">
    <div class="country__top flex">

      <h2 class="country__title title">{{ $title }}</h2>

      <div class="country__buttons flex">

        <button class="country__button country__button_prev"><svg class="country__button-icon" width="20px" height="14px"><use xlink:href="{{ svg_sprite_path() }}#arrow-slider"></use></svg>
        </button>

        <button class="country__button country__button_next"><svg class="country__button-icon" width="20px" height="14px"><use xlink:href="{{ svg_sprite_path() }}#arrow-slider"></use></svg>
        </button>

      </div>

    </div>

    @php
      $countries = get_terms( [
        'taxonomy' => 'country',
        'hide_empty' => false,
      ] );

      // var_dump($countries)
    @endphp


    @if ( $countries )
      @php
        $i = 0;
      @endphp
    <div class="country__slider swiper-container">
      <div class="swiper-wrapper">

        @foreach ($countries as $country)
          @php
            $i++;
            // var_dump($country);
          @endphp
        <div class="country__slide swiper-slide">
          <a class="country__link" href="{{ get_term_link( $country->term_id, $taxonomy = 'country' ) }}">
            <svg class="country__flag" width="76px" height="45px">
              <use xlink:href="{{ svg_sprite_path() }}#country-{{ $i }}"></use>
            </svg>
            <div class="country__name">{{ $country->name }}</div>
          </a>
        </div>
        @endforeach

      </div>
      <div class="country__controls flex">
        <div class="country__scrollbar"></div>
      </div>
    </div>
    @endif


  </div>
</section>