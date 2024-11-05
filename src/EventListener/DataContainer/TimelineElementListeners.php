<?php

declare(strict_types=1);

/*
 * Animated timeline bundle for Contao Open Source CMS
 *
 * Copyright (c) 2024 pdir / digital agentur // pdir GmbH
 *
 * @package    animated-timeline-bundle
 * @link       https://pdir.de
 * @license    LGPL-3.0+
 * @author     Philipp Seibt <develop@pdir.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pdir\AnimatedTimelineBundle\EventListener\DataContainer;

use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;

class TimelineElementListeners
{
    #[AsCallback('tl_content', 'fields.multiSRC.load')]
    public function setMultiSRCFlags(mixed $varValue, DataContainer $dc): mixed
    {
        if ($dc->activeRecord && 'timelineSliderElement' === $dc->activeRecord->type) {
            $GLOBALS['TL_DCA'][$dc->table]['fields'][$dc->field]['eval']['isGallery'] = true;
        }

        return $varValue;
    }
}
