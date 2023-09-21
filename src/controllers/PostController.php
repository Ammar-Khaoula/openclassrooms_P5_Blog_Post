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
            $result = $this->commentService->createComment($contentComment, $postComment , $userComment);   
                if($result){
                    header('location: /openclassrooms_P5_Blog_Post/post?idPost='.$postComment );
                    return true;
                }else{
                    return false;
                }
    }
        //get comment by id
    public function commentbById()
    {
        $comment = $this->commentService->getCommentById($_GET['idComment']);
        if($comment->getUserComment () !== $_SESSION['users']['idUser']){
            header('location: '.$_SERVER['HTTP_REFERER']);
        }
        $this->view('blog.editComment', compact('comment'));
    }

    //update Comment
    public function updateComment(): bool
    {
            $result = $this->commentService->updateComment($_GET['idComment'], $_POST);
        if($result){
            header('location: /openclassrooms_P5_Blog_Post');
            return  true;
        }        
    }
       //delete comment
    public function destroyComment(): bool
    { 
       $comment = $this->commentService->getCommentById($_GET['idComment']);
        if($_SESSION['users']['idUser'] == $comment->getUserComment()){
            $result = $this->commentService->destroyComment($_GET['idComment']);
            if($result){   
                header('location: '.$_SERVER['HTTP_REFERER']);
                return true;
            }
            }else{
                header('location: '.$_SERVER['HTTP_REFERER']);
                return false;
            }
    }

    
}
