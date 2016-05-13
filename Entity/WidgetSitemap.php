<?php

namespace Victoire\Widget\SitemapBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\WidgetBundle\Entity\Widget;

/**
 * WidgetSitemap.
 *
 * @ORM\Table("vic_widget_sitemap")
 * @ORM\Entity
 */
class WidgetSitemap extends Widget
{
    /**
     * @ORM\ManyToOne(targetEntity="\Victoire\Bundle\PageBundle\Entity\BasePage", cascade={"persist"})
     * @ORM\JoinColumn(name="root_page", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $rootPage;

    /**
     * @ORM\Column(name="depth", type="integer", nullable=true)
     */
    protected $depth;

    /**
     * To String function
     * Used in render choices type (Especially in VictoireWidgetRenderBundle).
     *
     * @return string
     */
    public function __toString()
    {
        return 'Sitemap #'.$this->id;
    }

    /**
     * Set rootPage.
     *
     * @param string $rootPage
     */
    public function setRootpage($rootPage)
    {
        $this->rootPage = $rootPage;

        return $this;
    }

    /**
     * Get rootPage.
     *
     * @return string
     */
    public function getRootpage()
    {
        return $this->rootPage;
    }

    /**
     * @return int
     */
    public function getDepth()
    {
        return $this->depth;
    }

    /**
     * @param int $depth
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;
    }
}
