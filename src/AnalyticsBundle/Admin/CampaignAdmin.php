<?php

namespace AnalyticsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CampaignAdmin extends Admin {

//    protected $parentAssociationMapping = 'click';
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->with('Campaign')
                ->add('name', null, array('label' => 'campaign_name'))
                ->add('user_id', 'entity', array('class' => 'UserBundle\Entity\User'))
//                ->add('created', null, array('label' => 'created'))
                ->end()
                ->with('Redirection')
                ->add('redirection_id', 'sonata_type_collection', array(
                    'label' => 'redirection_id',
                    'type_options' => array(
                        // Prevents the "Delete" option from being displayed
                        'delete' => false,
                        'delete_options' => array(
                            // You may otherwise choose to put the field but hide it
                            'type' => 'hidden',
                            // In that case, you need to fill in the options as well
                            'type_options' => array(
                                'mapped' => false,
                                'required' => false,
                            )
                        )
                    )), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'position'))
                ->end()
                ->with('Click')
//                    ->add('click', 'sonata_type_admin', array())
                ->end()
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('user_id')
                ->add('name')
                ->add('created')

        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('id')
                ->add('name')
                ->add('user_id')
                ->add('created')
        ;
    }

}
