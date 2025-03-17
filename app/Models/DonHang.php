<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'don_hang';

    protected $fillable = [
        'nguoi_dung_id',
        'tong_tien',
        'trang_thai',
        'dia_chi_giao',
        'so_dien_thoai',
        'ghi_chu',
    ];

    protected $casts = [
        'tong_tien' => 'decimal:2',
    ];

    public function nguoiDung()
    {
        return $this->belongsTo(NguoiDung::class, 'nguoi_dung_id');
    }

    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class, 'don_hang_id');
    }
}
