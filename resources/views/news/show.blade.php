@extends('layouts.main')
@section('content')

<div class="row mb-2">
    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
      <div class="col p-4 d-flex flex-column position-static">
        <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
        <h3 class="mb-0">{!! $news->title !!}</h3>
        <div class="mb-1 text-body-secondary">{{ $news->created_at }}</div>
        <div class="mb-1 text-body-secondary">{{ $news->author }}</div>
        <p class="mb-auto">{{ $news->description }}</p>
      </div>
      <div class="col-auto d-lg-block">
        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="true"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
      </div>
    </div>
  </div>

@endsection
