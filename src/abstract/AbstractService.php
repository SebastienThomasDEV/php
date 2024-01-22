<?php

namespace Sebastien\Poo\abstract;

abstract class AbstractService
{
    public function print(string $message): void
    {
        echo $message . '</br>';
    }
}