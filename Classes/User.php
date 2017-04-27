<?php
/**
 *  classe utilisateur permettant de stocker toutes leurs informations
 */
class User
{
    private $id;
    private $email;
    private $credit;
    private $isMember;

    public function __construct($id, $email, $credit, $isMember)
    {
        $this->id = $id;
        $this->email = $email;
        $this->credit = $credit;
        $this->isMember = $isMember;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getIsMember(){
        return $this->isMember;
    }

    public function setIsMember($isMember){
        $this->isMember = $isMember;
    }

    public function getCredit(){
        return $this->credit;
    }

    public function setCredit($credit){
        $this->credit = $credit;
    }

    public function addCredit($value){
        $this->credit += $value;
    }

    public function remCredit($value){
        $this->credit -= $value;
    }

    public function __toString(){
        return 'id = '.$this->id.' email = '.$this->getEmail().' credit = '.$this->credit.' isMember = '.$this->isMember;
    }
}


 ?>
