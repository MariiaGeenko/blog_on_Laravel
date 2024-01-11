@extends('layouts.admin')
@section('content')
<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Add news</h2>
    <div>
        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group">
                <label class="mb-2" for="category_id">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="0">select</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="mb-2 mt-2" for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control">
            </div>
            <div class="form-group">
                <label class="mb-2 mt-2" for="author">Author</label>
                <input type="text" id="author" name="author"
                value="{{ old('author') }}" class="form-control">
            </div>
            <div class="form-group">
                <label class="mb-2 mt-2" for="description">Description</label>
                <textarea type="text" id="description" name="description" class="form-control">{{ old('description') }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
