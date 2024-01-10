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
        $resultat = "<h2> Informations du $this de $this->_titulaire </h2>
                    Solde : $this->_solde $this->_devise <br> 
                    ------------------------------------------------------------<br>";
        return $resultat;
    }

    public function afficherSolde() {
        echo "Le solde de $this est de : $this->_solde $this->_devise <br>";
    }

    public function crediter(float $montantCredit) {
        echo "<h3>Demande de crédit : </h3>";
        $this->afficherSolde();
        $this->_solde += $montantCredit;
        echo "Le compte $this a bien été crédité d'un montant de : $montantCredit $this->_devise. <br>";
        $this->afficherSolde();
        echo "------------------------------------------------------------<br>";
    }

    public function debiter(float $montantDebit) {
        $this->afficherSolde();
        echo "<h3>Demande de débit : </h3>";
        if($this->_solde <=0) {
            echo "Le solde de $this est négatif. Ce compte ne peut être débité.<br>";
            echo "------------------------------------------------------------<br>";
        }
        else if($montantDebit >= $this->_solde) {
            echo "Le montant à débiter dépasse le solde du compte $this. Ce compte ne peut être débité d'un montant de $montantDebit $this->_devise. <br> ";
            echo "------------------------------------------------------------<br>";
        }
        else {
            $this->_solde -= $montantDebit;
            echo "Le compte $this a bien été débité d'un montant de : $montantDebit $this->_devise. <br>";
            $this->afficherSolde();
            echo "------------------------------------------------------------<br>";
        }
    }

    public function effectuerVirement($compteCible, float $montantVirement) {
        echo "<h3>Demande de virement : </h3>";
        $this->debiter($montantVirement);
        $compteCible->crediter($montantVirement);
        echo "Le virement d'un montant de $montantVirement $this->_devise a bien été effectué depuis le compte $this vers le compte $compteCible.<br>";
        $this->afficherSolde();
        echo "Le solde de $compteCible est de : $compteCible->_solde $this->_devise"; 
        echo "<br>------------------------------------------------------------<br>";
    }


    public function __toString() {
        return "$this->_libelle";
    }

}