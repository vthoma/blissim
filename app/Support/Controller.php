<?php

namespace App\Support;

use Config\Database;

abstract class Controller
{
    protected $db;

    public function __construct(Database $db)
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->db = $db;
    }

    /**
     * Permet de charger un modèle
     */
    protected function getDB()
    {
        return $this->db;
    }

    /**
     * Affiche une vueZ
     */
    protected function view(string $path, array $params = null)
    {
        ob_start();
        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        $class = explode('\\', get_class($this));;

        require VIEWS . strtolower(substr(end($class), 0, -10)). DIRECTORY_SEPARATOR . $path . '.php';

        $content = ob_get_clean();
        require VIEWS . 'layouts/main.php';
    }
}