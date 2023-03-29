<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class OperationAdmin extends AbstractAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('dateEvent', null, array(
                'label' => 'Fecha del suceso'
            ))
            ->add('dateDeployment', null, array(
                'label' => 'Fecha del despliegue'
            ))
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('country', null, array(
                'label' => 'País'
            ))
            ->add('operationType', null, array(
                'label' => 'Tipo de operación'
            ))
            ->add('dateEvent', 'date', array(
                'label' => 'Fecha del suceso',
                'pattern' => 'd MMMM Y'
            ))
            ->add('dateDeployment', 'date', array(
                'label' => 'Fecha del despliegue',
                'pattern' => 'd MMMM Y'
            ))
            ->add('eruTypes', null, array(
                'label' => 'ERUs'
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
            ->add('dateEvent', 'sonata_type_date_picker', array(
                'label' => 'Fecha del suceso'
            ))
            ->add('dateDeployment', 'sonata_type_date_picker', array(
                'label' => 'Fecha del despliegue'
            ))
            ->add('country', null, array(
                'label' => 'País'
            ))
            ->add('operationType', null, array(
                'label' => 'Tipo de operación'
            ))
            ->add('eruTypes',EntityType::class, array(
                'label' => 'ERUs',
                'class' => 'AppBundle:EruType',
                'multiple' => true,
                'expanded' => true
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
            ->add('country', null, array(
                'label' => 'País'
            ))
            ->add('operationType', null, array(
                'label' => 'Tipo de operación'
            ))
            ->add('dateEvent', 'date', array(
                'label' => 'Fecha del suceso',
                'pattern' => 'd MMMM Y'
            ))
            ->add('dateDeployment', 'date', array(
                'label' => 'Fecha del despliegue',
                'pattern' => 'd MMMM Y'
            ))
            ->add('eruTypes', null, array(
                'label' => 'ERUs'
            ))
            ->add('deployments',null, array(
                'label' => 'Despliegues'
            ))
        ;
    }
}
