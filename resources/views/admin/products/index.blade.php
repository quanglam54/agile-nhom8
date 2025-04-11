@extends('admin.layouts.index')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Quản lý sản phẩm</h3>
                    <div class="card-tools">
                        <a href="{{ route('products.create') }}" class="btn btn-primary">
                            Thêm sản phẩm mới
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                      <!-- Search and Filter Form -->
                      <form method="GET" action="{{ route('products.index') }}" class="mb-4">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="search">Tìm kiếm</label>
                                    <input type="text" class="form-control" id="search" name="search" 
                                           placeholder="Tìm theo tên hoặc mô tả" value="{{ request('search') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date_from">Từ ngày</label>
                                    <input type="date" class="form-control" id="date_from" name="date_from" value="{{ request('date_from') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="date_to">Đến ngày</label>
                                    <input type="date" class="form-control" id="date_to" name="date_to" value="{{ request('date_to') }}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="sort_by">Sắp xếp theo</label>
                                    <select class="form-control" id="sort_by" name="sort_by">
                                        <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Ngày tạo</option>
                                        <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Tên</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="sort_direction">Thứ tự</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sort_direction" id="sort_asc" value="asc" {{ request('sort_direction') == 'asc' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="sort_asc">Tăng dần</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="sort_direction" id="sort_desc" value="desc" {{ request('sort_direction', 'desc') == 'desc' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="sort_desc">Giảm dần</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 text-right">
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i> Tìm kiếm
                                    </button>
                                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                                        <i class="fa fa-redo"></i> Đặt lại
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- End Search and Filter Form -->

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Giá</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" style="max-width: 100px;">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ number_format($product->price) }} VNĐ</td>
                                <td>
                                    <a href="{{ route('products.show', $product) }}" class="btn btn-info btn-sm">
                                        Xem
                                    </a>
                                    <a href="{{ route('products.edit', $product) }}" class="btn btn-warning btn-sm">
                                        Sửa
                                    </a>
                                    <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                            Xóa
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 