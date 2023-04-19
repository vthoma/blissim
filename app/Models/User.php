<?php

namespace App\Models;

use App\Support\Model;

class User extends Model
{
    protected $table = 'users';

    /**
     * @return array<string, mixed>
     */
    public function getByUsername(string $name): array
    {
        return $this->query("SELECT * FROM {$this->table} WHERE name = ?", [$name]);
    }
}