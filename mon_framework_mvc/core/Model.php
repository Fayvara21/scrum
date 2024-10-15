<?php
// core/Model.php

class Model
{
    protected $db;

    public function __construct()
    {
        // Connexion à la base de données en utilisant Config
        try {
            $this->db = new PDO('mysql:host=10.1.40.42' . Config::DB_HOST . ';dbname=Scrum' . Config::DB_NAME . ';charset=utf8', Config::DB_USER, Config::DB_PASS);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erreur de connexion : ' . $e->getMessage());
        }
    }
}