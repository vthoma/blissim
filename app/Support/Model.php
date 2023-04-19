<?php

namespace App\Support;

use App\Models\Product;
use Config\Database;
use PDO;
use PDOException;

abstract class Model {

    protected $db;
    protected $table;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    /**
     * Récupère tous les enregistrements
     */
    public function all(): array
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY id ASC");
    }

    /**
     * Récupère un enregistrement par son ID
     */
    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id], true);
    }

    /**
     * Construit une requête SQL
     */
    public function query(string $sql, array $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';

        if (
            strpos($sql, 'DELETE') === 0
            || strpos($sql, 'UPDATE') === 0
            || strpos($sql, 'INSERT') === 0) {

            $stmt = $this->db->getPDO()->$method($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);
            return $stmt->execute($param);
        }

        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($method === 'query') {
            return $stmt->$fetch();
        } else {
            $stmt->execute($param);
            return $stmt->$fetch();
        }
    }
}