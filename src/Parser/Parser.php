<?php

namespace Rysh\BBCode\Parser;

/**
 * Class Parser
 * @package Rysh\BBCode\Parser
 */
class Parser
{
    /**
     * Static case insensitive flag to enable
     * case insensitivity when parsing BBCode.
     */
    const CASE_INSENSITIVE = 0;

    /**
     * @var array
     */
    protected $parsers = [];

    /**
     * @param null $only
     * @return $this
     */
    public function only($only = null)
    {
        $only = is_array($only) ? $only : func_get_args();

        $this->parsers = array_intersect_key($this->parsers, array_flip((array)$only));

        return $this;
    }

    /**
     * @param null $except
     * @return $this
     */
    public function except($except = null)
    {
        $except = is_array($except) ? $except : func_get_args();

        $this->parsers = array_diff_key($this->parsers, array_flip((array)$except));

        return $this;
    }

    /**
     * @param string $name
     * @param string $pattern
     * @param string $replace
     * @param string $content
     */
    public function addParser(string $name, string $pattern, string $replace, string $content)
    {
        $this->parsers[$name] = [
            'pattern' => $pattern,
            'replace' => $replace,
            'content' => $content,
        ];
    }

    /**
     * @param string $pattern
     * @param string $replace
     * @param string $source
     * @return string
     */
    protected function searchAndReplace(string $pattern, string $replace, string $source): string
    {
        while (preg_match($pattern, $source)) {
            $source = preg_replace($pattern, $replace, $source);
        }

        return $source;
    }
}
