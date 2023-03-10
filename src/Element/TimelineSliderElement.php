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

namespace Pdir\AnimatedTimelineBundle\Element;

use Contao\FilesModel;
use Contao\System;

class TimelineSliderElement extends \ContentElement
{
    /**
     * Template.
     *
     * @var string
     */
    protected $strTemplate = 'ce_timeline_element';

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
            $this->Template->title = $this->headline;
            $this->Template->text = $this->text;
        }

        $this->Template->addImage = false;

        // Add an image
        if ($this->addImage && '' !== $this->singleSRC) {
            $this->Template->addImage = true;
            $objModel = FilesModel::findByUuid($this->singleSRC);

            if (null !== $objModel && is_file(System::getContainer()->getParameter('kernel.project_dir').'/'.$objModel->path)) {
                $this->singleSRC = $objModel->path;
                $this->addImageToTemplate($this->Template, $this->arrData, null, null, $objModel);
            }
        }

        // Image Content Slider
        if ($this->multiSRC) {
            $objFiles = \FilesModel::findMultipleByUuids(deserialize($this->multiSRC));
            $this->Template->sliderImages = $objFiles;
            $this->Template->size = deserialize($this->contentSliderSize);
        }
    }
}
