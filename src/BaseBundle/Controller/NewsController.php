<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class NewsController extends Controller
{
	 /**
     * @Route("/news", name="news")
     * @Template()
     */
    public function indexAction()
    {
        /*$repository = $this->getDoctrine()->getRepository("BaseBundle:News");
		$news = $repository->findAll();        
		
		return array('news' => $news);*/
		return $this->listNewsAction();
    }
	

	 /**
     * @Template()
     */	
	public function listNewsAction()
	{
        $repository = $this->getDoctrine()->getRepository("BaseBundle:News");
		$news = $repository->findAll();        
		
		return array('news' => $news);		
	}
		

	 /**
     * @Route("/news/{id}", name="news_details")	 
     * @Template()
     */	
	public function detailsNewsAction($id)
	{
        $repository = $this->getDoctrine()->getRepository("BaseBundle:News");
		$new = $repository->findOneById($id);        
		
		return array('new' => $new);		
	}
	
	
	
}


