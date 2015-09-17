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
                ->with('Redirection')
                ->add('campaign_id', 'entity', array('class' => 'AnalyticsBundle\Entity\Campaign', 'label' => 'campaign_id'))
                ->add('user_id', 'entity', array('class' => 'UserBundle\Entity\User', 'label' => 'user_id'))
                
                ->add('is_deleted', 'checkbox', array('required' => false, 'label' => 'is_deleted'))
                ->add('status', null, array('label' => 'status'))
                ->add('origin_url', null, array('label' => 'origin_url'))
                ->add('redirect_url', null, array('label' => 'redirect_url'))
                ->add('generated_url', null, array('read_only' => true, 'label' => 'generated_url'))
                ->add('options', null, array('label' => 'options'))
//                ->add('created', 'datetime', array('label' => 'created'))
                ->end()
                ->with('Redirection Statistic')
                ->add('redirect_url_id', 'sonata_type_model_list', array(
                    'label' => 'redirect_url_id',
                    'btn_add'       => false,      //Specify a custom label
                    'btn_list'      => 'button.list',     //which will be translated
                    'btn_delete'    => false,             //or hide the button.
                    ))
                ->end()


        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('is_deleted')
                ->add('status')
                ->add('origin_url')
                ->add('generated_url')
                ->add('options')
                ->add('created')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('id')
                ->add('campaign_id', null, array('label' => 'campaign_id'))
                ->add('user_id')
                ->add('is_deleted', null, array('label' => 'is_deleted'))
                ->add('status', null, array('label' => 'status'))
                ->add('origin_url', null, array('label' => 'origin_url'))
                ->add('generated_url', null, array('label' => 'generated_url'))
                ->add('options', null, array('label' => 'options'))
                ->add('redirect_url_id', null, array('label' => 'redirect_url_id'))
                ->add('created', null, array('label' => 'created'))
        ;
    }

}
