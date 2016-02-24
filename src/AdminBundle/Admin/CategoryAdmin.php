<?php

namespace AdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;

class CategoryAdmin extends Admin
{
    // установка сортировки по умолчанию
    protected $datagridValues = [
        '_sort_order' => 'ASC',
        '_sort_by'    => 'id'
    ];
	
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
		->add('name')
		->add('description', null, array('required' => false ))
		->add('code');
	
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
		->add('name');
        ;
    }
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
		->add('name');
        ;
    }	
	
}