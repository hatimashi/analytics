<?php

namespace AnalyticsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AnalyticsBundle\Entity\Redirection;

class GenerateType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('origin_url', null, array(
                    'attr' => array(
                        'placeholder' => 'Redirect from URL',
                    ),
                    'label' => 'origin_url'))
                ->add('redirect_url', null, array(
                    'attr' => array(
                        'placeholder' => 'Redirect to URL',
                    ),
                    'label' => 'redirect_url'
                ))
                ->add('options', 'choice', array(
                    'choices' => array(
                        Redirection::OPTIONS_NOT_ALLOWED_FROM_DIFFERENT_DOMAIN => 'Restricted redirection',
                        Redirection::OPTIONS_ALLOWED_FROM_DIFFERENT_DOMAIN => 'Not Restricted redirection',
                    ),
                    'label' => 'options',
                    'placeholder' => 'Options',
                ))
                ->add('save', 'submit', array('label' => 'generate'))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AnalyticsBundle\Entity\Redirection',
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'generate';
    }

}
