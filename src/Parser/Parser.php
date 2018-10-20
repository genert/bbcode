<?php

namespace Genert\BBCode\Parser;

class Parser
{
    /**
     * Static case insensitive flag to enable
     * case insensitivity when parsing BBCode.
     */
    const CASE_INSENSITIVE = 0;

    protected $parsers = [];

    protected function searchAndReplace(string $pattern, string $replace, string $source): string
    {
        while (preg_match($pattern, $source)) {
            $source = preg_replace($pattern, $replace, $source);
        }

        return $source;
    }

    public function only($only = null)
    {
        $only = is_array($only) ? $only : func_get_args();

        $this->parsers = array_intersect_key($this->parsers, array_flip((array) $only));

        return $this;
    }

    public function except($except = null)
    {
        $except = is_array($except) ? $except : func_get_args();

        $this->parsers = array_diff_key($this->parsers, array_flip((array) $except));

        return $this;
    }

    public function addParser(string $name, string $pattern, string $replace, string $content)
    {
        $this->parsers = array_merge($this->parsers, [
            $name => [
                'pattern' => $pattern,
                'replace' => $replace,
                'content' => $content,
            ],
        ]);
    }
}
