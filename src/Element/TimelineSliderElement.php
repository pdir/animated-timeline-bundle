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
use Contao\FilesModel;
use Contao\StringUtil;
use Contao\System;

class TimelineSliderElement extends ContentElement
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
        $request = System::getContainer()->get('request_stack')->getCurrentRequest();

        if ($request && System::getContainer()->get('contao.routing.scope_matcher')->isBackendRequest($request))
        {
            $this->strTemplate = 'be_wildcard';

            $objTemplate = new BackendTemplate($this->strTemplate);
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

                $figure = System::getContainer()
                    ->get('contao.image.studio')
                    ->createFigureBuilder()
                    ->from($this->singleSRC)
                    ->setSize($this->size)
                    ->setMetadata($this->objModel->getOverwriteMetadata())
                    ->enableLightbox($this->fullsize)
                    ->buildIfResourceExists()
                ;

                $figure?->applyLegacyTemplateData($this->Template, null, $this->floating);
            }
        }

        // Image Content Slider
        if ($this->multiSRC) {
            $objFiles = FilesModel::findMultipleByUuids(StringUtil::deserialize($this->multiSRC));
            $this->Template->sliderImages = $objFiles;
            $this->Template->size = StringUtil::deserialize($this->contentSliderSize);
        }
    }
}
