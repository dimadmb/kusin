<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class NewsAdmin extends Admin
{
    // установка сортировки по умолчанию
    protected $datagridValues = [
        '_sort_order' => 'DESC',
        '_sort_by'    => 'date'
    ];
	
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', null, array('label' => 'Заголовок'))
            ->add('anounce', null, array('label' => 'Анонс (Краткое содержание в списке новостей)'))
            ->add('text', null, array('label' => 'Основной текст новости'))
            ->add('date', null, array('label' => 'Дата публикации','data' =>  new \DateTime('now') ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title', null, array('label' => 'Заголовок'))
            ->add('text', null, array('label' => 'Основной текст новости'))
        ;
    }
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
			->add('date', null, array('label' => 'Дата публикации'))
            ->addIdentifier('title', null, array('label' => 'Заголовок'))			
        ;
    }	
}