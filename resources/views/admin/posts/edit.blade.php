@extends('admin.layouts.base')

{{-- @section('pageTitle', 'Edit comic' . $comic['title']) --}}

@section('mainContent')
<main>
    <h1>Edit Post</h1>
    <form action="{{route('admin.posts.update', ['post' => $post->id])}}" method="post">
        @method('put')
        @csrf
        <div>
            {{-- INPUT "NAME" must be equal to TABLE ROW for laravel to automate --}}
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{$post->title}}">
        </div>
        <div>
            <label for="image">Image</label>
            <input type="text" name="image" id="image" value="{{$post->image}}">
        </div>
        <div>
            <label for="content">Content</label>
            <input type="text" name="content" id="content" value="{{$post->content}}">
        </div>
        <div>
            <label for="excerpt">Excerpt</label>
            <input type="text" name="excerpt" id="excerpt" value="{{$post->excerpt}}">
        </div>
        <input type="submit" value="Edit">
    </form>
</main>
@endsection
