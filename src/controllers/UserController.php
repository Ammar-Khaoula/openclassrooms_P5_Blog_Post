<?php
namespace Src\Controllers;

use Src\Controllers\Controller;
use Src\service\UserService;
use Src\service\PostService;
use Src\entity\User;

class UserController extends Controller
{

    private UserService $userService;
    private PostService $postService;

    public function __construct(){
        $this->userService =  new UserService();
        $this->postService =  new PostService();
    }
     /**
     * Display form : Signup for create new user account
     *
     * @return void
     */
    public function signup(): void
    {
        $this->view('user.register');
    }
    /**
     * Validate form : Create new user account
     *
     * @return void
     */
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
          header('location: /openclassrooms_P5_Blog_Post/login?success=true');
        }else{
          header('location: /openclassrooms_P5_Blog_Post/signup?error=true');  
           
        }
    }
    /**
     * Display form : Login
     *
     * @return void
     */
    public function login(): void
    {
      $this->createToken();
      $this->view('user.login');
    }
    /**
     * Validate form : Check user data and connect
     *
     * @return void
     */
    public function loginPost(): void
    {
      $this->validateToken();
        $user =  $this->userService->getUserByEmail(strip_tags($_POST['email']));
        if($user && password_verify($_POST['mp'], $user->getMp())){
            $user->setSession();
            if($this->isAdmin() && $user->getValidate() == 1){
              header('location: /openclassrooms_P5_Blog_Post/admin/posts?success=true'); 
              }
              else if($user->getValidate() == 1)
              {
                header('location: /openclassrooms_P5_Blog_Post/profil');
              }
              else if($user->getValidate() == 0)
              {
                header('location: /openclassrooms_P5_Blog_Post/login?error=true');
              }
        }
        else{
          header('location: /openclassrooms_P5_Blog_Post/login?message=true');
        }
    }
    /**
     * Destroy session and redirect
     *
     * @return void
     */
    public function deconnection(): void
    {
        $posts = $this->postService->getAllpost();
        session_unset();
        session_destroy();
        $this->view('blog.index', compact('posts'));
    }
}
