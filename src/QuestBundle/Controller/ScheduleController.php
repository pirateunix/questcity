<?php
/**
 * Created by PhpStorm.
 * User: pirate
 * Date: 14.02.16
 * Time: 18:45
 */

namespace QuestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use QuestBundle\Form\Type\ScheduleType;
use QuestBundle\Document\Schedule;
use Symfony\Component\HttpFoundation\Request;


class ScheduleController extends Controller
{
    public function indexAction($year, $month, $day)
    {
        $quests = $this->get('doctrine_mongodb')
            ->getRepository('QuestBundle:Quest')
            ->findAll();

        if (!$quests) {
            throw $this->createNotFoundException('No quest found');
        }

        $months = [1 => 'январь', 2 => 'февраль', 3 => 'март', 4 => 'апрель', 5 => 'май', 6 => 'июнь', 7 => 'июль', 8 => 'август', 9 => 'сентябрь', 10 => 'октябрь', 11 => 'ноябрь', 12 => 'декабрь'];
        $monthsRod = [1 => 'января', 2 => 'февраля', 3 => 'марта', 4 => 'апреля', 5 => 'мая', 6 => 'июня', 7 => 'июля', 8 => 'августа', 9 => 'сентября', 10 => 'октября', 11 => 'ноября', 12 => 'декабря'];

        $time = strtotime("{$year}-{$month}-{$day}");

        if ($time < time()) {
            $time = time();
        }

        $article = $this->get('doctrine_mongodb')
            ->getRepository('QuestBundle:Article')
            ->findByKey('schedule');

        if (!$article) {
            throw $this->createNotFoundException('No article found');
        }

        return $this->render('QuestBundle:Schedule:index.html.twig', array('months' => $months,
            'monthsRod' => $monthsRod,
            'currentMonth' => date('n', $time),
            'currentYear' => date('Y', $time),
            'currentDay' => date('d', $time),
            'timeStart' => strtotime('today 08:00', $time),
            'timeEnd' => strtotime('today 22:00', $time),
            'numberOfDates' => date('t', $time),
            'article' => $article[0],
            'quests' => $quests,
            'success' => null));

    }

    public function formAction(Request $request)
    {
        $schedule = new Schedule();
        $form = $this->createForm(ScheduleType::class, $schedule,
            array('action' => $this->generateUrl('scheduleForm')));

        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);

            if ($form->isValid()) {
                $schedule->setQuest($request->request->get('quest'));
                $schedule->setBookTime($request->request->get('time'));
                $repository = $this->get('doctrine_mongodb')->getManager();
                $repository->persist($schedule);
                $repository->flush();

                return $this->redirectToRoute('schedule');

            }

        }
        return $this->render('QuestBundle:Schedule:form.html.twig', array('form' => $form->createView()));


    }

}