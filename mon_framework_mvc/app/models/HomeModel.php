<?php
// app/models/HomeModel.php

class HomeModel extends Model
{
    public function getData()
    {
        // Exemple de récupération de données
        $stmt = $this->db->prepare("SELECT * FROM table_exemple");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}