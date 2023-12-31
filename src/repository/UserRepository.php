<?php
namespace Src\repository;
use PDO;
use Src\entity\User;
use Src\repository\AbstractRepository;

class UserRepository extends AbstractRepository{

     /**
     * Dynamic insert prepare method
     *
     * @param array $data
     *
     * @return bool
     */
    public function saveUser(string $firstName, string $lastName , string $email, string $mp): bool
    {
        $req = $this->db->prepare("INSERT INTO users (firstName, lastName, email, mp) VALUES (?, ?, ?, ?)");
        return $req->execute(array($firstName, $lastName, $email, $mp)); 
    }
     /**
     * Get email by Id with User
     * @return User|bool
     */
    public function getUserByEmail(string $email): User|bool
    {
        $req = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $req->setFetchMode(PDO::FETCH_CLASS, User::class);
        $req->execute(array($email)); 
        return $req->fetch();
        /*if($user){
            return $user;
        }else{
            return new User;
        }*/
    }
     /**
     * Get number user by email
     *
     * @param string $email
     *
     * @return array
     */
    public function getNumberOfUserByEmail(string $email): array
    {
        $req = $this->db->prepare("SELECT count(email) as count FROM users WHERE email = ?");
        $req->execute(array($email)); 
        $totalrows = $req->fetch(PDO::FETCH_ASSOC);
        return $totalrows;
        
    }
}
