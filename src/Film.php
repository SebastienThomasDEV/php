<?php

namespace Sebastien\Poo;

class Film extends Media
{
    public function __construct(
        string $titre,
        string $auteur,
        bool $disponible,
        private readonly \DateTimeImmutable $duree
    ) {
        parent::__construct($titre, $auteur, $disponible);
    }

    public function getDuree(): \DateTimeImmutable
    {
        return $this->duree;
    }
}