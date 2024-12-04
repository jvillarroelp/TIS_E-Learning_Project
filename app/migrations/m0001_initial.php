<?php

namespace app\migrations;

use app\core\Migration;

class m0001_initial 
    {
    public function up() {
        $db = \app\core\Application::$app->db;

        $SQL = "DROP TABLE IF EXISTS users;";
        $db->pdo->exec($SQL);

        $SQL = "CREATE TABLE users(
            id INT AUTO_INCREMENT PRIMARY KEY,
            rut INT NOT NULL,
            nombre VARCHAR(255) NOT NULL,
            apellido VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";
        $db->pdo->exec($SQL);
    }

    public function down() {
        $db = \app\core\Application::$app->db;
        $SQL = "DROP TABLE IF EXISTS users;";
        $db->pdo->exec($SQL);
    }
}
