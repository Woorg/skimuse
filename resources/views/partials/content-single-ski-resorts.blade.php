<div class="resort">
  <div class="resort__top">
    @if(has_post_thumbnail())
      <div class="resort__image">
        {{ the_post_thumbnail('full') }}
      </div>
    @endif
    <div class="resort__specs">
      <div class="resort__container container flex">
        <div class="resort__specs-item resort__specs-item_info">
          <div class="resort__specs-title">Information</div>

          @php $resort_stars = get_field('resort_stars') @endphp

          @switch($resort_stars)
            @case(1)
            <div class="resort__stars rating" aria-label="1 out of 5 ratings">
              <div class="rating__star checked"></div>
              <div class="rating__star"></div>
              <div class="rating__star"></div>
              <div class="rating__star"></div>
              <div class="rating__star"></div>
            </div>
            @break

            @case(2)
            <div class="resort__stars rating" aria-label="2 out of 5 ratings">
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star"></div>
              <div class="rating__star"></div>
              <div class="rating__star"></div>
            </div>
            @break

            @case(3)
            <div class="resort__stars rating" aria-label="3 out of 5 ratings">
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star"></div>
              <div class="rating__star"></div>
            </div>
            @break

            @case(4)
            <div class="resort__stars rating" aria-label="4 out of 5 ratings">
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star"></div>
            </div>
            @break

            @case(5)
            <div class="resort__stars rating" aria-label="5 out of 5 ratings">
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
              <div class="rating__star checked"></div>
            </div>
            @break


            {{-- @default --}}

          @endswitch


          @php $resort_cost = get_field('resort_cost') @endphp

          @switch($resort_cost)
            @case(1)
            <div class="resort__cost cost" aria-label="1 out of 5 costs">
              <div class="cost__star checked"></div>
              <div class="cost__star"></div>
              <div class="cost__star"></div>
              <div class="cost__star"></div>
              <div class="cost__star"></div>
            </div>
            @break

            @case(2)
            <div class="resort__cost cost" aria-label="2 out of 5 costs">
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star"></div>
              <div class="cost__star"></div>
              <div class="cost__star"></div>
            </div>
            @break

            @case(3)
            <div class="resort__cost cost" aria-label="3 out of 5 costs">
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star"></div>
              <div class="cost__star"></div>
            </div>
            @break

            @case(4)
            <div class="resort__cost cost" aria-label="4 out of 5 costs">
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star"></div>
            </div>
            @break

            @case(5)
            <div class="resort__cost cost" aria-label="5 out of 5 costs">
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
              <div class="cost__star checked"></div>
            </div>
            @break

            {{-- @default --}}

          @endswitch

          @php
            $resort_status = get_field('resort_status');
            $resort_class_name = 'status__text status__text_active';
          @endphp


          <div class="resort__status status">
            @if ($resort_status == true)
              <div class="{{ $resort_class_name }}">Open</div>
              <div class="status__sep">/</div>
              <div class="status__text">Closed</div>
            @endif

            @if ($resort_status == false)
              <div class="status__text">Open</div>
              <div class="status__sep">/</div>
              <div class="{{ $resort_class_name }}">Closed</div>
            @endif
          </div>

        </div>

          @php
            $resort_weather = get_field('resort_weather');

            // temperature
            $main_weather_json = $resort_weather['weather_data']->main;
            $main_weather_data = json_decode(json_encode($main_weather_json),true);

            // var_dump($main_weather_data);

            $main_weather_temp = round($main_weather_data['temp']);
            $main_weather_feels = round($main_weather_data['feels_link']);
            $main_weather_min = round($main_weather_data['temp_min']);
            $main_weather_max = round($main_weather_data['temp_max']);
            $main_weather_pressure = $main_weather_data['pressure'];
            $main_weather_humidity = $main_weather_data['humidity'];

            // icon & show, clouds,rain
            $adict_json = $resort_weather['weather_data']->weather;
            $adict_data = json_decode(json_encode($adict_json),true);

            // var_dump($adict_data[0]);

            $adict_id = $adict_data[0]['id'];
            $adict_main = $adict_data[0]['main'];
            $adict_description = $adict_data[0]['description'];
            $adict_icon = $adict_data[0]['icon'];

          @endphp

        <div class="resort__specs-item resort__specs-item_weather">
          <div class="resort__specs-title">Current weather</div>
          <div class="resort__weather flex">
            <div class="resort__weather-row flex">
              <svg class="resort__weather-icon" width="32px" height="32px">
                <use xlink:href="{{ svg_sprite_path() }}#weather-icon"></use>
              </svg>

              <div class="resort__weather-now">{{ $main_weather_temp }}°F</div>

            </div>
            <div class="resort__weather-row flex">
              @if ($main_weather_max)
              <div class="resort__weather-col">
                <span class="resort__weather-middle">High:</span>
                <span class="resort__weather-val">{{ $main_weather_max }}°F</span>
              </div>
              @endif
              @if ($main_weather_min)
              <div class="resort__weather-col">
                <span class="resort__weather-middle">Low:</span>
                <span class="resort__weather-val">{{ $main_weather_min }}°F</span>
              </div>
              @endif
            </div>
          </div>
        </div>

        @php
          $resort_lift = get_field('resort_lift');
        @endphp

        @if ($resort_lift)
          <div class="resort__specs-item resort__specs-item_lift">
            <div class="resort__specs-title">Lift status</div>
            <div class="resort__lift flex">
              <svg class="resort__lift-icon" width="27px" height="27px">
                <use xlink:href="{{ svg_sprite_path() }}#lift-icon"></use>
              </svg>

              <div class="resort__lift-text">{{ $resort_lift }}</div>
            </div>
          </div>
        @endif

        @php
          $resort_skiable_area = get_field('resort_skiable_area');
        @endphp

        @if ($resort_skiable_area)

          <div class="resort__specs-item resort__specs-item_area">
            <div class="resort__specs-title">Skiable area</div>
            <div class="resort__area flex">
              <svg class="resort__area-icon" width="25px" height="25px">
                <use xlink:href="{{ svg_sprite_path() }}#area-icon"></use>
              </svg>
              <div class="resort__area-text">{{ $resort_skiable_area }}</div>
            </div>
          </div>
        @endif


        @if (have_rows('resort_pistes'))
          <div class="resort__specs-item resort__specs-item_pistes">
            <div class="resort__specs-title">Pistes</div>
            <div class="resort__pistes flex">
              @while (have_rows('resort_pistes')) @php the_row() @endphp
              @php
                $resort_pistes_item = get_sub_field('resort_pistes_item');
              @endphp
              <div class="resort__pistes-item">{{ $resort_pistes_item }} km</div>
              @endwhile
            </div>
          </div>
        @endif

      </div>
    </div>


    @php
      $resort_best_for = get_field('resort_best_for');
    @endphp

    @if ($resort_best_for)
      <div class="resort__know">
        <div class="resort__container container flex">
          <div class="resort__know-title">Best know for:</div>
          <ul class="resort__know-list flex">
            @foreach ($resort_best_for as $best_for)

              @switch($best_for)
                @case($best_for)
                <li class="resort__know-item">
                  <svg class="resort__know-icon" width="16px" height="16px">
                    <use xlink:href="{{ svg_sprite_path() }}#{{ $best_for }}-icon"></use>
                  </svg>
                  <div class="resort__know-text">{{ $best_for }}</div>
                </li>
                @break

                @default

              @endswitch

            @endforeach

          </ul>
        </div>
      </div>
    @endif

  </div>

  <div class="resort__row container flex">
    <section class="content resort__content">

      <div class="breadcrumbs content__breadcrumbs">
        @if(function_exists('yoast_breadcrumb'))
          @php yoast_breadcrumb() @endphp
        @endif
      </div>

      <h1 class="content__title title title_big">{{ the_title() }}</h1>
      <div class="content__text text">{{ the_content() }}</div>

      <aside class="sidebar content__side content__side_mob">
        @php
          $resort_gallery  = get_field('resort_gallery');
          $resort_altitude = get_field('resort_altitude');
          $resort_gallery  = get_field('resort_gallery', get_the_ID());
        @endphp

        @if ($resort_gallery)
          <div class="sidebar__block sidebar__block_slider">
            <div class="sidebar__slider swiper-container">
              <div class="swiper-wrapper">
                @foreach ($resort_gallery as $gallery_id)
                  @php
                    @endphp
                  <div class="sidebar__slide swiper-slide">
                    <a class="sidebar__image" href="{{ wp_get_attachment_image_url( $gallery_id, 'full' ) }}">
                      {!! wp_get_attachment_image( $gallery_id, 'full', false, [ 'class' => 'swiper-lazy' ] ) !!}
                    </a>
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                  </div>
                @endforeach
              </div>
              <div class="sidebar__dots"></div>
            </div>
          </div>
        @endif


        @if ($resort_altitude)
          <div class="sidebar__block">
            <h3 class="sidebar__block-title">Altitude</h3>
            <dl class="sidebar__list">
              <div class="sidebar__item flex">
                <svg class="sidebar__item-icon" width="32px" height="32px">
                  <use xlink:href="{{ svg_sprite_path() }}#altitude-icon"></use>
                </svg>

                <dd class="sidebar__item-desc">{{ $resort_altitude }} m</dd>
              </div>
            </dl>
          </div>
        @endif


        @if ( have_rows('resort_get') )
          @php
            $i = 0;
          @endphp
          <div class="sidebar__block">
            <h3 class="sidebar__block-title">How to get there</h3>
            <dl class="sidebar__list">
              @while ( have_rows('resort_get') ) @php the_row() @endphp
              @php
                $i++;
                $city = get_sub_field('resort_get_city');
                $distance = get_sub_field('resort_get_distance');
              @endphp
              <div class="sidebar__item flex">
                <svg class="sidebar__item-icon" width="32px" height="33px">
                  <use xlink:href="{{ svg_sprite_path() }}#get-{{ $i }}"></use>
                </svg>

                <dd class="sidebar__item-term">{{ $city }}:</dd>
                <dd class="sidebar__item-desc">{{ $distance }} km</dd>
              </div>
              @endwhile

            </dl>
          </div>
        @endif



        @if (have_rows('resort_skipass'))
          <div class="sidebar__block sidebar__block_ski-pass">
            <h3 class="sidebar__block-title">Ski-pass</h3>
            <dl class="sidebar__list flex">
              @while (have_rows('resort_skipass')) @php the_row() @endphp
              @php
                $resort_skipass_day   = get_sub_field('resort_skipass_day');
                $resort_skipass_price = get_sub_field('resort_skipass_price');
              @endphp
              <div class="sidebar__item flex">
                <dd class="sidebar__item-term">{{ $resort_skipass_day }}:</dd>
                <dd class="sidebar__item-desc">{{ $resort_skipass_price }}</dd>
              </div>
              @endwhile
            </dl>
          </div>
        @endif
      </aside>


      @php
        $args = [
          'post_type' => 'post',
          'cat' => 'articles',
          'posts_per_page' => 4,
          'order' => 'DESC',
          'orderby' => 'date'
        ];

        $query = new WP_Query($args);

      @endphp

      @if ($query->have_posts())
        <div class="content__related blog-slider related-slider">
          <div class="blog-slider__top flex">
            <h2 class="blog-slider__title title">Guide posts</h2>
            <div class="blog-slider__buttons flex">
              <button class="blog-slider__button blog-slider__button_prev">
                <svg class="blog-slider__button-icon" width="20px" height="14px">
                  <use xlink:href="{{ svg_sprite_path() }}#arrow-slider"></use>
                </svg>
              </button>
              <button class="blog-slider__button blog-slider__button_next">
                <svg class="blog-slider__button-icon" width="20px" height="14px">
                  <use xlink:href="{{ svg_sprite_path() }}#arrow-slider"></use>
                </svg>
              </button>
            </div>
          </div>


          <div class="blog-slider__slider swiper-container">
            <div class="swiper-wrapper">
              @while ($query->have_posts()) @php $query->the_post() @endphp
              <div class="blog-slider__slide swiper-slide">
                <a class="blog-slider__link" href="{{ the_permalink() }}">
                  <div class="blog-slider__image">
                    {{ the_post_thumbnail('full', [ 'class' => 'swiper-lazy']) }}
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                  </div>
                  <div class="blog-slider__name">{{ the_title() }}
                    <svg class="blog-slider__name-icon" width="16px" height="16px">
                      <use xlink:href="{{ svg_sprite_path() }}#ext-link-arrow"></use>
                    </svg>
                  </div>
                  <div class="blog-slider__text">{{ the_excerpt() }}
                  </div>
                  <div class="blog-slider__date">{{ the_time('d M Y') }}</div>
                </a></div>
              @endwhile
              @php
                wp_reset_postdata();
              @endphp
            </div>
            <div class="blog-slider__controls flex">
              <div class="blog-slider__scrollbar"></div>
            </div>
          </div>
        </div>

      @endif

      <div class="content__reviews">
        <h2 class="content__reviews-title title">User reviews</h2>
        <div class="content__reviews-w"></div>
        <div class="fb-comments" data-href="{{ the_permalink() }}" data-width="" data-numposts="5"></div>
      </div>
    </section>


    <aside class="sidebar resort__sidebar">
      <div class="sidebar__block sidebar__block_slider">

        @if ($resort_gallery)
          <div class="sidebar__block sidebar__block_slider">
            <div class="sidebar__slider swiper-container">
              <div class="swiper-wrapper">
                @foreach ($resort_gallery as $gallery_id)
                  @php
                    @endphp
                  <div class="sidebar__slide swiper-slide">
                    <a class="sidebar__image" href="{{ wp_get_attachment_image_url( $gallery_id, 'full' ) }}">
                      {!! wp_get_attachment_image( $gallery_id, 'medium', false, [ 'class' => 'swiper-lazy' ] ) !!}
                    </a>
                    <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                  </div>
                @endforeach
              </div>
              <div class="sidebar__dots"></div>
            </div>
          </div>
        @endif
      </div>

      @if ($resort_altitude)
        <div class="sidebar__block">
          <h3 class="sidebar__block-title">Altitude</h3>
          <dl class="sidebar__list">
            <div class="sidebar__item flex">
              <svg class="sidebar__item-icon" width="32px" height="32px">
                <use xlink:href="{{ svg_sprite_path() }}#altitude-icon"></use>
              </svg>

              <dd class="sidebar__item-desc">{{ $resort_altitude }} m</dd>
            </div>
          </dl>
        </div>
      @endif

      @if ( have_rows('resort_get') )
        @php
          $i = 0;
        @endphp
        <div class="sidebar__block">
          <h3 class="sidebar__block-title">How to get there</h3>
          <dl class="sidebar__list">
            @while ( have_rows('resort_get') ) @php the_row() @endphp
            @php
              $i++;
              $city = get_sub_field('resort_get_city');
              $distance = get_sub_field('resort_get_distance');
            @endphp
            <div class="sidebar__item flex">
              <svg class="sidebar__item-icon" width="32px" height="33px">
                <use xlink:href="{{ svg_sprite_path() }}#get-{{ $i }}"></use>
              </svg>

              <dd class="sidebar__item-term">{{ $city }}:</dd>
              <dd class="sidebar__item-desc">{{ $distance }} km</dd>
            </div>
            @endwhile

          </dl>
        </div>
      @endif


      @if (have_rows('resort_skipass'))
        <div class="sidebar__block sidebar__block_ski-pass">
          <h3 class="sidebar__block-title">Ski-pass</h3>
          <dl class="sidebar__list flex">
            @while (have_rows('resort_skipass')) @php the_row() @endphp
            @php
              $resort_skipass_day   = get_sub_field('resort_skipass_day');
              $resort_skipass_price = get_sub_field('resort_skipass_price');

            @endphp
            <div class="sidebar__item flex">
              <dd class="sidebar__item-term">{{ $resort_skipass_day }}:</dd>
              <dd class="sidebar__item-desc">{{ $resort_skipass_price }}</dd>
            </div>
            @endwhile
          </dl>
        </div>
      @endif
    </aside>
  </div>
</div>
