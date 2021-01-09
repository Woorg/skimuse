@php
  $logo = get_field('logo', 'options');
@endphp

<header class="header header_inner">
  <div class="header__container container flex">
    <a class="header__logo logo" href="{{ home_url('/') }}">{!! $logo !!}</a>
      @if (has_nav_menu('primary_navigation'))
      <button class="nav-trigger header__nav-trigger">
      <svg class="nav-trigger__close" width="22px" height="22px">
          <use xlink:href="{{ svg_sprite_path() }}#close-icon"></use>
      </svg>
      <svg class="nav-trigger__open" width="20px" height="15px">
          <use xlink:href="{{ svg_sprite_path() }}#menu-icon"></use>
      </svg>
      </button>

      <nav class="nav header__nav">
        <div class="nav__container container">
          {!! wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_id' => '',
            'container' => 'ul',
            'menu_class' => 'nav__list flex',
            'before' => '',
            'after' => '',
            'link_before' => '',
            'link_after' => ''])
          !!}
        </div>
      </nav>
      @endif
  </div>
</header>








