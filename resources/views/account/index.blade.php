@extends('layouts.main')
@section('content')
    <div class="col-8 offset-2">
    <h2>Welcome {{ Auth::user()->name }}</h2>
    <br>
    <a href="{{ route('admin.index') }}">Admin</a>
    </div>
@endsection
