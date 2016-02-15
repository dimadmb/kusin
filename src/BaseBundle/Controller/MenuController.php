<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class MenuController extends Controller
{

	/**
	* @Template()
	*/

	public function getMenuAction()
	{
        $repository = $this->getDoctrine()->getRepository("BaseBundle:Page");
		$pages = $repository->findBy(array(),array('sort' => 'ASC'));
		return array('pages' => $pages );
	}
	
}
