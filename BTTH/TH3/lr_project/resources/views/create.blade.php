@extends('layouts.app')

@section('title', 'Thêm mới thuốc')

@section('content')
    <div class="container">
        <h1 class="mb-4">Thêm mới thuốc</h1>

        <!-- Hiển thị lỗi nếu có -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('medicines.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Tên thuốc</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label">Nhãn hiệu</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand') }}" required>
            </div>

            <div class="mb-3">
                <label for="dosage" class="form-label">Liều lượng</label>
                <input type="text" class="form-control" id="dosage" name="dosage" value="{{ old('dosage') }}" required>
            </div>

            <div class="mb-3">
                <label for="form" class="form-label">Dạng thuốc</label>
                <input type="text" class="form-control" id="form" name="form" value="{{ old('form') }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Giá</label>
                <input type="number" class="form-control" id="price" name="price" value="{{ old('price') }}" required>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Số lượng tồn kho</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Thêm thuốc</button>
        </form>
    </div>
@endsection
