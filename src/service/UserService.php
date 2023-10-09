<?php
namespace Src\service;

use Src\entity\User;
use Src\repository\UserRepository;

class UserService{
    private UserRepository $userRepository;

    public function __construct(){
        $this->userRepository =  new UserRepository();
    }

    /**
     * Dynamic insert query method
     *
     * @param array $data
     *
     * @return bool
     */
    public function register(string $firstName, string $lastName , string $email, string $mp): bool
    {
        if(!empty($lastName) && !empty($email) && !empty($mp)){
            $totalrows = $this->userRepository->getNumberOfUserByEmail($email);
            if($totalrows['count'] === 0){
                return $this->userRepository->saveUser($firstName,$lastName,$email,$mp); 
            }else{
                return false;
            }
        }
    }
    /**
     * Get email by Id with User
     * @return User|bool
     */
    public function getUserByEmail(string $email): User|bool
    {
        return $this->userRepository->getUserByEmail($email);
    }
}
