<?php
namespace Src\entity;

class User{

    private $idUser;
    private $email;
    private $mp;
    private $firstName;
    private $lastName;
    private $isAdmin;
    private $validate;
    private $catchphrase;
    private $photo;

     /**
     * get the id of the User
     * @return int
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }
     /**
     * set the id of the User
     * @return self
     */
    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;
        return $this;
    }
     /**
     * get the photo of the User
     * @return string
     */
    public function getPhoto(): string
    {
        return $this->photo;
    }
     /**
     * set the photo of the User
     * @return self
     */
    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;
        return $this;
    }
     /**
     * get the catchphrase of the User
     * @return string
     */
    public function getCatchphrase() : string
    {
        return $this->catchphrase;
    }
     /**
     * set the catchphrase of the User
     * @return self
     */
    public function setCatchphrase(string $catchphrase): self
    {
        $this->catchphrase = $catchphrase;
        return $this;
    }
     /**
     * get the validate compte of the User
     * @return bool
     */
    public function getValidate() : bool
    {
        return $this->validate;
    }
     /**
     * set the validate compte of the User
     * @return self
     */
    public function setValidate(bool $validate): self
    {
        $this->validate = $validate;
      return $this;
    }
    /**
     * get the mail of the User
     * @return string
     */
    public function getEmail() : string
    {
        return $this->email;
    }
     /**
     * set the mail of the User
     * @return self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;    
    }
     /**
     * get the pasword of the User
     * @return string
     */
    public function getMp(): string
    {
        return $this->mp;
    }
     /**
     * set the pasword of the User
     * @return self
     */
    public function setMp(string $mp): self
    {
        $this->mp = $mp;
        return $this;
    }
     /**
     * get the first_name of the User
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }
     /**
     * set the first_name of the User
     * @return self
     */
    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }
     /**
     * get the last_name of the User
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }
     /**
     * set the last_name of the User
     * @return string
     */
    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;  
    }
     /**
     * get the is_admin of the User
     * @return bool
     */
    public function getIsAdmin(): bool
    {
        return $this->isAdmin;
    }
     /**
     * set the is_admin of the User
     * @return self
     */
    public function setIsAadmin(bool $isAdmin): self
    {
        $this->isAdmin = $isAdmin;
        return $this;       
    }
     /**
     * create User Session
     * @return void
     */
    public function setSession(): void
    {
        $_SESSION['users'] = [
            'idUser' =>$this->idUser,
            'email' => $this->email,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'catchphrase' =>$this->catchphrase,
            'photo' => $this->photo,
            'isAdmin'=> $this->isAdmin,        
        ];      
    } 
}
