<?php
/**
 * Created by PhpStorm.
 * User: pirate
 * Date: 25.02.16
 * Time: 18:19
 */

namespace QuestBundle\Controller;

use QuestBundle\Document\Quest;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use QuestBundle\Form\Type\QuestType;
use QuestBundle\Form\Type\QuestAddType;
use Symfony\Component\HttpFoundation\Request;


class PrivateQuestController extends Controller
{

    public function indexAction()
    {
        $repository = $this->get('doctrine_mongodb')->getManager();
        $quests = $repository->getRepository('QuestBundle:Quest')
            ->findAll();

        if (!$quests) {
            throw $this->createNotFoundException('No quest found');
        }

        return $this->render('QuestBundle:PrivateQuest:index.html.twig', array('quests' => $quests, 'active' => ""));

    }

    public function editAction(Request $request, $key)
    {

        $repository = $this->get('doctrine_mongodb')->getManager();
        $quest = $repository->getRepository('QuestBundle:Quest')
            ->findOneByName($key);
        if (!$quest) {
            throw $this->createNotFoundException('No quest found');
        }

        $form = $this->createForm(QuestType::class, $quest);
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $repository->flush();
                return $this->redirect('/vilmins/articles/');
            }
        }

        return $this->render('QuestBundle:PrivateQuest:edit.html.twig', array('form' => $form->createView(), 'active' => ""));

    }

    public function addAction(Request $request)
    {
        $quest = new Quest();
        $form = $this->createForm(QuestAddType::class, $quest);

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $repository = $this->get('doctrine_mongodb')->getManager();
                $repository->persist($quest);
                $repository->flush();
                return $this->redirect('/vilmins/articles/');
            }
        }

        return $this->render('QuestBundle:PrivateQuest:add.html.twig', array('form' => $form->createView(), 'active' => ""));
    }

    public function deleteAction($key)
    {
        $repository = $this->get('doctrine_mongodb')->getManager();
        $quest = $repository->getRepository('QuestBundle:Quest')
            ->findByName($key);
        if (!$quest) {
            throw $this->createNotFoundException('No quest found');
        }
        $repository->remove($quest[0]);
        $repository->flush();
        return $this->redirect('/vilmins/quest/');

    }

}