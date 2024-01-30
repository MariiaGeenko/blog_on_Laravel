@extends('layouts.admin')
@section('content')
<div class="d-flex flex-wrap justify-content-between flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Categories list</h2>
        <a href="{{ route('admin.categories.create') }}">Add category</a>

</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($categoriesList as $category)
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->description }}</td>
            <td>{{ $category->created_at }}</td>
        </tr>
        @empty
            <tr>
                <td colspan="7">don't news</td>
            </tr>
        @endforelse
        </tbody>
    </table>


</div>
@endsection
