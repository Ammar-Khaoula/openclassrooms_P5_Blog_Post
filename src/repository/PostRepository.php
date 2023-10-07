<?php
namespace Src\repository;
use PDO;
use Src\entity\DetailsArticleDTO;
use Src\repository\AbstractRepository;

class PostRepository extends AbstractRepository
{
    /**
     * Get  all Post for dashboard
     * @return array
     */
    public function getAllPosts(): array
    {
        $statement = $this->db->prepare("SELECT * FROM posts as p, users as u WHERE p.userPost = u.idUser ORDER BY dateLastUpdatePost DESC");
        $statement->setFetchMode(PDO::FETCH_CLASS, DetailsArticleDTO::class);
        $statement->execute(); 
        return $statement->fetchAll();
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
        $statement =  $this->db->prepare("SELECT * FROM posts as p, users as u WHERE p.userPost = u.idUser AND idPost = ?");
        $statement->setFetchMode(PDO::FETCH_CLASS, DetailsArticleDTO::class);
        $statement->execute(array($idPost)); 
        return $statement->fetch();
    }
}
