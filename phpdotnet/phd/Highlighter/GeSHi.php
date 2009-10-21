<?php
/**
 * Syntax highlighting using GeSHi, the generic syntax highlighter.
 *
 * PHP version 5.3+
 *
 * @category PhD
 * @package  PhD_GeSHi
 * @author   Christian Weiske <cweiske@php.net>
 * @license  http://www.opensource.org/licenses/bsd-license.php BSD Style
 * @version  SVN: $Id$
 * @link     http://doc.php.net/phd/
 */
namespace phpdotnet\phd;

require 'geshi/geshi.php';

/**
 * Syntax highlighting using GeSHi, the generic syntax highlighter.
 *
 * Note that this highlighter is particularly slow, because
 * we need to instantiate a new geshi instance for each single code
 * snippet.
 *
 * @category PhD
 * @package  PhD_GeSHi
 * @author   Christian Weiske <cweiske@php.net>
 * @license  http://www.opensource.org/licenses/bsd-license.php BSD Style
 * @link     http://doc.php.net/phd/
 */
class Highlighter_GeSHi extends Highlighter
{
    /**
    * Create a new highlighter instance for the given format.
    *
    * We use a factory so you can return different objects/classes
    * per format.
    *
    * @param string $format Output format (pdf, xhtml, troff, ...)
    *
    * @return PhDHighlighter Highlighter object
    */
    public static function factory($format)
    {
        if ($format != 'xhtml') {
            return parent::factory($format);
        }

        return new self();
    }//public static function factory(..)



    /**
    * Highlight a given piece of source code.
    * Works for xhtml only. Falls back to original highlighter for
    * other formats.
    *
    * @param string $text   Text to highlight
    * @param string $role   Source code role to use (php, xml, html, ...)
    * @param string $format Output format (pdf, xhtml, troff, ...)
    *
    * @return string Highlighted code
    */
    public function highlight($text, $role, $format)
    {
        $geshi = new \GeSHi($text, $role);
        $geshi->enable_line_numbers(GESHI_NORMAL_LINE_NUMBERS);
        return $geshi->parse_code();
    }//public function highlight(..)

}

/*
* vim600: sw=4 ts=4 syntax=php et
* vim<600: sw=4 ts=4
*/
