<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05/02/2017
 * Time: 11:00
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Episode;
use AppBundle\Form\EpisodeForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type;

class EpisodeController extends Controller
{
    /**
     * @Route("/episodes/create", name="create_episode")
     * @param Request $request
     * @return Response
     */
    public function createEpisodeAction(Request $request)
    {
        //Create new episode
        $e = new Episode();

        $formEpisode = $this->createForm(EpisodeForm::class, $e);

        $formEpisode->handleRequest($request);

        if ($formEpisode->isSubmitted() && $formEpisode->isValid()) {

            $e = $formEpisode->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($e);
            $em->flush();

            return new Response('New episode was added');
        }

        return $this->render('episodes/index.html.twig', array(
            'form' => $formEpisode->createView(),
        ));
    }

    /**
     * @Route("/episode/remove")
     * @param Request $request
     * @return Response
     */
    public function removeEpisodeAction(Request $request)
    {
        //series/remove?series_name=...
        $manager = $this->getDoctrine()->getManager();
        $episodeName = $request->get('episode_name');
        $name = $manager->getRepository(Episode::class)->findOneBy(['name' => $episodeName]);

        $manager->remove($name);
        $manager->flush();
        return new Response('ok');
    }
}
