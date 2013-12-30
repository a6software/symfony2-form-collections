<?php

namespace MCM\DemoBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EntityChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('favColour', 'entity', array(
                'class'         => 'MCMDemoBundle:Colour',
                'property'      => 'favColour',
            ))
            ->add('save', 'submit')
        ;
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCM\DemoBundle\Entity\Colour',
        ));
    }

    public function getName()
    {
        return 'entity_choice';
    }
}