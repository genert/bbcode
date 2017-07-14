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
    private $bbCodeParser;

    const CASE_SENSITIVE = 0;

    public function __construct()
    {
        $this->htmlParser = new HTMLParser();
        $this->bbCodeParser = new BBCodeParser();
    }

    public function only($only = null)
    {
        $this->htmlParser->only($only);
        $this->bbCodeParser->only($only);

        return $this;
    }

    public function except($except = null)
    {
        $this->htmlParser->except($except);
        $this->bbCodeParser->except($except);

        return $this;
    }

    public function stripBBCodeTags(string $source): string
    {
        return $this->bbCodeParser->stripTags($source);
    }

    public function convertFromHtml(string $source): string
    {
        return $this->htmlParser->parse($source);
    }

    public function convertToHtml(string $source, $style = null): string
    {
        return $this->bbCodeParser->parse($source, $style);
    }
}
