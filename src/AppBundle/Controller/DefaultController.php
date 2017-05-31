<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Repository;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
		$doct = $this->getDoctrine();
		$categoryRepo = $doct->getRepository('AppBundle:Category');
		$productRepo = $doct->getRepository('AppBundle:Product');
		
        return $this->render('AppBundle:Default:default.html.twig', array(
			'products' => $productRepo->findAll(),
			'categories' => $categoryRepo->findAll()
		));
    }
}
