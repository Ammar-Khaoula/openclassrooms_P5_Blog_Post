<?php
namespace Src\service;
use Src\repository\UserRepository;

class UserService{
    private UserRepository $userRepository;

    public function __construct(){
        $this->userRepository =  new UserRepository();
    }
//register
    public function register(string $firstName, string $lastName , string $email, string $mp){
        if(!empty($lastName) && !empty($email) && !empty($mp)){
            $totalrows = $this->userRepository->getNumberOfUserByEmail($email);
            if($totalrows['count'] === 0){
                return $this->userRepository->saveUser($firstName,$lastName,$email,$mp); 
            }
        }
    }
    //login
    public function getUserByEmail(){
        return  $this->userRepository->getUserByEmail();    
   }


}
