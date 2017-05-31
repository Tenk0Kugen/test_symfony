<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Repository;

class CategoryController extends Controller
{
    /**
     * @Route("/category/{category_name}/", name="category")
     */
    public function categoryAction(Request $request, $category_name)
    {
		$doct = $this->getDoctrine();
		$category = $doct->getRepository('AppBundle:Category')->findOneBy(array('name' => $category_name));
		dump($category);
		if ($category !== null) {
			$categoryProducts = $category->getProducts();
		} else {
			$categoryProducts = null;
		}
		dump($categoryProducts);
        return $this->render('AppBundle:Category:category.html.twig', array(
			'category_name' => $category_name,
			'products' => $categoryProducts
		));
    }
}
