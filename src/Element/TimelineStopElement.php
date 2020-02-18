<?php

/*
 * Animated timeline bundle for Contao Open Source CMS
 *
 * Copyright (c) 2019 pdir / digital agentur // pdir GmbH
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

class TimelineStopElement extends \ContentElement
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'ce_timeline_stop';

    /**
     * Generate the content element.
     */
    protected function compile()
    {
        if (TL_MODE === 'BE') {
            $this->strTemplate = 'be_wildcard';
            $this->Template = new \BackendTemplate($this->strTemplate);
        }

        if (TL_MODE === 'BE') {
            $this->strTemplate = 'be_wildcard';
            /** @var BackendTemplate|object $objTemplate */
            $objTemplate = new \BackendTemplate($this->strTemplate);
            $this->Template = $objTemplate;
            $this->Template->wildcard = '### TIMELINE SLIDER STOP ###';
        }
    }
}
