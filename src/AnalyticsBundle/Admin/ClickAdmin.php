<?php

namespace AnalyticsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ClickAdmin extends Admin {

    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->with('Click')
                ->add('redirection_id', null, array('label' => 'redirection_id'))
                ->add('user_session', null, array('label' => 'user_session'))
                ->add('referer', null, array('label' => 'referer'))
                ->add('ip', null, array('label' => 'ip'))
                ->add('user_agent', null, array('label' => 'user_agenet'))
                ->add('created', null, array('label' => 'created'))
                ->end()
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('redirection_id', null, array('label' => 'redirection_id'))
                ->add('user_session', null, array('label' => 'user_session'))
                ->add('referer', null, array('label' => 'referer'))
                ->add('ip', null, array('label' => 'ip'))
                ->add('user_agent', null, array('label' => 'user_agenet'))
                ->add('created', null, array('label' => 'created'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        if ($this->isGranted('LIST')) {
            $listMapper
                    ->addIdentifier('id')
                    ->add('redirection_id', null, array('label' => 'redirection_id'))
                    ->add('user_session', null, array('label' => 'user_session'))
                    ->add('referer', null, array('label' => 'referer'))
                    ->add('ip', null, array('label' => 'ip'))
                    ->add('user_agent', null, array('label' => 'user_agenet'))
                    ->add('created', null, array('label' => 'created'))
            ;
        }
    }

}
