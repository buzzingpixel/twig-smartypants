<?php
declare(strict_types=1);

/**
 * @author TJ Draper <tj@buzzingpixel.com>
 * @copyright 2020 BuzzingPixel, LLC
 * @license Apache-2.0
 */

namespace buzzingpixel\twigsmartypants;

use Twig\TwigFilter;
use Twig\Markup;
use Twig\Extension\AbstractExtension;
use Michelf\SmartyPants;

class SmartypantsTwigExtension extends AbstractExtension
{
    private $smartyPants;

    public function __construct(SmartyPants $smartyPants)
    {
        $this->smartyPants = $smartyPants;
    }

    public function getFilters(): array
    {
        return [new TwigFilter(
            'smartypants',
            [$this, 'smartypantsFilter']
        )];
    }

    public function smartypantsFilter(string $str): Markup
    {
        return new Markup(
            $this->smartyPants->transform($str),
            'UTF-8'
        );
    }
}
