<?php
namespace GdproTool\Encoder;

class Utf8Encoder
{
    /**
     * Encode following
     * @param array $data
     * @return array
     */
    static public function encode(array $data)
    {
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
}
