<?php
namespace Src\entity;
use DateTime;
class Post{
    private $idPost;
    private $title;
    private $chapo;
    private $dateLastUpdate;
    private $userPost;	
    private $content; 

    public function getIdPost() : int
    {
        return $this->idPost;
    }
    public function setIdPost(int $idPost){
        $this->idPost = $idPost;
        return $this;
    }
    public function getTitle() : string
    {
        return $this->title;
    }
    public function setTitle(string $title){
        $this->title = $title;
        return $this;
    }
    public function getChapo() :string
    {
        return $this->chapo;
    }
    
    public function setChapo(string $chapo){
        $this->chapo = $chapo;
        return $this;
       }
    public function getDateLastUpdate()
    {
        return (new DateTime($this->dateLastUpdate))->format('d/m/y à H:i');
        
    }
    
    public function setDateLastUpdate($dateLastUpdate){
        $this->dateLastUpdate = $dateLastUpdate;
    }
    public function getUserPost(): int
    {
        return $this->userPost;
    }
    
    public function setUserPost(int $userPost){
        $this->userPost = $userPost;
        return $this;
    }
    public function getContent(): string
    {
        return $this->content;
    }
    
    public function setContent(string $content){
        $this->content = $content;
        return $this;
    }

}
