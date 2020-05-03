<?php
declare(strict_types=1);

namespace App\Queries\BlogCategories;


use App\Models\BlogCategory;
use Illuminate\Database\DatabaseManager;

class BlogCategoryWithPaginateQuery
{
    private $connection;

    public function __construct(DatabaseManager $databaseManager)
    {
        $this->connection = $databaseManager->getDoctrineConnection();
    }

    public function fetchAll(int $limit, int $offset)
    {
        $qb = $this->connection->createQueryBuilder()
            ->select('id, title, parent_id')
            ->from(BlogCategory::TABLE)
            ->execute()
            ->fetchAll(\PDO::FETCH_CLASS);

        /*$result = array_map;*/
        return $qb;
    }
}
