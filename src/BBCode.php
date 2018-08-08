<?php

namespace Rysh\BBCode;

use Rysh\BBCode\Parser\BBCodeParser;
use Rysh\BBCode\Parser\HTMLParser;

/**
 * Class BBCode
 * @package Rysh\BBCode
 */
final class BBCode
{
    /**
     *
     */
    const CASE_SENSITIVE = 0;
    /**
     * @var HTMLParser
     */
    private $htmlParser;
    /**
     * @var BBCodeParser
     */
    private $bbCodeParser;

    /**
     * BBCode constructor.
     */
    public function __construct()
    {
        $this->htmlParser = new HTMLParser();
        $this->bbCodeParser = new BBCodeParser();
    }

    /**
     * @param null $only
     * @return $this
     */
    public function only($only = null)
    {
        $this->htmlParser->only($only);
        $this->bbCodeParser->only($only);

        return $this;
    }

    /**
     * @param null $except
     * @return $this
     */
    public function except($except = null)
    {
        $this->htmlParser->except($except);
        $this->bbCodeParser->except($except);

        return $this;
    }

    /**
     * @param string $text
     * @return string
     */
    public function stripBBCodeTags(string $text): string
    {
        return $this->bbCodeParser->stripTags($text);
    }

    /**
     * @param string $text
     * @return string
     */
    public function convertFromHtml(string $text): string
    {
        return $this->htmlParser->parse($text);
    }

    /**
     * @param string $text
     * @param null $caseSensitive
     * @return string
     */
    public function convertToHtml(string $text, $caseSensitive = null): string
    {
        return $this->bbCodeParser->parse($text, $caseSensitive);
    }

    /**
     * @param string $name
     * @param string $pattern
     * @param string $replace
     * @param string $content
     * @return $this
     */
    public function addParser(string $name, string $pattern, string $replace, string $content)
    {
        $this->bbCodeParser->addParser($name, $pattern, $replace, $content);

        return $this;
    }

    /**
     * @return BBCode
     */
    public function addLinebreakParser()
    {
        return $this->addParser('linebreak', '/[\r\n]/', '<br />', '');
    }
}
