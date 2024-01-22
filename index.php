<?php

use Sebastien\Poo\Bibliotheque;
use Sebastien\Poo\Livre;
use Sebastien\Poo\Membre;
use Sebastien\Poo\Film;

require_once 'vendor/autoload.php';

$livre = new Livre(
    titre: 'Le seigneur des anneaux',
    auteur: 'J.R.R. Tolkien',
    disponible: true,
    isbn: 9782070612360
);

$film = new Film(
    titre: 'Le seigneur des anneaux',
    auteur: 'Peter Jackson',
    disponible: true,
    duree: new \DateTimeImmutable('03:48:00')
);

$membre = new Membre(
    id: 1,
    nom: 'John',
    email: 'john@mail.com',
);

$membre->createBibliotheque();
$membre->emprunter($livre);
$membre->rendre($livre);
$membre->clearBibliotheque();
$membre->rendre($livre);
$membre->emprunter($film);
$membre->afficherFilms();

