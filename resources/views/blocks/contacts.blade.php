{{--
Title: Contacts
Description: Contacts
Category: layout
Icon: editor-alignleft
Keywords: Contacts
Mode: edit
Align: full
PostTypes: page
SupportsAlign: left right full
SupportsMode: false
SupportsMultiple: true
--}}

@php
  $title          = get_field('title');
  $text           = get_field('text');
  $form_shortcode = get_field('form_shortcode');
  $email          = get_field('email', 'options');
  $instagram_link = get_field('instagram_link', 'options');
  $facebook_link  = get_field('facebook_link', 'options');
  $telegram_link  = get_field('telegram_link', 'options');
  $youtube_link   = get_field('youtube_link', 'options');
@endphp

<div class="contacts">
  <div class="contacts__container container flex">
    <section class="content contacts__content">
      <div class="breadcrumbs content__breadcrumbs">
        @if( function_exists('yoast_breadcrumb') )
          @php yoast_breadcrumb() @endphp
        @endif
      </div>
      <h1 class="content__title title title_big">{{ $title }}</h1>
      <div class="content__text text">
        {!! $text !!}
      </div>
      <div class="content__form form">
        {!! do_shortcode( $form_shortcode ) !!}
      </div>
    </section>

    <aside class="sidebar contacts__sidebar">
      <div class="sidebar__block sidebar__block_social">
        <h3 class="sidebar__block-title">Our social networks</h3>
        <ul class="sidebar__social social social_side">
          @if($email)
            <li class="social__item">
              <a class="social__link flex" href="mailto:{!! $email !!}" rel="noreferrer noopener" target="_blank">
                <div class="social__icon-w">
                  <svg class="social__icon" width="12px" height="9px">
                    <use xlink:href="{{ svg_sprite_path() }}#email-icon"></use>
                  </svg>

                </div>
                SkiMuse@gmail.com</a></li>
          @endif
          @if($instagram_link)
            <li class="social__item">
              <a class="social__link flex" href="{{ $instagram_link }}" rel="noreferrer noopener" target="_blank">
                <div class="social__icon-w">
                  <svg class="social__icon" width="14px" height="15px">
                    <use xlink:href="{{ svg_sprite_path() }}#instagram-icon"></use>
                  </svg>

                </div>
                SkiMuse instagram</a></li>
          @endif
          @if($facebook_link)
            <li class="social__item">
              <a class="social__link flex" href="{{ $facebook_link }}" rel="noreferrer noopener" target="_blank">
                <div class="social__icon-w">
                  <svg class="social__icon" width="12px" height="13px">
                    <use xlink:href="{{ svg_sprite_path() }}#facebook-icon"></use>
                  </svg>

                </div>
                SkiMuse facebook</a></li>
          @endif
          @if($telegram_link)
            <li class="social__item">
              <a class="social__link flex" href="{{ $telegram_link }}" rel="noreferrer noopener" target="_blank">
                <div class="social__icon-w">
                  <svg class="social__icon" width="14px" height="13px">
                    <use xlink:href="{{ svg_sprite_path() }}#telegram-icon"></use>
                  </svg>
                </div>
                SkiMuse telegram</a></li>
          @endif
          @if($youtube_link)
            <li class="social__item">
              <a class="social__link flex" href="{{ $youtube_link }}" rel="noreferrer noopener" target="_blank">
                <div class="social__icon-w">
                  <svg class="social__icon" width="14px" height="11px">
                    <use xlink:href="{{ svg_sprite_path() }}#youtube-icon"></use>
                  </svg>

                </div>
                SkiMuse youtube</a></li>
          @endif
        </ul>
      </div>
    </aside>
  </div>
</div>
