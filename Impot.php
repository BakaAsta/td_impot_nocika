<?php

class Impot
{
    const revenu_inf_egal_15k = 0.15;
    const revenu_supp_15k = 0.2;

    private $montant_impot;

    public $salaire;

    private $nom;
    private $date_creation;


    /**
     * @param double $salaire
     */
    public function __construct($nom, $salaire_utilisateur)
    {
        $this->nom = $nom;
        $this->salaire = $salaire_utilisateur;
        $this->montant_impot = 0;
        $this->date_creation = new DateTime('now');
    }

    // on pars sur l'heure pour l'instant en terme de monnaire, probablement ensuite
    // en fonction du pays on pourra ajuster ca dnas les paramètre de la fonction
    public function afficheImpot() {
        return $this->getNom() . " votre impot est de " . $this->getMontantImpot() . "€";
    }

    public function getNom()
    {
        return  $this->nom;
    }

    /**
     * @return mixed
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    public function getTauxImpot()
    {
        return $this->getSalaire() <= 15000 ? self::revenu_inf_egal_15k : self::revenu_supp_15k;
    }

    public function getDateCreation(): DateTime
    {
        return $this->date_creation;
    }



    /**
     * @return double
     */
    public function getMontantImpot()
    {
        return $this->montant_impot;
    }

    public function calculImpot($salaire) {
        $this->montant_impot = $salaire <= 15000 ? self::revenu_inf_egal_15k * $salaire : self::revenu_supp_15k * $salaire;
    }
}