<?php
namespace GdproTool\Formatter\String;


/**
 * Class AppendEllipsisFormatter
 *
 * Set of method to help out with content formatting
 * @package Blur\Helper
 */
class AppendEllipsisFormatter
{

    /**
     * Adjust the text to a length and add Ellipsis if cutted
     *
     * @param $text
     * @param $length
     * @param bool $cutWord
     * @internal param $lenght
     * @return string
     */
    public function appendEllipsis($text, $length, $cutWord = false)
    {
        // If the text length is equal or inf to the length we return it
        if(strlen($text) <= $length) {
            return $text;
        }

        if ($cutWord) {
            $length -= 3; // Space reserved for hyphen
            $text = substr($text, 0, $length);
        } else {
            // As long as $length of description superior to $descriptionLenght
            while (strlen($text) > $length) {
                // Delete last world of the sentence
                $lastSpacePosition = strrpos($text, " ");
                $text = substr($text, 0, $lastSpacePosition);
            }
        }

        $text .= '...';

        return $text;
    }
}