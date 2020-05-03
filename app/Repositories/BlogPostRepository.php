<?php

namespace App\Repositories;

use App\Models\BlogPost;
use Webmozart\Assert\Assert;

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

    public function getEdit(int $id)
    {
        Assert::nullOrInteger($id, 'Указан не верный параметр');

        return $this->startConditions()->find($id);
    }
}
