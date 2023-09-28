<?php
namespace Src\Controllers;

use Src\service\PostService;
use Src\service\CommentService;
use Src\service\UserService;
use Src\entity\DetailsArticleDTO;

class PostController extends Controller
{
    private PostService $postService;
    private CommentService $commentService;
    private UserService $userService;



    public function __construct(){
        $this->postService =  new PostService();
        $this->commentService =  new CommentService();
        $this->userService =  new UserService();

        
    }
    //getAllPost
    public function getAllPost(): void
    {
        $posts = $this->postService->getAllpost();
        $this->view('blog.index', compact('posts'));
    }

       //getPostById
    public function getPostById(): void
    {
        $post =  $this->postService->getPostById($_GET['idPost']);   
        $comment = $this->commentService->getCommentsByPostId($_GET['idPost']);
        $this->view('blog.post', compact('post', 'comment'));
    }
      //create comment
    public function createComments(): void
    {
        $post =  $this->postService->getPostById($_GET['idPost']);
        $this->view('blog.createComment', compact('post'));
    }
    
    public function createComment(): bool
    {
            $contentComment = strip_tags($_POST['contentComment']);
            $userComment =  $_SESSION['users']['idUser'];//$id_user =  $_GET['idUser']
            $postComment  = $_GET['idPost'];
            $post =  $this->postService->getPostById($_GET['idPost']);   
            $comment = $this->commentService->getCommentsByPostId($_GET['idPost']);
            $result = $this->commentService->createComment($contentComment, $postComment , $userComment);   
                if($result){
                    $this->view('blog.post', compact('post', 'comment'));                    return true;
                }else{
                    return false;
                }
    }
        //get comment by id
    public function commentbById(): void
    {
        $comments = $this->commentService->getCommentById($_GET['idComment']);
        if($comments->getUserComment () !== $_SESSION['users']['idUser']){
            header('location: '.$_SERVER['HTTP_REFERER']);
        }
        $this->view('blog.editComment', compact('comments'));
    }

    //update Comment
    public function updateComment(): void
    {
            $result = $this->commentService->updateComment($_GET['idComment'], $_POST);
        if($result){
            echo "votre commentaire est modifier avec succes"; 
        }        
    }
       //delete comment
    public function destroyComment(): void
    { 
       $comment = $this->commentService->getCommentById($_GET['idComment']);
        if($_SESSION['users']['idUser'] == $comment->getUserComment()){
            $result = $this->commentService->destroyComment($_GET['idComment']);
            if($result){   
                header('location: '.$_SERVER['HTTP_REFERER']);
            }
            }else{
                header('location: '.$_SERVER['HTTP_REFERER']);
            }
    }

    
}
