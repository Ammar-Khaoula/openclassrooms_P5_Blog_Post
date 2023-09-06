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
        $req = $this->db->getPDO()->prepare("SELECT * FROM users WHERE isAdmin = 1");
        $req->setFetchMode(PDO::FETCH_CLASS, User::class);
        $req->execute(); 
        return $req->fetch();
    }
     //validat user
    public function validat(int $idUser){
        $statement = $this->db->getPDO()->prepare("UPDATE users SET validate=1 WHERE idUser= $idUser");
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        return $statement->execute(); 
        
    }
        //create Post
        public function createPost(string $title, string $chapo, string $content, int $userPost){

            $req = $this->db->getPDO()->prepare("INSERT INTO posts (title, chapo, content, userPost) VALUES (?, ?, ?, ?)");
            return  $req->execute(array($title, $chapo, $content, $userPost)); 
        }
        //update Post
        public function updatePost(int $idPost, array $data){   
            
            $sqlRequestPart = "";
            $i = 1;
        
            foreach($data as $key => $value){
                    $comma = $i == count($data) ? "" : ', ';
                    $sqlRequestPart .= "{$key} = :{$key}{$comma}";
                    $i++;
                
            }
            $data['idPost'] = $idPost;
        
                $statement = $this->db->getPDO()->prepare("UPDATE posts SET {$sqlRequestPart} WHERE idPost = :idPost"); 
                $statement->setFetchMode(PDO::FETCH_CLASS, Post::class);
                return $statement->execute($data);  
        }
        //delete Post
        public function destroyPost(int $idPost){
            $statement = $this->db->getPDO()->prepare("DELETE FROM posts WHERE idPost = ?");
            $statement->setFetchMode(PDO::FETCH_CLASS, Post::class);
            return $statement->execute(array($idPost)); 
        }

            //getAllUsers
    public function getAllUsres(){
        $statement = $this->db->getPDO()->prepare("SELECT * FROM users ORDER BY dateLastUpdate DESC");
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        $statement->execute(); 
        return $statement->fetchAll();
    }
  
    public function updateProfil(int $idUser, array $data, string $pathPhoto){      
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
           $statement = $this->db->getPDO()->prepare("UPDATE users SET {$sqlRequestPart} WHERE idUser = '$idUser'"); 
           $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
           return $statement->execute($data); 
    
    }
        //getAllComment
        public function getAllComment(){
            $statement = $this->db->getPDO()->prepare("SELECT * FROM comment as c, users as u, posts as p WHERE idPost=c.postComment AND idUser=c.userComment  ORDER BY dateLastUpdateComment DESC");
            $statement->setFetchMode(PDO::FETCH_CLASS, DetailsCommentesDTO::class);
            $statement->execute(); 
            return $statement->fetchAll();
        }
        //validat comment
        public function validatComment(int $idComment){
            $statement = $this->db->getPDO()->prepare("UPDATE comment SET validateComment=1 WHERE idComment= $idComment");
            $statement->setFetchMode(PDO::FETCH_CLASS, DetailsCommentesDTO::class);
            return $statement->execute(); 
            
        }
}
