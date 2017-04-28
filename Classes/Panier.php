<?php
require_once 'atterissage.php';
require_once 'avitaillement.php';
require_once 'bapteme.php';
require_once 'locationUlm.php';
require_once 'nettoyage.php';
require_once 'lecon.php';
require_once 'parachute.php';
require_once 'stationnement.php';

class Panier {
	private $atterissage_ = null;
	private $avitaillement_ = null;
	private $bapteme_ = null;
	private $lecon_ = null;
	private $locationUlm_ = null;
	private $nettoyage_ = null;
	private $parachute_ = null;
	private $stationnement_ = null;

	public function getAtterissage() {
		return $this->atterissage_;
	}

	public function getAvitaillement() {
		return $this->avitaillement_;
	}

	public function getBapteme() {
		return $this->bapteme_;
	}

	public function getLecon() {
		return $this->lecon_;
	}

	public function getLocationUlm() {
		return $this->locationUlm_;
	}

	public function getNettoyage() {
		return $this->nettoyage_;
	}

	public function getParachute() {
		return $this->parachute_;
	}

	public function getStationnement() {
		return $this->stationnement_;
	}

	public function setAtterissage( $atter ) {
		$this->atterissage_ = $atter;
	}

	public function setAvitaillement( $avita ) {
		$this->avitaillement_ = $avita;
	}

	public function setBapteme( $bapt ) {
		$this->bapteme_ = $bapt;
	}

	public function setLecon( $lecon ) {
		$this->lecon_ = $lecon;
	}

	public function setLocationUlm( $locat ) {
		$this->locationUlm_ = $locat;
	}

	public function setNettoyage( $nett ) {
		$this->nettoyage_ = $nett;
	}

	public function setParachute( $parachute ) {
		$this->parachute_ = $parachute;
	}

	public function setStationnement( $stat ) {
		$this->stationnement_ = $stat;
	}

	public function __toString() {
		return $this->atterissage_ . " / " . $this->avitaillement_ . " / " . $this->bapteme_ . " / " . $this->lecon_ . " / " . $this->locationUlm_ . " / " . $this->nettoyage_ . " / " . $this->parachute_ . " / " . $this->stationement_;
	}

	public function isEmpty() {
		return !$this->getAtterissage()
		   && !$this->getStationnement()
		   && !$this->getNettoyage()
		   && !$this->getAvitaillement()
		   && !$this->getBapteme()
		   && !$this->getParachute()
		   && !$this->getLecon()
		   && !$this->getLocationUlm()
		;
	}
	
	public function getTotal(){
	    $price = 0;
	    
        if ($this->getAtterissage()) {
            $price += $this->getAtterissage()->getPrix();
        }
        if ($this->getStationnement()) {
            $price += $this->getStationnement()->getPrix();
        }
        if ($this->getNettoyage()) {
            $price += $this->getNettoyage()->getPrix();
        }
        if ($this->getAvitaillement()) {
            $price += $this->getAvitaillement()->getPrix();
        }
        if ($this->getParachute()) {
            $price += $this->getParachute()->getPrix();
        }
        if ($this->getLocationUlm()) {
            $price += $this->getLocationUlm()->getPrix();
        }
        if ($this->getBapteme()) {
            $price += $this->getBapteme()->getPrix();
        }
        if ($this->getLecon()) {
            $price += $this->getLecon()->getPrix();
        }
        return $price;
    }


}
