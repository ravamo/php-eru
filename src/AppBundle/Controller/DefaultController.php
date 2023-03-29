<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->redirectToRoute('sonata_admin_dashboard', array(), 301);
    }

    /**
     * @Route("/territorial-total-gender", name="territorial_total_gender")
     * @param Request $request
     * @return string|JsonResponse
     */
    public function territorialTotalGenderAction(Request $request)
    {
        $params = $request->query->all();

        if (isset($params['id'])) {

            $totalRosterMembersGenderCount = $this->getDoctrine()->getRepository('AppBundle:RosterMember')
                ->getTotalRosterMembersGenderCount($params['id']);

            return new JsonResponse($totalRosterMembersGenderCount);

        } else {
            return 'Incomplete params';
        }
    }

    /**
     * @Route("/territorial-eru-gender", name="territorial_eru_gender")
     * @param Request $request
     * @return string|JsonResponse
     */
    public function territorialEruGenderAction(Request $request)
    {
        $params = $request->query->all();

        if (isset($params['id'])) {
            $eruTypes = ['UCBS', 'SANMAS', 'PSS', 'TELECOM', 'LOG', 'RELIEF', 'M15'];

            $data['labels'] = $eruTypes;

            $dat['Hombre'] = [];
            $dat['Mujer'] = [];

            foreach ($eruTypes as $eruType) {
                $eruRosterMembersGenderCount = $this->getDoctrine()->getRepository('AppBundle:RosterMember')
                    ->getTotalRosterMembersGenderCountByEru($eruType, $params['id']);

                if (count($eruRosterMembersGenderCount) == 0) {
                    $eruRosterMembersGenderCount[] = ['label' => 'Hombre', 'value' => '0'];
                    $eruRosterMembersGenderCount[] = ['label' => 'Mujer', 'value' => '0'];
                } else if (count($eruRosterMembersGenderCount) == 1) {
                    $label = $eruRosterMembersGenderCount[0]['label'] == 'Hombre' ? 'Mujer' : 'Hombre';
                    $eruRosterMembersGenderCount[] = ['label' => $label, 'value' => '0'];
                }

                foreach ($eruRosterMembersGenderCount as $eruRosterMembersGenderCountItem) {
                    $dat[$eruRosterMembersGenderCountItem['label']][]= $eruRosterMembersGenderCountItem['value'];

                }
            }

            $datasets [] = ['label' => 'Hombres', 'backgroundColor' => 'rgb(245, 105, 84)', 'data' => $dat['Hombre']];
            $datasets [] = ['label' => 'Mujeres', 'backgroundColor' => 'rgb(60, 141, 188)', 'data' => $dat['Mujer']];
            $data['datasets'] = $datasets;

            return new JsonResponse($data);

        } else {
            return 'Incomplete params';
        }
    }
}
