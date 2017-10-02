<?php

namespace EventBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EventType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, array(
                'attr' => array(
                    'class' => 'mdl-textfield__input'
                ),
                'label_attr' => array(
                    'class' => 'mdl-textfield__label'
                )
            ))
            ->add('speaker', TextType::class, array(
                'attr' => array(
                    'class' => 'mdl-textfield__input'
                ),
                'label_attr' => array(
                    'class' => 'mdl-textfield__label'
                )
            ))
            ->add('description', TextareaType::class, array(
                'attr' => array(
                    'class' => 'mdl-textfield__input'
                ),
                'label_attr' => array(
                    'class' => 'mdl-textfield__label'
                )
            ))
            ->add('schedule', DateTimeType::class, array())
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EventBundle\Entity\Event'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'eventbundle_event';
    }


}
