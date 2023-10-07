<?php
namespace Src\service;
use Src\repository\AdminRepository;
use Src\entity\Comment;
use Src\entity\User;

class AdminService
{
   private AdminRepository $AdminRepository;


    public function __construct(){
        $this->AdminRepository =  new AdminRepository();
    }
    /**
     * Get admin for dashboard
     * @return User
     */
    public function getAdmin(): User
    {
        return  $this->AdminRepository->getAdmin();    
    }
    /**
     * Dynamic update prepare method
     *
     * @param int $idUser
     *
     * @return bool
     */
    public function validat(int $idUser): bool
    {
        return $this->AdminRepository->validat($idUser);           
    }
    /**
     * Dynamic insert prepare method
     *
     * @param array $data
     *
     * @return bool
     */
    public function createPost(string $title, string $chapo, string $content, string $auteur, int $userPost): bool
    {
        return $this->AdminRepository->createPost($title, $chapo, $content, $auteur, $userPost);           
    }
    /**
     * Dynamic update prepare method
     *
     * @param integer $id
     * @param array $data
     *
     * @return bool
     */
    public function updatePost(int $idPost, array $data): bool
    {
        return $this->AdminRepository->updatePost($idPost, $data);       
    }
    /**
     * Dynamic delate prepare method
     *
     * @param integer $idPost
     *
     * @return bool
     */
    public function destroyPost(int $idPost): bool
    {
        return $this->AdminRepository->destroyPost($idPost);       
    }
    /**
     * Get  all Users for dashboard
     * @return array
     */
    public function getAllUsers(): array
    {
        return $this->AdminRepository->getAllUsres();           
    }
     /**
     * Dynamic update prepare method
     *
     * @param integer $id
     * @param string $pathPhoto
     * @param array $data
     *
     * @return bool
     */
    public function updateProfil(int $idUser, array $data): bool
    {
        $pathPhoto="";
        if(!empty($_FILES['photo']['full_path']) && $_FILES['photo']['size'] <= 3000000){
          $infoImage = pathinfo($_FILES['photo']['name']);
          $extentionImage = $infoImage['extension'];  
          $extentionArray = array('png', 'gif', 'jpg', 'jpeg');
          $pathPhoto = 'images/'.$infoImage['basename'];
          if(in_array($extentionImage, $extentionArray)){
              move_uploaded_file($_FILES['photo']['tmp_name'], $pathPhoto);
      }
      }
        return $this->AdminRepository->updateProfil($idUser, $data, $pathPhoto);       
    }
     /**
     * Get  all comment for dashboard
     * @return array
     */
    public function getAllComment(): array
    {
        return $this->AdminRepository->getAllComment();           
    }
     /**
     * Dynamic update prepare method
     *
     * @param int $idComment
     *
     * @return bool
     */
    public function validatComment(int $idComment): bool
    {
        return $this->AdminRepository->validatComment($idComment);           
    }

}
