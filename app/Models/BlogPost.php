<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogPost
 * @package App\Models
 *
 * @property BlogCategory $category
 * @property User         $user
 * @property string       $title
 * @property string       $slug
 * @property string       $content_html
 * @property string       $content_raw
 * @property string       $excerpt
 * @property string       $published_at
 * @property boolean      $is_published
 */
class BlogPost extends Model
{
    use SoftDeletes;

    const TABLE = 'blog_post';

    const PROP_ID           = 'id';
    const PROP_CATEGORY_ID  = 'category_id';
    const PROP_USER_ID      = 'user_id';
    const PROP_SLUG         = 'slug';
    const PROP_TITLE        = 'title';
    const PROP_EXCERPT      = 'excerpt';
    const PROP_CONTENT_RAW  = 'content_raw';
    const PROP_CONTENT_HTML = 'content_html';
    const PROP_IS_PUBLISHED = 'is_published';
    const PROP_PUBLISHED_AT = 'published_at';
    const PROP_CREATED_AT   = 'created_at';
    const PROP_UPDATE_AT    = 'updated_at';

    protected $fillable = [
        self::PROP_CATEGORY_ID,
        self::PROP_SLUG,
        self::PROP_TITLE,
        self::PROP_EXCERPT,
        self::PROP_CONTENT_RAW,
        self::PROP_IS_PUBLISHED,
        self::PROP_PUBLISHED_AT
    ];

    protected $table = self::TABLE;

    public function category()
    {
        return $this->belongsTo(BlogCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
