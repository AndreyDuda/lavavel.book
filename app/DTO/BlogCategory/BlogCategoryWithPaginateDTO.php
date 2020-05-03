<?php
declare(strict_types=1);

namespace App\DTO\BlogCategory;

class BlogCategoryWithPaginateDTO
{
    /** @var array */
    public $blogCategories;

    /** @var int */
    public $totalCount;
}
