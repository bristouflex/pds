<?php
class stationnement{
  private $abris_;
  private $categorie_;
  private $debut_;
  private $fin_;
  private $prix;


  public function __construct($abr,$ctgr,$dbt,$fn){
    $this->abris_ = $abr;
    $this->categorie_ = $ctgr;
    $this->debut_ = $dbt;
    $this->fin_ = $fn;
    $this->prix_ = $prx;
  }

  public function getAbris(){
    return $this->abris_;
  }
  public function getCategorie(){
    return $this->categorie_;
  }

  public function getDebut(){
    return $this->debut_;
  }
  public function getFin(){
    return $this->fin;
  }
  public function getPrix(){
    return $this->prix_;
  }

  public function setAbris($abr){
    $this->abris_ = $abr;
  }
  public function setCategorie($ctgr){
    $this->categorie_ = $ctgr;
  }

  public function setDebut($dbt){
    $this->debut_ = $dbt;
  }
  public function setFin($fn){
    $this->fin_ = $fn;
  }
  public function setPrix($prx){
  $this->prix_ = $prx;
  }


  public function __toString(){
    return $this->abris_." | ".$this->categorie_." | ".$this->debut_." | ".$this->fin_." | ".$this->$prix_;
  }

}

 ?>
