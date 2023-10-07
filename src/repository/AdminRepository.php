<?php
namespace Src\repository;
use PDO;
use Src\entity\User;
use Src\entity\Post;
use Src\repository\AbstractRepository;
use Src\entity\DetailsCommentesDTO;


class AdminRepository extends AbstractRepository
{
    /**
     * Get admin for dashboard
     * @return User
     */
    public function getAdmin(): User 
    {
        $req = $this->db->prepare("SELECT * FROM users WHERE isAdmin = 1");
        $req->setFetchMode(PDO::FETCH_CLASS, User::class);
        $req->execute(); 
        return $req->fetch();
    }
    /**
     * Dynamic update prepare method
     *
     * @param int $idUser
     *
     * @return bool
     */
    public function validat(int $idUser): bool
    {
        $statement = $this->db->prepare("UPDATE users SET validate=1 WHERE idUser= :idUser");
        //injection SQL
        $statement->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        return $statement->execute(); 
        
    }
    /**
     * Dynamic insert prepare method
     *
     * @param array $data
     *
     * @return bool
     */
    public function createPost(string $title, string $chapo, string $content, string $auteur, int $userPost): bool
    {
        $req = $this->db->prepare("INSERT INTO posts (title, chapo, content, auteur, userPost) VALUES (?, ?, ?, ?, ?)");
        return  $req->execute(array($title, $chapo, $content, $auteur, $userPost)); 
    }
    /**
     * Dynamic update prepare method
     *
     * @param integer $id
     * @param array $data
     *
     * @return bool
     */
    public function updatePost(int $idPost, array $data): bool
    {   
        $sqlRequestPart = "";
        $i = 1;
            foreach($data as $key => $value){
                    $comma = $i == count($data) ? "" : ', ';
                    $sqlRequestPart .= "{$key} = :{$key}{$comma}";
                    $i++;               
            }
            $data['idPost'] = $idPost;       
            $statement = $this->db->prepare("UPDATE posts SET {$sqlRequestPart} WHERE idPost = :idPost"); 
            $statement->setFetchMode(PDO::FETCH_CLASS, Post::class);
            return $statement->execute($data);  
    }
    /**
     * Dynamic delate prepare method
     *
     * @param integer $idPost
     *
     * @return bool
     */
    public function destroyPost(int $idPost): bool
    {
        $statement = $this->db->prepare("DELETE FROM posts WHERE idPost = ?");
        $statement->setFetchMode(PDO::FETCH_CLASS, Post::class);
        return $statement->execute(array($idPost)); 
    }

    /**
     * Get  all Users for dashboard
     * @return array
     */
    public function getAllUsres(): array
    {
        $statement = $this->db->prepare("SELECT * FROM users ORDER BY dateLastUpdate DESC");
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $statement->execute(); 
        return $statement->fetchAll();
    }
    /**
     * Dynamic update prepare method
     *
     * @param integer $id
     * @param string $pathPhoto
     * @param array $data
     *
     * @return bool
     */
    public function updateProfil(int $idUser, array $data, string $pathPhoto): bool
    {      
        $sqlRequestPart = "";
    
        if(!is_null($pathPhoto) && !empty($pathPhoto)){
           $data['photo'] = $pathPhoto;
        }
        $i = 1;
           foreach($data as $key => $value){
           $comma = $i == count($data) ? "" : ', ';
           $sqlRequestPart .= "{$key} = :{$key}{$comma}";
           $i++;   
           }
           $idUser = $_GET['idUser'];
           $statement = $this->db->prepare("UPDATE users SET {$sqlRequestPart} WHERE idUser = '$idUser'"); 
           $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
           return $statement->execute($data); 
    
    }
    /**
     * Get  all comment for dashboard
     * @return array
     */
    public function getAllComment(): array
    {
        $statement = $this->db->prepare("SELECT * FROM comment as c, users as u, posts as p WHERE idPost=c.postComment AND idUser=c.userComment  ORDER BY dateLastUpdateComment DESC");
        $statement->setFetchMode(PDO::FETCH_CLASS, DetailsCommentesDTO::class);
        $statement->execute(); 
        return $statement->fetchAll();
    }
     /**
     * Dynamic update prepare method
     *
     * @param int $idComment
     *
     * @return bool
     */
    public function validatComment(int $idComment): bool
    {
        $statement = $this->db->prepare("UPDATE comment SET validateComment=1 WHERE idComment= $idComment");
        $statement->setFetchMode(PDO::FETCH_CLASS, DetailsCommentesDTO::class);
        return $statement->execute(); 
            
    }
}
