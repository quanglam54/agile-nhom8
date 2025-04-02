@extends('admin.layouts.index')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Quản lý danh mục</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h4 class="card-title">Danh sách danh mục</h4>
                        <a href="{{ route('categories.create') }}" class="btn btn-primary btn-round ml-auto">
                            <i class="fa fa-plus"></i>
                            Thêm danh mục
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
                    <form method="GET" action="{{ route('categories.index') }}" class="mb-4">
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
                                    <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                                        <i class="fa fa-redo"></i> Đặt lại
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- End Search and Filter Form -->

                    <div class="table-responsive">
                        <table id="categories-table" class="display table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tên danh mục</th>
                                    <th>Mô tả</th>
                                    <th>Ngày tạo</th>
                                    <th style="width: 10%">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>{{ $category->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="form-button-action">
                                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-link btn-primary btn-lg" data-toggle="tooltip" title="Sửa danh mục">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link btn-danger" data-toggle="tooltip" title="Xóa danh mục" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">Không có danh mục nào</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Initialize DataTable with search disabled (we're using our custom search)
        $('#categories-table').DataTable({
            "paging": false,
            "info": false,
            "searching": false,
            "ordering": false
        });
    });
</script>
@endpush
<style>
    .filter-section {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .filter-section .form-group {
        margin-bottom: 10px;
    }

    .filter-buttons {
        margin-top: 25px;
    }
</style>
