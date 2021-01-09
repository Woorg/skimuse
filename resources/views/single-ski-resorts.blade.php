@extends('layouts.app-inner-resort-2')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @include('partials.content-single-'.get_post_type())
  @endwhile
@endsection
