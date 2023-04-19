<?php
declare(strict_types=1);

namespace App\Models;

use App\Support\Model;
use PDO;

class Product extends Model
{
    protected $table = 'products';

    /**
     * Récupère les produits
     * @return array
     */
    public function getCommentsForProduct(int $id, $limit, $offset): array
    {
        return $this->query(" SELECT comments.comment, users.name FROM comments INNER JOIN users ON comments.user_id = users.id  WHERE product_id = ? LIMIT ? OFFSET ?", [$id, $limit, $offset]);
    }

    /**
     * Ajoute un commentaire
     * @return bool
     */
    public function addComment(int $id, string $comment): bool
    {
        return $this->query("INSERT INTO comments (product_id, user_id, comment) VALUES (?, ?, ?)", [$id, $_SESSION['id'], $comment]);
    }

    /**
     * Récupère le nombre de commentaires d'un produit
     * @return int
     */
    public function countCommentsForProduct(int $id): int
    {
        return $this->db->getPDO()->query("SELECT count(id) FROM comments WHERE product_id = '".$id."'")->fetch(PDO::FETCH_NUM)[0];
    }
}