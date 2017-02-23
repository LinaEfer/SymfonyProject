<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Episode;
use AppBundle\Entity\TvSeries;
use AppBundle\Entity\UserEpisode;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserEpisodeController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/episodes/add", name="add_episode")
     */
    public function watchAction(Request $request){

        if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            throw $this->createAccessDeniedException();
        }
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $manager = $this->getDoctrine()->getManager();
        
        $episodeName = $request->get('episode_name');
        $eName = $manager->getRepository(Episode::class)->findOneBy(array('name' => $episodeName));

        $ue = new UserEpisode();
        $ue->setUser($user);
        $ue->setEpisode($eName);

        dump($user, $eName, $ue);

        $em = $this->getDoctrine()->getManager();
        $em->persist($ue);
        $em->flush();

        return new Response('magic');

    }

    /**
     * @Route("/episodes/about", name="episode_info")
     * @Security("is_granted('ROLE_USER')")
     */
    public function listAction(Request $request)
    {
        $manager = $this->getDoctrine()->getManager();
        $seriesName = $request->get('series_name');
        $series = $manager->getRepository(TvSeries::class)->findOneBy(array('name' => $seriesName));
        $seriesId = $series->getId();
        $episodes = $manager->getRepository(Episode::class)->findBy(array('tvSeries'=> $seriesId));
        $userEpisode = $manager->getRepository(UserEpisode::class)->findAll();

        return $this->render('episodes/about.html.twig',['series' => $series,'episodes' => $episodes, 'userEpisode' => $userEpisode]);
    }

}