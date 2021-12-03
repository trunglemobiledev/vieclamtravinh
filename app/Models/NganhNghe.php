<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NganhNghe extends Model
{
    protected $table = 'nganh_nghes';

    protected $fillable = [
    	'nganhNghe',
        'moTa'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function baiDangTuyens(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->hasMany(BaiDangTuyen::class, 'idNganhNghe', 'id');
    }

}
