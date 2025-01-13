<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tạo Sản phẩm Mới</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Tên sản phẩm <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" id="name" 
                   placeholder="Nhập tên sản phẩm" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" class="form-control" id="description" 
                      placeholder="Nhập mô tả sản phẩm">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Giá (USD) <span class="text-danger">*</span></label>
            <input type="number" step="0.01" name="price" class="form-control" id="price" 
                   placeholder="Nhập giá sản phẩm" value="{{ old('price') }}" required>
        </div>

        <div class="form-group">
            <label for="store_id">Cửa hàng <span class="text-danger">*</span></label>
            <select name="store_id" id="store_id" class="form-control" required>
                <option value="">-- Chọn Cửa hàng --</option>
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}" 
                            {{ old('store_id') == $store->id ? 'selected' : '' }}>
                        {{ $store->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Thêm Sản phẩm
        </button>
    </form>
@endsection
