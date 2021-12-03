<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoSoUngVien extends Model
{
    protected $table = 'ho_so_ung_viens';

    protected $fillable = [
    	'hoTen',
        'namSinh',
    	'diaChi',
        'moTaBanThan',
    	'sdt',
        'created_by',
    	'updated_by'
    ];
}
