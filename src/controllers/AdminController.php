<?php
namespace Src\Controllers;

use Src\Controllers\Controller;
use Src\service\AdminService;
use Src\service\PostService;
use Src\entity\Post;
use \Mailjet\Resources;

class AdminController extends controller{

    private AdminService $AdminService;
    private PostService $postService;


    public function __construct(){
        $this->AdminService =  new AdminService();
        $this->postService =  new PostService();
    }  
    public function validat(){
        if(isset($_SESSION['users']) && !empty($_SESSION['users']['idUser'])){
            $result = $this->AdminService->validat($_GET['idUser']);
            if ($result){
              //return header('location: /openclassrooms_P5_Blog_Post/admin/listUsers?success=true');
            }else{
            echo "pas ok";
            }
        }
    }
      // get post admin
    public function getAllPosts(){
        $posts = $this->postService->getAllpost();
        return $this->view('admin.index', compact('posts'));   
    }
    //return the form
    public function create(){
        return $this->view('admin.creatPost');
    }
    
    //process the data send in post
    public function createPost(){
        
        $title = strip_tags($_POST['title']);
        $chapo = strip_tags($_POST['chapo']);
        $content = strip_tags($_POST['content']);
        //$idUser =  $_GET['idUser'];postman
        $idUser =  $_SESSION['users']['idUser'];
        //check that user is logged in
        if(isset($_SESSION['users']) && !empty($_SESSION['users']['idUser'])){
        //we instantiate our model
        $article = new Post;
            //we hydrate
            $article->setTitle($title);
            $article->setChapo($chapo);
            $article->setContent($content);
            $article->setUserPost($_SESSION['users']['idUser']);
    
            $result = $this->AdminService->createPost($title, $chapo, $content, $idUser);
            if($result){
                return header('location: /openclassrooms_P5_Blog_Post/admin/posts');
            }else{
                echo "nn";
            }
        }       
    }
    public function editPost(){
        $post =  $this->postService->getPostById($_GET['idPost']);
        return $this->view('admin.editPost', compact('post'));
    }

    public function updatePost(){
        if(isset($_SESSION['users']) && !empty($_SESSION['users']['idUser'])){
            $result = $this->AdminService->updatePost($_GET['idPost'], $_POST);
            if($result){
                return header('location: /openclassrooms_P5_Blog_Post/admin/posts');
            }
        }else{
            http_response_code(404);
            header('location: /openclassrooms_P5_Blog_Post?error=true');
        }
       
    }
        //delete post
    public function destroyPost(){
        $result = $this->AdminService->destroyPost($_GET['idPost']);
            if($result){
                return header('location: /openclassrooms_P5_Blog_Post/admin/posts');
            }
    }
    //get all users
    public function getAllUsers(){
        $users = $this->AdminService->getAllUsers();
        return $this->view('admin.listUsers', compact('users'));
    }
    public function profil(){
        $admin = $this->AdminService->getAdmin();
        return $this->view('admin.profil', compact('admin'));
    }
    //update profil
    public function editProfil(){
        if($this->isAdmin());
            $admin = $this->AdminService->getAdmin();
        return $this->view('admin.editProfil', compact('admin'));
    }
    public function updateProfil(){
        $result = $this->AdminService->updateProfil($_GET['idUser'], $_POST);
        if($result){
        return header('location: /openclassrooms_P5_Blog_Post/profil');
    }
}
// envoyer un email avec mailjet
    public function sendMessage(){
            define('API_USER', 'b6ec5c5caa3fe42382477ac17f66e1bc');
            define('API_LOGIN', 'e558f10c03958ac47c4ff219d9fd2f6c');
            $mj = new \Mailjet\Client(API_USER, API_LOGIN, true,['version' => 'v3.1']);
        
            if(!empty($_POST['lastName']) && !empty($_POST['firstName']) && !empty($_POST['email']) && !empty($_POST['message'])){
                $lastName = htmlspecialchars($_POST['lastName']);
                $firstName = htmlspecialchars($_POST['firstName']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);
        
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $body = [
                        'Messages' => [
                            [
                                'From' => [
                                    'Email' => "khaoulabha1991@gmail.com",
                                    'Name' => "Ammar Khaoula"
                                ],
                                'To' => [
                                    [
                                        'Email' => "khaoulabha1991@gmail.com",
                                        'Name' => "Ammar Khaoula"
                                    ]
                                ],
                                'Subject' => "demande de renseignement",
                                'TextPart' => "$email, $message",
                            ]
                        ]
                    ];
                    $response = $mj->post(Resources::$Email, ['body' => $body]);
                    $response->success();
                    echo "email envoyé avec success";
        
                }else{
                    echo "email non valide";
                }
            }else{
                header('location: /openclassrooms_P5_Blog_Post/');
            }
            return $this->view('admin.profil');
    }
        //get all comment
    public function getAllComment(){
        $comment = $this->AdminService->getAllComment();
        return $this->view('admin.listComment', compact('comment'));
    }
    //validate comment
    public function validatComment(){
        if(isset($_SESSION['users']) && $_SESSION['users']['isAdmin'] == 1){
            $result = $this->AdminService->validatComment($_GET['idComment']);
            if ($result){
                //echo "ok";
                return header('location: /openclassrooms_P5_Blog_Post/admin/listComment?success=true');
            }else{
                echo "pas ok";
                return header('location: /openclassrooms_P5_Blog_Post');
    
            }
        }
       

    }
    
}
