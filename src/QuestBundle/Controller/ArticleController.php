<?php
/**
 * Created by PhpStorm.
 * User: pirate
 * Date: 13.02.16
 * Time: 9:55
 */

namespace QuestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ArticleController extends Controller
{
    public function indexAction($key)
    {
        $article = $this->get('doctrine_mongodb')
            ->getRepository('QuestBundle:Article')
            ->findOneByKey($key);

        if (!$article) {
            throw $this->createNotFoundException('No article found');
        }

        return $this->render('QuestBundle:Article:index.html.twig', array('article' => $article));
    }

}