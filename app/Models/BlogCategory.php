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
}
