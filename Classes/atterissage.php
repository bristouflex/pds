<?php
class Atterissage {

  private $grpAcoustique_;
  private $frais_de_dossier_;
  private $avion_;
  private $prix_;
  private $debut_;
  private $balisage_;


  public function __construct($grpAcou,$frais,$avn,$prx,$dbt, $balisage){
    $this->grpAcoustique_ = $grpAcou;
    $this->frais_de_dossier_ = $frais;
    $this->avion_ = $avn;
    $this->prix_ = $prx;
    $this->debut_ = $dbt;
  }

  public function getGrpAcou(){
    return $this->grpAcoustique_;
  }
  public function getFrais(){
    return $this->frais_de_dossier_;
  }
  public function getAvion(){
    return $this->avion_;
  }
  public function getPrix(){
    return $this->prix_;
  }
  public function getDebut(){
    return $this->debut_;
  }
  public function getBalisage(){
    return $this->balisage_;
  }

  public function setBalisage($balisage){
    $this->balisage_ = $balisage;
  }
  public function setGrpAcoustique($grpAcou){
    $this->grpAcoustique_ = $grpAcou;
  }
  public function setFrais($frais){
    $this->frais_de_dossier_ = $frais;
  }
  public function setAvion($avn){
    $this->avion_ = $avn;
  }
  public function setPrix($prx){
    $this->prix_ = $prx;
  }
  public function setDebut($dbt){
    $this->debut_ = $dbt;
  }

  public function __toString(){
    return $this->grpAcoustique_." | ".$this->frais_de_dossier_." | ".$this->avion_." | ".$this->prix_." | ".$this->debut_;
  }


}
