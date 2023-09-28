<?php
namespace Src\repository;
use PDO;
use Database\DbConnection;

abstract class AbstractRepository
{
    /**
     * @var PDO Contains the connection to the database
     */
    protected PDO $db;
    
    public function __construct()
    {
        $this->db = DbConnection :: getPDO();
    }
    
}
