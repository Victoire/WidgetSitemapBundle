<?php

namespace Victoire\Widget\SitemapBundle\Resolver;

use Victoire\Bundle\ViewReferenceBundle\Cache\Xml\ViewReferenceXmlCacheRepository;
use Victoire\Bundle\WidgetBundle\Model\Widget;
use Victoire\Bundle\WidgetBundle\Resolver\BaseWidgetContentResolver;
use Victoire\Widget\SitemapBundle\Entity\WidgetSitemap;

class WidgetSitemapContentResolver extends BaseWidgetContentResolver
{
    private $viewCacheRepository;

    public function __construct(ViewReferenceXmlCacheRepository $viewCacheRepository)
    {
        $this->viewCacheRepository = $viewCacheRepository;
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
        $parameters['rootPageReference'] = $this->viewCacheRepository->getOneReferenceByParameters(
            ['viewId' => $widget->getRootPage()->getId()],
            true,
            true
        );

        return $parameters;
    }
}
