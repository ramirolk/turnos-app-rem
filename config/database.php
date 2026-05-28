<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'turnos_db');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_CHARSET', 'utf8mb4');

class Database {
    private static ?PDO $connection = null;

    public static function getConnection(): PDO {
        if (self::$connection === null) {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            try {
                self::$connection = new PDO($dsn, DB_USER, DB_PASS, $options);
            } catch (PDOException $e) {
                // En producción esto NO debería mostrar el error al usuario
                error_log($e->getMessage());
                die('Error de conexión a la base de datos.');
            }
        }

        return self::$connection;
    }
}

?>