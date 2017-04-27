<?php
class avitaillement{
  private $produit_;
  private $debut_;
  private $prix_;

public function __construct($prod,$dbt,$prx){
  $this->produit_ = $prod;
  $this->debut_ = $dbt;
  $this->prix_ = $prx;

}

public function getProduit(){
  return $this->produit_;
}
public function getDebut(){
  return $this->debut_;
}
public function getPrix(){
  return $this->prix_;
}

public function setProduit($prod){
  $this->produit_ = $prod;
}
public function setDebut($dbt){
  $this->debut_ = $dbt;
}
public function setPrix($prx){
  $this->prix_ = $prx;
}

public function __toString(){
  return $this->produit_." | ".$this->debut_." | ".$this->prix_;
}
}
 ?>
