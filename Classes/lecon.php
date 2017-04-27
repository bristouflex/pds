<?php
class Lecon{

  private $instructeur_;
  private $prix_;
  private $date_;
  private $lecon_;

  public function __construct($instruct,$prx,$date,$lcn){

    $this->instructeur_ = $instruct;
    $this->prix_ = $prx;
    $this->date_ = $date;
    $this->lecon_ = $lcn;
  }


  public function getPrix(){
    return $this->prix_;
  }
  public function getInscrit(){
    return $this->inscrit_;
  }
  public function getInstructeur(){
    return $this->instructeur_;
  }
  public function getDate(){
    return $this->date_;
  }
  public function getLecon(){
    return $this->lecon_;
  }

  public function setInscrit($inscrit){
     $this->inscrit_ = $inscrit;
  }
  public function setInstructeur($instruct){
     $this->instructeur_ = $instruct;
  }
  public function setPrix($prx){
    $this->prix_ = $prx;
  }
  public function setDate($date){
     $this->date_ = $date;
  }
  public function setLecon($lcn){
     $this->lecon_ = $lcn;
  }

  public function __toString(){
    return $this->inscrit_." | ".$this->instructeur_." | ".$this->date_." | ".$this->lecon_." | ".$this->$prix_;
  }

}
 ?>
