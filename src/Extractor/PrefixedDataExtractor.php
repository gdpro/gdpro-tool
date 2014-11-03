<?php
namespace GdproTool\Extractor;

class PrefixedDataExtractor
{
    /**
     * Extract
     *
     * Permit to extract prefixed data from a data array.
     * The data key should be of type "prefix-myData"
     */
    static public function extract($data, $prefix)
    {
        $prefixedData = [];
        foreach($data as $key => $value) {
            $part = explode('-', $key);

            if($part[0] == $prefix) {
                $newKey = $part[1];
                $prefixedData[$newKey] = $value;
            }
        }

        return $prefixedData;
    }
}
