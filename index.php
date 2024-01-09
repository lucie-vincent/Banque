<?php

spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});


$lucieVincent = new Titulaire("VINCENT", "Lucie", "1994-11-22", "STRASBOURG");

echo $lucieVincent->afficherInfosTitulaire();