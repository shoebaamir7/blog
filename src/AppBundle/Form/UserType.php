<?php

namespace AppBundle\Form;

use AppBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class,array(
                'attr' => array(
                        'class' => 'form-control'
                )
            ))    
            ->add('email', EmailType::class,array(
                'attr' => array(
                        'class' => 'form-control'
                )
            ))
            ->add('roles', ChoiceType::class, array(
                    'attr'  =>  array(
                            'class' => 'form-control',
                            'style' => 'margin:5px 0;'),
                    'choices'  => array(
                            'Normal User'   => 'Normal User',
                            'Admin User'   => 'Admin User',
                    ),
            ))    
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
                'attr' => array('class' => 'form-control')
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}