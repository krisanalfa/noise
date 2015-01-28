<?php

use KrisanAlfa\Kraken\Facade;

class ArrayHelper extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Noise\\Helper\\Contract\\ArrayHelperInterface';
    }
}
