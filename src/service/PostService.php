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
    /**
     * Get  all Post for dashboard
     * @return array
     */
    public function getAllpost(): array
    {
        return $this->PostRepository->getAllPosts();           
    }
    /**
     * Get Post by Id with User
     *
     * @param int $idPost
     *
     * @return DetailsArticleDTO
     */
    public function getPostById(int $idPost): DetailsArticleDTO
    {
        return $this->PostRepository->getPostById($idPost);           
    }
}
