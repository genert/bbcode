<?php
/**
 * Created by PhpStorm.
 * User: genertorg
 * Date: 13/07/2017
 * Time: 12:04
 */

namespace Genert\BBCode;

final class BBCode {
    private $htmlParser;
    private $bbcodeParser;

    const CASE_SENSITIVE = 0;

    public function __construct()
    {
        $this->htmlParser = new HTMLParser();
        $this->bbcodeParser = new BBCodeParser();
    }

    public function only($only = null)
    {
        return $this;
    }

    public function stripBBCodeTags(string $source): string
    {
        return $this->bbcodeParser->stripTags($source);
    }

    public function convertFromHtml(string $source): string
    {
        return $this->htmlParser->parse($source);
    }

    public function convertToHtml(string $source, $style = null): string
    {
        return $this->bbcodeParser->parse($source, $style);
    }
}
