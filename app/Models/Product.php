<?php
declare(strict_types=1);

namespace App\Models;

use App\Support\Model;
use PDO;

class Product extends Model
{
    protected $table = 'products';

    public function getCommentsForProduct(int $id, $limit, $offset)
    {
        return $this->query(" SELECT comments.comment, users.name FROM comments INNER JOIN users ON comments.user_id = users.id  WHERE product_id = ? LIMIT ? OFFSET ?", [$id, $limit, $offset]);
    }

    public function addComment(int $id, string $comment)
    {
        return $this->query("INSERT INTO comments (product_id, user_id, comment) VALUES (?, ?, ?)", [$id, $_SESSION['id'], $comment]);
    }


    public function countCommentsForProduct(int $id)
    {
        return $this->db->getPDO()->query("SELECT count(id) FROM comments WHERE product_id = '".$id."'")->fetch(PDO::FETCH_NUM)[0];
    }
}