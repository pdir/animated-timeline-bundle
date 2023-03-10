<?php

declare(strict_types=1);

/*
 * Animated timeline bundle for Contao Open Source CMS
 *
 * Copyright (c) 2023 pdir / digital agentur // pdir GmbH
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

class TimelineStartElement extends \ContentElement
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
        if (TL_MODE === 'BE') {
            $this->strTemplate = 'be_wildcard';
            /** @var BackendTemplate|object $objTemplate */
            $objTemplate = new \BackendTemplate($this->strTemplate);
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
