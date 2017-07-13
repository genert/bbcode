<?php
/**
 * Created by PhpStorm.
 * User: genertorg
 * Date: 13/07/2017
 * Time: 15:17
 */

namespace Genert\BBCode\Facades;

use Illuminate\Support\Facades\Facade;

final class BBCode extends Facade {
    protected static function getFacadeAccessor()
    {
        return 'bbcode';
    }
}
