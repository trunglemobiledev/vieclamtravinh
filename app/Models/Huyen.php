<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Huyen extends Model
{
    protected $table = 'huyens';

    protected $fillable = [
        'idTinh',
    	'tenHuyen',
        'code',
        'numberCode'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function tinh(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(Tinh::class, 'idTinh', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function phuongXa(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->hasMany(PhuongXa::class, 'idHuyen', 'id');
    }
}
