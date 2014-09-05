<?php
namespace GdproTool\Generator;

class ActivationKeyGenerator
{
    /**
     * Generate an activation Key
     *
     */
    static public function generate()
    {
        return sha1(UuidGenerator::v1().time());
    }
}