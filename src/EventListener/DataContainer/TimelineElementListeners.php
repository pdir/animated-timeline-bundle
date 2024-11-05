<?php

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
