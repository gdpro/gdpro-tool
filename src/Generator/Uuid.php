<?php
namespace GdproTool\Generator;

use Rhumsaa\Uuid\Uuid as RhumsaaUuid;
use Rhumsaa\Uuid\Exception\UnsatisfiedDependencyException;

/**
 * Class Uuid
 *
 * This class is based on the uuid generator
 * https://github.com/ramsey/uuid
 *
 * @package GdproTool\Generator
 */
class Uuid
{
    /**
     * Create a UUID v5
     *
     */
    static public function v5()
    {
        try {
            $uuid5 = RhumsaaUuid::uuid5(RhumsaaUuid::NAMESPACE_DNS, 'php.net');
            $uuid5String = $uuid5->toString();

        } catch (UnsatisfiedDependencyException $exc) {
            throw new \Exception(__METHOD__.': Some dependency was not met or the method cannot be called on a 32 bit
            system.', $exc);
        }
        return $uuid5String;
    }
}