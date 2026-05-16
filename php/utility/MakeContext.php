<?php
declare(strict_types=1);

// YuGiOh SDK utility: make_context

require_once __DIR__ . '/../core/Context.php';

class YuGiOhMakeContext
{
    public static function call(array $ctxmap, ?YuGiOhContext $basectx): YuGiOhContext
    {
        return new YuGiOhContext($ctxmap, $basectx);
    }
}
