<?php

namespace MCM\DemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class GenreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'label' => 'Genre Name',
            ))
            ->add('djs', 'collection', array(
                'type'  => new DjType()
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
        return 'genre';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCM\DemoBundle\Entity\Genre',
        ));
    }
}