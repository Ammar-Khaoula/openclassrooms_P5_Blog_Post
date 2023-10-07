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

       /**
     * get the Date_last_update_comment of the comment
     * @return string
     */
    public function getDateLastUpdateComment(): string
    {
        return (new DateTime($this->dateLastUpdateComment))->format('d/m/y à H:i');       
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
     * get the id_comment of the comment
     * @return int
     */
    public function getIdComment(): int
    {
        return $this->idComment;
    }
       /**
     * get the validate_comment of the comment
     * @return bool
     */
    public function getValidateComment(): bool
    {
        return $this->validateComment;
    }
   /**
     * get the content_comment of the comment
     * @return string
     */
    public function getContentComment(): string
    {
        return $this->contentComment;
    }
   /**
     * get the user_comment of the comment
     * @return int
     */
    public function getUserComment(): int
    {
        return $this->userComment ;
    }
    /**
     * get the id_post_comment of the comment
     * @return int
     */
    public function getPostComment(): int
    {
        return $this->postComment;
    }
}
