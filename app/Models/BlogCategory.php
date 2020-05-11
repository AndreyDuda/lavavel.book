<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    const TABLE = 'blog_categories';

    const PROP_ID = 'id';
    const PROP_PARENT_ID = 'parent_id';
    const PROP_SLUG = 'slug';
    const PROP_TITLE = 'title';
    const PROP_DESCRIPTION = 'description';
    const PROP_CREATED_AT = 'created_at';
    const PROP_UPDATE_AT = 'updated_at';

    const ROOT = 1;

    protected $fillable = [
        self::PROP_TITLE,
        self::PROP_SLUG,
        self::PROP_PARENT_ID,
        self::PROP_DESCRIPTION
    ];

    public function parentCategory()
    {
        return $this->belongsTo(BlogCategory::class, 'parent_id', 'id');
    }

    public function getParentTitleAttribute()
    {
        $title = $this->parentCategory->title
            ?? ($this->isRoot())
            ? 'Корень'
            : '???';

        return $title;
    }

    public function isRoot()
    {
        return $this->id === BlogCategory::ROOT;
    }
}
