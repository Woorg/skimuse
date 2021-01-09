{{--
  Template Name: Contact us Template
--}}

@extends('layouts.app-inner-contact')

@section('content')
  @while(have_posts()) @php the_post() @endphp
    @include('partials.content-page')
  @endwhile
@endsection
