<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\DoctrineORMAdminBundle\Filter\ChoiceFilter;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RosterMemberAdmin extends AbstractAdmin
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
            ->add('surname', null, array(
                'label' => 'Apellidos'
            ))
            ->add('mobilePhone', null, array(
                'label' => 'Nº teléfono'
            ))
            ->add('extraPhone', null, array(
                'label' => 'Nº tlfno extra'
            ))
            ->add('email')
            ->add('active', null, array(
                'label' => 'Regularizado'
            ))
            ->add('responsibleStatement', null, array(
                'label' => 'Declaración responsable'
            ))
            ->add(
                'eruTypes',
                null,
                array('label' => 'Tipos de ERU'),
                null,
                array('expanded' => false, 'multiple' => true)
            )
            ->add('skills', null, array(
                'label' => 'Competencias'
            ))
            ->add('territorialOffice', null, array(
                'label' => 'Territorial'
            ))
            ->add('genre', null, array(
                'label' => 'Género'
            ))
            ->add('redCrossRelation', null, array(
                'label' => 'Relación'
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
            ->add('name', null, array(
                'label' => 'Nombre'
            ))
            ->add('surname', null, array(
                'label' => 'Apellidos'
            ))
            ->add('mobilePhone', null, array(
                'label' => 'Nº teléfono'
            ))
            ->add('email')
            ->add('eruTypes', null, array(
                'label' => 'ERUs'
            ))
            ->add('languages', null, array(
                'label' => 'Idiomas'
            ))
            ->add('skills', null, array(
                'label' => 'Competencias'
            ))
            ->add('territorialOffice', null, array(
                'label' => 'Territorial'
            ))
            ->add('active', null, array(
                'label' => 'Regularizado',
                'editable' => true
            ))
            ->add('responsibleStatement', null, array(
                'label' => 'DR',
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
            ->with('Datos personales', array('class' => 'col-md-6'))
                ->add('name', null, array(
                    'label' => 'Nombre'
                ))
                ->add('surname', null, array(
                    'label' => 'Apellidos'
                ))
                ->add('genre', null, array(
                    'label' => 'Género'
                ))
                ->add('mobilePhone', null, array(
                    'label' => 'Teléfono'
                ))
                ->add('extraPhone', null, array(
                    'label' => 'Tlfno extra'
                ))
                ->add('email')
                ->add('territorialOffice', null, array(
                    'label' => 'Oficina territorial'
                ))
            ->end()
            ->with('Info', array('class' => 'col-md-6'))
                ->add('active', null, array(
                    'label' => 'Regularizado'
                ))
                ->add('responsibleStatement', null, array(
                    'label' => 'Declaración responsable'
                ))
                ->add('redCrossRelation', null, array(
                    'label' => 'Relación'
                ))
                ->add('languages',EntityType::class, array(
                    'label' => 'Idiomas',
                    'class' => 'AppBundle:Language',
                    'multiple' => true
                ))
                ->add('skills',EntityType::class, array(
                    'label' => 'Competencias',
                    'class' => 'AppBundle:Skill',
                    'multiple' => true
                ))
                ->add('eruTypes',EntityType::class, array(
                    'label' => 'ERUs',
                    'class' => 'AppBundle:EruType',
                    'multiple' => true,
                    'expanded' => true
                ))
            ->end()
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
            ->add('surname', null, array(
                'label' => 'Apellidos'
            ))
            ->add('mobilePhone', null, array(
                'label' => 'Nº teléfono'
            ))
            ->add('extraPhone', null, array(
                'label' => 'Nº tlfno extra'
            ))
            ->add('email')
            ->add('active', null, array(
                'label' => 'Regularizado'
            ))
            ->add('deployments', null, array(
                'label' => 'Despliegues'
            ))
            ->add('workGroups', null, array(
                'label' => 'Grupos de trabajo'
            ))
            ->add('activities', null, array(
                'label' => 'Otras actividades'
            ))
        ;
    }
}
