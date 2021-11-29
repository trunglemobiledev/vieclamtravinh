<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostType extends Model
{
    // use HasFactory;
    //Declare table name
    protected $table = 'post_types';
    //{{TIMESTAMPS_NOT_DELETE_THIS_LINE}}
    protected $fillable = [
    	'name',
        'note'
    ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'created_at',
    //     'updated_at'
    // ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     **/
    public function posts(): \Illuminate\Database\Eloquent\Relations\hasMany
    {
        return $this->hasMany(Post::class, 'post_type_id', 'id');
    }
}
