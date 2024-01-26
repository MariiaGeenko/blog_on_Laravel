@extends('layouts.main')

@section('content')

    <div class="col-8 offset-2">
    <h2>Welcome {{ Auth::user()->name }}</h2>
    <br>
    @if(Auth::user()->isAdmin === true)
        <a href="{{ route('admin.index') }}">Admin</a>
    @endif
    </div>
    <a href="{{ route('news') }}">News</a>
    </div>
@endsection
