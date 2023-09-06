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
}
