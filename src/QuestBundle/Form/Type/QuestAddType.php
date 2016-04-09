<?php
/**
 * Created by PhpStorm.
 * User: pirate
 * Date: 28.02.16
 * Time: 10:55
 */

namespace QuestBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;


class QuestAddType extends QuestType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->add('name', 'text');
    }

}