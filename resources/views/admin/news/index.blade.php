@extends('layouts.admin')
@section('content')
<div class="d-flex flex-wrap justify-content-between flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>News list</h2>
        <a href="{{ route('admin.news.create') }}">Add news</a>

</div>

<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Category</th>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Status</th>
                <th>Data</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($newsList as $news)
        <tr>
            <td>{{ $news->id }}</td>
            <td>{{ $news->categories->map(fn($item) => $item->title)->implode(",") }}</td>
            <td>{{ $news->title }}</td>
            <td>{{ $news->author }}</td>
            <td>{{ $news->description }}</td>
            <td>{{ $news->status }}</td>
            <td>{{ $news->created_at }}</td>
            <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}">Edit</a> &nbsp; <a href="" style="color: red">Delete</a></td>
        </tr>
        @empty
            <tr>
                <td colspan="7">don't news</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $newsList->links() }}
</div>
@endsection
