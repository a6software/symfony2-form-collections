<?php

namespace MCM\DemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class ArrayChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('favColour', 'choice', array(
                'choices'   => array(
                    'red',
                    'blue',
                    'green',
                    'white',
                    'black',
                ),
                'required'  => false,
            ))
            ->add('save', 'submit')
        ;
    }

    public function getName()
    {
        return 'array_choice';
    }
}