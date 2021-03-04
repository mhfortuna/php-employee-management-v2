<?php

class Database extends PDO{

    function __construct(){

        $dns = 'mysql:host=' . HOST .
        ';dbname=' . DBNAME .
        ';charset=' . 'utf8mb4';

    try {
        parent::__construct($dns, USERNAME, PASSWORD);
        $this->set_attributes();
    } catch (PDOException $e) {
        if ($e->getCode() == 1049) {
            $this->initDb();
            parent::__construct($dns, USERNAME, PASSWORD);
            $this->set_attributes();
        } else {
            throw new PDOException($e->getMessage());
        }
    }

    }

    private function initDb()
    {
        $pdo = new PDO('mysql:host' . HOST, USERNAME, PASSWORD);
        $sql = file_get_contents(QUERIES . '/create_db.sql');
        $pdo->exec($sql);
        $sql = file_get_contents(QUERIES . '/insert_data.sql');
        $pdo->exec($sql);
    }



    private function set_attributes()
    {
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

}