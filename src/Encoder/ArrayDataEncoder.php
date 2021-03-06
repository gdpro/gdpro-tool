<?php
namespace GdproTool\Encoder;

class ArrayDataEncoder
{

    /**
     * Encode following
     * @param array $data
     * @param $encodingType
     * @return array
     */
    static public function encode(array $data, $encodingType)
    {
        if($encodingType == 'utf8') {
            foreach($data as $key => $value) {
                if(is_string($value)) {
                    $data[$key] = utf8_encode($value);
                }
                if(is_array($value)) {
                    $data[$key] = self::encode($value, 'utf8');
                }
            }

            return $data;
        }

        return null;
    }
}