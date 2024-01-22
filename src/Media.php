<?php

namespace Sebastien\Poo;

use Sebastien\Poo\interfaces\MediaInterface;

class Media
{
    private int $id;
    public function __construct(
        public string $titre,
        public string $auteur,
        public bool $disponible,
    ) {
        $this->id = rand(1, 1000);
    }


    public function credit(){

        $str = explode("\\", get_class($this));
        return $str[count($str) - 1] . " : " . $this->titre . " de " . $this->auteur;
    }


    public function emprunter(): void
    {
        $this->disponible = false;
    }

    public function rendre(): void
    {
        $this->disponible = true;
    }

    public function isDisponible(): bool
    {
        return $this->disponible;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitre(): string
    {
        return $this->titre;
    }




}