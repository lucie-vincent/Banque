<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});


$lucieVincent = new Titulaire("VINCENT", "Lucie", "1994-11-22", "STRASBOURG");

$compteCourant = new CompteBancaire("Compte Courant", 150, "€", $lucieVincent);
$livretA = new CompteBancaire("Livret A", 350, "€", $lucieVincent);


echo $lucieVincent->afficherInfosTitulaire();
echo $compteCourant->afficherInfosCompteBancaire();
echo $livretA->afficherInfosCompteBancaire();
$compteCourant->crediter(150);
$compteCourant->debiter(400);
$compteCourant->crediter(1000);
echo $compteCourant->afficherInfosCompteBancaire();