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

class QuestType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('bookText', 'text')
            ->add('color', 'text')
            ->add('step', 'text')
            ->add('text', 'textarea')
            ->add('timeEnd', 'text')
            ->add('timeStart', 'text')
            ->add('title', 'text')
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'QuestBundle\Document\Quest',
        ));
    }

}