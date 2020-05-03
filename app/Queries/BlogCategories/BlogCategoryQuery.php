<?php
declare(strict_types=1);

namespace App\Queries\BlogCategories;

use App\Models\BlogCategory;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;


class BlogCategoryQuery
{
    private $connection;

    public function __construct(DatabaseManager $databaseManager)
    {
        $this->connection = $databaseManager->getDoctrineConnection();
    }

    /**
     * @return mixed[]
     */
    public function fetchAll()
    {
        $qb = $this->connection->createQueryBuilder()
            ->select('id, title, parent_id')
            ->from(BlogCategory::TABLE)
            ->execute()
            ->fetchAll(\PDO::FETCH_CLASS, BlogCategory::class);

        return $qb;
    }
}
