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

use Contao\BackendUser;
use Contao\Controller;
use Contao\System;

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

$GLOBALS['TL_DCA']['tl_content']['palettes']['timelineSliderElement'] = '{type_legend},type,headline;{text_legend},text;{image_legend},addImage;{content_slider_legend},multiSRC,sliderDelay,sliderSpeed,sliderStartSlide,sliderContinuous,contentSliderSize,contentSliderFullsize;{template_legend:hide},timelineElement_customTpl;{expert_legend:hide},cssID';

$GLOBALS['TL_DCA']['tl_content']['palettes']['timelineSliderStart'] = '{type_legend},type;{timeline_legend},timeline_orientation,timeline_eventsPerSlide,timeline_prevLabel,timeline_nextLabel,timeline_navPos;{template_legend:hide},timelineStart_customTpl;{expert_legend:hide},guests,cssID;{invisible_legend:hide},invisible,start,stop';

$GLOBALS['TL_DCA']['tl_content']['palettes']['timelineSliderStop'] = '{type_legend},type;{template_legend:hide},timelineStop_customTpl;{invisible_legend:hide},invisible,start,stop';

/*
 * Add fields to tl_content
 */

$GLOBALS['TL_DCA']['tl_content']['fields']['timeline_orientation'] = [
    'exclude' => true,
    'inputType' => 'select',
    'options' => &$GLOBALS['TL_LANG']['tl_content']['timeline_orientation']['options'],
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => 'TEXT null',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['timeline_eventsPerSlide'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['maxlength' => 10, 'rgxp' => 'digit', 'tl_class' => 'w50'],
    'sql' => "int(10) unsigned NOT NULL default '0'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['timeline_prevLabel'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "TEXT null default 'Zurück'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['timeline_nextLabel'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50'],
    'sql' => "TEXT null default 'Weiter'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['timelineElement_customTpl'] = [
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => static function () {
        return Controller::getTemplateGroup('ce_timeline_element');
    },
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['timelineStart_customTpl'] = [
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => static function () {
        return Controller::getTemplateGroup('ce_timeline_start');
    },
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['timelineStop_customTpl'] = [
    'exclude' => true,
    'inputType' => 'select',
    'options_callback' => static function () {
        return Controller::getTemplateGroup('ce_timeline_stop');
    },
    'eval' => ['includeBlankOption' => true, 'chosen' => true, 'tl_class' => 'w50'],
    'sql' => "varchar(64) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['contentSliderSize'] = [
    'label' => &$GLOBALS['TL_LANG']['MSC']['imgSize'],
    'exclude' => true,
    'inputType' => 'imageSize',
    'reference' => &$GLOBALS['TL_LANG']['MSC'],
    'eval' => ['rgxp' => 'natural', 'includeBlankOption' => true, 'nospace' => true, 'helpwizard' => true, 'tl_class' => 'w50'],
    'options_callback' => static fn () => System::getContainer()->get('contao.image.sizes')->getOptionsForUser(BackendUser::getInstance()),
    'sql' => 'TEXT null',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['contentSliderFullsize'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class'=>'w50'],
    'sql' => $GLOBALS['TL_DCA']['tl_content']['fields']['fullsize']['sql'],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['timeline_navPos'] = [
    'exclude' => true,
    'inputType' => 'select',
    'options' => &$GLOBALS['TL_LANG']['tl_content']['timeline_navPos']['options'],
    'eval' => ['chosen' => true, 'tl_class' => 'w50'],
    'sql' => 'TEXT null default "bottom"',
];
