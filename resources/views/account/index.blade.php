@extends('layouts.main')

@section('content')

    <div class="col-8 offset-2 py-5">
    <h2>Welcome, {{ Auth::user()->name }}</h2>
    <br>
    @if(Auth::user()->isAdmin === true)
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('admin.index') }}">Admin'a panel</a>
    @endif

    <a class="btn btn-sm btn-outline-secondary" href="{{ route('news') }}">News</a>

    </div>
@endsection
