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
class UuidGenerator
{
    /**
     * Create a UUID v1
     *
     */
    static public function v1()
    {
        try {
            $uuid = RhumsaaUuid::uuid1();
            $uuidString = $uuid->toString();

        } catch (UnsatisfiedDependencyException $exc) {
            throw new \Exception(__METHOD__.': Some dependency was not met or the method cannot be called on a 32 bit
            system.', $exc);
        }

        return $uuidString;
    }

    /**
     * Create a UUID v5sudos
     *
     * @return string
     * @throws \Exception
     */
    static public function v5()
    {
        try {
            $uuid = RhumsaaUuid::uuid5(RhumsaaUuid::NAMESPACE_DNS, 'php.net');
            $uuidString = $uuid->toString();

        } catch (UnsatisfiedDependencyException $exc) {
            throw new \Exception(__METHOD__.': Some dependency was not met or the method cannot be called on a 32 bit
            system.', $exc);
        }

        return $uuidString;
    }

    static public function short()
    {
        return substr(self::v1(), 0, 8);
    }
}