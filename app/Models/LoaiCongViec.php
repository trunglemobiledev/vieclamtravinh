<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class LoaiCongViec extends Model
{
    protected $table = 'loai_cong_viecs';

    protected $fillable = [
    	'tenLoai',
        'ghiChu'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function baiDangTuyens(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->hasMany(BaiDangTuyen::class, 'idLoaiCongViec', 'id');
    }
}
