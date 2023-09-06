<?php
namespace Src\service;
use Src\repository\PostRepository;

class PostService
{
    private PostRepository $PostRepository;
    public function __construct(){
        $this->PostRepository =  new PostRepository();
    }

    public function getAllpost(){
        return $this->PostRepository->getAllPosts();           
    }
    public function getPostById(int $idPost){
        return $this->PostRepository->getPostById($idPost);           
    }
}
