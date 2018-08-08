<?php

namespace Rysh\BBCode\Facades;

use Illuminate\Support\Facades\Facade;

final class BBCode extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'bbcode';
    }
}
