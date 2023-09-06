<?php
namespace Src\Controllers;

use Src\service\PostService;


class PostController extends Controller
{
    private PostService $postService;


    public function __construct(){
        $this->postService =  new PostService();

        
    }
    //getAllPost
    public function getAllPost(){
        $posts = $this->postService->getAllpost();
        return $this->view('blog.index', compact('posts'));
    }

       //getPostById
       public function getPostById(){
        $post =  $this->postService->getPostById($_GET['idPost']);   
        $this->view('blog.post', compact('post'));
    }

     
    
}
