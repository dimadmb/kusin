<?php

namespace AdminBundle\Admin;

use Knp\Menu\ItemInterface;
use Sonata\AdminBundle\Admin\AdminInterface;

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
            ->add('anounce', null, array('label' => 'Анонс (Краткое содержание в списке новостей)','attr' => array('class' => 'tinymce')))
            ->add('text', null, array('label' => 'Основной текст новости','attr' => array('class' => 'tinymce')))
            ->add('date', null, array('label' => 'Дата публикации','data' =>  new \DateTime('now') ))
			->add('category', 'sonata_type_model', array('label' => 'Рубрика'))
			->add('img', 'file' , array('label' => 'Картинка','attr'=>array('name' => 'img')))
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
	
    /**
     * Конфигурация левого меню при отображении и редатировании записи
     *
     * @param \Knp\Menu\ItemInterface $menu
     * @param $action
     * @param null|\Sonata\AdminBundle\Admin\Admin $childAdmin
     *
     * @return void
     */
    protected function configureSideMenu(ItemInterface $menu, $action, AdminInterface $childAdmin = null)
    {

    }	
}