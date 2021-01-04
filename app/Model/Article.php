<?php
namespace App\Model;

use Laravel\Scout\Searchable;

class Article extends ModelBase
{
    use Searchable;
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

    public function searchableAs() {
        return 'blog'; // 这并非type，而是索引名称
    }

    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'article' => $this->article
        ];
    }
}
