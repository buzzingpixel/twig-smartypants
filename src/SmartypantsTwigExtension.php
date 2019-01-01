<?php
declare(strict_types=1);

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2018 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace buzzingpixel\twigsmartypants;

use Twig_Filter;
use Twig_Markup;
use Twig_Extension;
use Michelf\SmartyPants;

class SmartypantsTwigExtension extends Twig_Extension
{
    private $smartyPants;

    public function __construct(SmartyPants $smartyPants)
    {
        $this->smartyPants = $smartyPants;
    }

    public function getFilters(): array
    {
        return [new Twig_Filter('smartypants', [$this, 'smartypantsFilter'])];
    }

    public function smartypantsFilter(string $str): Twig_Markup
    {
        return new Twig_Markup($this->smartyPants->transform($str), 'UTF-8');
    }
}
