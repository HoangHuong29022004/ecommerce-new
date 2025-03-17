@extends('admin.layouts.app')

@section('title', 'Thêm danh mục')

@section('header', 'Thêm danh mục mới')

@section('content')
    <div class="bg-white rounded-lg shadow-lg p-6">
        <form action="{{ route('admin.danh-muc.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="ten_danh_muc" class="form-label">Tên danh mục</label>
                <input type="text" name="ten_danh_muc" id="ten_danh_muc" class="form-input" value="{{ old('ten_danh_muc') }}" required>
                @error('ten_danh_muc')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="mo_ta" class="form-label">Mô tả</label>
                <textarea name="mo_ta" id="mo_ta" rows="3" class="form-input">{{ old('mo_ta') }}</textarea>
                @error('mo_ta')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="hien_thi" class="form-checkbox" value="1" {{ old('hien_thi', true) ? 'checked' : '' }}>
                    <span class="ml-2">Hiển thị</span>
                </label>
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.danh-muc.index') }}" class="btn bg-gray-500 text-white hover:bg-gray-600 mr-2">Hủy</a>
                <button type="submit" class="btn btn-primary">Thêm danh mục</button>
            </div>
        </form>
    </div>
@endsection 