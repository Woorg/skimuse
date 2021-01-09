<!doctype html>
<html {!! get_language_attributes() !!}>
@include('partials.head')
<body @php body_class('page page_inner page_resort') @endphp>
@php do_action('get_header') @endphp
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v9.0" nonce="5K8O41QH"></script>
@include('partials.header-inner-resort')
<main class="page__inner">
  @yield('content')
</main>
@php do_action('get_footer') @endphp
@include('partials.footer')
@php wp_footer() @endphp

</body>
</html>
