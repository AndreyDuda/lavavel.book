<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

    const TABLE = 'blog_post';

    const PROP_ID = 'id';
    const PROP_CATEGORY_ID = 'category_id';
    const PROP_USER_ID = 'user_id';
    const PROP_SLUG = 'slug';
    const PROP_TITLE = 'title';
    const PROP_EXCERPT = 'excerpt';
    const PROP_CONTENT_RAW = 'content_raw';
    const PROP_CONTENT_HTML = 'content_html';
    const PROP_IS_PUBLISHED = 'is_published';
    const PROP_PUBLISHED_AT = 'published_at';
    const PROP_CREATED_AT = 'created_at';
    const PROP_UPDATE_AT = 'updated_at';

    protected $table = self::TABLE;
}
