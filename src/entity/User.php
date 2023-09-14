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


    public function getIdUser(): int
    {
        return $this->idUser;
    }
    public function setIdUser(int $idUser){
        $this->idUser = $idUser;
        return $this;
      
    }
    public function getPhoto() : string
    {
        return $this->photo;
    }
    public function setPhoto(string $photo){
        $this->photo = $photo;
        return $this;
      
      
    }
    public function getCatchphrase() : string
    {
        return $this->catchphrase;
    }
    public function setCatchphrase(string $catchphrase)
    {
        $this->catchphrase = $catchphrase;
        return $this;
      
    }
    public function getValidate() : bool
    {
        return $this->validate;
    }
    public function setValidate(bool $validate){
        $this->validate = $validate;
      return $this;
    }
    public function getEmail() : string
    {
        return $this->email;
    }
    public function setEmail(string $email){
        $this->email = $email;
        return $this;
        
    }
    public function getMp(): string
    {
        return $this->mp;
    }
    
    public function setMp(string $mp){
        $this->mp = $mp;
        return $this;
    }
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    
    public function setFirstName(string $firstName){
        $this->firstName = $firstName;
        return $this;
     
    }
    public function getLastName(): string
    {
        return $this->lastName;
    }
    
    public function setLastName(string $lastName){
        $this->lastName = $lastName;
        return $this;
        
    }
    public function getIsAdmin(): bool
    {
        return $this->isAdmin;
    }
    
    public function setIsAadmin(bool $isAdmin){
        $this->isAdmin = $isAdmin;
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
            'isAdmin'=> $this->isAdmin
        ];
        
    } 
}
