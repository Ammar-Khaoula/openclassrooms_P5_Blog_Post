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


    public function getIdUser(){
        return $this->idUser;
    }
    public function setIdUser($idUser){
        $this->idUser = $idUser;
      
    }
    public function getPhoto() : string
    {
        return $this->photo;
    }
    public function setPhoto($photo){
        $this->photo = $photo;
        return $this;
      
      
    }
    public function getCatchphrase() : string
    {
        return $this->catchphrase;
    }
    public function setCatchphrase(string $catchphrase):self
    {
        $this->catchphrase = $catchphrase;
        return $this;
      
    }
    public function getValidate() : bool
    {
        return $this->validate;
    }
    public function setValidate($validate){
        $this->validate = $validate;
      
    }
    public function getEmail() : string
    {
        return $this->email;
    }
    public function setEmail(string $email){
        $this->email = $email;
        return $this;
        
    }
    public function getMp(){
        return $this->mp;
    }
    
    public function setMp($mp){
        $this->mp = $mp;
        return $this;
    }
    public function getFirstName(){
        return $this->firstName;
    }
    
    public function setFirstName($firstName){
        $this->firstName = $firstName;
        return $this;
     
    }
    public function getLastName(){
        return $this->lastName;
    }
    
    public function setLastName($lastName){
        $this->lastName = $lastName;
        return $this;
        
    }
    public function getIsAdmin(){
        return $this->isAdmin;
    }
    
    public function setIsAadmin($isAdmin){
        $this->isAdmin = $isAdmin;
        return $this;
        
    }
    //create user session
    public function setSession(){
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
