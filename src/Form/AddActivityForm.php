<?php
/**
 * Created by IntelliJ IDEA.
 * User: Etudiant
 * Date: 13/12/2017
 * Time: 17:31
 */

namespace Form;
use Model\Activity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints as Assert;

class AddActivityForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('name', TextType::class,
            [
                'label' => 'Activity name',
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('visibility', ChoiceType::class,
                [   'choices' => [
                        'Public (within the organization)' => true,
                        'Private' => false
                    ]
                ])
            ->add('deadline', DateType::class, [
                //'format' => 'dd/MM/yyyy',
                'placeholder' => 'dd/mm/yyyy',
                'constraints' => [
                    new Assert\NotBlank()
                ]
            ])
            ->add('gradetype', ChoiceType::class,
                [
                    'choices' => [
                        'Absolute' => true,
                        'Relative' => false
                    ]
                ])
            ->add('lowerbound', NumberType::class,
                [
                    'constraints' => [
                        new Assert\GreaterThan(0)
                    ],
                    'scale' => 1
                ])
            ->add('upperbound', NumberType::class,
                [
                    'constraints' => [
                        new Assert\GreaterThan(0)
                    ],
                    'scale' => 1
                ])
            ->add('step', NumberType::class,
                [
                    'constraints' => [
                        new Assert\GreaterThan(0)
                    ],
                    'scale' => 1
                ])
            ->add('weight', TextType::class,
                [
                    'disabled' => true,
                    'data' => '100%'
                ])

        ;

        if ($options['standalone']){
            $builder->add('submit', SubmitType::class,[
                'label' => 'Ajouter participants'
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class',Activity::class);
        $resolver->setDefault('standalone', false);
        $resolver->addAllowedTypes('standalone', 'bool');
    }
}