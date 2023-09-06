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
}
