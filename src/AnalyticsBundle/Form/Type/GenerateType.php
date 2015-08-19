<?php

namespace AnalyticsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GenerateType extends AbstractType 
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('user_id', null, array('label' => 'user_id'))
                ->add('origin_url', null, array('label' => 'origin_url'))
                ->add('options', null, array('label' => 'options'))
                ->add('save', 'submit', array('label' => 'save'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'AnalyticsBundle\Entity\Redirection'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'generate';
    }

}
