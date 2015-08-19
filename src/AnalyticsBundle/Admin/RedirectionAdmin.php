<?php

namespace AnalyticsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class RedirectionAdmin extends Admin {

    public $supportsPreviewMode = true;


    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('campaign_id', null, array('label' => 'campaign_id'))
                ->add('user_id', 'entity', array('class' => 'UserBundle\Entity\User', 'label' => 'user_id'))
                ->add('is_deleted', 'checkbox', array('label' => 'is_deleted'))
                ->add('status', null, array('label' => 'status'))
                ->add('origin_url', null, array('label' => 'origin_url'))
                ->add('generated_url', null, array('label' => 'generated_url'))
                ->add('options', null, array('label' => 'options'))
                ->add('created', 'datetime', array('label' => 'created'))

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('campaign_id', null, array('label' => 'campaign_id'))
                ->add('user_id', 'entity', array('class' => 'UserBundle\Entity\User', 'label' => 'user_id'))
                ->add('is_deleted', null, array('label' => 'is_deleted'))
                ->add('status', null, array('label' => 'status'))
                ->add('origin_url', null, array('label' => 'origin_url'))
                ->add('generated_url', null, array('label' => 'generated_url'))
                ->add('options', null, array('label' => 'options'))
                ->add('created', null, array('label' => 'created'))
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('id')
                ->add('campaign_id', null, array('label' => 'campaign_id'))
                ->add('user_id', 'entity', array('class' => 'UserBundle\Entity\User', 'label' => 'user_id'))
                ->add('is_deleted', null, array('label' => 'is_deleted'))
                ->add('status', null, array('label' => 'status'))
                ->add('origin_url', null, array('label' => 'origin_url'))
                ->add('generated_url', null, array('label' => 'generated_url'))
                ->add('options', null, array('label' => 'options'))
                ->add('created', null, array('label' => 'created'))
        ;
    }

}
