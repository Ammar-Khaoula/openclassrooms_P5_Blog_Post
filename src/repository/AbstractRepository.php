<?php
namespace Src\repository;

use Database\DbConnection;

abstract class AbstractRepository
{
    protected $db;
    
   public function __construct(){
        $this->db =  new DbConnection('first_blog_php', '127.0.0.1', 'root', '') or die("Unable to connection. Check connection parameters");
    }
    
}
