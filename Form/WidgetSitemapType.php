<?php

namespace Victoire\Widget\SitemapBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Victoire\Bundle\CoreBundle\Form\WidgetType;

/**
 * WidgetSitemap form type.
 */
class WidgetSitemapType extends WidgetType
{
    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     *
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('rootPage', null, [
            'label' => 'widget_sitemap.form.rootPage.label',
            'attr'  => ['placeholder' => 'widget_sitemap.form.rootPage.placeholder'],
        ])->add('depth', IntegerType::class, [
            'label'    => 'widget_sitemap.form.depth.label',
            'attr'     => ['placeholder' => 'widget_sitemap.form.depth.placeholder'],
            'required' => false,
        ]);
        parent::buildForm($builder, $options);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults([
            'data_class'         => 'Victoire\Widget\SitemapBundle\Entity\WidgetSitemap',
            'widget'             => 'Sitemap',
            'translation_domain' => 'victoire',
        ]);
    }
}
