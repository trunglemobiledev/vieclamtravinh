<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UserSignatureTrait;

class BaiDangTuyen extends Model
{

    use UserSignatureTrait;

    protected $table = 'bai_dang_tuyens';

    protected $fillable = [
    	'tieuDe',
        'tenHoKinhDoanh',
    	'noidung',
        'hinhAnh',
    	'diaChi',
        'hinhThucTraLuong',
    	'gioiTinh',
        'soLuongTuyen',
    	'minTuoi',
        'maxTuoi',
    	'quyenLoi',
        'kinhNghiem',
    	'minLuong',
        'maxLuong',
    	'kiNang',
        'danhGiaPhanHoi',
        'idNganhNghe',
        'idLoaiCongViec',
    	'created_by',
        'updated_by',
        'hide'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function nganhNghes(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(NganhNghe::class, 'idNganhNghe', 'id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function loaiCongViecs(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(LoaiCongViec::class, 'idLoaiCongViec', 'id');
    }
}
