<?php
namespace GdproTool\Generator;

class ActivationKey
{
    /**
     * Generate an activation Key
     *
     */
    static public function generate()
    {
        return sha1(Uuid::v1().time());
    }
}