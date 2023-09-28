<?php
namespace Src\repository;
use PDO;
use Src\entity\User;
use Src\repository\AbstractRepository;

class UserRepository extends AbstractRepository{

    //register user
    public function saveUser(string $firstName, string $lastName , string $email, string $mp): bool
    {
        $req = $this->db->prepare("INSERT INTO users (firstName, lastName, email, mp) VALUES (?, ?, ?, ?)");
        return $req->execute(array($firstName, $lastName, $email, $mp)); 
    }
    //login user
    public function getUserByEmail(): User
    {
        $req = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $req->setFetchMode(PDO::FETCH_CLASS, User::class);
        $req->execute(array($_POST['email'])); 
        return $req->fetch();    
    }
     //count number user by email
    public function getNumberOfUserByEmail(string $email): array
    {
        $req = $this->db->prepare("SELECT count(email) as count FROM users WHERE email = ?");
        $req->execute(array($email)); 
        $totalrows = $req->fetch(PDO::FETCH_ASSOC);
        return $totalrows;
        
    }
}
