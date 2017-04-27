<?php
class Parachute{
  private $parachute_;
  private $debut_;
  private $prix_;

  public function __construct($prcht,$prx,$dbt){
  $this->parachute_ = $prcht;
  $this->prix_ = $prx;
  $this->debut_ = $dbt;
  }

  public function getParachute(){
    return $this->parachute_ ;
  }

  public function getPrix(){
    return $this->prix_;
  }
  public function getDebut(){
    return $this->debut_;
  }

  public function setParachute($prcht){
    $this->parachute_ = $prcht;
  }
  public function setPrix($prx){
    $this->prix_ = $prx;
  }

  public function setDebut($dbt){
     $this->debut_ = $dbt;
  }

  public function __toString(){
    return $this->parachute_." | ".$this->debut_." | ".$this->$prix_;
  }

}
?>
