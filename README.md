Victoire CMS Sitemap Bundle
============

Need to add a sitemap in a victoire cms website ?
Get this sitemap bundle and so on

First you need to have a valid Symfony2 Victoire edition.
Then you just have to run the following composer command :

    php composer.phar require victoire/sitemap-widget

Do not forget to add the bundle in your AppKernel !

    class AppKernel extends Kernel
    {
        public function registerBundles()
        {
            $bundles = array(
                ...
                new Victoire\Widget\SitemapBundle\VictoireWidgetSitemapBundle(),
            );

            return $bundles;
        }
    }
