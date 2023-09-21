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
    private $idUser;
    private $catchphrase;
    private $photo;
    private $validate;
    private $auteur;
    
    public function getUserPost(): int
    {
        return $this->userPost;
    }
    public function setUserPost(int $userPost): self
    {
        $this->userPost = $userPost;
        return $this;
    }
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getLastName(): string
    {
        return $this->lastName;
    }
    public function getValidate() : bool
    {
        return $this->validate;
    }
  
    public function getIdPost(): int
    {
        return $this->idPost;
    }
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getChapo(): string
    {
        return $this->chapo;
    }
    
    public function getPhoto(): string
    {
        return $this->photo;
    }
    
    public function getDateLastUpdate(): string
    {
        return (new DateTime($this->dateLastUpdatePost))->format('d/m/y à H:i');       
    }
       public function getContent(): string
       {
        return $this->content;
    }
    public function getAuteur(): string
    {
        return $this->auteur;
    }
    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;
        return $this;
    }

        //create user session
    public function setSession()
    {
        $_SESSION['users'] = [
            'idUser' =>$this->idUser,
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'catchphrase' =>$this->catchphrase,
            'photo' => $this->photo,
            'validate'=> $this->validate
        ];
            
    }
    public function getButton(): string{        
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
