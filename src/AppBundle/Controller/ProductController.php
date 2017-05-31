<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Repository;

class ProductController extends Controller
{
    /**
     * @Route("/product/{product_name}/", name="product")
     */
    public function productAction(Request $request, $product_name)
    {
		$product = $this->getDoctrine()->getRepository('AppBundle:Product')->findOneBy(array('name' => $product_name));
		
        return $this->render('AppBundle:Product:product.html.twig', array(
			'product' => $product
		));
    }
}
