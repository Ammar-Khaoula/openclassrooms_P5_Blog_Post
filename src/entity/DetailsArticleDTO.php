<?php
namespace Src\entity;
use DateTime;
use DateTimeZone;

class DetailsArticleDTO{
    public  $idPost;
    private $title;
    private $chapo;
    private $dateLastUpdatePost;
    private $content; 
    private $firstName;
    private $lastName;
    private $email;
    private $userPost;
    private $validate;
    private $auteur;
    
      /**
     * get the id_user_post of the post
     * @return int
     */
    public function getUserPost(): int
    {
        return $this->userPost;
    }
    /**
     * get the first_name of the user
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }
      /**
     * get the email of the user
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
      /**
     * get the last_name of the user
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
      /**
     * get the validate_compte of the user
     * @return bool
     */
    public function getValidate() : bool
    {
        return $this->validate;
    }
      /**
     * get the id_post of the post
     * @return int
     */
    public function getIdPost(): int
    {
        return $this->idPost;
    }
       /**
     * get the title of the post
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
   /**
     * get the chapo string
     */
    public function getChapo(): string
    {
        return $this->chapo;
    }
       /**
     * get the Date_last_update_post of the post
     * @return string
     */
    public function getDateLastUpdate(): string
    {
        return (new DateTime($this->dateLastUpdatePost))->format('d/m/y à H:i');       
    }
       /**
     * get the content_post of the post
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }
    /**
     * get the auteur of the user
     * @return string
     */
    public function getAuteur(): string
    {
        return $this->auteur;
    }
 /**
     * get Button read article
     * @return string
     */
    public function getButton(): string
    {        
         if(isset($_SESSION['users']) && $this->getvalidate() == 1){
            return <<<HTML
             <a href="/openclassrooms_P5_Blog_Post/post?idPost=$this->idPost" class="btnRead">lire l'article</a>
        HTML;
         }else{
            return <<<HTML
             <a href="/openclassrooms_P5_Blog_Post" class="btnRead">lire l'article</a>
        HTML;
         }
    }
}
