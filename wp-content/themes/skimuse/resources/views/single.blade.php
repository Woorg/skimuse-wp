@extends('layouts.app-inner-resort')

@section('content')
  @while(have_posts()) @php the_post() @endphp
  @include('partials.content-single-'.get_post_type())
  @endwhile
@endsection
