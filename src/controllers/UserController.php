<?php
namespace Src\Controllers;

use Src\Controllers\Controller;
use Src\service\UserService;
use Src\entity\User;

class UserController extends Controller{

    private UserService $userService;

    public function __construct(){
        $this->userService =  new UserService();
    }
    public function signup(){
        return $this->view('user.register');
    }
    public function signupPost(){
      $firstName = strip_tags($_POST['firstName']);
      $lastName = strip_tags($_POST['lastName']);
      $email = strip_tags($_POST['email']);
      $mp = strip_tags($_POST['mp']);
      $mp = password_hash($mp, PASSWORD_DEFAULT);

      //hydrate user
      $user = new User;
      $user->setEmail($email);
      $user->setMp($mp);
      
      $result = $this->userService->register($firstName, $lastName,$email,$mp);    
        if($result){
            header('location: /openclassrooms_P5_Blog_Post/login?success=true'); 
        }else{
            header('location: /openclassrooms_P5_Blog_Post/signup?error=true'); 
        }
    }
    public function login(){
      $this->createToken();
      return $this->view('user.login');
    }
    public function loginPost(){
    $this->validateToken();
        $is_auth = false;
        $user =  $this->userService->getUserByEmail(strip_tags($_POST['email']));
          if(!is_null($user) && !empty($user) && password_verify($_POST['mp'], $user->getMp())){ 
            $is_auth = true;
          }
          if($is_auth){  
            $user->setSession();
            if($user->getIsAdmin() && $user->getValidate() == 1){
              header('location: /openclassrooms_P5_Blog_Post/admin/posts?success=true');
              }
              else if($user->getValidate() == 1)
              {
                header('location: /openclassrooms_P5_Blog_Post/profil');
              }else{
                header('location: /openclassrooms_P5_Blog_Post/login?error=true');
              }
          }else{
            die("Tentative de CSRF détectée !");
            header('location: /openclassrooms_P5_Blog_Post/login?message=true');
          }
    }
    //disconnect the user
    public function deconnection(): void
    {
        session_unset();
        session_destroy();
        header('location: '.$_SERVER['HTTP_REFERER']);
    }
}
