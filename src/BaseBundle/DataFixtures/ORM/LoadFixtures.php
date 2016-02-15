<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BaseBundle\DataFixtures\ORM;

use BaseBundle\Entity\User;
use BaseBundle\Entity\News;
use BaseBundle\Entity\Page;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines the sample data to load in the database when running the unit and
 * functional tests. Execute this command to load the data:
 *
 *   $ php app/console doctrine:fixtures:load
 *
 * See http://symfony.com/doc/current/bundles/DoctrineFixturesBundle/index.html
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class LoadFixtures implements FixtureInterface, ContainerAwareInterface
{
    /** @var ContainerInterface */
    private $container;

    /**
     * {@inheritdoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->loadUsers($manager);
        $this->loadNews($manager);
        $this->loadPages($manager);
		
    }

    private function loadUsers(ObjectManager $manager)
    {
        $passwordEncoder = $this->container->get('security.password_encoder');

        $johnUser = new User();
        $johnUser->setUsername('john_user');
        $johnUser->setEmail('john_user@symfony.com');
        $encodedPassword = $passwordEncoder->encodePassword($johnUser, 'kitten');
        $johnUser->setPassword($encodedPassword);
        $manager->persist($johnUser);

        $dimaAdmin = new User();
        $dimaAdmin->setUsername('dima');
        $dimaAdmin->setEmail('12nas24@mail.ru');
        $dimaAdmin->setRoles(array('ROLE_ADMIN'));
        $encodedPassword = $passwordEncoder->encodePassword($dimaAdmin, '2045');
        $dimaAdmin->setPassword($encodedPassword);
        $manager->persist($dimaAdmin);

        $manager->flush();
    }

    private function loadPages(ObjectManager $manager)
	{
		$index = new Page();
		$index->setTitleMenu('Главная')
				->setTitle('Добро пожаловать на мой сайт!')
				->setBody('
				<p>Когда задумывалось создание этого сайта, в качестве основной идеи рассматривалось  максимально полное информирование читателей обо мне и моей работе депутата  как непосредственно в  Государственной Думе, так  и в Северо-Восточном округе г. Москвы. Каждый желающий сможет без труда найти здесь полезную информацию  о работе органов государственной, региональной и муниципальной власти, органов местного самоуправления, а также новости из Московского городского и окружного отделений партии «Единая Россия». Я и мои помощники постараемся оперативно информировать вас о новостях из Государственной Думы и актуальных событиях в моем округе.</p>
<p>Для меня очень важно также ваше мнение о моей депутатской деятельности, и я готов вместе с вами работать над тем, чтобы решать ваши житейские проблемы. Мне хотелось бы также услышать от вас реальные предложения по улучшению своей работы и идеи о путях и способах преодоления тех трудностей, с которыми сталкивается каждый из нас в повседневной жизни.</p>
<p>Надеюсь, что этот сайт будет вам полезен.</p>
<p>С уважением и пожеланием благополучия вам и вашим близким!</p>')
				->setUrl('index')
				->setParentId(null)
				->setSort(500)
				;
				
        $manager->persist($index);
		
		
		$biografiya = new Page();
		$biografiya->setTitle('Биография')
				->setTitleMenu('Биография')
				->setBody('Текст страницы биография')
				->setUrl('biografiya')
				->setParentId(null)
				->setSort(600)
				;
				
        $manager->persist($biografiya);	

		
		$rabota = new Page();
		$rabota->setTitle('Работа депутата')
				->setTitleMenu('Работа депутата')
				->setBody('Текст страницы Работа депутата')
				->setUrl('rabota-deputata')
				->setParentId(null)
				->setSort(700)
				;
				
        $manager->persist($rabota);	
		
		$rabota_v_dume = new Page();
		$rabota_v_dume->setTitle('Работа в думе')
				->setTitleMenu('Работа в думе')
				->setBody('Текст страницы Работа в думе')
				->setUrl('rabota-v-dume')
				->setParentId(null)
				->setSort(710)
				;
				
        $manager->persist($rabota_v_dume);
		
		
		$news = new Page();
		$news->setTitle('Новости')
				->setTitleMenu('Новости')
				->setBody('')
				->setUrl('news')
				->setParentId(null)
				->setSort(800)
				;
				
        $manager->persist($news);

        $manager->flush();		
		
	}
	
	
    private function loadNews(ObjectManager $manager)
	{
		$news1 = new News();
		$news1->setTitle('Заголовок первой новости')
				->setAnounce('Анонс первой новости<br>Вторая строка')
				->setDate(new \DateTime('2016-02-15 11:00:00'))
				->setText('Текст первой новости')
				;
		$manager->persist($news1);

		
		$news2 = new News();
		$news2->setTitle('Заголовок Второй новости')
				->setAnounce('Анонс Второй новости<br>Вторая строка')
				->setDate(new \DateTime('2016-02-16 12:00:00'))
				->setText('Текст Второй новости<br>Вторая строка')
				;
		$manager->persist($news2);


		$manager->flush();
	}

	
	
	
	
	
	
	
    /**
     * {@inheritdoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }


}
