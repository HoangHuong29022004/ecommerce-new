<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietDonHang extends Model
{
    use HasFactory;

    protected $table = 'chi_tiet_don_hang';

    protected $fillable = [
        'don_hang_id',
        'san_pham_id',
        'so_luong',
        'don_gia',
    ];

    protected $casts = [
        'so_luong' => 'integer',
        'don_gia' => 'integer',
    ];

    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'don_hang_id');
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'san_pham_id');
    }
}
