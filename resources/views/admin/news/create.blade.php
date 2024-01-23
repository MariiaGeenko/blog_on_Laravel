@extends('layouts.admin')
@section('content')
<div class="justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Add news</h2>
    <div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif

        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group">
                <label class="mb-2" for="category_ids">Category</label>
                <select class="form-control @error('category_ids[]') is-invalid @enderror" name="category_ids[]" id="category_ids" multiple>
                    <option value="0">select</option>
                    @foreach ($categories as $category)
                        <option @if((int)old('category_id') === $category->id) selected @endif value="{{ $category->id }}">{{ $category->title }}
                        </option>
                    @endforeach
                </select>
                @error('categories_ids') @enderror

            </div>
            <div class="form-group">
                <label class="mb-2 mt-2" for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label class="mb-2 mt-2" for="author">Author</label>
                <input type="text" id="author" name="author"
                value="{{ old('author') }}" class="form-control @error('author') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label class="mb-2 mt-2" for="status">Status</label>
                <select class="form-control" name="status" id="status">
                    @foreach ($statuses as $status)
                        <option @if(old('status') === $status) selected @endif>{{ $status }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label class="mb-2 mt-2" for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control">
            </div>
            <div class="form-group">
                <label class="mb-2 mt-2" for="description">Description</label>
                <textarea type="text" id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
            </div>
            <br>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
