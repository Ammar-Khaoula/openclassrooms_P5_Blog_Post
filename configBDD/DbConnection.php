<?php

namespace Database;
use PDO;

/**
 * Class used to create an instance of the database connection
 */

class DbConnection
{
    /**
     * @var null|object $instance Property used to define if an instance of the connection already exists
     */
    private static $instance = null;

    /**
     * @var string Define DBMS, database and host used for connect database
     */
    private const DSN = 'mysql:dbname=first_blog_php;host=localhost';
    /**
     * @var string Define username used for connect database
     */
    private const USERNAME = 'root';
    /**
     * @var string Define password used for connect database
     */
    private const PASSWORD = '';


    /**
     * Connect to the database and returns the connection
     *
     * @return PDO object
     */
public  static function getPDO() : PDO
{
    if (self::$instance === null) {
        self::$instance = new PDO(
            self::DSN,
            self::USERNAME,
            self::PASSWORD,
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET UTF8'
    ]);
    }
    return self::$instance;
}

}
