<?php

namespace Victoire\Widget\SitemapBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Bundle\CoreBundle\Form\WidgetType;


/**
 * WidgetSitemap form type
 */
class WidgetSitemapType extends WidgetType
{
    /**
     * define form fields
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('rootPage', null, array(
            'label' => 'widget_sitemap.form.rootPage.label'
        ));
        parent::buildForm($builder, $options);

    }


    /**
     * bind form to WidgetSitemap entity
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        parent::setDefaultOptions($resolver);

        $resolver->setDefaults(array(
            'data_class'         => 'Victoire\Widget\SitemapBundle\Entity\WidgetSitemap',
            'widget'             => 'Sitemap',
            'translation_domain' => 'victoire'
        ));
    }

    /**
     * get form name
     *
     * @return string The form name
     */
    public function getName()
    {
        return 'victoire_widget_form_sitemap';
    }
}
