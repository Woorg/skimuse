@php
  $logo           = get_field('logo', 'options');
  $instagram_link = get_field('instagram_link', 'options');
  $facebook_link  = get_field('facebook_link', 'options');
@endphp

<div class="page__bottom">
  <footer class="footer">
    <div class="footer__container container flex">
      <a class="footer__logo logo logo_second" href="{{ home_url('/') }}">{!! $logo !!}</a>

        <ul class="social flex footer__social">
          <li class="social__item">
            <a class="social__link" rel="noreferrer noopener" target="_blank" href="{{ $instagram_link }}"><svg class="social__icon" width="14px" height="15px"><use xlink:href="{{ svg_sprite_path() }}#instagram-icon"></use></svg></a>
          </li>
          <li class="social__item"><a class="social__link" rel="noreferrer noopener" target="_blank" href="{{ $facebook_link }}"><svg class="social__icon" width="12px" height="13px"><use xlink:href="{{ svg_sprite_path() }}#facebook-icon"></use></svg></a>
          </li>
        </ul>


    </div>
  </footer>
</div>



