@extends('admin.layouts.index')

@section('content')
<div class="container mt-4">
    <h2>Thêm bài viết</h2>

    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('admin.posts.form')

        <button type="submit" class="btn btn-success">Lưu bài viết</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
@endsection
