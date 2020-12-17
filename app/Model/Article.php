<?php
namespace App\Model;

class Article extends ModelBase
{
    protected $fillable = [
        'name','tag_id','category_id','title','article'
    ];
    protected $casts = [
        'tag_id' => 'array',
    ];
}
