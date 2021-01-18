<?php
namespace App\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends ModelBase
{
    use SoftDeletes;
    protected $fillable = [
        'name',
    ];

}
