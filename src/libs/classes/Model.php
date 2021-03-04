<?php
require_once LIBS . '/Database.php';

class Model
{
    protected $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function query($query, $params = [], $fetch = true)
    {
        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        if ($fetch) {
            return $stmt->fetchAll();
        }
        return $stmt;
    }
}
