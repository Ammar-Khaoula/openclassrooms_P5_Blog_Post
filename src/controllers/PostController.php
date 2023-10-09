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
     /**
     * Display : All posts
     *
     * @return void
     */
    public function getAllPost(): void
    {
        $posts = $this->postService->getAllpost();
        $this->view('blog.index', compact('posts'));
    }

    /**
     * Display : Post details
     *
     * @param integer $postId ID of the post to recover
     *
     * @return void
     */
    public function getPostById(): void
    {
        $post =  $this->postService->getPostById($_GET['idPost']);   
        $comment = $this->commentService->getCommentsByPostId($_GET['idPost']);
        $this->view('blog.post', compact('post', 'comment'));
    }
    /**
     * display : Check comment for create new commentaire
     *
     * @return void
     */
    public function createComments(): void
    {
        $post =  $this->postService->getPostById($_GET['idPost']);
        $this->view('blog.createComment', compact('post'));
    }
     /**
     * Validate form : Create new comment
     *
     * @param integer $postId ID of the post to link comment
     *
     * @return bool
     */
    public function createComment(): bool
    {
            $contentComment = strip_tags($_POST['contentComment']);
            $userComment =  $_SESSION['users']['idUser'];
            $postComment  = $_GET['idPost'];
            $result = $this->commentService->createComment($contentComment, $postComment , $userComment);   
                if($result){
                    header('location: /openclassrooms_P5_Blog_Post/post?idPost='.$postComment );                    return true;
                }else{
                    return false;
                }
    }
     /**
     * Display : comment details
     *
     * @param integer $commentId ID of the comment to recover
     *
     * @return void
     */
    public function commentbById(): void
    {
        $comments = $this->commentService->getCommentById($_GET['idComment']);
        if($comments->getUserComment () !== $_SESSION['users']['idUser']){
            header('location: '.$_SERVER['HTTP_REFERER']);
        }
        $this->view('blog.editComment', compact('comments'));
    }

     /**
     * Validate form : update comment
     *
     * @param integer $id ID of the comment to be update
     *
     * @return void
     */
    public function updateComment(): void
    {
            $result = $this->commentService->updateComment($_GET['idComment'], $_POST);
        if($result){
            echo "votre commentaire est modifier avec succes"; 
        }        
    }
    /**
     * Validate form : Delete comment
     *
     * @param integer $id ID of the comment to be deleted
     *
     * @return void
     */
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
