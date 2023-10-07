<?php
namespace Src\service;
use Src\repository\CommentRepository;
use Src\entity\Comment;

class CommentService
{
   private CommentRepository $commentRepository;

    public function __construct(){
        $this->commentRepository =  new CommentRepository();
    }
     /**
     * Get  all comment by post id
     * @return array
     */
    public function getCommentsByPostId(int $idPost): array
    {
        return $this->commentRepository->getCommentsByPostId($idPost);           
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
        return $this->commentRepository->getCommentById($idComment);           
    }
    /**
     * Dynamic insert prepare method
     *
     * @param array $data
     *
     * @return bool
     */
    public function createComment(string $contentComment, int $postComment, int $userComment): bool
    {
        return $this->commentRepository->createComment($contentComment, $postComment, $userComment);           
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
        return $this->commentRepository->updateComment($idComment,$data );       
    }
    /**
     * Dynamic delate prepare method
     *
     * @param integer $idComment
     *
     * @return bool
     */
    public function destroyComment(int $id): bool
    {
        return $this->commentRepository->destroyComment($id);       
    }
    
}
