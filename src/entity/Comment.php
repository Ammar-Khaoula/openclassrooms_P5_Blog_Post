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
  
     /**
     * get the id of the comment
     * @return int
     */
    public function getIdComment(): int 
    {
        return $this->idComment;
    }
     /**
     * set the id of the comment
     * @return self
     */
    public function setIdComment(int $idComment): self
    {
        $this->idComment = $idComment;
        return $this;
    }
     /**
     * get the validate of the comment
     * @return bool
     */
    public function getValidateComment(): bool
    {
        return $this->validateComment;
    }
     /**
     * set the validate of the comment
     * @return self
     */
    public function setValidateComment(bool $validateComment): self
    {
        $this->validateComment = $validateComment;
        return $this;
    }
     /**
     * get the content of the comment
     * @return string
     */
    public function getContentComment(): string
    {
        return $this->contentComment;
    }
     /**
     * set the content of the comment
     * @return self
     */
    public function setContent(string $contentComment): self
    {
        $this->contentComment = $contentComment;
        return $this;     
    }
    /**
     * get the id_user of the comment
     * @return int
     */
    public function getUserComment(): int
    {
        return $this->userComment ;
    }
    /**
     * set the id_user of the comment
     * @return self
     */
    public function setUserComment (int $userComment): self
    {
        $this->userComment  = $userComment ;
        return $this;   
    }
    /**
     * get the id_post of the comment
     * @return int
     */
    public function getPostComment(): int
    {
        return $this->postComment;
    }
    /**
     * set the id_post of the comment
     * @return self
     */
    public function setPostComment(int $postComment ): self
    {
        $this->postComment  = $postComment ;
        return $this;    
    }
    /**
     * get the Date_last_update of the comment
     * @return string
     */
    public function getDateLastUpdateComment(): string
    {
        return (new DateTime($this->dateLastUpdate))->format('d/m/y à H:i');       
    }
    /**
     * set the Date_last_update of the comment
     * @return self
     */
    public function setDateLastUpdateComment(DateTime $dateLastUpdate): self
    {
        $this->dateLastUpdate = $dateLastUpdate;
        return $this;
    }
}
