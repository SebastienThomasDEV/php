<?php

namespace Sebastien\Poo;

use Sebastien\Poo\abstract\AbstractService;

class Membre extends AbstractService
{
    private Bibliotheque $bibliotheque;
    public function __construct(
        public int $id,
        public string $nom,
        public string $email,
    ) {}

    public function emprunter(Media $media): string
    {
        if (!$media->isDisponible()) {
            $message = "Le livre " . $media->getTitre() . " n'est pas disponible";
            $this->print($message);
            return $message;
        }
        $media->emprunter();
        $this->getBibliotheque()->ajouterMedia($media);
        $this->print("Le livre " . $media->getTitre() . " a bien été emprunté");
        return "Le livre " . $media->getTitre() . " a bien été emprunté" . PHP_EOL;

    }

    public function rendre(Media $media): string
    {
        if ($media->isDisponible()) {
            $message = "Vous n'avez pas emprunté le livre " . $media->getTitre();
            $this->print($message);
            return $message;
        };
        $media->rendre();
        $this->getBibliotheque()->supprimerMedia($media);
        $message = "Le livre " . $media->getTitre() . " a bien été rendu";
        $this->print($message);
        return $message;
    }

    public function getBibliotheque(): Bibliotheque
    {
        return $this->bibliotheque;
    }

    public function createBibliotheque(): string
    {
        if (!isset($this->bibliotheque)) {
            $this->bibliotheque = new Bibliotheque($this);
        } else {
            $this->print("La bibliothèque existe déjà");
            return "La bibliothèque existe déjà" . PHP_EOL;
        }
        $this->print("La bibliothèque a bien été créée");
        return "La bibliothèque a bien été créée" . PHP_EOL;
    }

    public function clearBibliotheque(): string
    {;
        foreach ($this->getBibliotheque()->getMedias() as $media) {
            $media->rendre();
            $message = $this->getBibliotheque()->supprimerMedia($media);
            $this->print($message);
        }
        $this->bibliotheque = new Bibliotheque($this);
        $this->print("La bibliothèque a bien été vidée");
        return "La bibliothèque a bien été vidée" . PHP_EOL;
    }

    public function afficherFilms(): void
    {
        foreach ($this->getBibliotheque()->getMedias() as $media) {
            if ($media instanceof Film) {
                $this->print($media->credit());
            }
        }
    }

    public function afficherLivres(): void
    {
        foreach ($this->getBibliotheque()->getMedias() as $media) {
            if ($media instanceof Livre) {
                $this->print($media->credit());
            }
        }
    }



}