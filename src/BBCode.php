<?php
/**
 * Created by PhpStorm.
 * User: genertorg
 * Date: 13/07/2017
 * Time: 12:04
 */

namespace Genert\BBCode;

use Genert\BBCode\Parser\BBCodeParser;
use Genert\BBCode\Parser\HTMLParser;

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
        $this->htmlParser->only($only);
        $this->bbcodeParser->only($only);

        return $this;
    }

    public function except($except = null)
    {
        $this->htmlParser->except($except);
        $this->bbcodeParser->except($except);

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
