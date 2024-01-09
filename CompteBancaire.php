<?php

class CompteBancaire {

    //attributs - propriétés
    private string $_libelle;
    private float $_solde;
    private string $_devise;
    private Titulaire $_titulaire;
    

    // constructeur
    public function __construct(string $libelle, float $solde, string $devise, Titulaire $titulaire) {
        $this->_libelle = $libelle;
        $this->_solde = $solde;
        $this->_devise = $devise;
        $this->_titulaire = $titulaire;
        $this->_titulaire->addCompteBancaire($this);
    }

    //accesseurs - getters
    public function getLibelle() : string {
        return $this->_libelle;
    }

    public function getSolde() : float {
        return $this->_solde;
    }

    public function getDevise() : string {
        return $this->_devise;
    }

    public function getTitulaire() : Titulaire {
        return $this->_titulaire;
    }

    //mutateurs - setters 
    public function setLibelle(string $libelle) {
        $this->_libelle = $libelle;
    }

    public function setSolde(float $solde) {
        $this->_solde = $solde;
    }

    public function setDevise(string $devise) {
        $this->_devise = $devise;
    }

    public function setTitulaire(Titulaire $titulaire) {
        $this->_titulaire = $titulaire;
    }


    //méthodes

    public function afficherInfosCompteBancaire() {
        $resultat = "<h2> Informations du $this </h2>
                    <p>Solde : $this->_solde $this->_devise appartient à $this->_titulaire</p>";
        return $resultat;
    }

    public function __toString() {
        return "$this->_libelle";
    }

}