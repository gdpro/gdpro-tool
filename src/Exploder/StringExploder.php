<?php
namespace GdproTool\Utils;

class StringExploder
{
    /**
     * Explode String on UpperCase
     * @param $string
     * @return array
     */
    static public function explodeOnUpperCase($string)
    {
        $parts = preg_split('/(?=[A-Z])/', $string, -1, PREG_SPLIT_NO_EMPTY);

        return $parts;
    }
}
