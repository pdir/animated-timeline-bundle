<?php

declare(strict_types=1);

/*
 *  Animated timeline bundle for Contao Open Source CMS
 *
 *  Copyright (c) 2023 pdir / digital agentur // pdir GmbH
 *
 *  @package    animated-timeline-bundle
 *  @link       https://pdir.de
 *  @license    LGPL-3.0+
 *  @author     Philipp Seibt <develop@pdir.de>
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 */

namespace Pdir\AnimatedTimelineBundle\Tests;

use Pdir\AnimatedTimelineBundle\PdirAnimatedTimelineBundle;
use PHPUnit\Framework\TestCase;

class PdirAnimatedTimelineBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new PdirAnimatedTimelineBundle();

        $this->assertInstanceOf('Pdir\AnimatedTimelineBundle\PdirAnimatedTimelineBundle', $bundle);
    }
}
