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
    public function getAdmin(): User
    {
        return  $this->AdminRepository->getAdmin();    
    }
    public function validat(int $idUser): bool
    {
        return $this->AdminRepository->validat($idUser);           
    }
    public function createPost(string $title, string $chapo, string $content, int $userPost): bool
    {
        return $this->AdminRepository->createPost($title, $chapo, $content, $userPost);           
    }
    public function updatePost(int $idPost, array $data): bool
    {
        return $this->AdminRepository->updatePost($idPost, $data);       
    }

    public function destroyPost(int $idPost): bool
    {
        return $this->AdminRepository->destroyPost($idPost);       
    }
    public function getAllUsers(): array
    {
        return $this->AdminRepository->getAllUsres();           
    }
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

    public function getAllComment(): array
    {
        return $this->AdminRepository->getAllComment();           
    }
    public function validatComment(int $idComment): bool
    {
        return $this->AdminRepository->validatComment($idComment);           
    }

}
