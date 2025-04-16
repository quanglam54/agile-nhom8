@extends('admin.layouts.index')

@section('content')
<div class="container mt-4">
    <h2>Chỉnh sửa bài viết</h2>

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.posts.form', ['post' => $post])

        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
