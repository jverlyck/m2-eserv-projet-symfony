<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


/**
 * Class TVSeriesController
 * @package AppBundle\Controller
 *
 * @Route("/tvseries")
 */
class TVSeriesController extends Controller
{

    private $max_per_page = 3;

    /**
     * Liste toutes les séries tv
     *
     * @Route("/{page}", name="app_tvseries_list", requirements={"page" = "\d+"}, defaults={"page" = 1})
     */
    public function indexAction($page)
    {
        $em = $this->getDoctrine()->getManager();

        $tvseries_repository = $em->getRepository('AppBundle:TVSeries');

        $tvseries = $tvseries_repository->getList($page, $this->max_per_page);

        $pagination = [
          'page'     => $page,
          'nb_pages' => ceil($tvseries_repository->countTVSeries() / $this->max_per_page)
        ];

        return $this->render('tvseries/index.html.twig', [
            'tvseries'   => $tvseries,
            'pagination' => $pagination,
        ]);
    }

    /**
     * Affiche une série en particulier
     *
     * @Route("/serie/{name}", name="app_tvseries_show", requirements={"name" = "[A-Za-z0-9 ()]+"})
     */
    public function showAction($name) {
        $em = $this->getDoctrine()->getManager();

        $tvseries_repository = $em->getRepository('AppBundle:TVSeries');
        $episode_repository = $em->getRepository('AppBundle:Episode');

        $tvserie = $tvseries_repository->findOneByName($name);
        $episodes = $episode_repository->findByTvseries($tvserie->getId());

        return $this->render('tvseries/show.html.twig', [
            'tvserie'  => $tvserie,
            'episodes' => $episodes
        ]);
    }
}