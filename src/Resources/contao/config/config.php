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

use Pdir\AnimatedTimelineBundle\Element\TimelineSliderElement;
use Pdir\AnimatedTimelineBundle\Element\TimelineStartElement;
use Pdir\AnimatedTimelineBundle\Element\TimelineStopElement;

// Insert the mate theme category
array_insert($GLOBALS['TL_CTE'], 1, ['pdirTimelineSlider' => []]);

/*
 * Add content element
 */
$GLOBALS['TL_CTE']['pdirTimelineSlider']['timelineSliderElement'] = TimelineSliderElement::class;
$GLOBALS['TL_CTE']['pdirTimelineSlider']['timelineSliderStart'] = TimelineStartElement::class;
$GLOBALS['TL_CTE']['pdirTimelineSlider']['timelineSliderStop'] = TimelineStopElement::class;

/*
 * Wrapper elements
 */
$GLOBALS['TL_WRAPPERS']['start'][] = 'timelineSliderStart';
$GLOBALS['TL_WRAPPERS']['stop'][] = 'timelineSliderStop';
