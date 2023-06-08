<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Comment\HeaderCommentFixer;
use PhpCsFixer\Fixer\Whitespace\MethodChainingIndentationFixer;
use SlevomatCodingStandard\Sniffs\Variables\UnusedVariableSniff;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Option;

$date = date('Y');

$GLOBALS['ecsHeader'] = <<<EOF
Animated timeline bundle for Contao Open Source CMS

Copyright (c) $date pdir / digital agentur // pdir GmbH

@package    animated-timeline-bundle
@link       https://pdir.de
@license    LGPL-3.0+
@author     Philipp Seibt <develop@pdir.de>

For the full copyright and license information, please view the LICENSE
file that was distributed with this source code.
EOF;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->sets([__DIR__.'/tools/ecs/vendor/contao/easy-coding-standard/config/contao.php']);

    $ecsConfig->ruleWithConfiguration(HeaderCommentFixer::class, [
        'header' => $GLOBALS['ecsHeader'],
    ]);

    $ecsConfig->parallel();
    $ecsConfig->lineEnding("\n");

    $parameters = $ecsConfig->parameters();
    $parameters->set(Option::CACHE_DIRECTORY, sys_get_temp_dir().'/ecs_default_cache');
};
