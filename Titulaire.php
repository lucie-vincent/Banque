<?php

class Titulaire {

    //attributs - propriétés
    private string $_nom;
    private string $prenom;
    private DateTime $_dateNaissance;
    private string $_ville;
    private array $_comptesBancaires;

    // constructeur
    public function __construct(string $nom, string $prenom, string $dateNaissance, string $ville) {

        $this->_nom = $nom;
        $this->_prenom = $prenom;
        $this->_dateNaissance = new DateTime($dateNaissance);
        $this->_ville = $ville;
        $this->_comptesBancaires = [];
    }

    //accesseurs - getters
    public function getNom() : string {
        return $this->_nom;
    }

    public function getPrenom() : string {
        return $this->_prenom;
    }

    public function getDateNaissance() : DateTime {
        return $this->_dateNaissance;
    }

    public function getVille() : string {
        return $this->_ville;
    }

    public function getComptesBancaires() : array {
        return $this->_comptesBancaires;
    }

    //mutateurs - setters
    public function setNom(string $nom) {
        $this->_nom = $nom;
    }

    public function setPrenom(string $prenom) {
        $this->_prenom = $prenom;
    }

    public function setDateNaissance(DateTime $dateNaissance) {
        $this->_dateNaissance = $dateNaissance;
    }

    public function setComptesBancaires(array $comptesBancaires) {
        $this->_comptesBancaires = $comptesBancaires;
    }

    //méthodes

    public function calculAge() {
        $dateCourante = new DateTime;
        $interval = date_diff($this->_dateNaissance, $dateCourante);
        return $interval->format("%y ans");
    }

    public function addCompteBancaire(CompteBancaire $compteBancaire) {
        $this->_comptesBancaires[] = $compteBancaire;

    }

    public function afficherInfosTitulaire() {
        $resultat = "<h2>Informations de $this</h2>
                    <p>Nom : $this->_nom</p>
                    <p>Prenom : $this->_prenom</p>
                    <p>Age : " . $this->calculAge() . " </p>
                    <p>Comptes bancaires : ";
        foreach ($this->_comptesBancaires as $compteBancaire) {
            $resultat .= $compteBancaire . " </p>" ;
        }  
        return $resultat;
    }

    public function __toString() {
        return "$this->_prenom $this->_nom <br>";
    }

}