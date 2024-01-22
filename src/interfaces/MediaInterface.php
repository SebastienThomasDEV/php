<?php

namespace Sebastien\Poo\interfaces;

interface MediaInterface
{
    public function emprunter(): string;
    public function rendre(): string;
    public function credit();
}