<?php
/**
 * Created by PhpStorm.
 * User: pirate
 * Date: 25.02.16
 * Time: 12:46
 */

namespace QuestBundle\Controller;

use QuestBundle\Form\Type\ArticleType;
use QuestBundle\Form\Type\ArticleAddType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use QuestBundle\Document\Article;
use Symfony\Component\HttpFoundation\Request;

class PrivateArticleController extends Controller {

    public function indexAction()
    {
        $repository = $this->get('doctrine_mongodb')->getManager();
        $articles = $repository->getRepository('QuestBundle:Article')
            ->findAll();

        if (!$articles) {
            throw $this->createNotFoundException('No article found');
        }

        return $this->render('QuestBundle:PrivateArticle:index.html.twig', array('articles' => $articles, 'active' => ""));

    }

    public function editAction(Request $request, $key)
    {

        $repository = $this->get('doctrine_mongodb')->getManager();
        $article = $repository->getRepository('QuestBundle:Article')
            ->findOneByKey($key);
        if (!$article) {
            throw $this->createNotFoundException('No article found');
        }

        $form = $this->createForm(ArticleType::class, $article);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $repository->flush();
                return $this->redirect('/vilmins/articles/');
            }
        }

        return $this->render('QuestBundle:PrivateArticle:edit.html.twig', array('form' => $form->createView(), 'name' => $article->getKey(), 'active' => ""));

    }

    public function addAction(Request $request)
    {

        $article = new Article();

        $form = $this->createForm(ArticleAddType::class, $article);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $repository = $this->get('doctrine_mongodb')->getManager();
                $repository->persist($article);
                $repository->flush();
                return $this->redirect('/vilmins/articles/');
            }
        }

        return $this->render('QuestBundle:PrivateArticle:add.html.twig', array('form' => $form->createView(), 'active' => ""));

    }

    public function deleteAction($key)
    {

        $repository = $this->get('doctrine_mongodb')->getManager();
        $article = $repository->getRepository('QuestBundle:Article')
            ->findOneByKey($key);
        if (!$article) {
            throw $this->createNotFoundException('No article found');
        }
        $repository->remove($article);
        $repository->flush();
        return $this->redirect('/vilmins/articles/');
    }

}