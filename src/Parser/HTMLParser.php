<?php

namespace Genert\BBCode\Parser;

final class HTMLParser extends Parser
{
    protected $parsers = [
        'h1' => [
            'pattern' => '/<h1>(.*?)<\/h1>/s',
            'replace' => '[h1]$1[/h1]',
            'content' => '$1'
        ],
        'h2' => [
            'pattern' => '/<h2>(.*?)<\/h2>/s',
            'replace' => '[h2]$1[/h2]',
            'content' => '$1'
        ],
        'h3' => [
            'pattern' => '/<h3>(.*?)<\/h3>/s',
            'replace' => '[h3]$1[/h3]',
            'content' => '$1'
        ],
        'h4' => [
            'pattern' => '/<h4>(.*?)<\/h4>/s',
            'replace' => '[h4]$1[/h4]',
            'content' => '$1'
        ],
        'h5' => [
            'pattern' => '/<h5>(.*?)<\/h5>/s',
            'replace' => '[h5]$1[/h5]',
            'content' => '$1'
        ],
        'h6' => [
            'pattern' => '/<h6>(.*?)<\/h6>/s',
            'replace' => '[h6]$1[/h6]',
            'content' => '$1'
        ],
        'bold' => [
            'pattern' => '/<b>(.*?)<\/b>/s',
            'replace' => '[b]$1[/b]',
            'content' => '$1',
        ],
        'strong' => [
            'pattern' => '/<strong>(.*?)<\/strong>/s',
            'replace' => '[b]$1[/b]',
            'content' => '$1',
        ],
        'italic' => [
            'pattern' => '/<i>(.*?)<\/i>/s',
            'replace' => '[i]$1[/i]',
            'content' => '$1'
        ],
        'em' => [
            'pattern' => '/<em>(.*?)<\/em>/s',
            'replace' => '[i]$1[/i]',
            'content' => '$1'
        ],
        'underline' => [
            'pattern' => '/<u>(.*?)<\/u>/s',
            'replace' => '[u]$1[/u]',
            'content' => '$1',
        ],
        'strikethrough' => [
            'pattern' => '/<s>(.*?)<\/s>/s',
            'replace' => '[s]$1[/s]',
            'content' => '$1',
        ],
        'del' => [
            'pattern' => '/<del>(.*?)<\/del>/s',
            'replace' => '[s]$1[/s]',
            'content' => '$1',
        ],
        'code' => [
            'pattern' => '/<code>(.*?)<\/code>/s',
            'replace' => '[code]$1[/code]',
            'content' => '$1'
        ],
        'orderedlistnumerical' => [
            'pattern' => '/<ol>(.*?)<\/ol>/s',
            'replace' => '[list=1]$1[/list]',
            'content' => '$1'
        ],
        'unorderedlist' => [
            'pattern' => '/<ul>(.*?)<\/ul>/s',
            'replace' => '[list]$1[/list]',
            'content' => '$1'
        ],
        'listitem' => [
            'pattern' => '/<li>(.*?)<\/li>/s',
            'replace' => '[*]$1',
            'content' => '$1'
        ],
        'link' => [
            'pattern' => '/<a href="(.*?)">(.*?)<\/a>/s',
            'replace' => '[url=$1]$2[/url]',
            'content' => '$1'
        ],
        'quote' => [
            'pattern' => '/<blockquote>(.*?)<\/blockquote>/s',
            'replace' => '[quote]$1[/quote]',
            'content' => '$1'
        ],
        'image' => [
            'pattern' => '/<img src="(.*?)">/s',
            'replace' => '[img]$1[/img]',
            'content' => '$1'
        ],
        'youtube' => [
            'pattern' => '/<iframe width="560" height="315" src="\/\/www\.youtube\.com\/embed\/(.*?)" frameborder="0" allowfullscreen><\/iframe>/s',
            'replace' => '[youtube]$1[/youtube]',
            'content' => '$1'
        ],
        'linebreak' => [
            'pattern' => '/<br\s*\/?>/',
            'replace' => '/\r\n/',
            'content' => '',
        ],
        'sub' => [
            'pattern' => '/<sub>(.*?)<\/sub>/s',
            'replace' => '[sub]$1[/sub]',
            'content' => '$1'
        ],
        'sup' => [
            'pattern' => '/<sup>(.*?)<\/sup>/s',
            'replace' => '[sup]$1[/sup]',
            'content' => '$1'
        ],
        'small' => [
            'pattern' => '/<small>(.*?)<\/small>/s',
            'replace' => '[small]$1[/small]',
            'content' => '$1',
        ],
        'table' => [
            'pattern' => '/<table>(.*?)<\/table>/s',
            'replace' => '[table]$1[/table]',
            'content' => '$1',
        ],
        'table-row' => [
            'pattern' => '/<tr>(.*?)<\/tr>/s',
            'replace' => '[tr]$1[/tr]',
            'content' => '$1',
        ],
        'table-data' => [
            'pattern' => '/<td>(.*?)<\/td>/s',
            'replace' => '[td]$1[/td]',
            'content' => '$1',
        ],
    ];

    public function parse(string $source): string
    {
        foreach ($this->parsers as $name => $parser) {
            $source = $this->searchAndReplace($parser['pattern'], $parser['replace'], $source);
        }

        return $source;
    }
}
