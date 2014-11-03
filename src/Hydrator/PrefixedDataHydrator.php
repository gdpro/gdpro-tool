<?php
namespace GdproTool\Hydrator;

class PrefixedDataHydrator
{
    /**
     * Extract
     *
     * Permit to extract prefixed data from a data array.
     * The data key should be of type "prefix-myData"
     */
    static public function hydrate($data, $prefix)
    {
        $prefixedData = [];
        foreach($data as $key => $value) {
            $newKey = $prefix.'-'.$key;

            $prefixedData[$newKey] = $value;
        }

        return $prefixedData;
    }
}
