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

     /**
     * get the id of the post
     * @return int
     */
    public function getIdPost(): int
    {
        return $this->idPost;
    }
     /**
     * set the id of the post
     * @return self
     */
    public function setIdPost(int $idPost): self
    {
        $this->idPost = $idPost;
        return $this;
    }
     /**
     * get the title of the post
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }
     /**
     * set the title of the post
     * @return self
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }
     /**
     * get the chapo of the post
     * @return string
     */
    public function getChapo() :string
    {
        return $this->chapo;
    }
     /**
     * set the chapo of the post
     * @return self
     */
    public function setChapo(string $chapo): self
    {
        $this->chapo = $chapo;
        return $this;
    }
     /**
     * get the Date_last_update_post of the post
     * @return string
     */
    public function getDateLastUpdatePost(): string
    {
        return (new DateTime($this->dateLastUpdate))->format('d/m/y à H:i');
        
    }
     /**
     * set the Date_last_update_post of the post
     * @return self
     */
    public function setDateLastUpdatePost(DateTime $dateLastUpdate): self
    {
        $this->dateLastUpdate = $dateLastUpdate;
        return $this;
    }
     /**
     * get the id_user_post of the post
     * @return int
     */
    public function getUserPost(): int
    {
        return $this->userPost;
    }
     /**
     * set the id_user_post of the post
     * @return self
     */
    public function setUserPost(int $userPost): self
    {
        $this->userPost = $userPost;
        return $this;
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
     * set the content_post of the post
     * @return self
     */
    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

}
