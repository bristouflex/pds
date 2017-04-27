<?php
class Bapteme{

  private $instructeur_;
  private $date_;
  private $bapteme_;
  private $prix_;

  public function __construct($bapt,$instruct,$prx,$date){
    $this->bapteme_ = $bapt;
    $this->instructeur_ = $instruct;
    $this->prix_ = $prx;
    $this->date_ = $date;

  }
  public function getPrix(){
    return $this->prix_;
  }
  public function getInstructeur(){
    return $this->instructeur_;
  }
  public function getDate(){
    return $this->date_;
  }
  public function getBapteme(){
    return $this->bapteme_;
  }

  public function setInstructeur($instruct){
     $this->instructeur_ = $instruct;
  }
  public function setDate($date){
     $this->date_ = $date;
  }
  public function setBapteme($bapt){
     $this->bapteme_ = $bapt;
  }
  public function setPrix($prx){
    $this->prix_ = $prx;
  }

  public function __toString(){
    return $this->instructeur_." | ".$this->date_." | ".$this->bapteme_." | ".$this->$prix_;
  }

}
 ?>
