<?php

namespace Core;

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Dotenv\Dotenv;
use PDO;
use App\Config;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

/**
 * Base model
 *
 * PHP version 7.0+
 */
abstract class Model
{
    /**
     * Get the PDO database connection
     *
     * @return PDO
     */
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $dsn = 'mysql:host=' . $_ENV['DB_HOST'] . ';dbname=' . $_ENV['DB_NAME'] . ';charset=utf8';
            $db = new PDO($dsn, $_ENV['DB_USER'], $_ENV['DB_PASS']);

            // Throw an Exception when an error occurs
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $db;
    }
}
