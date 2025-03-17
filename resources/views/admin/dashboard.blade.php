@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-blue-100 p-4 rounded-lg">
            <h3 class="text-lg font-semibold text-blue-800">Tổng số đơn hàng</h3>
            <p class="text-3xl font-bold text-blue-600">0</p>
        </div>
        <div class="bg-green-100 p-4 rounded-lg">
            <h3 class="text-lg font-semibold text-green-800">Tổng số sản phẩm</h3>
            <p class="text-3xl font-bold text-green-600">0</p>
        </div>
        <div class="bg-yellow-100 p-4 rounded-lg">
            <h3 class="text-lg font-semibold text-yellow-800">Tổng số người dùng</h3>
            <p class="text-3xl font-bold text-yellow-600">0</p>
        </div>
        <div class="bg-purple-100 p-4 rounded-lg">
            <h3 class="text-lg font-semibold text-purple-800">Tổng doanh thu</h3>
            <p class="text-3xl font-bold text-purple-600">0đ</p>
        </div>
    </div>
</div>
@endsection 