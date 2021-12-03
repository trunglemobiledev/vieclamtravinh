<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
    protected $table = 'tinhs';

    protected $fillable = [
    	'tenTinh',
        'code',
        'numberCode'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function huyen(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->hasMany(Huyen::class, 'idTinh', 'id');
    }
}
