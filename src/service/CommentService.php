<?php
namespace Src\service;
use Src\repository\CommentRepository;
class CommentService
{
   private CommentRepository $commentRepository;

    public function __construct(){
        $this->commentRepository =  new CommentRepository();
    }
    public function getCommentsByPostId(int $idPost){
        return $this->commentRepository->getCommentsByPostId($idPost);           
    }
    public function getCommentById(int $idComment){
        return $this->commentRepository->getCommentById($idComment);           
    }
    public function createComment(string $contentComment, int $postComment, int $userComment){
        return $this->commentRepository->createComment($contentComment, $postComment, $userComment);           
    }
    public function updateComment(int $idComment, array $data){
        return $this->commentRepository->updateComment($idComment, $data);       
    }
    public function destroyComment(int $id){
        return $this->commentRepository->destroyComment($id);       
    }
}