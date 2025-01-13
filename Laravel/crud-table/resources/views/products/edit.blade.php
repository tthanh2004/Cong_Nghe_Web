<!-- resources/views/products/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Sửa Sản phẩm</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Phương thức PUT để cập nhật -->

        <div class="form-group">
            <label for="name">Tên sản phẩm <span class="text-danger">*</span></label>
            <input type="text" name="name" class="form-control" id="name" 
                   placeholder="Nhập tên sản phẩm" 
                   value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" class="form-control" id="description" 
                      placeholder="Nhập mô tả sản phẩm">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="price">Giá (USD) <span class="text-danger">*</span></label>
            <input type="number" step="0.01" name="price" class="form-control" id="price" 
                   placeholder="Nhập giá sản phẩm" 
                   value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="form-group">
            <label for="store_id">Cửa hàng <span class="text-danger">*</span></label>
            <select name="store_id" id="store_id" class="form-control" required>
                <option value="">-- Chọn Cửa hàng --</option>
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}" 
                            {{ (old('store_id', $product->store_id) == $store->id) ? 'selected' : '' }}>
                        {{ $store->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save"></i> Cập nhật Sản phẩm
        </button>
    </form>
@endsection
