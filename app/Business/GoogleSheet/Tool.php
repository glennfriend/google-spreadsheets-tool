<?php
namespace App\Business\GoogleSheet;

/**
 *
 */
class Tool
{
    /**
     *  Clean invisible control characters and unused code points
     *
     *  \p{C} or \p{Other}: invisible control characters and unused code points.
     *      \p{Cc} or \p{Control}: an ASCII 0x00–0x1F or Latin-1 0x80–0x9F control character.
     *      \p{Cf} or \p{Format}: invisible formatting indicator.
     *      \p{Co} or \p{Private_Use}: any code point reserved for private use.
     *      \p{Cs} or \p{Surrogate}: one half of a surrogate pair in UTF-16 encoding.
     *      \p{Cn} or \p{Unassigned}: any code point to which no character has been assigned.
     *
     *  該程式可以清除 RIGHT-TO-LEFT MARK (200F)
     *
     *  @see http://www.regular-expressions.info/unicode.html
     *
     */
    public static function filterUnusedCode($row)
    {
        foreach ($row as $index => $value) {
            $row[$index] = preg_replace('/\p{C}+/u', "", $value );
        }
        return $row;
    }
}
