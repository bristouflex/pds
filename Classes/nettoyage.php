<?php
class Nettoyage{
    private $produit_;
    private $debut_;
    private $prix_;

    public function __construct($prdt,$dbt,$prx){
      $this->produit_ = $prdt;
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

    public function setProduit($prdt){
      $this->produit_ = $prdt;
    }
    public function setDebut($dbt){
      $this->debut_ = $dbt;
    }
    public function setPrix($prx){
      $this->prix_ = $prx;
    }

    public function __toString(){
      return $this->produit_." | ".$this->debut_." | ".$this->$prix_;
    }









}
 ?>
