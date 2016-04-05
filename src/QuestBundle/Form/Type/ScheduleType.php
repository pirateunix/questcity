<?php
/**
 * Created by PhpStorm.
 * User: pirate
 * Date: 28.02.16
 * Time: 10:55
 */

namespace QuestBundle\Form\Type;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ScheduleType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('phone', 'text')
            ->add('vk', 'text', ['required' => false])
            ->add('email', 'text', ['required' => false])
            ->add('cert', 'text', ['required' => false])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QuestBundle\Document\Schedule',
        ));
    }

}