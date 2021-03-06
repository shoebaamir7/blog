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
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
                            'ROLE_USER'   => 'Normal User',
                            'ROLE_ADMIN'   => 'Admin User',
                    ),
            ))    
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'first_options'  => array('label' => 'Password'),
                'second_options' => array('label' => 'Repeat Password'),
                'options' => array('attr' => array('class' => 'form-control'))
            ))
            ->add('Register', SubmitType::class, array('label' => 'Register','attr'=>array('class'=>'btn btn-success form-control')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => User::class,
        ));
    }
}