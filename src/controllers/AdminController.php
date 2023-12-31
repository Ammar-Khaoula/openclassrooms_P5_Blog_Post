<?php
namespace Src\Controllers;

use Src\Controllers\Controller;
use Src\service\AdminService;
use Src\service\PostService;
use Src\service\CommentService;
use Src\entity\Post;
use \Mailjet\Resources;

class AdminController extends controller
{
    private AdminService $AdminService;
    private PostService $postService;
    private CommentService $commentService;


    public function __construct(){
        $this->AdminService =  new AdminService();
        $this->postService =  new PostService();
        $this->commentService =  new CommentService();
    }  
    /**
     * validate form : validate users
     *
     * @return bool
     */
    public function validatUser(): bool
    {
        $result = $this->AdminService->validat($_GET['idUser']);
        if ($result){
            header('location: '.$_SERVER['HTTP_REFERER']);
        }else{
            return false;
        }
    }
    
    /**
     * Display : All posts
     *
     * @return void
     */
    public function getAllPosts(): void
    {
        if($this->isAdmin()){
            $posts = $this->postService->getAllpost();
            $this->view('admin.index', compact('posts')); 
        }else{
            echo "Vous ne pouvez pas accéder à cette page";
        }
        
    }

    /**
     * display : Check post for create new post
     *
     * @return void
     */
    public function create(): void
    {
        if($this->isAdmin()){
            $this->view('admin.creatPost');
        }
        
    } 

    /**
     * Validate form : Create new post
     *
     * @return bool
     */
    public function createPost(): bool
    {
        $this->validateToken();

        $title = strip_tags($_POST['title']);
        $chapo = strip_tags($_POST['chapo']);
        $content = strip_tags($_POST['content']);
        $auteur = strip_tags($_POST['auteur']);
        $idUser =  $_SESSION['users']['idUser'];
        //we instantiate our model
        $article = new Post;
            //we hydrate
            $article->setTitle($title);
            $article->setChapo($chapo);
            $article->setContent($content);

            $result = $this->AdminService->createPost($title, $chapo, $content, $auteur, $idUser);
            if($result){
                header('location: /openclassrooms_P5_Blog_Post/admin/posts');
            }else{
                return false;
            }  
    }
   /**
     * Display form : Edit existing post
     *
     * @param integer $id ID of the post to edit
     *
     * @return void
     */
    public function editPost(): void
    { 
        if($this->isAdmin()){
            $post =  $this->postService->getPostById($_GET['idPost']);
            $this->view('admin.editPost', compact('post'));
        }
    }
      /**
     * Validate form : Edit existing post
     *
     * @param integer $id ID of the post to update
     *
     * @return void
     */
    public function updatePost(): void
    {
        if (!is_null($this->isAdmin()) && !empty($this->isAdmin())){          
            $result = $this->AdminService->updatePost($_GET['idPost'], $_POST);
            if($result){
                header('location: /openclassrooms_P5_Blog_Post/admin/posts');
            }
        }
    }
    /**
     * Validate form : Delete post
     *
     * @param integer $id ID of the post to be deleted
     *
     * @return void
     */
    public function destroyPost(): void
    {
        $this->validateToken();
        if($this->isAdmin()){
            $result = $this->AdminService->destroyPost($_GET['idPost']);
            if($result){
                header('location: /openclassrooms_P5_Blog_Post/admin/posts');
            }
        }
    }
    /**
     * Display : All users
     *
     * @return void
     */
    public function getAllUsers(): void
    {
        if($this->isAdmin()){
            $users = $this->AdminService->getAllUsers();
            $this->view('admin.listUsers', compact('users'));
        }
    }
     /**
     * display : profil user
     * @return void
     */
    public function profil(): void
    {
            $admin = $this->AdminService->getAdmin();
            $this->view('admin.profil', compact('admin'));
    }
     /**
     * display : update user
     * @return void
     */
    public function editProfil(): void
    {
        if($this->isAdmin()){
            $admin = $this->AdminService->getAdmin();
            $this->view('admin.editProfil', compact('admin'));
        }else{
            header('location: /openclassrooms_P5_Blog_Post/profil?error=true');;
        }
    }
     /**
     * Validate form : update user
     *
     * @param integer $id ID of the user to update
     *
     * @return void
     */
    public function updateProfil(): void
    {
        $result = $this->AdminService->updateProfil($_GET['idUser'], $_POST);
        $admin = $this->AdminService->getAdmin();
        $this->view('admin.profil', compact('admin'));
    }
     /**
     * Validate form : send message
     * @return void
     */
    public function sendMessage(): void
    {
            define('API_USER', 'b6ec5c5caa3fe42382477ac17f66e1bc');
            define('API_LOGIN', 'e558f10c03958ac47c4ff219d9fd2f6c');
            $mj = new \Mailjet\Client(API_USER, API_LOGIN, true,['version' => 'v3.1']);
        
            if(!empty($_POST['lastName']) && !empty($_POST['firstName']) && !empty($_POST['email']) && !empty($_POST['message'])){
                $lastName = htmlspecialchars($_POST['lastName']);
                $firstName = htmlspecialchars($_POST['firstName']);
                $email = htmlspecialchars($_POST['email']);
                $message = htmlspecialchars($_POST['message']);
                $admin = $this->AdminService->getAdmin();
        
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
                    $this->view('admin.profil', compact('admin'));    
                }else{
                    echo "email non valide";
                }
            }
    }
     /**
     * Display : get All comment
     *
     * @return void
     */
    public function getAllComment(): void
    {
        if($this->isAdmin()){
            $comment = $this->AdminService->getAllComment();
            $this->view('admin.listComment', compact('comment'));
        }
    }
    /**
     * validate form : validate comment
     *
     * @return void
     */
    public function validatComment(): void
    {
        if($this->isAdmin()){
            $result = $this->AdminService->validatComment($_GET['idComment']);
            if ($result){
                header('location: /openclassrooms_P5_Blog_Post/admin/listComment?success=true');
            }
        }
    }
    
}
