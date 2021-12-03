<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhuongXa extends Model
{
    protected $table = 'phuong_xas';

    protected $fillable = [
    	'tenPhuongXa',
        'code',
        'numberCode',
        'idHuyen'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function huyen(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(Huyen::class, 'idHuyen', 'id');
    }
}
