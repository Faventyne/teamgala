<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 17/12/2017
 * Time: 23:55
 */

namespace Form;
use Model\Grade;
use Model\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;

class GradeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('firstname', TextType::class,
            [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Regex([
                        'pattern' => "[a-zA-Z]"
                    ])
                ],
                'label' => 'Firstname'
            ])
            ->add('lastname', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Regex([
                        'pattern' => "[a-zA-Z]"
                    ])
                ],
                'label' => 'Lastname'
            ])
            ->add('email', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Regex([
                        'pattern' => "/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/"
                    ])
                ]
            ])
            ->add('rolId', ChoiceType::class,
                [

                    'choices' =>
                        [
                            1 => false,
                            2 => true,
                            3 => false
                        ],
                    'choices_as_values' => true,
                    'choice_label' => function ($value, $key, $index) {
                        if ($key == 1) {
                            return "HR";
                        } elseif ($key == 2) {
                            return "Activity Manager";
                        } elseif ($key == 3) {
                            return "Collaborator";
                        }
                    },

                    'label' => 'Role',
                    'expanded' => true,
                    'multiple' => false,

                    'data' => true
                ])




            ->add('positionName', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                    new Assert\Regex([
                        'pattern' => "[a-zA-Z]"
                    ])
                ],
                'label' => 'Position'
            ])
            ->add('weightIni', NumberType::class, [
                'constraints' => [
                    new Assert\NotBlank(),
                ],
                'label' => 'Weight'
            ]);

        if ($options['standalone']){
            $builder->add('submit', SubmitType::class,[
                'label' => 'Soumettre'
            ]);
        }
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefault('data_class',Grade::class);
        $resolver->setDefault('standalone', false);
        $resolver->addAllowedTypes('standalone', 'bool');
    }

}