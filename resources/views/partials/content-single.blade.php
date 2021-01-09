<div class="article">
  @if(has_post_thumbnail())
    <div class="article__top">
      <div class="article__image">
        {{ the_post_thumbnail('full') }}
      </div>
    </div>
  @endif
  <div class="article__row container flex">
    <section class="content article__content">
      <div class="breadcrumbs content__breadcrumbs">
        @if(function_exists('yoast_breadcrumb'))
          @php yoast_breadcrumb() @endphp
        @endif
      </div>
      <h1 class="content__title title title_big">{{ the_title() }}</h1>
      <div class="content__text text">
        {{ the_content() }}
      </div>
    </section>

    <aside class="sidebar article__sidebar">
      <div class="sidebar__block sidebar__block_recent">

        <h3 class="sidebar__block-title">Recent Posts</h3>

        @php
            $args = [
              'post_type' => 'post',
              'cat'  => 'articles',
              'posts_per_page' => 3,
              'order' => 'DESC',
              'orderby' => 'date'
            ];

            $query = new WP_Query($args);
        @endphp

        @if($query->have_posts())
          <ul class="sidebar__list">
            @while($query->have_posts()) @php $query->the_post() @endphp
            <li class="sidebar__item">
              <a class="sidebar__item-link flex" href="{{ the_permalink() }}">
                <svg class="sidebar__item-icon" width="22px" height="22px">
                  <use xlink:href="{{ svg_sprite_path() }}#recent-posts-icon"></use>
                </svg>

                <div class="sidebar__item-title">{{ the_title() }}</div>
              </a>
            </li>
            @endwhile
          </ul>
          @php wp_reset_postdata() @endphp
        @endif

      </div>
    </aside>
  </div>
</div>
