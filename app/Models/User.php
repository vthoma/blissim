<?php

namespace App\Models;

use App\Support\Model;

class User extends Model
{
    protected $table = 'users';
    public function getByUsername(string $name)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE name = ?", [$name]);
    }
}