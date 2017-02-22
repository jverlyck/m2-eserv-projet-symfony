<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Episode;
use AppBundle\Form\EpisodeType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * Class EpisodeController
 * @package AppBundle\Controller
 *
 * @Route("/episode")
 */
class EpisodeController extends Controller
{

    /**
     * Affiche un épisode en particulier
     *
     * @Route("/voir/{id}", name="app_episode_show", requirements={"id" = "[a-z0-9-]+"})
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $episode_repository = $em->getRepository('AppBundle:Episode');

        $episode = $episode_repository->find($id);
        if(is_null($episode)) {
            $response = new Response();
            $response->setStatusCode(404);
            return $response;
        }

        return $this->render('episode/show.html.twig', [
            'episode' => $episode
        ]);
    }

    /**
     * Formulaire d'ajout d'un épisode
     *
     * @Route("/ajouter", name="app_episode_add")
     * @Security("has_role('ROLE_USER')")
     */
    public function addAction(Request $request)
    {
        $episode = new Episode();
        $form = $this->createForm(EpisodeType::class, $episode);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $episode->upload();

            $em = $this->getDoctrine()->getManager();
            $em->persist($episode);
            $em->flush();

            return $this->redirect($this->generateUrl(
                'app_episode_show',
                array('id' => $episode->getId())
            ));
        }

        return $this->render('episode/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Formulaire d'édition d'un épisode
     *
     * @Route("/editer/{id}", name="app_episode_edit", requirements={"id" = "[a-z0-9-]+"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function editAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $episode_repository = $em->getRepository('AppBundle:Episode');

        $episode = $episode_repository->find($id);
        if(is_null($episode)) {
            $response = $this->render('TwigBundle:Exception:error404.html.twig');
            $response->setStatusCode(404);
            return $response;
        }

        $form = $this->createForm(EpisodeType::class, $episode);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $episode->removeUpload();
            $episode->upload();

            $em = $this->getDoctrine()->getManager();
            $em->persist($episode);
            $em->flush();

            return $this->redirect($this->generateUrl(
                'app_episode_show',
                array('id' => $episode->getId())
            ));
        }

        return $this->render('episode/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Suppression d'un épisode
     *
     * @Route("/supprimer/{id}", name="app_episode_delete", requirements={"name" = "[a-z0-9-]+"})
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function removeAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $episode_repository = $em->getRepository('AppBundle:Episode');

        $episode = $episode_repository->find($id);
        if(is_null($episode)) {
            $response = $this->render('TwigBundle:Exception:error404.html.twig');
            $response->setStatusCode(404);
            return $response;
        }

        $tvseries_name = $episode->getTvseries()->getName();

        $episode->removeUpload();
        $em->remove($episode);
        $em->flush();

        return $this->redirect($this->generateUrl('app_tvseries_show', [
            'name' => $tvseries_name
        ]));
    }

    /**
     * Action de visionnage d'un épisode par l'utilisateur
     *
     * @Route("/visionner/{id}", name="app_episode_watch", requirements={"name" = "[a-z0-9-]+"})
     * @Security("has_role('ROLE_USER')")
     */
    public function watchAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $user_episode_repository = $em->getRepository('AppBundle:UserEpisode');
        $episode_repository = $em->getRepository('AppBundle:Episode');

        $user = $this->container->get('security.context')->getToken()->getUser();
        $episode = $episode_repository->find($id);
        if(is_null($episode)) {
            $response = $this->render('TwigBundle:Exception:error404.html.twig');
            $response->setStatusCode(404);
            return $response;
        }

        $user_episode_repository->add($user, $episode);

        return $this->redirect($this->generateUrl('app_tvseries_show', [
            'name' => $episode->getTvseries()->getName()
        ]));
    }
}