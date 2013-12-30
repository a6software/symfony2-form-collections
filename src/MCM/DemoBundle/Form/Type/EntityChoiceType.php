<?php

namespace MCM\DemoBundle\Form\Type;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class EntityChoiceType extends AbstractType
{
    private $myVar;

    public function __construct($myVar)
    {
       $this->myVar = $myVar;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $myModifier = $this->myVar;

        $builder
            ->add('favColour', 'entity', array(
                'class'         => 'MCMDemoBundle:Colour',
                'property'      => 'name',
                'query_builder' => function (EntityRepository $er) use ($myModifier) {
                    return $er->createQueryBuilder('c')
                              ->orderBy('c.name', 'DESC')
                              ->where('c.id >= :myModifier')
                              ->setParameter('myModifier', $myModifier)
                    ;
                },
            ))
            ->add('save', 'submit')
        ;
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MCM\DemoBundle\Entity\MyChoice',
        ));
    }

    public function getName()
    {
        return 'entity_choice';
    }
}