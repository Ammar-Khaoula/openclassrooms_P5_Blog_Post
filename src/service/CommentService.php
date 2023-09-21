<?php
namespace Src\service;
use Src\repository\CommentRepository;
use Src\entity\DetailsCommentesDTO;

class CommentService
{
   private CommentRepository $commentRepository;

    public function __construct(){
        $this->commentRepository =  new CommentRepository();
    }
    public function getCommentsByPostId(int $idPost): array
    {
        return $this->commentRepository->getCommentsByPostId($idPost);           
    }
    public function getCommentById(int $idComment)
    {
        return $this->commentRepository->getCommentById($idComment);           
    }
    public function createComment(string $contentComment, int $postComment, int $userComment): bool
    {
        return $this->commentRepository->createComment($contentComment, $postComment, $userComment);           
    }
    public function updateComment(int $idComment, array $data): bool
    {
        return $this->commentRepository->updateComment($idComment,$data );       
    }
    public function destroyComment(int $id): bool
    {
        return $this->commentRepository->destroyComment($id);       
    }
    
}
