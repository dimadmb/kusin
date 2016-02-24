<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;



class PageAdmin extends Admin
{
    // установка сортировки по умолчанию
    protected $datagridValues = [
        '_sort_order' => 'ASC',
        '_sort_by'    => 'sort'
    ];
	
    protected function configureFormFields(FormMapper $formMapper)
    {
        //$pages = $this->getDoctrine()->getRepository("BaseBundle:Page")->findBy(array(),array('sort' => 'ASC'));
		
		$formMapper
            ->add('title', null, array('label' => 'Заголовок'))
            ->add('titleMenu', null, array('label' => 'Заголовок в меню'))
            ->add('body','textarea', array('label' => 'Текст страницы','required'=>false,'attr' => array('class' => 'tinymce', )))
            ->add('url', null , array('label' => 'Адрес страницы'))
            ->add('parentId', 'entity' , array(
						'label' => 'Родитель',
						'class' => 'BaseBundle:Page',
						/*'query_builder' => function($repository) {
							return $repository->createQueryBuilder('p');
						},*/
						'choice_label' => 'title',
						'choice_value'=>'id',
						'placeholder' => 'Корень ',
						'required'=> false,
						'multiple' => false,
			
			),
			array('type' => 'form')
			)
            ->add('sort', null, array('label' => 'Сортировка' , 'empty_data' => 500))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array('label' => 'Заголовок'))
        ;
    }
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title', null, array('label' => 'Заголовок'))			
            ->addIdentifier('titleMenu', null, array('label' => 'Заголовок Меню'))			
        ;
    }	
}