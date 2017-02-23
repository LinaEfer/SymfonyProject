<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Episode;
use AppBundle\Entity\TvSeries;
use AppBundle\Form\TvSeriesForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TvSeriesController extends Controller
{
    /**
     * @Route("/series/create", name="create_serie")
     * @param Request $request
     * @return Response
     */
    public function createSeriesAction(Request $request) {
        $s = new TvSeries();

        $formSeries = $this->createForm(TvSeriesForm::class, $s);

        $formSeries->handleRequest($request);
        
        if ($formSeries->isSubmitted() && $formSeries->isValid()) {

            $s = $formSeries->getData();
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($s);
            $manager->flush();

            return new Response('ok');
        }
        return $this->render('tvseries/index.html.twig', array(
            'form' => $formSeries->createView(),
        ));
    }

    /**
     * @Route("/series/remove")
     * @param Request $request
     * @return Response
     */
    public function removeSeriesAction(Request $request)
    {
        //series/remove?series_name=...
        $manager = $this->getDoctrine()->getManager();
        $seriesName = $request->get('series_name');
        $name = $manager->getRepository(TvSeries::class)->findOneBy(['name' => $seriesName]);
        
        $manager->remove($name);
        $manager->flush();
        return new Response('ok');
    }

	/**
     * @Route("/", name="homepage")
     */
	public function listAction() {

		$manager = $this->getDoctrine()->getManager();
        $series = $manager->getRepository(TvSeries::class)->findAll();
        $episodes = $manager->getRepository(Episode::class)->findAll();

		return $this->render('index.html.twig',['series' => $series,'episodes' => $episodes]);
	}
}