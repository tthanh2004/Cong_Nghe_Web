<!-- resources/views/products/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Danh Sách Sản phẩm</h1>

    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>Tên sản phẩm</th>
                <th>Mô tả</th>
                <th>Giá (USD)</th>
                <th>Cửa hàng</th>
                <th>Ngày tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ Str::limit($product->description, 50) }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->store->name }}</td>
                    <td>{{ $product->created_at->format('d/m/Y') }}</td>
                    <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm btn-action" title="Xem">Xem
                            </a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm btn-action" title="Sửa"> Sửa
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" 
                                  class="d-inline" 
                                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-action" title="Xóa">Xóa
                                </button>
                            </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Không có sản phẩm nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Hiển thị phân trang -->
    {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection
