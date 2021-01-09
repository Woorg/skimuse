<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class('page page_inner page_contacts') @endphp>
    @php do_action('get_header') @endphp
    @include('partials.header-inner')
      <main class="page__inner">
          @yield('content')
      </main>

      {{-- @if (App\display_sidebar()) --}}
          {{-- @include('partials.sidebar') --}}
      {{-- @endif --}}

    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp

  </body>
</html>
