{{--
  Title: Article
  Description: Article
  Category: layout
  Icon: editor-alignleft
  Keywords: Article
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

<div class="article">
  <div class="article__top">
    <div class="article__image">
      <img src="assets/images/content/article-top-img.jpg" alt="">
    </div>
  </div>
  <div class="article__row container flex">
    <section class="content article__content">
      <div class="breadcrumbs content__breadcrumbs">
        @if(function_exists('yoast_breadcrumb'))
          @php yoast_breadcrumb() @endphp
        @endif
      </div>
      <h1 class="content__title title title_big">Weekend in the best resort of the Carpathians</h1>
      <div class="content__text text">
        <p>Far, far beyond the mountains of words, fish texts live in the land of vowels and consonants. Away from all
          the letters they live in houses on the banks of the Semantics, a large language ocean. A small stream of Dal
          murmurs throughout the country and provides it with all the necessary rules. This paradigmatic country in
          which the sentence fried fly directly into the mouth. Even the omnipotent punctuation has no power over fish
          texts that lead a non-morphographic way of life. One day, a small line of fish text named Lorem ipsum decided
          to go out into the big world of grammar. The great Oxmox had warned her about evil commas, wild question
          marks, and insidious semicolons, but the text didn't let her get confused. He gathered up his seven capital
          letters, belted the initial in his belt, and set off. Climbing the first ver. The great Oxmox had warned her
          about evil commas, wild question marks, and insidious semicolons, but the text didn't let her get confused. He
          gathered up his seven capital letters, belted the initial in his belt, and set off. Climbing the first
          ver.</p><img src="assets/images/content/article-img.jpg" alt="">
        <h2>Weekend in the best resort</h2>
        <p>Far, far beyond the mountains of words, fish texts live in the land of vowels and consonants. Away from all
          the letters they live in houses on the banks of the Semantics, a large language ocean. A small stream of Dal
          murmurs throughout the country and provides it with all the necessary rules. This paradigmatic country in
          which the sentence fried fly directly into the mouth. Even the omnipotent punctuation has no power over fish
          texts that lead a non-morphographic way of life. One day, a small line of fish text named Lorem ipsum decided
          to go out into the big world of grammar. The great Oxmox had warned her about evil commas, wild question
          marks, and insidious semicolons, but the text didn't let her get confused. He gathered up his seven capital
          letters, belted the initial in his belt, and set off. Climbing the first ver. The great Oxmox had warned her
          about evil commas, wild question marks, and insidious semicolons, but the text didn't let her get confused. He
          gathered up his seven capital letters, belted the initial in his belt, and set off. Climbing the first
          ver.</p>
      </div>
    </section>
    <aside class="sidebar article__sidebar">
      <div class="sidebar__block sidebar__block_recent">
        <h3 class="sidebar__block-title">Recent Posts</h3>
        <ul class="sidebar__list">
          <li class="sidebar__item"><a class="sidebar__item-link flex" href="#">
              <svg class="sidebar__item-icon" width="22px" height="22px">
                <use xlink:href="../svg-symbols.svg#recent-posts-icon"></use>
              </svg>

              <div class="sidebar__item-title">French and Andorran ski resorts close due to covid-19 Coronavirus</div>
            </a></li>
          <li class="sidebar__item"><a class="sidebar__item-link flex" href="#">
              <svg class="sidebar__item-icon" width="22px" height="22px">
                <use xlink:href="../svg-symbols.svg#recent-posts-icon"></use>
              </svg>

              <div class="sidebar__item-title">Leading US and Canadian Ski Resorts suspend operations due to Coronavirus
                (covid-19)
              </div>
            </a></li>
          <li class="sidebar__item"><a class="sidebar__item-link flex" href="#">
              <svg class="sidebar__item-icon" width="22px" height="22px">
                <use xlink:href="../svg-symbols.svg#recent-posts-icon"></use>
              </svg>

              <div class="sidebar__item-title">Coronavirus response from Booking.com</div>
            </a></li>
        </ul>
      </div>
    </aside>
  </div>
</div>
