[![CircleCI](https://circleci.com/gh/Victoire/WidgetSitemapBundle.svg?style=shield)](https://circleci.com/gh/Victoire/WidgetSitemapBundle)

Victoire Sitemap Bundle
============

## What is the purpose of this bundle

This bundle gives you access to the *Site Map Widget*, with it you can set up a site map within your website.

## Set Up Victoire

If you haven't already, you can follow the steps to set up Victoire *[here](https://github.com/Victoire/victoire/blob/master/doc/setup.md)*

## Install the bundle

    php composer.phar require victoire/sitemap-widget

### Reminder

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
