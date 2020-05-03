<?php
declare(strict_types=1);

namespace App\Repositories;

use App\Models\BlogCategory;
use Webmozart\Assert\Assert;

class BlogCategoryRepository extends CoreRepository
{
    public function getModelClass()
    {
        return BlogCategory::class;
    }

    public function getEdit(int $id)
    {
        Assert::integer($id, 'Указан не верный параметр');

        return $this->startConditions()->find($id);
    }

    public function getForComboBox()
    {
        return $this->startConditions()->all();
    }

    /**
     * @param int|null $perPage
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate(int $perPage = null)
    {
        Assert::nullOrInteger($perPage, 'Указан не верный параметр');
        $column = [
            BlogCategory::PROP_ID,
            BlogCategory::PROP_TITLE,
            BlogCategory::PROP_PARENT_ID
        ];
        $result = $this->startConditions()
        ->select($column)
        ->paginate($perPage);

        return $result;
    }
}
