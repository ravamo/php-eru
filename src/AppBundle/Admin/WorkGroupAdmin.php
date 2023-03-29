<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class WorkGroupAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array(
                'label' => 'Nombre'
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null, array(
                'label' => 'Nombre'
            ))
            ->add('rosterMembers', null, array(
                'label' => 'Miembros del grupo'
            ))
            ->add('startDate', 'date', array(
                'label' => 'Fecha inicio',
                'pattern' => 'd MMMM Y'
            ))
            ->add('endDate', 'date', array(
                'label' => 'Fecha fin',
                'pattern' => 'd MMMM Y'
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
            ->add('name', null, array(
                'label' => 'Nombre'
            ))
            ->add('rosterMembers', null, array(
                'label' => 'Miembros del grupo'
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
            ->add('name', null, array(
                'label' => 'Nombre'
            ))
            ->add('rosterMembers', null, array(
                'label' => 'Miembros del grupo'
            ))
            ->add('startDate', 'date', array(
                'label' => 'Fecha inicio',
                'pattern' => 'd MMMM Y'
            ))
            ->add('endDate', 'date', array(
                'label' => 'Fecha fin',
                'pattern' => 'd MMMM Y'
            ))
        ;
    }
}
