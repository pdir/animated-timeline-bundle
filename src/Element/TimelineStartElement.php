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

namespace Pdir\AnimatedTimelineBundle\Element;

use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\System;

class TimelineStartElement extends ContentElement
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'ce_timeline_start';

    /**
     * Generate the content element.
     */
    protected function compile(): void
    {
        $request = System::getContainer()->get('request_stack')->getCurrentRequest();

        if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request)) {
            $this->strTemplate = 'be_wildcard';

            $objTemplate = new BackendTemplate($this->strTemplate);
            $this->Template = $objTemplate;
            $this->Template->wildcard = $GLOBALS['TL_LANG']['tl_content']['timeline_orientation'][0].': '.$GLOBALS['TL_LANG']['tl_content']['timeline_orientation']['options'][$this->timeline_orientation].' / '.$GLOBALS['TL_LANG']['tl_content']['timeline_eventsPerSlide'][0].': '.$this->timeline_eventsPerSlide;
        } else {
            $this->Template->orientation = $this->timeline_orientation;
            $this->Template->eventsPerSlide = $this->timeline_eventsPerSlide;
            $this->Template->prevLabel = $this->timeline_prevLabel;
            $this->Template->nextLabel = $this->timeline_nextLabel;
        }
    }
}
