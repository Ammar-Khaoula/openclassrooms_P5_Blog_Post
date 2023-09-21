<?php
namespace Src\entity;
use DateTime;

class Comment{

    private $idComment;
    private $validateComment;
    private $contentComment;
    private $userComment;
    private $postComment;
    private $dateLastUpdate;
  

    public function getIdComment(): int 
    {
        return $this->idComment;
    }
    public function setIdComment(int $idComment): self
    {
        $this->idComment = $idComment;
        return $this;
      
    }

    public function getValidateComment(): bool
    {
        return $this->validateComment;
    }
    public function setValidateComment(bool $validateComment): self
    {
        $this->validateComment = $validateComment;
        return $this;
      
    }
    public function getContentComment(): string
    {
        return $this->contentComment;
    }
    public function setContent(string $contentComment): self
    {
        $this->contentComment = $contentComment;
        return $this;
        
    }
    
    public function getUserComment(): int
    {
        return $this->userComment ;
    }
    
    public function setUserComment (int $userComment): self
    {
        $this->userComment  = $userComment ;
        return $this;
        
    }
    public function getPostComment(): int
    {
        return $this->postComment;
    }
    
    public function setPostComment(int $postComment ): self
    {
        $this->postComment  = $postComment ;
        return $this;    
    }
    public function getDateLastUpdateComment(): string
    {
        return (new DateTime($this->dateLastUpdate))->format('d/m/y à H:i');       
    }
    public function setDateLastUpdate($dateLastUpdate): self
    {
        $this->dateLastUpdate = $dateLastUpdate;
        return $this;
    }
}
