<?php
namespace Src\repository;
use PDO;
use Src\entity\DetailsCommentesDTO;
use Src\entity\Comment;
use Src\repository\AbstractRepository;

class CommentRepository extends AbstractRepository
{
    /**
     * Get  all comment by post id
     * @return array
     */
    public function getCommentsByPostId(int $idPost): array
    {
        $statement = $this->db->prepare("SELECT * FROM comment as c, users as u WHERE c.postComment = ? AND c.userComment = u.idUser AND c.	validateComment = 1");
        $statement->setFetchMode(PDO::FETCH_CLASS, DetailsCommentesDTO::class);   
        $statement->execute(array($idPost)); 
        return $statement->fetchAll();
    }
   /**
     * Get comment by Id with Comment
     *
     * @param int $idComment
     *
     * @return Comment
     */
    public function getCommentById(int $idComment): Comment
    {
        $statement =  $this->db->prepare("SELECT * FROM comment WHERE idComment = ?");
        $statement->setFetchMode(PDO::FETCH_CLASS, Comment::class);
        $statement->execute(array($idComment)); 
        return $statement->fetch();
    }
     /**
     * Dynamic insert prepare method
     *
     * @param array $data
     *
     * @return bool
     */
    public function createComment(string $contentComment,  int $postComment, int $userComment): bool
    {
        $req = $this->db->prepare("INSERT INTO comment (contentComment, postComment, userComment) VALUES (?, ?, ?)");
        return $req->execute(array($contentComment, $postComment, $userComment)); 
    }
    /**
     * Dynamic update prepare method
     *
     * @param integer $id
     * @param array $data
     *
     * @return bool
     */
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
            $statement = $this->db->prepare("UPDATE comment SET {$sqlRequestPart} WHERE idComment = :idComment"); 
            $statement->setFetchMode(PDO::FETCH_CLASS, Comment::class);
            return $statement->execute($data);  
    }
     /**
     * Dynamic delate prepare method
     *
     * @param integer $idComment
     *
     * @return bool
     */
    public function destroyComment(int $idComment): bool 
    {
        $statement = $this->db->prepare("DELETE FROM comment WHERE idComment = ?");
        return $statement->execute(array($idComment)); 
    }
}
