<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Form;

/**
 * Description of LogInForm
 *
 * @author Etudiant
 */
class LogInForm extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options){
        $builder->add('email', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Regex([
                        'pattern' => "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/"
                    ])
                ]
            ])
                ->add(
                'password',
                TextType::class,
                [
                    'type' => PasswordType::class,
                    'required' => true,
                    'first_options' => [
                        'label' => 'Password'
                    ]]);
            
        if ($options['standalone']){
            $builder->add('submit', SubmitType::class,[
                'label' => 'LOG IN'
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class',User::class);
        $resolver->setDefault('standalone', false);
        $resolver->addAllowedTypes('standalone', 'bool');        
    }
}
