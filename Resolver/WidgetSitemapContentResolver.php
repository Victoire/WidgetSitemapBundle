<?php

namespace Victoire\Widget\SitemapBundle\Resolver;

use Symfony\Component\HttpFoundation\RequestStack;
use Victoire\Bundle\ViewReferenceBundle\Connector\ViewReferenceRepository;
use Victoire\Bundle\WidgetBundle\Model\Widget;
use Victoire\Bundle\WidgetBundle\Resolver\BaseWidgetContentResolver;
use Victoire\Widget\SitemapBundle\Entity\WidgetSitemap;

class WidgetSitemapContentResolver extends BaseWidgetContentResolver
{
    private $viewReferenceRepository;
    /**
     * @var RequestStack
     */
    private $requestStack;

    /**
     * WidgetSitemapContentResolver constructor.
     *
     * @param ViewReferenceRepository $viewReferenceRepository
     * @param RequestStack            $requestStack
     */
    public function __construct(ViewReferenceRepository $viewReferenceRepository, RequestStack $requestStack)
    {
        $this->viewReferenceRepository = $viewReferenceRepository;
        $this->requestStack = $requestStack;
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
            [
                'viewId' => $widget->getRootPage()->getId(),
                'locale' => $this->requestStack->getCurrentRequest()->getLocale(),
            ],
            true,
            true
        );

        return $parameters;
    }
}
