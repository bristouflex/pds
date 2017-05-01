<?php

/**
 * Created by PhpStorm.
 * User: Bristouflex
 * Date: 01/05/2017
 * Time: 21:18
 */
class Cotisation
{
    private $cotisation;
    private $license;
    private $debut;
    private $prix;

    public function __construct($cotisation, $license, $debut, $prix){
        $this->cotisation = $cotisation;
        $this->license = $license;
        $this->debut = $debut;
        $this->prix = $prix;
    }

    public function getCotisation()
    {
        return $this->cotisation;
    }


    public function setCotisation($cotisation)
    {
        $this->cotisation = $cotisation;
    }


    public function getLicense()
    {
        return $this->license;
    }


    public function setLicense($license)
    {
        $this->license = $license;
    }


    public function getDebut()
    {
        return $this->debut;
    }


    public function setDebut($debut)
    {
        $this->debut = $debut;
    }


    public function getPrix()
    {
        return $this->prix;
    }


    public function setPrix($prix)
    {
        $this->prix = $prix;
    }




}