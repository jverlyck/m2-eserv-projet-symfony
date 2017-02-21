<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TVSeries;
use AppBundle\Form\TVSeriesType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


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
        if(is_null($tvserie)) {
            $response = new Response();
            $response->setStatusCode(404);
            return $response;
        }

        $episodes = $episode_repository->findByTvseries($tvserie->getId());

        return $this->render('tvseries/show.html.twig', [
            'tvserie'  => $tvserie,
            'episodes' => $episodes
        ]);
    }

    /**
     * Formulaire d'ajout d'une série tv
     *
     * @Route("/ajouter", name="app_tvseries_add")
     */
    public function addAction(Request $request)
    {
        $tvseries = new TVSeries();
        $form = $this->createForm(TVSeriesType::class, $tvseries);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tvseries->upload();

            $em = $this->getDoctrine()->getManager();
            $em->persist($tvseries);
            $em->flush();

            return $this->redirect($this->generateUrl(
                'app_tvseries_show',
                array('name' => $tvseries->getName())
            ));
        }

        return $this->render('tvseries/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Formulaire d'édition d'une série tv
     *
     * @Route("/editer/{name}", name="app_tvseries_edit", requirements={"name" = "[A-Za-z0-9 ()]+"})
     */
    public function editAction(Request $request, $name)
    {
        $em = $this->getDoctrine()->getManager();

        $tvseries_repository = $em->getRepository('AppBundle:TVSeries');

        $tvseries = $tvseries_repository->findOneByName($name);
        if(is_null($tvseries)) {
            $response = new Response();
            $response->setStatusCode(404);
            return $response;
        }

        $form = $this->createForm(TVSeriesType::class, $tvseries);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $tvseries->removeUpload();
            $tvseries->upload();

            $em = $this->getDoctrine()->getManager();
            $em->persist($tvseries);
            $em->flush();

            return $this->redirect($this->generateUrl(
                'app_tvseries_show',
                array('name' => $tvseries->getName())
            ));
        }

        return $this->render('tvseries/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Formulaire d'édition d'une série tv
     *
     * @Route("/supprimer/{name}", name="app_tvseries_delete", requirements={"name" = "[A-Za-z0-9 ()]+"})
     */
    public function removeAction($name)
    {
        $em = $this->getDoctrine()->getManager();

        $tvseries_repository = $em->getRepository('AppBundle:TVSeries');
        $episode_repository = $em->getRepository('AppBundle:Episode');

        $tvseries = $tvseries_repository->findOneByName($name);
        if(is_null($tvseries)) {
            $response = new Response();
            $response->setStatusCode(404);
            return $response;
        }

        //on supprime tous les episodes de la série
        $episodes = $episode_repository->findByTvseries($tvseries->getId());
        foreach($episodes as $episode)
        {
            $em->remove($episode);
        }
        //on supprime ensuite la série
        $tvseries->removeUpload();
        $em->remove($tvseries);
        $em->flush();

        return $this->redirect($this->generateUrl('app_tvseries_list'));
    }
}