<!-- resources/views/products/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Chi tiết Sản phẩm</h1>

    <div class="card">
        <div class="card-header bg-info text-white">
            {{ $product->name }}
        </div>
        <div class="card-body">
            <p><strong>Mô tả:</strong></p>
            <p>{{ $product->description }}</p>
            <p><strong>Giá:</strong> {{ number_format($product->price, 2) }} USD</p>
            <p><strong>Cửa hàng:</strong> {{ $product->store->name }}</p>
            <p><strong>Ngày tạo:</strong> {{ $product->created_at->format('d/m/Y') }}</p>
            <p><strong>Ngày cập nhật:</strong> {{ $product->updated_at->format('d/m/Y') }}</p>
        </div>
        <div class="card-footer">
            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">
                <i class="fas fa-edit"></i> Sửa
            </a>
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" 
                  style="display:inline-block;" 
                  onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">
                    <i class="fas fa-trash-alt"></i> Xóa
                </button>
            </form>
            <a href="{{ route('products.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Quay lại
            </a>
        </div>
    </div>
@endsection
