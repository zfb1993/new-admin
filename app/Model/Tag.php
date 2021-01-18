<?php
namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends ModelBase
{
    use SoftDeletes;
    protected $fillable = [
        'name',
    ];

    protected $dates = [
        'created_at','updated_at'
    ];

}
