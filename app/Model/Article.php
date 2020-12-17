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

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
