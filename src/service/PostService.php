<?php
namespace Src\service;
use Src\repository\PostRepository;
use Src\entity\DetailsArticleDTO;

class PostService
{
    private PostRepository $PostRepository;
    public function __construct(){
        $this->PostRepository =  new PostRepository();
    }

    public function getAllpost(): array
    {
        return $this->PostRepository->getAllPosts();           
    }
    public function getPostById(int $idPost): DetailsArticleDTO
    {
        return $this->PostRepository->getPostById($idPost);           
    }
}
