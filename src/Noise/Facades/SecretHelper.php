<?php

use KrisanAlfa\Kraken\Facade;

class SecretHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Noise\\Helper\\Contract\\SecretHelperInterface';
    }
}
