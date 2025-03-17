@extends('admin.layouts.app')

@section('title', 'Sửa danh mục')

@section('header', 'Sửa danh mục')

@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('admin.danh-muc.update', $danhMuc->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
                <input type="text" name="ten_danh_muc" id="ten_danh_muc" class="form-input" value="{{ old('ten_danh_muc', $danhMuc->ten_danh_muc) }}" required>
                @error('ten_danh_muc')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="mo_ta" class="form-label">Mô tả</label>
                <textarea name="mo_ta" id="mo_ta" rows="3" class="form-input">{{ old('mo_ta', $danhMuc->mo_ta) }}</textarea>
                @error('mo_ta')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="hien_thi" class="form-checkbox" value="1" {{ old('hien_thi', $danhMuc->hien_thi) ? 'checked' : '' }}>
                    <span class="ml-2">Hiển thị</span>
                </label>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.danh-muc.index') }}" class="btn bg-gray-500 text-white hover:bg-gray-600 mr-2">Hủy</a>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
            </div>
        </form>
    </div>
@endsection 