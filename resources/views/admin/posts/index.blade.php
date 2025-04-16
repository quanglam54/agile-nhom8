@extends('admin.layouts.index')

@section('content')
<div class="container mt-4">
    <h2>Danh sách bài viết</h2>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">+ Thêm bài viết</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>
                    @if($post->thumbnail)
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" width="80">
                    @endif
                </td>
                <td>{{ $post->status }}</td>
                <td>{{ $post->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block" onsubmit="return confirm('Xóa bài viết này?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $posts->links() }}
</div>
@endsection
