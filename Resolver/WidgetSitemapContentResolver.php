<?php

namespace Victoire\Widget\SitemapBundle\Resolver;

use Victoire\Bundle\ViewReferenceBundle\Connector\ViewReferenceRepository;
use Victoire\Bundle\WidgetBundle\Model\Widget;
use Victoire\Bundle\WidgetBundle\Resolver\BaseWidgetContentResolver;
use Victoire\Widget\SitemapBundle\Entity\WidgetSitemap;

class WidgetSitemapContentResolver extends BaseWidgetContentResolver
{
    private $viewReferenceRepository;

    public function __construct(ViewReferenceRepository $viewReferenceRepository)
    {
        $this->viewReferenceRepository = $viewReferenceRepository;
    }

    /**
     * Get the static content of the widget.
     *
     * @param WidgetSiteMap $widget
     *
     * @return string
     */
    public function getWidgetStaticContent(Widget $widget)
    {
        $parameters = parent::getWidgetStaticContent($widget);
        $parameters['rootPageReference'] = $this->viewReferenceRepository->getOneReferenceByParameters(
            ['viewId' => $widget->getRootPage()->getId()],
            true,
            true
        );

        return $parameters;
    }
}
