<?php

namespace MCM\DemoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ConferenceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text', array(
                'label'     => 'Conference Name',
            ))
            ->add('speakers', 'collection', array(
                'type'          => new SpeakerType(),
                'allow_add'     => true,
                'allow_delete'  => true,
                'by_reference'  => false,
            ))
            ->add('save', 'submit', array(
                'attr'      => array(
                    'class' => 'btn btn-lg btn-success'
                )
            ))
        ;
    }

    public function getName()
    {
        return 'conference';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCM\DemoBundle\Entity\Conference',
        ));
    }
}