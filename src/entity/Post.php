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
    private $auteur;

    public function getIdPost(): int
    {
        return $this->idPost;
    }
    public function setIdPost(int $idPost): self
    {
        $this->idPost = $idPost;
        return $this;
    }
    public function getIAuteur(): string
    {
        return $this->auteur;
    }
    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;
        return $this;
    }
    public function getTitle() : string
    {
        return $this->title;
    }
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
    public function getChapo() :string
    {
        return $this->chapo;
    }
    
    public function setChapo(string $chapo): self
    {
        $this->chapo = $chapo;
        return $this;
       }
    public function getDateLastUpdate(): string
    {
        return (new DateTime($this->dateLastUpdate))->format('d/m/y à H:i');
        
    }
    
    public function setDateLastUpdate($dateLastUpdate): self
    {
        $this->dateLastUpdate = $dateLastUpdate;
        return $this;
    }
    public function getUserPost(): int
    {
        return $this->userPost;
    }
    
    public function setUserPost(int $userPost): self
    {
        $this->userPost = $userPost;
        return $this;
    }
    public function getContent(): string
    {
        return $this->content;
    }
    
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

}
