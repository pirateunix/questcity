<?php
/**
 * Created by PhpStorm.
 * User: pirate
 * Date: 14.02.16
 * Time: 18:48
 */

namespace QuestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QuestController extends Controller
{

    public function indexAction($key)
    {
        $quest = $this->get('doctrine_mongodb')
            ->getRepository('QuestBundle:Quest')
            ->findOneByName($key);

        if (!$quest) {
            throw $this->createNotFoundException('No Quest found');
        }

        return $this->render('QuestBundle:Quest:index.html.twig', array('quest' => $quest));

    }

}