<?php
namespace Src\Controllers;

use Src\Controllers\Controller;
use Src\service\UserService;
use Src\service\PostService;
use Src\service\AdminService;
use Src\entity\User;

class UserController extends Controller{

    private UserService $userService;
    private PostService $postService;
    private AdminService $AdminService;

    public function __construct(){
        $this->userService =  new UserService();
        $this->postService =  new PostService();
        $this->AdminService =  new AdminService();
    }
    public function signup(): void
    {
        $this->view('user.register');
    }
    public function signupPost(): void
    {
      $firstName = strip_tags($_POST['firstName']);
      $lastName = strip_tags($_POST['lastName']);
      $email = strip_tags($_POST['email']);
      $mp = strip_tags($_POST['mp']);
      $mp = password_hash($mp, PASSWORD_DEFAULT);

      //hydrate user
      $user = new User;
      $user->setEmail($email);
      $user->setMp($mp);

      $result= $this->userService->register($firstName, $lastName,$email,$mp);    
        if($result){
          $this->view('user.login');
        }else{
          $this->view('user.register'); 
           
        }
    }
    public function login(): void
    {
      $this->createToken();
      $this->view('user.login');
    }
    public function loginPost(): void
    {
      $this->validateToken();
        $posts = $this->postService->getAllpost();
        $admin = $this->AdminService->getAdmin();
        $user =  $this->userService->getUserByEmail(strip_tags($_POST['email']));
        if(!is_null($user) && !empty($user) && password_verify($_POST['mp'], $user->getMp())){
          //$user = true;
          if($user){ 
            $user->setSession();
            if($this->isAdmin() && $user->getValidate() == 1){
                $this->view('admin.index', compact('posts')); 
              }
              if($user->getValidate() == 1)
              {
                $this->view('admin.profil', compact('admin'));
              }
              if($user->getValidate() == 0)
              {
                $this->view('user.login');
              }
          }
        }else{
          $this->view('user.login');
        }
    }
    //disconnect the user
    public function deconnection(): void
    {
        $posts = $this->postService->getAllpost();
        session_unset();
        session_destroy();
        $this->view('blog.index', compact('posts'));
    }
}
