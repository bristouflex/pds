<?php
class LocationUlm{
  private $locationUlm_;
  private $prix_;
  private $date_;

  public function __construct($locat,$prx,$date){
    $this->locationUlm_ = $locat;
    $this->prix_ = $prx;
    $this->date_ = $date;
  }
  public function getLocationUlm(){
    return $this->locationUlm_ ;
  }

  public function getPrix(){
    return $this->prix_;
  }
  public function getDate(){
    return $this->date_;
  }

  public function setLocationUlm($locat){
    $this->locationUlm_ = $locat;
  }
  public function setPrix($prx){
    $this->prix_ = $prx;
}

  public function setDate($date){
     $this->date_ = $date;
  }

  public function __toString(){
    return $this->locationUlm_." | ".$this->inscrit_." | ".$this->date_." | ".$this->$prix_;
  }

}
?>
