<?php
namespace Src\repository;
use PDO;
use Src\entity\User;
use Src\entity\Post;
use Src\repository\AbstractRepository;
use Src\entity\DetailsCommentesDTO;


class AdminRepository extends AbstractRepository
{
    // get Admin
    public function getAdmin(){
        $req = $this->db->getPDO()->prepare("SELECT * FROM users WHERE is_admin = 1");
        $req->setFetchMode(PDO::FETCH_CLASS, User::class);
        $req->execute(); 
        return $req->fetch();
    }
}
