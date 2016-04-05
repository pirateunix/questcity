<?php
/**
 * Created by PhpStorm.
 * User: pirate
 * Date: 07.02.16
 * Time: 17:54
 */

namespace QuestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{

    public function indexAction()
    {
        $quest = $this->get('doctrine_mongodb')
            ->getRepository('QuestBundle:Quest')
            ->findAll();

        if (!$quest) {
            throw $this->createNotFoundException('No quest found');
        }

        return $this->render('QuestBundle:Main:index.html.twig', array('quests' => $quest));

    }
}