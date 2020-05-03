<?php

namespace App\Repositories;

use App\Models\BlogPost;

class BlogPostRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return BlogPost::class;
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate(int $perPage)
    {
        $columns = [
            'id',
            'title',
            'slug',
            'is_published',
            'published_at',
            'user_id',
            'category_id'
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with([
                'category' => function ($query) {
                    $query->select(['id', 'title']);
                },
                'user' => function ($query) {
                    $query->select(['id', 'name']);
                }
            ])
            ->paginate($perPage);

       /* $columns = 'id,
            title,
            slug,
            is_published,
            published_at,
            user_id,
            category_id';

        $result = $this->startConditions()
            ->selectRaw($columns)->toBase()
            ->orderBy('id', 'DESC')
            ->paginate($perPage);*/

        return $result;
    }
}
