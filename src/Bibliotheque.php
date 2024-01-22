<?php

namespace Sebastien\Poo;

class Bibliotheque
{
    private array $medias = [];


    public function __construct(private Membre $owner) {}

    public function ajouterMedia(Media $media): string
    {
        $this->medias[] = $media;
        return "Le média {$media->getTitre()} a bien été ajouté";
    }

    public function supprimerMedia(Media $media): string
    {
        $index = array_search($media, $this->medias);
        unset($this->medias[$index]);
        return "Le média {$media->getTitre()} a bien été supprimé";
    }


    public function getOwner(): Membre
    {
        return $this->owner;
    }

    public function getMedias(): array
    {
        return $this->medias;
    }







}