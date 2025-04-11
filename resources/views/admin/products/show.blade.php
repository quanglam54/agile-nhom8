@extends('admin.layouts.index')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chi tiết sản phẩm</h3>
                    <div class="card-tools">
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            Quay lại
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                        </div>
                        <div class="col-md-6">
                            <h4>{{ $product->name }}</h4>
                            <p class="text-muted">ID: {{ $product->id }}</p>
                            <h5 class="text-primary">Giá: {{ number_format($product->price) }} VNĐ</h5>
                            <div class="mt-4">
                                <h5>Mô tả:</h5>
                                <p>{{ $product->description }}</p>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">
                                    Chỉnh sửa
                                </a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                        Xóa
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 