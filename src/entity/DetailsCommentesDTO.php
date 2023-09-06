<?php
namespace Src\entity;
use DateTime;

class DetailsCommentesDTO{
    private $idComment;
    private $validateComment;
    private $contentComment;
    private $postComment ;
    private $userComment ;
    private $firstName;
    private $lastName;
    private $email;
    private $dateLastUpdateComment;
    private $title;

    
    public function getDateLastUpdateComment(){
        return (new DateTime($this->dateLastUpdateComment))->format('d/m/y à H:i');       
    }
    public function getTitle(): string
    {
        return $this->title;
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
 public function getIdComment(): int
 {
        return $this->idComment;
    }
    
    public function getValidateComment(): bool
    {
        return $this->validateComment;
    }

    public function getContentComment(): string
    {
        return $this->contentComment;
    }

    public function getUserComment(): int
    {
        return $this->userComment ;
    }
    
    public function getPostComment(): int
    {
        return $this->postComment;
    }
}
