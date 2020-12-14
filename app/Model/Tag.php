<?php
namespace App\Model;

class Tag extends ModelBase
{
    protected $fillable = [
        'name',
    ];

    protected $dates = [
        'created_at','updated_at'
    ];

}
