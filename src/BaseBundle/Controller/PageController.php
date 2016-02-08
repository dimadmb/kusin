<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class PageController extends Controller
{
    /**
     * @Route("/", name="homepage")
     * @Template()
     */
    public function indexAction()
    {
        return $this->pageAction("index");
    }
	
	    /**
     * @Route("/{first}.html", name="page")
     * @Template()
     */
    public function pageAction($first)
    {
        $repository = $this->getDoctrine()->getRepository("BaseBundle:Page");
		$page = $repository->findOneByUrl($first);
		if (!$page) {
			throw $this->createNotFoundException("Страница $first.html не найдена.");
		}		
		
		
		return array("page" => $page, );
    }
	
	
}
