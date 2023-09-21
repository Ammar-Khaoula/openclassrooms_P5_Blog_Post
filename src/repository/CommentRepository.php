<?php
namespace Src\repository;
use PDO;
use Src\entity\DetailsCommentesDTO;
use Src\entity\Comment;
use Src\repository\AbstractRepository;

class CommentRepository extends AbstractRepository
{
    //get comment
    public function getCommentsByPostId(int $idPost): array
    {
        $statement = $this->db->getPDO()->prepare("SELECT * FROM comment as c, users as u WHERE c.postComment = ? AND c.userComment = u.idUser AND c.	validateComment = 1");
        $statement->setFetchMode(PDO::FETCH_CLASS, DetailsCommentesDTO::class);   
        $statement->execute(array($idPost)); 
        return $statement->fetchAll();
    }
    //get comment by id
    public function getCommentById(int $idComment)
    {
        $statement =  $this->db->getPDO()->prepare("SELECT * FROM comment WHERE idComment = ?");
        $statement->setFetchMode(PDO::FETCH_CLASS, Comment::class);
        $statement->execute(array($idComment)); 
        return $statement->fetch();
    }
    // create comment
    public function createComment(string $contentComment,  int $postComment, int $userComment): bool
    {
        $req = $this->db->getPDO()->prepare("INSERT INTO comment (contentComment, postComment, userComment) VALUES (?, ?, ?)");
        return $req->execute(array($contentComment, $postComment, $userComment)); 
    }
    //update comment
    public function updateComment(int $idComment, array $data): bool
    {      
        $sqlRequestPart = "";
        $i = 1;
        foreach($data as $key => $value){
                $comma = $i == count($data) ? "" : ', ';
                $sqlRequestPart .= "{$key} = :{$key}{$comma}";
                $i++;   
        }
        $data['idComment'] = $idComment;
            $statement = $this->db->getPDO()->prepare("UPDATE comment SET {$sqlRequestPart} WHERE idComment = :idComment"); 
            $statement->setFetchMode(PDO::FETCH_CLASS, Comment::class);
            return $statement->execute($data);  
    }
    //delete comment
    public function destroyComment(int $idComment): bool 
    {
        $statement = $this->db->getPDO()->prepare("DELETE FROM comment WHERE idComment = ?");
        return $statement->execute(array($idComment)); 
    }
}
