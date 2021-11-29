<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
    	'title',
        'content',
        'bodt',
        'post_type_id'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     **/
    public function postType(): \Illuminate\Database\Eloquent\Relations\belongsTo
    {
        return $this->belongsTo(PostType::class, 'post_type_id', 'id');
    }
}
