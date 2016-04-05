<?php
/**
 * Created by PhpStorm.
 * User: pirate
 * Date: 25.02.16
 * Time: 12:46
 */

namespace QuestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PrivateScheduleController extends Controller {

    public function indexAction()
    {
        $repository = $this->get('doctrine_mongodb')->getManager();
        $schedules = $repository->getRepository('QuestBundle:Schedule')
            ->findBy(array('confirmed' => null, 'rejected' => null), array('book_time' => -1));

        if (!$schedules) {
            throw $this->createNotFoundException('No schedule found');
        }

        return $this->render('QuestBundle:PrivateSchedule:index.html.twig', array('schedules' => $schedules, 'active' => ""));
    }

    public function confirmedAction()
    {
        $repository = $this->get('doctrine_mongodb')->getManager();
        $schedules = $repository->getRepository('QuestBundle:Schedule')
            ->findBy(array('confirmed' => true), array('book_time' => -1));

        if (!$schedules) {
            throw $this->createNotFoundException('No schedule found');
        }

        return $this->render('QuestBundle:PrivateSchedule:index.html.twig', array('schedules' => $schedules, 'active' => ""));
    }

    public function rejectedAction()
    {
        $repository = $this->get('doctrine_mongodb')->getManager();
        $schedules = $repository->getRepository('QuestBundle:Schedule')
            ->findBy(array('rejected' => true), array('book_time' => -1));

        if (!$schedules) {
            throw $this->createNotFoundException('No schedule found');
        }

        return $this->render('QuestBundle:PrivateSchedule:index.html.twig', array('schedules' => $schedules, 'active' => ""));
    }

    public function todayAction()
    {
        $repository = $this->get('doctrine_mongodb')->getManager();
        $schedules = $repository->getRepository('QuestBundle:Schedule')
            ->findBy(array('book_time' => ['$gte' => mktime(0,0,0), '$lte'=> mktime(23,59,59)]), array('book_time' => -1));

        return $this->render('QuestBundle:PrivateSchedule:index.html.twig', array('schedules' => $schedules, 'active' => ""));

    }


    public function confirmAction($key)
    {
        $repository = $this->get('doctrine_mongodb')->getManager();

        $schedule = $repository->getRepository('QuestBundle:Schedule')
            ->find($key);
        if (!$schedule) {
            throw $this->createNotFoundException('No schedule found');
        }
        $schedule->setConfirmed(true);
        $repository->flush();
        return $this->redirect('/vilmins/schedule/');

    }

    public function rejectAction($key)
    {
        $repository = $this->get('doctrine_mongodb')->getManager();

        $schedule = $repository->getRepository('QuestBundle:Schedule')
            ->find($key);
        if (!$schedule) {
            throw $this->createNotFoundException('No schedule found');
        }
        $schedule->setRejected(true);
        $repository->flush();

        return $this->redirect('/vilmins/schedule/');

    }

}