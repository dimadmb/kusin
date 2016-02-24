<?php

namespace BaseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SliderController extends Controller
{
	
    /**
     * @Template()
     */
	 public function getSlidesAction()
	 {
		 $repository = $this->getDoctrine()->getRepository("BaseBundle:Slider");
		 $slides = $repository->findAll();
		 return array('slides' => $slides);
	 }
}
