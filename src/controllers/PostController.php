<?php
namespace Src\Controllers;

use Src\service\PostService;
use Src\service\CommentService;
use Src\entity\User;


class PostController extends Controller
{
    private PostService $postService;
    private CommentService $commentService;


    public function __construct(){
        $this->postService =  new PostService();
        $this->commentService =  new CommentService();

        
    }
    //getAllPost
    public function getAllPost()
    {
        $posts = $this->postService->getAllpost();
        return $this->view('blog.index', compact('posts'));
    }

       //getPostById
    public function getPostById()
    {
        $post =  $this->postService->getPostById($_GET['idPost']);   
        $comment = $this->commentService->getCommentsByPostId($_GET['idPost']);
        $this->view('blog.post', compact('post', 'comment'));
    }
      //create comment
    public function createComments(){
        $post =  $this->postService->getPostById($_GET['idPost']);
            return $this->view('blog.createComment', compact('post'));
    }
    
    public function createComment(): void
    {
            $contentComment = strip_tags($_POST['contentComment']);
            $userComment =  $_SESSION['users']['idUser'];//$id_user =  $_GET['idUser']
            $postComment  = $_GET['idPost'];
            $result = $this->commentService->createComment($contentComment, $postComment , $userComment);   
                if($result){
                    header('location: /openclassrooms_P5_Blog_Post/post?idPost='.$postComment );
                }
    }
        //get comment by id
    public function commentbById()
    {
        $comment = $this->commentService->getCommentById($_GET['idComment']);
        if($comment->getUserComment () !== $_SESSION['users']['idUser']){
            header('location: '.$_SERVER['HTTP_REFERER']);
        }
        return $this->view('blog.editComment', compact('comment'));
    }

    //update Comment
    public function updateComment(): bool
    {
            $result = $this->commentService->updateComment($_GET['idComment'], $_POST);
        if($result){
            return  true; die("votre commentaire est bien modifier");
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
