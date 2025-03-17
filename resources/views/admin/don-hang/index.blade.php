@extends('admin.layouts.app')

@section('title', 'Quản lý đơn hàng')

@section('header', 'Quản lý đơn hàng')

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã đơn</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Khách hàng</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tổng tiền</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ngày đặt</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng thái</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thao tác</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($donHangs as $donHang)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">#{{ $donHang->id }}</td>
                    <td class="px-6 py-4">
                        <div class="text-sm">
                            <div class="font-medium text-gray-900">{{ $donHang->nguoiDung->ten }}</div>
                            <div class="text-gray-500">{{ $donHang->so_dien_thoai }}</div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{ number_format($donHang->tong_tien) }}đ
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        {{ $donHang->created_at->format('d/m/Y H:i') }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <form action="{{ route('admin.don-hang.update-trang-thai', $donHang->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="trang_thai" class="form-input text-sm py-1 @switch($donHang->trang_thai)
                                @case('cho_xac_nhan') bg-yellow-50 text-yellow-800 @break
                                @case('da_xac_nhan') bg-blue-50 text-blue-800 @break
                                @case('dang_giao') bg-indigo-50 text-indigo-800 @break
                                @case('da_giao') bg-green-50 text-green-800 @break
                                @case('da_huy') bg-red-50 text-red-800 @break
                            @endswitch" onchange="this.form.submit()">
                                <option value="cho_xac_nhan" {{ $donHang->trang_thai === 'cho_xac_nhan' ? 'selected' : '' }}>
                                    Chờ xác nhận
                                </option>
                                <option value="da_xac_nhan" {{ $donHang->trang_thai === 'da_xac_nhan' ? 'selected' : '' }}>
                                    Đã xác nhận
                                </option>
                                <option value="dang_giao" {{ $donHang->trang_thai === 'dang_giao' ? 'selected' : '' }}>
                                    Đang giao
                                </option>
                                <option value="da_giao" {{ $donHang->trang_thai === 'da_giao' ? 'selected' : '' }}>
                                    Đã giao
                                </option>
                                <option value="da_huy" {{ $donHang->trang_thai === 'da_huy' ? 'selected' : '' }}>
                                    Đã hủy
                                </option>
                            </select>
                        </form>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <a href="{{ route('admin.don-hang.show', $donHang->id) }}" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-eye"></i> Chi tiết
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $donHangs->links() }}
    </div>
</div>
@endsection 