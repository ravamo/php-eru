<?php
namespace AppBundle\Controller;

use Sonata\AdminBundle\Controller\CoreController as BaseCoreController;

class CoreController extends BaseCoreController
{
    public function dashboardAction()
    {
        $rosterMemberCount = count($this->getDoctrine()->getRepository('AppBundle:RosterMember')->findAll());
        $activeRosterMemberCount = $this->getDoctrine()->getRepository('AppBundle:RosterMember')
            ->getRosterMembersCount(true);
        $operationsCount = $this->getDoctrine()->getRepository('AppBundle:Operation')
            ->getOperationsCount();
        $deploymentsCount = $this->getDoctrine()->getRepository('AppBundle:Deployment')
            ->getDeploymentsCount();
        $territorialOffices = $this->getDoctrine()->getRepository('AppBundle:TerritorialOffice')
            ->getAll();

        $erus = $this->getErusInfo();

        return $this->render('Admin/dashboard.html.twig',array(
            'base_template' => $this->getBaseTemplate(),
            'admin_pool' => $this->container->get('sonata.admin.pool'),
            'params' => array(
                'rosterMemberCount' => $rosterMemberCount,
                'activeRosterMemberCount' => $activeRosterMemberCount,
                'operationsCount' => $operationsCount,
                'deploymentsCount' => $deploymentsCount,
                'territorialOffices' => $territorialOffices,
                'erus' => $erus
            )
        ));
    }

    private function getErusInfo()
    {
        $erus = [];
        $eruTypes = ['UCBS', 'SANMAS', 'PSS', 'TELECOM', 'LOG', 'RELIEF', 'M15'];

        foreach ($eruTypes as $eruType) {
            $eru = [];
            $activeRosterMemberCount = $this->getDoctrine()->getRepository('AppBundle:RosterMember')
                ->getRosterMembersCount(true, $eruType);
            $unactiveRosterMemberCount = $this->getDoctrine()->getRepository('AppBundle:RosterMember')
                ->getRosterMembersCount(false, $eruType);
            $operationsCount = $this->getDoctrine()->getRepository('AppBundle:Operation')
                ->getOperationsCount($eruType);
            $deploymentsCount = $this->getDoctrine()->getRepository('AppBundle:Deployment')
                ->getDeploymentsCount($eruType);

            $eru['active'] = $activeRosterMemberCount;
            $eru['unactive'] = $unactiveRosterMemberCount;
            $eru['operations'] = $operationsCount;
            $eru['deployments'] = $deploymentsCount;

            $erus[$eruType] = $eru;
        }

        return $erus;
    }
}