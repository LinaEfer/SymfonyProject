<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 05/02/2017
 * Time: 11:00
 */

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\Episode;
use AppBundle\Entity\TvSeries;
use AppBundle\Form\EpisodeForm;
use Doctrine\ORM\EntityRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class EpisodeController extends Controller
{
    /**
     * @Route("/episodes/create")
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
         * @Route("/episodes/about")
         * @Security("is_granted('ROLE_USER')")
         */
        public function listAction()
        {
            $manager = $this->getDoctrine()->getManager();
            $episodes = $manager->getRepository(Episode::class)->findAll();

            return $this->render('episodes/about.html.twig', ['episodes' => $episodes]);
        }
    }
