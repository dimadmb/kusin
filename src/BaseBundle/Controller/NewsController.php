<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class NewsController extends Controller
{
	 /**

     * @Template()
     */
    public function indexAction()
    {
		return $this->listNewsAction();
    }
	

	 /**
     * @Template()
     */	
	public function listNewsAction($limit = null)
	{
        $repository = $this->getDoctrine()->getRepository("BaseBundle:News");
		$news = $repository->findBy(array(),array('date' => 'DESC'),$limit);        
		
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


