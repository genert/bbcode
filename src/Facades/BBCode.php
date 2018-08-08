<?php

namespace Rysh\BBCode\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class BBCode
 * @package Rysh\BBCode\Facades
 */
final class BBCode extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bbcode';
    }
}
