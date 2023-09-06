<?php
namespace Src\service;
use Src\repository\AdminRepository;
use Src\entity\Comment;

class AdminService
{
   private AdminRepository $AdminRepository;


    public function __construct(){
        $this->AdminRepository =  new AdminRepository();
    }
    public function getAdmin(){
        return  $this->AdminRepository->getAdmin();    
    }
    public function validat(int $idUser){
        return $this->AdminRepository->validat($idUser);           
    }
    public function createPost(string $title, string $chapo, string $content, int $userPost){
        return $this->AdminRepository->createPost($title, $chapo, $content, $userPost);           
    }

    public function updatePost(int $idPost, array $data){
        return $this->AdminRepository->updatePost($idPost, $data);       
    }

    public function destroyPost(int $idPost){
        return $this->AdminRepository->destroyPost($idPost);       
    }
}
