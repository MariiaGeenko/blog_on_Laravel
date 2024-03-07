@extends('layouts.main')
@section('content')
<div class="row mb-2">
@forelse($newsList as $news):
    <div class="col-md-5 d-flex">
       <div class="card row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-300 position-relative">
        <div class="card-body col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary-emphasis">{{ $news->author }}</strong>
          <h3 class="mb-0">
              <a class="text-dark" href="{{ route('news.show', ['id' =>  $news->id]) }}">{{ $news->title }}</a>
          </h3>
          <div class="mb-1 text-body-secondary">{{ $news->created_at }}</div>
          <p class="card-text mb-auto">{!! $news->description !!}</p>

        @auth
          <a href="{{ route('news.show', ['id' =>  $news->id]) }}" class="icon-link gap-1 icon-link-hover stretched-link">
            Continue reading
            <svg class="bi"><use xlink:href="#chevron-right"/></svg>
          </a>
        @endauth

        </div>
        <div class="col-auto d-lg-block">
          <svg class="bd-placeholder-img" width="350" height="200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="true"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>

@empty
    <h2>don't news</h2>
@endforelse
    </div>
@endsection
