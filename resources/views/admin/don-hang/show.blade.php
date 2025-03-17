@extends('admin.layouts.app')

@section('title', 'Chi tiết đơn hàng #' . $donHang->id)

@section('header', 'Chi tiết đơn hàng #' . $donHang->id)

@section('content')
<div class="bg-white rounded-lg shadow-lg p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
            <h3 class="text-lg font-semibold mb-4">Thông tin đơn hàng</h3>
            <div class="space-y-4">
                <div>
                    <label class="font-medium">Mã đơn hàng:</label>
                    <p>#{{ $donHang->id }}</p>
                </div>
                <div>
                    <label class="font-medium">Ngày đặt:</label>
                    <p>{{ $donHang->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div>
                    <label class="font-medium">Trạng thái:</label>
                    <form action="{{ route('admin.don-hang.update-trang-thai', $donHang->id) }}" method="POST" class="mt-1">
                        @csrf
                        @method('PUT')
                        <select name="trang_thai" class="form-input @switch($donHang->trang_thai)
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
                </div>
                <div>
                    <label class="font-medium">Tổng tiền:</label>
                    <p class="text-lg font-semibold text-green-600">{{ number_format($donHang->tong_tien) }}đ</p>
                </div>
                @if($donHang->ghi_chu)
                <div>
                    <label class="font-medium">Ghi chú:</label>
                    <p>{{ $donHang->ghi_chu }}</p>
                </div>
                @endif
            </div>
        </div>

        <div>
            <h3 class="text-lg font-semibold mb-4">Thông tin khách hàng</h3>
            <div class="space-y-4">
                <div>
                    <label class="font-medium">Tên khách hàng:</label>
                    <p>{{ $donHang->nguoiDung->ten }}</p>
                </div>
                <div>
                    <label class="font-medium">Email:</label>
                    <p>{{ $donHang->nguoiDung->email }}</p>
                </div>
                <div>
                    <label class="font-medium">Số điện thoại:</label>
                    <p>{{ $donHang->so_dien_thoai }}</p>
                </div>
                <div>
                    <label class="font-medium">Địa chỉ giao hàng:</label>
                    <p>{{ $donHang->dia_chi_giao }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <h3 class="text-lg font-semibold mb-4">Chi tiết sản phẩm</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sản phẩm</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Đơn giá</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Số lượng</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thành tiền</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($donHang->chiTietDonHangs as $chiTiet)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <img src="{{ Storage::url($chiTiet->sanPham->anh_dai_dien) }}" 
                                    alt="{{ $chiTiet->sanPham->ten_san_pham }}"
                                    class="h-10 w-10 object-cover rounded">
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $chiTiet->sanPham->ten_san_pham }}
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{ number_format($chiTiet->don_gia) }}đ
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            {{ $chiTiet->so_luong }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            {{ number_format($chiTiet->thanh_tien) }}đ
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50">
                    <tr>
                        <td colspan="3" class="px-6 py-4 text-right font-medium">Tổng cộng:</td>
                        <td class="px-6 py-4 whitespace-nowrap text-lg font-bold text-green-600">
                            {{ number_format($donHang->tong_tien) }}đ
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <div class="flex justify-end space-x-2 mt-6">
        <a href="{{ route('admin.don-hang.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Quay lại
        </a>
    </div>
</div>
@endsection 