<?php

namespace MCM\DemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArrayChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('favColour', 'choice', array(
                'choices'       => array(
                    0 => 'red',
                    1 => 'blue',
                    2 => 'green',
                    3 => 'white',
                    4 => 'black',
                ),
                'required'      => false,
                'multiple'      => true,
                'expanded'      => true,
                'label_attr'    => array(
                    'class'     => "control-label",
                ),
                'attr'          => array(
                    'class'     => "form-control",
                )
            ))
            ->add('save', 'submit', array(
                'attr'          => array(
                    'class'     => "btn btn-success",
                )
            ))
        ;
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCM\DemoBundle\Entity\Colour',
            'attr'       => array(
                'class'     => 'form-horizontal',
                'role'      => 'form',
            ),
        ));
    }

    public function getName()
    {
        return 'array_choice';
    }
}