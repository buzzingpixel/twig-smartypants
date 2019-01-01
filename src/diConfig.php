<?php
declare(strict_types=1);

use Michelf\SmartyPants;
use buzzingpixel\twigsmartypants\SmartypantsTwigExtension;

return [
    SmartypantsTwigExtension::class => function () {
        return new SmartypantsTwigExtension(new SmartyPants());
    },
];
