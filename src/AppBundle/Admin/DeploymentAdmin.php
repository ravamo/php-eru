<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class DeploymentAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('operation', null, array(
                'label' => 'Operación'
            ))
            ->add('rosterMember', null, array(
                'label' => 'Miembro róster'
            ))
            ->add('role', null, array(
                'label' => 'Rol'
            ))
            ->add('firstMission', null, array(
                'label' => '1ª misión'
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('operation', null, array(
                'label' => 'Operación'
            ))
            ->add('rosterMember', null, array(
                'label' => 'Miembro róster'
            ))
            ->add('role', null, array(
                'label' => 'Rol'
            ))
            ->add('firstMission', null, array(
                'label' => '1ª misión',
                'editable' => true
            ))
            ->add('_action', null, array(
                'label' => 'Acciones',
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                ),
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('operation', null, array(
                'label' => 'Operación'
            ))
            ->add('rosterMember', null, array(
                'label' => 'Miembro róster'
            ))
            ->add('role', null, array(
                'label' => 'Rol'
            ))
            ->add('firstMission', null, array(
                'label' => '1ª misión'
            ))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('operation', null, array(
                'label' => 'Operación'
            ))
            ->add('rosterMember', null, array(
                'label' => 'Miembro róster'
            ))
            ->add('role', null, array(
                'label' => 'Rol'
            ))
            ->add('firstMission', null, array(
                'label' => '1ª misión',
                'editable' => true
            ))
        ;
    }
}
