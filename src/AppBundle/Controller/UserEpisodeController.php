<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Episode;
use AppBundle\Entity\TvSeries;
use AppBundle\Entity\User;
use AppBundle\Entity\UserEpisode;
use Doctrine\ORM\Mapping\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\User\UserInterface;
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
        $user_id = $user->getId();

        $manager = $this->getDoctrine()->getManager();
        
        $episodeName = $request->get('episode_name');
        $eName = $manager->getRepository(Episode::class)->findOneBy(array('name' => $episodeName));
        $episode_id = $eName->getId();

        $ue = new UserEpisode();
        $ue->setUserId($user_id);
        $ue->setEpisodeId($episode_id);

        dump($user_id, $eName, $ue);

       /* $em = $this->getDoctrine()->getManager();
        $em->persist($ue);
        $em->flush();*/

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

        return $this->render('episodes/about.html.twig',['series' => $series,'episodes' => $episodes]);
    }

}