<?php

namespace App\Core;

use PDO;
use PDOStatement;

class Db
{
    protected $db;

    /**
     * Db constructor.
     */
    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=page_search', 'root', ''); //todo environment variables
    }

    /**
     * @param $sql
     * @return PDOStatement
     */
    public function query($sql): PDOStatement
    {
        $query = $this->db->query($sql);

        return $query;
    }

    /**
     * @param $sql
     * @return array
     */
    public function row($sql): array
    {
        $result = $this->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $sql
     * @return mixed
     */
    public function column($sql)
    {
        $result = $this->query($sql);
        return $result->fetchColumn();
    }
}