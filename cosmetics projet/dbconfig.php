<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'my_projet');

class Database {
    
    public $conn;

    public function __construct() {
        $this->conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        if ($this->conn->connect_error) {
            die("Erreur de connexion : " . $this->conn->connect_error);
        }
    }
}
?>
<!-- $host = "localhost";
$db_name = "votre_base_de_donnees";
$username = "root";
$password = "";

// Connexion à la base de données avec MySQLi
$db = new mysqli($host, $username, $password, $db_name);

// Vérification de la connexion
if ($db->connect_error) {
    die("Erreur de connexion à la base de données : " . $db->connect_error);
} -->