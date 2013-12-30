<?php

namespace MCM\DemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'label' => 'Your Name',
                'label_attr' => array(
                    'attr'  => array(
                        'class' => 'col-lg-2 control-label'
                    )
                ),
                'attr'  => array(
                    'class' => 'form-control col-lg-6'
                )
            ))
            ->add('age', 'integer', array(
                'attr'  => array(
                    'class' => 'form-control'
                )
            ))
            ->add('save', 'submit', array(
                'attr'  => array(
                    'class' => 'btn btn-lg btn-success'
                )
            ))
        ;
    }

    public function getName()
    {
        return 'person';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCM\DemoBundle\Entity\Person',
        ));
    }
}