<?php

namespace Sebastien\Poo;

class Livre extends Media
{
    public function __construct(
        string      $titre,
        string      $auteur,
        public bool $disponible,
        public int  $isbn
    )
    {
        parent::__construct($titre, $auteur, $disponible);
    }

}